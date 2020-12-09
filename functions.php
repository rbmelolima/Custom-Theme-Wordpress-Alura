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
      'menu_position' => 1,
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

//Registrando o banner
function alura_register_custom_post_banner(){
  register_post_type(
    'banners',
    array(
      'labels' => array('name' => 'Banner'),
      'public' => true,
      'menu_position' => 0,
      'supports' => array('title', 'thumbnail'),
      'menu_icon' => 'dashicons-format-image'
    )
  );
}

//Note: 'cp' is custom post

//Adicionando metabox para o banner
function alura_register_metabox_cp_banner(){
  add_meta_box(
    'ai_register_metabox',
    'Texto para a página inicial',
    'alura_callback_cp_banner',
    'banners'
  );
}

//Função de callback para o metabox
function alura_callback_cp_banner($post){
  $text_home_1 = get_post_meta($post->id, '_text_home_1', true );
  $text_home_2 = get_post_meta($post->id, '_text_home_2', true );
  ?>
<label for="text_home_1">Texto 1</label>
<input type="text" name="text_home_1" value="<?= $text_home_1 ?>" style="width: 100%" />
<br>
<br>
<br>

<label for="text_home_2">Texto 2</label>
<input type="text" name="text_home_2" value="<?= $text_home_2 ?>" style="width: 100%" />
<?php
}

function alura_save_cp_metabox_banner($post_id){
  foreach($_POST as $key=>$value){
    if($key !== 'text_home_1' && $key !== 'text_home_2'){
      continue;
    }

    update_post_meta(
      $post_id,
      '_'.$key,
      $_POST[$key]
    );
  }
}

function getTextsForBanner()
{
    $args = array(
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            $text1 = get_post_meta(get_the_ID(), '_text_home_1', true);
            $text2 = get_post_meta(get_the_ID(), '_text_home_2', true);
            return array(
                'text_1' => $text1,
                'text_2' => $text2
            );
        endwhile;
    endif;
}

function alura_add_scripts(){
  $textsBanner = getTextsForBanner();

  if(is_front_page()){
    wp_enqueue_script('typed-js', get_template_directory_uri() . '/js/typed.min.js', array(), false, true);

    wp_enqueue_script('text-banner-js', get_template_directory_uri() . '/js/text-banner.js', array('typed-js'), false, true);
    
    wp_localize_script('text-banner-js', 'data', $textsBanner);
  }
}

//Registrando as funções
add_action('init', 'alura_register_menu');
add_action('init', 'alura_register_custom_post');
add_action('init', 'alura_register_taxonomy');
add_action('init', 'alura_register_custom_post_banner');
add_action('add_meta_boxes', 'alura_register_metabox_cp_banner');
add_action('after_setup_theme', 'alura_add_resources');
add_action('save_post', 'alura_save_cp_metabox_banner');
add_action('wp_enqueue_scripts', 'alura_add_scripts');