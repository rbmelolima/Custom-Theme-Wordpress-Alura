<?php

function alura_register_menu()
{
  register_nav_menu(
    'menu-navigation',
    'Menu de navegação'
  );
}

add_action('init', 'alura_register_menu');