<?php
require_once 'components/header.php';

if (have_posts()) :
  while (have_posts()) : the_post();
    echo '<div class=\'banner\'>';
    the_post_thumbnail();
    echo '</div>';

    echo '<section>';
    the_title('<h1>', '</h1>');
    the_content();
    echo '</section>';
  endwhile;
endif;

require_once 'components/footer.php';