<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

include( ABSPATH . 'wp-content/plugins/papapiu/includes/settings/index.php');
include( ABSPATH . 'wp-content/plugins/papapiu/includes/lessons/lessons.php');

/**
 * Add página no menu lateral do Papapiu
 */
function add_papapiu_menu_page() {
	add_menu_page( 'Settings', 'Papapiu', 'manage_options', 'pp_settings', 'generateSettingsPage', 'dashicons-pets', 1 );

}
// add_action('admin_menu', 'add_papapiu_menu_page');

function generateSettingsPage() {
	// if ( ! current_user_can( 'manage_options' ) ) {
	// 	return;
	// }

	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated"
		add_settings_error( 'pp_messages', 'pp_message', __( 'Settings Saved', 'pp' ), 'updated' );
	}

	// show error/update messages
	settings_errors( 'pp_messages' );

	?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form method="post" action="options.php">
				<?php
					settings_fields( 'pp_settings' ); // settings group name
					do_settings_sections( 'pp_settings' ); // just a page slug
					submit_button(); // "Save Changes" button
				?>
			</form>
		</div>
	<?php
}

// add_action( 'get_level_icon', 'get_level_icon', 10, 1);
function get_level_icon($level_name) {
  switch ($level_name) {
    case 'begginer':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/hatch.png';
      break;
    case 'intermediate':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/chick.png';
      break;
    case 'advanced':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/eagle.png';
      break;
    default:
      return "not a known level";
      break;
  }
}

// add_action( 'get_language_skill_icon', 'get_language_skill_icon', 10, 1);
function get_language_skill_icon($skill_name) {
  switch ($skill_name) {
    case 'listening':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/music.png';
      break;
    case 'reading':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/reading.png';
      break;
    case 'speaking':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/protest.png';
      break;
    case 'writing':
      return plugin_dir_url(__FILE__) . 'assets/images/icons/note.png';
      break;
    default:
      return "not a known skill";
      break;
  }
}

function zipFile($attachments, $zipname) {
  $files = array();

  foreach ($attachments as $attch) {
    $file_id = get_attachment_id_from_url($attch);
    array_push($files, realpath(get_attached_file( $file_id ))) ;
  }

  $zip = new ZipArchive;
  $zip->open(preg_replace( '/[^a-z0-9]+/', '-', strtolower( $zipname ) ) . '.zip', ZipArchive::CREATE);

  foreach ($files as $file) {
    $name = basename($file);
    $zip->addFile($file, $name);
  }

  $zip->close();
}


if ( ! function_exists( 'get_attachment_id_from_url' ) ) {
  /**
  * Get the attachment ID for a given file url
  *
  * @link   http://wordpress.stackexchange.com/a/7094
  * @param  string $url
  * @return boolean|integer
  */
  function get_attachment_id_from_url ($url) {
    $dir = wp_upload_dir();

    if (false === strpos($url, $dir['baseurl'] . '/')) {
      return false;
    }

    $file  = basename( $url );
    $query = array(
      'post_type'  => 'attachment',
      'fields'     => 'ids',
      'meta_query' => array(
        array(
          'key'     => '_wp_attached_file',
          'value'   => $file,
          'compare' => 'LIKE'
        )
      )
    );

    $ids = get_posts( $query );

    if (!empty($ids)) {
      foreach ($ids as $id) {
        if (wp_get_attachment_url($id) === $url) {
          return $id;
        }
      }
    }

    return false;
  }
}