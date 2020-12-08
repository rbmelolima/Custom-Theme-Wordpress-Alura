<?php

function alura_register_menu()
{
  register_nav_menu(
    'menu-navigation',
    'Menu de navegação'
  );
}

function alura_add_resources()
{
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

//Registrando as funções
add_action('init', 'alura_register_menu');
add_action('after_setup_theme', 'alura_add_resources');