<?php
/*
Template Name: culture-page
*/
include 'functions.php';
get_header();
?>

<div class="culture-page">

    <h1 class="culture-page_title">
        <?php
        $post = get_post(22);
        $content = apply_filters('the_title', $post->post_title);
        print $content;
        ?>
    </h1>
    <?php
    $args = array(
        'category_name' => 'culture'
    );
    $our_posts = new WP_Query($args);

    if ($our_posts->have_posts()) :
    ?>
    <div class="culture-page_last-posts">
        <?php while ($our_posts->have_posts()) : $our_posts->the_post() ?>
        <div class="culture-page_last-posts__card">
            <div class="culture-page_last-posts__card___img"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="culture-page_last-posts__card___body">
                <a href="<?php the_permalink() ?>" class="culture-page_last-posts__card___body____title"><?php the_title(); ?></a>

                <div class="culture-page_last-posts__card___body____text"><?php the_excerpt() ?></div>
            </div>
        </div>
        <?php endwhile ?>
    </div>
    <?php else : ?>
    <! – Content If No Posts –>
        <?php endif ?>
</div>