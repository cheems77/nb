<?php get_header(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div id="contentleft" class="clearfix">

			<?php include (TEMPLATEPATH . '/banner468.php'); ?>

			<div id="content-home-top" class="clearfix">

				<div class="content-col1">

					<?php include (TEMPLATEPATH . '/features.php'); ?>

					<?php if ( $wp_chatter_cat_box_1 ) { ?>
					<ul class="home">
						<li class="title"><h2 class="home-title"><?php echo $wp_chatter_cat_box_1_title; ?></h2></li>

<?php query_posts('category_name=' .$wp_chatter_cat_box_1. '&showposts=' .$wp_chatter_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
						<li class="homepost maincontent" id="post-1-<?php the_ID(); ?>">
							<div class="entry clearfix">
								<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
								<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</div>
							<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
						</li>
<?php endwhile; ?>
						<li class="bottom">
							<a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_chatter_cat_box_1; ?>/"><?php _e("More From"); ?> <?php echo $wp_chatter_cat_box_1_title; ?></a>
						</li>
					</ul>
					<?php } ?>

				</div>

				<div class="content-col2">

					<?php if ( $wp_chatter_cat_box_2 ) { ?>
					<ul class="home">
						<li class="title"><h2 class="home-title"><?php echo $wp_chatter_cat_box_2_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_chatter_cat_box_2. '&showposts=' .$wp_chatter_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
						<li class="homepost maincontent" id="post-2-<?php the_ID(); ?>">
							<div class="entry clearfix">
								<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
								<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</div>
							<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
						</li>
<?php endwhile; ?>
						<li class="bottom">
							<a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_chatter_cat_box_2; ?>/"><?php _e("More From"); ?> <?php echo $wp_chatter_cat_box_2_title; ?></a>
						</li>
					</ul>
					<?php } ?>

					<?php if ( $wp_chatter_cat_box_3 ) { ?>
					<ul class="home">
						<li class="title"><h2 class="home-title"><?php echo $wp_chatter_cat_box_3_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_chatter_cat_box_3. '&showposts=' .$wp_chatter_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
						<li class="homepost maincontent" id="post-3-<?php the_ID(); ?>">
							<div class="entry clearfix">
								<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
								<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</div>
							<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
						</li>
<?php endwhile; ?>
						<li class="bottom">
							<a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_chatter_cat_box_3; ?>/"><?php _e("More From"); ?> <?php echo $wp_chatter_cat_box_3_title; ?></a>
						</li>
					</ul>
					<?php } ?>

					<?php if ( $wp_chatter_cat_box_4 ) { ?>
					<ul class="home">
						<li class="title"><h2 class="home-title"><?php echo $wp_chatter_cat_box_4_title; ?></h2></li>
<?php query_posts('category_name=' .$wp_chatter_cat_box_4. '&showposts=' .$wp_chatter_num_home_posts_by_cat. ''); ?>
<?php while (have_posts()) : the_post(); 
$do_not_duplicate[$post->ID] = $post->ID; ?>
						<li class="homepost maincontent" id="post-4-<?php the_ID(); ?>">
							<div class="entry clearfix">
								<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
								<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</div>
							<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
						</li>
<?php endwhile; ?>
						<li class="bottom">
							<a href="<?php bloginfo('url'); ?>/category/<?php echo $wp_chatter_cat_box_4; ?>/"><?php _e("More From"); ?> <?php echo $wp_chatter_cat_box_4_title; ?></a>
						</li>
					</ul>
					<?php } ?>

				</div>

			</div>

			<div id="content-home-bottom" class="clearfix">

				<?php if ( $wp_chatter_other_articles == yes ) { ?>
				<ul class="home-bottom">
					<li class="title"><h2 class="home-title"><?php _e("Other Recent Articles"); ?></h2></li> 
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("paged=$page");
if (have_posts()) : while (have_posts()) : the_post(); 
if ( $post->ID == $do_not_duplicate[$post->ID] ) continue; ?>
					<li class="homepost maincontent" id="post-main-<?php the_ID(); ?>">
						<div class="entry clearfix">
							<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php include (TEMPLATEPATH . '/post-thumb.php'); ?></a>
							<h3><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>
					</li>
<?php endwhile; endif; ?>
					<li class="bottom">
						Archives:&nbsp;
						<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
							<option value=""><?php echo attribute_escape(__('select year')); ?></option>
							<?php wp_get_archives('type=yearly&format=option&show_post_count=1'); ?>
						</select>
					</li>
				</ul>
				<?php } ?>

			</div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
