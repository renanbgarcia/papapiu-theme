<!DOCTYPE html>
<html <?php echo get_language_attributes() ?>>
<?php global $wp; ?>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content="Atividades de inglês, matemática e alfabetização para crianças aprenderem se divertindo em casa ou na escola." />
  <link rel="shortcut icon" type="image/jpg" href="<?php echo get_site_icon_url() ?>"/>
  <link rel="canonical" href="https://papapiu.com.br/<?php echo add_query_arg( array(), $wp->request ); ?>"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Boogaloo&family=Carter+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="<?php echo bloginfo( 'stylesheet_directory' ); ?>/font-face/fonts.css" />

  <?php if (get_site_url() == "https://papapiu.com.br"): ?>
  <!-- Externos -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8249872062184929"
     crossorigin="anonymous"></script>
	<meta name="facebook-domain-verification" content="6aibffumxcpo97cvl4zdkl9ac390qb" />
  <!-- mensagem para permitir anuncios -->
  <script async src="https://fundingchoicesmessages.google.com/i/pub-8249872062184929?ers=1" nonce="TiI98u8YazUzr2YzkvIciA"></script>
  <script nonce="TiI98u8YazUzr2YzkvIciA">(function() {function signalGooglefcPresent() {if (!window.frames['googlefcPresent']) {if (document.body) {const iframe = document.createElement('iframe'); iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;'; iframe.style.display = 'none'; iframe.name = 'googlefcPresent'; document.body.appendChild(iframe);} else {setTimeout(signalGooglefcPresent, 0);}}}signalGooglefcPresent();})();</script>
  
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v14.0" nonce="0nwnhMUP"></script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NJPKRSRFT1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-NJPKRSRFT1');
  </script>
  <?php endif ?>

  <title> <?php echo get_bloginfo( 'name' ) ?> </title>
  <?php wp_head(); ?>
</head>