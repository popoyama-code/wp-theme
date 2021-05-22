<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="popos.work">
    <meta name="description" content="自作WordPressテーマ">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wptime-plugin-preloader"></div>
    <div id="root">
      <header>
        <nav role="navigation" aria-label="main-nav" class="nav-collapse" id="primary-menu">
          <div class="elm-pc logo">
            <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>' rel='home'>
              <img class="logo__img" src="<?php bloginfo('template_directory'); ?>/img/logo.png">
            </a>
          </div>
          <div class="elm-pc separator"></div>
          <?php 
          wp_nav_menu( array( 
            'theme_location' => 'main-menu',
            'container' => '',
            'fallback_cb' => ''
          ) ); 
          ?>
          <div class="elm-pc separator"></div>
          <div class="elm-pc sns">
            <a class="sns__img-wrap" href="#">
              <img class="sns__img" src="<?php bloginfo('template_directory'); ?>/img/logo_icon_twitter.png">
            </a>
            <a class="sns__img-wrap" href="#">
              <img class="sns__img" src="<?php bloginfo('template_directory'); ?>/img/logo_icon_fb.png">
            </a>
          </div>
          <small class="elm-pc copy">
            &copy; 2021 popos.work
          </small>
        </nav>
        <div class="mobile-topbar">
          <a href="#nav" class="nav-toggle">Menu</a>
        </div>
      </header>