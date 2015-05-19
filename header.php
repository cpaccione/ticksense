<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title>
      <?php wp_title( '|', true, 'right' ); ?>
      <?php bloginfo('name'); ?>
    </title>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >

      <div class="container">

          <div class="header">
              <a href="<?php bloginfo('url');?>"><img class="img-responsive center-block" src="<?php bloginfo('stylesheet_directory');?>/images/tick_sense_logo.png" alt="ticksense"></a>
          </div>

          <nav class="tick-sense-nav text-center">

            <?php
             
              $defaults = array(
                  'container' => false,
                  'theme_location' => 'primary-menu',
                  'menu_class' => 'no-bullet'
                );

              wp_nav_menu($defaults); 
             
            ?>

          </nav>


