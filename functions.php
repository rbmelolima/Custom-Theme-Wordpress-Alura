<?php

//Menus
function alura_register_menu()
{
  register_nav_menu(
    'menu-navigation',
    'Menu de navegação'
  );
}

//Recursos no site
function alura_add_resources()
{
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

//Criando posts personalizados
function alura_register_custom_post()
{
  register_post_type(
    'destiny',
    array(
      'labels' => array('name' => 'Destinos'),
      'public' => true,
      'menu_position' => 0,
      'supports' => array('title', 'editor', 'thumbnail'),
      'menu_icon' => 'dashicons-admin-site'
    )
  );
}

//Criando taxonomias personalizadas
function alura_register_taxonomy(){
  register_taxonomy(
    'country',
    'destiny',
    array(
      'labels' => array('name' => 'Países'),
      'hierarchical' => true      
    )
  );
}

//Registrando as funções
add_action('init', 'alura_register_menu');
add_action('init', 'alura_register_custom_post');
add_action('init', 'alura_register_taxonomy');
add_action('after_setup_theme', 'alura_add_resources');