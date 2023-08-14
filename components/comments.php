<?php

/**
 * The template for displaying Comments.
 * @package Papapiu
 */

// Get only the approved comments
$post_id        = get_post()->ID;

$args = array(
  'status' => 'approve',
  'type'   =>  'comment',
  'post_id' => $post_id
);

$comments = get_comments($args);

?>
<div class="pt-5 mt-5">
  <h3 class="mb-5 h4 font-weight-bold">Comentários: <?php echo get_comments_number($post_id) ?></h3>
  <?php

  foreach ($comments as $comment) {
  ?>
    <ul class="comment-list">
      <li class="comment">
        <div class="vcard bio">
          <?php echo get_avatar($comment, 50) ?>
        </div>
        <div class="comment-body">
          <a href="<?php comment_author_email() ?>">
            <h3><?php comment_author() ?></h3>
          </a>
          <div class="meta"><?php comment_date() ?></div>
          <p><?php comment_text() ?></p>
          <p>
            <?php comment_reply_link([
              'add_below' => true,
              'depth'     => 20,
              'max_depth' => 200,
              'before'    => '<div class="reply">',
              'after'     => '</div>'
            ]); ?>
          </p>
        </div>
      </li>
    </ul>
  <?php
  }

  $form_args = array(
    "class_container" => "comment-form-wrap pt-5",
    "title_reply" => '<h3 class="mb-5 h4 font-weight-bold">Deixe um comentário</h3>',
    "title_reply_to" => 'Deixe um comentário para %s',
    "label_submit" => 'Enviar',
    "fields" => array(
      'author' => '<div class="form-group">
                                    <label for="name">Nome *</label>
                                    <input type="text" class="form-control" id="author" value="' . esc_attr($commenter['comment_author']) .
        '">
                                  </div>',
      'email' => '<div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" value="' . esc_attr($commenter['comment_author_email']) .
        '">
                                  </div>'
    ),
    "comment_field" => "<div class='form-group'>
                          <label for='comment'>Comentário *</label>
                          <textarea name='comment' id='comment' cols='30' rows='10' class='form-control' required></textarea>
                        </div>",
    "submit_button" => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary mt-3" value="%4$s" />',
    'cancel_reply_link' => " | Cancelar resposta"

  );
  comment_form($form_args, $post_id);

  ?>
</div>
</div> <!-- .col-md-8 -->