<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lepays
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
	</script>
	<!-- --------- -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header>
			<div class="header_logo">
				<?php print the_custom_logo() ?>
				<img src="http://localhost:8888/le-pays/wp-content/uploads/2021/05/logo.png" alt="">
			</div>
			<nav class="header_nav navbar navbar-expand-lg navbar-light bg-light">
				<div class=" container-fluid">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="header_nav__list collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<?php
									$post = get_post(5);
									$content = apply_filters('the_title', $post->post_title);
									$link = apply_filters('the_guid', $post->guid);
									print '<a class="nav-link" href="'. $link .'">'. $content . '</a>'
								?>
							</li>
							<li class="nav-item">
								<?php
									$post = get_post(20);
									$content = apply_filters('the_title', $post->post_title);
									$link = apply_filters('the_guid', $post->guid);
									print '<a class="nav-link" href="'. $link .'">'. $content . '</a>'
								?>
							</li>
							<li class="nav-item">
								<?php
									$post = get_post(22);
									$title = apply_filters('the_title', $post->post_title);
									$link = apply_filters('the_guid', $post->guid);
									print '<a class="nav-link" href="'. $link .'">'. $title . '</a>'
								?>
							</li>
							<li class="nav-item">
								<?php
									$post = get_post(87);
									$title = apply_filters('the_title', $post->post_title);
									$link = apply_filters('the_guid', $post->guid);
									print '<a class="nav-link" href="'. $link .'">'. $title . '</a>'
								?>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>