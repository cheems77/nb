<?php
/*
Template Name: Page Template (No Sidebars)
*/
?>

<?php get_header(); ?>

		<div id="contentleft" style="width:100%;">

			<div id="content" style="width:100%;">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="singlepost">

				<div class="post clearfix maincontent" style="margin-bottom:0;" id="post-<?php the_ID(); ?>">

					<div class="entry clearfix">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					</div>

				</div>

				</div>

<?php endwhile; endif; ?>

			</div>

		</div>

<?php get_footer(); ?>