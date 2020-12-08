<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;700&display=swap" rel="stylesheet">
  <title>
    <?php bloginfo('name') ?>
  </title>

  <?php wp_head(); ?>
</head>

<body>

  <?php
  the_custom_logo();


  wp_nav_menu(array(
    'menu' => 'menu-navigation'
  ));
  ?>