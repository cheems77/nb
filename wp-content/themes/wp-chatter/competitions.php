<?php
/*
Template Name: Competitions
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

<p>
<?php
$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
if ($children) { ?>
    <ul class="competition">
        <span style="padding: 5px;"><?php echo $children; ?></span>
    </ul>
<?php } else {
		?>
		<h2>There are no competitions running at the moment, please check again later or <a href="http://nakedbeatz.com/lists/?p=subscribe" title="subscribe to our newsletter" target="_self">subscribe to our newsletter</a>  for updates</h2>
<?php } ?>

	</p>

					</div>

				</div>

				</div>

<?php endwhile; endif; ?>

			</div>

		</div>

<?php get_footer(); ?>