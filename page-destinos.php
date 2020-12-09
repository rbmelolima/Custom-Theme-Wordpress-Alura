<?php require_once 'components/header.php'; ?>

<main id="page-destiny">
  <section>
    <form action="#">
      <h2>Conheça nossos destinos</h2>
      <div class="group">
        <select name="countries" id="countries">
          <option value="" disabled selected>Selecione um país</option>
          <?php 
          $countries = get_terms(array('taxonomy' => 'country'));

          foreach($countries as $country): ?>

          <option <?= !empty($_GET['countries']) && $_GET['countries'] === $country->name ? 'selected' : '' ?>
            value="<?= $country->name ?>">
            <?= $country->name ?>
          </option>

          <?php endforeach; ?>
        </select>
        <button type=" submit" value="search">Pesquisar</button>
      </div>
    </form>
  </section>

  <section class="grid-destiny">
    <?php
    if(!empty($_GET['countries'])){
      $selectedCountry = array(array(
        'taxonomy' => 'country',
        'field' => 'name',
        'terms' => $_GET['countries']
      ));
    }
    
    $args = array(
      'post_type' => 'destiny',
      'tax_query' => !empty($_GET['countries']) ? $selectedCountry : '',
    );
    
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
        echo '<div class=\'card\'>';
        
        $url = get_the_post_thumbnail_url(null, 'post-thumbnail');
        $cardImage = "<div style='background-image: url({$url})' class='card-image'></div>";
        echo $cardImage;   

        the_title('<h2>', '</h2>');
        the_content();
        echo '</div>';
      endwhile;
    endif;
    ?>
  </section>
</main>


<?php require_once 'components/footer.php'; ?>