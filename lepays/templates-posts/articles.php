<?php
/*
Template Name: article
Template Post Type: post
*/
include 'functions.php';
?>
<?php get_header();?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="article-post-content">
    <h1 class="article-post-content_title"><?php the_title();?></h1>

    <div class="article-post-content_text">
        <?php the_content(); ?>
    </div>

    <div class="article-post-content_author">
        <?php echo the_author(); ?>
    </div>

    <div class="article-post-content_img">
        <?php echo get_the_post_thumbnail(); ?>
    </div>
</div>

<form>
  <input type="button" value="Back" onclick="history.go(-1)">
</form>


<?php endwhile; ?>