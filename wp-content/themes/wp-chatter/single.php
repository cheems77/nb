<?php get_header(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div id="contentleft">

			<div id="content">

<?php if ( $wp_chatter_single_layout == '3-column' ) { ?>
			<div class="col-3">
<?php } ?>

					<?php include (TEMPLATEPATH . '/banner468.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="singlepost maincontent">

						<div class="post clearfix" id="post-<?php the_ID(); ?>">
							<h1><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h1>
<br />
							<div class="entry clearfix">
								<span style="float: left; padding-right: 10px;"><?php the_post_thumbnail('medium'); ?>
</span>								<?php the_content(''); ?>
							</div>

							<?php the_tags("<p class='tags'><strong> Tags</strong>: "," &bull; ", "</p>"); ?>
						</div>

						<?php comments_template('', true); ?>

<?php endwhile; endif; ?>

					</div>

			</div>

<?php if ( $wp_chatter_single_layout == '3-column' ) { ?>
			<?php include (TEMPLATEPATH . "/sidebar-left.php"); ?>
			</div>
<?php } ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>