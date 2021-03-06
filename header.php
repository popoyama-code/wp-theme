<!DOCTYPE html>
<html lang="ja">
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
          <div class="logo visible--pc">
            <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>' rel='home'>
              <img class="logo__img" src="<?php bloginfo('template_directory'); ?>/img/logo.png">
            </a>
          </div>
          <div class="separator-head visible--pc"></div>
          <?php 
          wp_nav_menu( array( 
            'theme_location' => 'main-menu',
            'container' => '',
            'fallback_cb' => ''
          ) ); 
          ?>
          <div class="separator-head visible--pc"></div>
          <div class="sns">
            <a class="sns__img-wrap visible--pc" href="#">
              <img class="sns__img" src="<?php bloginfo('template_directory'); ?>/img/logo_icon_twitter.png">
            </a>
            <a class="sns__img-wrap visible--pc" href="#">
              <img class="sns__img" src="<?php bloginfo('template_directory'); ?>/img/logo_icon_fb.png">
            </a>
          </div>
          <small class="copy visible--pc">
            &copy; 2021 popos.work
          </small>
        </nav>
        <div class="mobile-topbar">
          <a href="#nav" class="nav-toggle">Menu</a>
        </div>
      </header>