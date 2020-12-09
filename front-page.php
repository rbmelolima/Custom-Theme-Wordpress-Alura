<?php 

require_once 'components/header.php'; 

$args = array(
'post_type' => 'banners',
'post_status' => 'publish',
'posts_per_page' => 1
);

$query = new WP_Query($args);
if($query->have_posts()):
  while($query->have_posts()): $query->the_post();
?>

<?php 
  $url = get_the_post_thumbnail_url(null, 'post-thumbnail');

  $banner_open = "<div style='background-image: url({$url})' class='banner'>";
  $banner_close = "</div>";
?>

<main id="page-home">
  <?php echo $banner_open; ?>

  <div class="overlay">
    <div class="dynamic-text-container">
      <span id="text-banner"></span>
    </div>
  </div>

  <?php echo $banner_close; ?>
</main>

<?php endwhile; endif;

require_once 'components/footer.php'; ?>