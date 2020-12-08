<?php require_once 'components/header.php'; ?>

<main>
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_post_thumbnail(
        'post-thumbnail',
        array('class' => 'banner')
      );

      echo '<section>';
      the_title('<h1>', '</h1>');
      the_content();
      echo '</section>';
    endwhile;
  endif;
  ?>
</main>

<?php require_once 'components/footer.php'; ?>