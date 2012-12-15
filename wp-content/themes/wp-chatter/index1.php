<?php get_header(); ?>

		<div id="contentleft">

			<?php if ( is_home() && $paged < 2 && $wp_chatter_features_on == 'yes') { ?>
			<?php include (TEMPLATEPATH . '/features.php'); ?>
			<?php } ?>

			<div id="content" class="clearfix">

			<?php if ( $wp_chatter_home_layout == '3-column' && $wp_chatter_home_posts_by_cat == no ) { ?>
			<div class="col-3">
			<?php } ?>

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("paged=$page");
if (have_posts()) : while (have_posts()) : the_post();
if ( $post->ID == $do_not_duplicate[$post->ID] ) continue; update_post_caches($posts); ?>

					<div class="post clearfix maincontent" id="post-main-<?php the_ID(); ?>">

						<?php include (TEMPLATEPATH . '/post-thumb.php'); ?>

						<div class="entry clearfix">
							<h2><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php if ( $wp_chatter_post_content == 'Excerpts' ) { ?>
							<?php the_excerpt(); ?>
							<?php } else { ?>
							<?php the_content(''); ?>
							<?php } ?>
						</div>
						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>

					</div>

<?php endwhile; endif; ?>

					<?php include (TEMPLATEPATH . "/bot-nav.php"); ?>

			</div>

			<?php if ( $wp_chatter_home_layout == '3-column' && $wp_chatter_home_posts_by_cat == no ) { ?>
			<?php include (TEMPLATEPATH . "/sidebar-left.php"); ?>
			</div>
			<?php } ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>