<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_template_directory_uri() . '/styles/reset.css' ?>">

  <link rel="stylesheet" href="<?= get_template_directory_uri() . '/styles/global.css' ?>">

  <title>
    <?php bloginfo('name') ?>
  </title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <nav class="header-navbar">
    <?php
    the_custom_logo();

    wp_nav_menu(array(
      'menu' => 'menu-navigation',      
    ));
    ?>
  </nav>