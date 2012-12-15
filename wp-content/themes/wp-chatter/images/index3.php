<?php get_header(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div class="inner-page clearfix">

		<div id="contentleft">

			<div id="content" class="clearfix">

				<div id="content-col1">


<?php
$count = 1;
$featurecount = $wp_clear_features_number;
$my_query = new WP_Query("category_name=featured&showposts=$featurecount");
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[$post->ID] = $post->ID; 
?>

<?php if ( $count == 1 ) { ?>
					<h2>Featured Article</h2>

					<div class="feature-entry" id="post-<?php the_ID(); ?>" style="border-bottom:0;">

						<?php if ( function_exists('get_the_image') ) { ?>
							<?php get_the_image('custom_key=home_feature_photo&default_size=large&image_class=home_feature_photo'); ?>
						<?php } else { ?>
							<?php if (get_post_meta($post->ID, home_feature_photo)) { ?>
								<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, home_feature_photo, true); ?>" class="feature-photo" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>" alt="<?php _e("feature photo"); ?>" /></a>
							<?php } ?>
						<?php } ?>

						<h3 class="main-featured"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

						<?php the_excerpt(); ?>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>

					</div>

<?php } elseif ( $count == 2 ) { ?>

					<h2>More Featured Articles</h2>

					<div class="feature-entry" id="post-<?php the_ID(); ?>">

						<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>

						<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

						<?php the_excerpt(); ?>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>

					</div>

<?php } else { ?>

					<div class="feature-entry" id="post-<?php the_ID(); ?>">

						<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>

						<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

						<?php the_excerpt(); ?>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>

					</div>

<?php } ?>
<?php $count = $count + 1 ?>
<?php endwhile; ?>











				<?php if ( $wp_clear_cat_box_1 ) { ?>
				<ul class="home-left">
					<li class="title"><h2>aaa<?php echo $wp_clear_cat_box_1_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_clear_cat_box_1. '&showposts=' .$wp_clear_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
					<li class="homepost clearfix" id="post-1-<?php the_ID(); ?>">
						<div class="entry clearfix">
							<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
							<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

							<?php the_excerpt(); ?>
						</div>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>
					</li>
<?php endwhile; ?>
					<li class="bottom"><a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_clear_cat_box_1; ?>/"><?php _e("More from"); ?> <?php echo $wp_clear_cat_box_1_title; ?></a></li>
				</ul>
				<?php } ?>



				<div style="clear:both;height:0;"></div>

				</div>


				<div id="content-col2">

				<?php if ( $wp_clear_cat_box_2 ) { ?>
				<ul class="home-right">
					<li class="title"><h2><?php echo $wp_clear_cat_box_2_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_clear_cat_box_2. '&showposts=' .$wp_clear_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
					<li class="homepost clearfix" id="post-2-<?php the_ID(); ?>">
						<div class="entry clearfix">
							<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
							<h3>yyy<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

							<?php the_excerpt(); ?>
						</div>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>
					</li>
<?php endwhile; ?>
					<li class="bottom"><a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_clear_cat_box_2; ?>/"><?php _e("More from"); ?> <?php echo $wp_clear_cat_box_2_title; ?></a></li>
				</ul>
				<?php } ?>

				<?php if ( $wp_clear_cat_box_3 ) { ?>
				<ul class="home-left">
					<li class="title"><h2><?php echo $wp_clear_cat_box_3_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_clear_cat_box_3. '&showposts=' .$wp_clear_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
					<li class="homepost clearfix" id="post-3-<?php the_ID(); ?>">
						<div class="entry clearfix">
							<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
							<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

							<?php the_excerpt(); ?>
						</div>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>
					</li>
<?php endwhile; ?>
					<li class="bottom"><a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_clear_cat_box_3; ?>/"><?php _e("More from"); ?> <?php echo $wp_clear_cat_box_3_title; ?></a></li>
				</ul>
				<?php } ?>

				<?php if ( $wp_clear_cat_box_4 ) { ?>
				<ul class="home-right">
					<li class="title"><h2>qqq<?php echo $wp_clear_cat_box_4_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_clear_cat_box_4. '&showposts=' .$wp_clear_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
					<li class="homepost clearfix" id="post-4-<?php the_ID(); ?>">
						<div class="entry clearfix">
							<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
							<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

							<?php the_excerpt(); ?>
						</div>

						<div class="feature-bottom">
							<a class="read-more" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">Full Story</a>&nbsp;&nbsp;&nbsp;<a class="comment-count" href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>
						</div>
					</li>
<?php endwhile; ?>
					<li class="bottom"><a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_clear_cat_box_4; ?>/"><?php _e("More from"); ?> <?php echo $wp_clear_cat_box_4_title; ?></a></li>
				</ul>
				<?php } ?>

<?php if ( $wp_clear_other_articles == yes ) { ?>

				<ul class="home-bottom">
					<li class="title"><h2><?php _e("Other Recent Articles"); ?></h2></li> 
<?php
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("paged=$page");
if (have_posts()) : while (have_posts()) : the_post(); 
if ( $post->ID == $do_not_duplicate[$post->ID] ) continue; ?>

					<li class="homepost clearfix" id="post-2-<?php the_ID(); ?>">
						<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
					</li>
<?php endwhile; endif; ?>
					<li class="bottom">
						Archives:&nbsp;<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
							<option value=""><?php echo attribute_escape(__('select year')); ?></option>
							<?php wp_get_archives('type=yearly&format=option&show_post_count=1'); ?>
						</select>
					</li>
				</ul>
<?php } ?>

				</div> 

			</div>

		</div>

<?php get_sidebar(); ?>

		</div>

<?php get_footer(); ?>