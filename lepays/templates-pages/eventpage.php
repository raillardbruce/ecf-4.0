<?php
/*
Template Name: event-page
Template Post Type: page
*/
include 'functions.php';
get_header();
?>

<div class="event-page">

    <?php
    $args = array(
        'post_type' => 'tribe_events'
    );
    $our_posts = new WP_Query($args);

    if ($our_posts->have_posts()) :
    ?>
    <div class="sport-page_last-posts">
        <?php while ($our_posts->have_posts()) : $our_posts->the_post() ?>
        <div class="sport-page_last-posts__card">
            <div class="sport-page_last-posts__card___img"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt() ?></p>
                <a href="<?php the_permalink() ?>" class="btn btn-primary">Voir l'événement</a>
            </div>
        </div>
        <?php endwhile ?>
    </div>
    <?php else : ?>
    <! – Content If No Posts –>
        <?php endif ?>

</div>