<?php get_header(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div id="contentleft">

			<div id="content">

			<?php if ( $wp_chatter_archive_layout == '3-column' ) { ?>
			<div class="col-3">
			<?php } ?>

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<h1 class="archive-title"><?php _e("Search Results for"); ?> '<?php echo wp_specialchars($s, 1); ?>'</h1>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post clearfix maincontent" id="post-<?php the_ID(); ?>">

					<div class="entry clearfix">
						<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
						<h2><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</div>

					<?php include (TEMPLATEPATH . "/postinfo.php"); ?>

				</div>

<?php endwhile; endif; ?>

				<?php include (TEMPLATEPATH . "/bot-nav.php"); ?>

			</div>

			<?php if ( $wp_chatter_archive_layout == '3-column' ) { ?>
<?php include (TEMPLATEPATH . "/sidebar-left.php"); ?>
			</div>
			<?php } ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>