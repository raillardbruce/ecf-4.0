<?php
/*
Template Name: home-page
Template Post Type: page
*/
include 'functions.php';
get_header();
?>

<div class="home-page">
    <div class="home-page_post">
        <?php
        $recentPosts = new WP_Query();
        $recentPosts->query('showposts=10');
        ?>
        <div class="home-page_post__last-posts">
            <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <div class="home-page_post__last-posts___card">
                    <div class="home-page_post__last-posts___card____img"><?php echo get_the_post_thumbnail(); ?></div>
                    <div class="home-page_post__last-posts___card____body">
                        <a class="home-page_post__last-posts___card____body_____title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                        <div class="home-page_post__last-posts___card____body_____text"><?php the_excerpt() ?></div>
                        <p><?php the_time('d/m/Y') ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="home-page_event">

        <h2 class="home-page_event__title">Événements</h2>
        <?php
        $args = array(
            'post_type' => 'tribe_events',
            'posts_per_page' => 3,
        );
        $our_posts = new WP_Query($args);

        if ($our_posts->have_posts()) :
        ?>
            <div class="home-page_event__last-posts">
                <?php while ($our_posts->have_posts()) : $our_posts->the_post() ?>
                    <div class="home-page_event__last-posts___card">
                        <div class="home-page_event__last-posts___card___img"><?php echo get_the_post_thumbnail(); ?></div>
                        <div class="card-body">
                            <a href="<?php the_permalink() ?>" class="home-page_event__last-posts___card____body_____title"><?php the_title(); ?></a>
                            <div class="home-page_event__last-posts___card____body_____text"><?php the_excerpt() ?></div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        <?php else : ?>
            <! – Content If No Posts –>
            <?php endif ?>

    </div>

</div>