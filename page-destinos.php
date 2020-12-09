<?php require_once 'components/header.php'; ?>

<main>
  <section class="grid-destiny">
    <?php
    $args = array('post_type' => 'destiny');
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
        echo '<div class=\'card\'>';
        the_post_thumbnail(
          'post-thumbnail',
          array('class' => 'card-image')
        );
        the_title('<h2>', '</h2>');
        the_content();
        echo '</div>';
      endwhile;
    endif;
    ?>
  </section>

</main>


<?php require_once 'components/footer.php'; ?>