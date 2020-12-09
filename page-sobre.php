<?php require_once 'components/header.php'; ?>

<main>
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      $url = get_the_post_thumbnail_url(null, 'post-thumbnail');
      $banner = "<div style='background-image: url({$url})' class='banner'></div>";

      echo $banner;   

      echo '<section>';
      the_title('<h1>', '</h1>');
      the_content();
      echo '</section>';
    endwhile;
  endif;
  ?>
</main>

<?php require_once 'components/footer.php'; ?>