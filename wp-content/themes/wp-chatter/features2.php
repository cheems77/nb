<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php $count = 1;
$featurecount = $wp_chatter_features_number;
$my_query = new WP_Query("category_name=featured&showposts=$featurecount");
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[$post->ID] = $post->ID; ?>

<?php if ( $count == 1 ) { ?>
					<h2 class="home-title">Featured Article</h2>
					<div class="feature-entry-list maincontent" id="post-<?php the_ID(); ?>" style="border-bottom:0;">
						<?php if ( function_exists('get_the_image') ) { ?>
							<?php get_the_image('custom_key=home_feature_photo&default_size=large&image_class=home_feature_photo'); ?>
						<?php } else { ?>
							<?php if (get_post_meta($post->ID, home_feature_photo)) { ?>
								<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, home_feature_photo, true); ?>" class="feature-photo" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>" alt="<?php _e("feature photo"); ?>" /></a>
							<?php } ?>
						<?php } ?>
						<h3 class="main-featured"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
					</div>
<?php } elseif ( $count == 2 ) { ?>
					<h2 class="home-title">More Featured Articles</h2>
					<div class="feature-entry-list maincontent" id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
						<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
					</div>
<?php } else { ?>
					<div class="feature-entry-list maincontent" id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
						<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
					</div>
<?php } ?>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

					<div style="height:10px;"></div>
