<?php
/*
Template Name: Profiles
*/
?>
<?php get_header(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div id="contentleft">

			<div id="content">

					<?php include (TEMPLATEPATH . '/banner468.php'); ?>
<h1><?php the_title(); ?></h1>
<?php query_posts(
	array(
		'paged' => 0,
		'post_type' => nbprofile,
		'post_status' => 'publish',
		'posts_per_page' => 100
		)
	);

?>
<hr />
<p>Read More about: 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> |	
<?php endwhile; endif; ?>
</p>
<?php wp_reset_query(); ?>
<?php query_posts(
	array(
		'paged' => 1, 
		'post_type' => nbprofile,
		'post_status' => 'publish',
		'posts_per_page' => 20
		)
	); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="singlepost maincontent">

						<div class="post clearfix" id="post-<?php the_ID(); ?>">
							<div class="entry">
							<span style="float: left; padding-right: 10px;">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></span>
<span><h2><?php the_title(''); ?></h2>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read the Full Profile for <?php the_title(); ?></a>
<br />
<br />
Music: <?php 
$music_terms = get_the_terms($post->ID, 'Skills'); 
$count = count($music_terms);
 if ( $count > 0 ){
     foreach ( $music_terms as $musictype) {
       echo $musictype->name . ", ";
        
     }
 }
?><br />
<br />

<?php if (get_post_meta($post->ID, 'nb_twitter', true) !="") { ?>
<a href="<?php echo get_post_meta($post->ID, 'nb_twitter', true); ?>" target="_blank" title="<?php the_title(''); ?>'s Twitter Profile">
<img src="<?php bloginfo('template_url'); ?>/images/profiles/twitter.png" title="<?php the_title(''); ?>'s Twitter Profile" border="0" />
</a>
<?php } ?>
<?php if (get_post_meta($post->ID, 'nb_facebook', true) !="") { ?>
<a href="<?php echo get_post_meta($post->ID, 'nb_facebook', true); ?>" target="_blank" title="<?php the_title(''); ?>'s Facebook Profile">
<img src="<?php bloginfo('template_url'); ?>/images/profiles/facebook.png" title="<?php the_title(''); ?>'s Facebook Profile" border="0" />
</a>
<?php } ?>
<?php if (get_post_meta($post->ID, 'nb_youtube', true) !="") { ?>
<a href="<?php echo get_post_meta($post->ID, 'nb_youtube', true); ?>" target="_blank" title="<?php the_title(''); ?>'s YouTube Profile">
<img src="<?php bloginfo('template_url'); ?>/images/profiles/youtube.png" title="<?php the_title(''); ?>'s YouTube Profile" border="0" />
</a>
<?php } ?>
<?php if (get_post_meta($post->ID, 'nb_mixcloud', true) !="") { ?>
<a href="<?php echo get_post_meta($post->ID, 'nb_mixcloud', true); ?>" target="_blank" title="<?php the_title(''); ?>'s MixCloud Profile">
<img src="<?php bloginfo('template_url'); ?>/images/profiles/mixcloud.png" title="<?php the_title(''); ?>'s MixCloud Profile" border="0" />
</a>
<?php } ?>
<?php if (get_post_meta($post->ID, 'nb_myspace', true) !="") { ?>
<a href="<?php echo get_post_meta($post->ID, 'nb_myspace', true); ?>" target="_blank" title="<?php the_title(''); ?>'s MySpace Profile">
<img src="<?php bloginfo('template_url'); ?>/images/profiles/myspace.png" title="<?php the_title(''); ?>'s MySpace Profile" border="0" />
</a>
<?php } ?>
<?php if (get_post_meta($post->ID, 'nb_soundcloud', true) !="") { ?>
<a href="<?php echo get_post_meta($post->ID, 'nb_soundcloud', true); ?>" target="_blank" title="<?php the_title(''); ?>'s SoundCloud Profile">
<img src="<?php bloginfo('template_url'); ?>/images/profiles/soundcloud.png" title="<?php the_title(''); ?>'s SoundCloud Profile" border="0" />
</a>
<?php } ?>
<br />
</span>
							</div>
						</div>
					</div>
<?php endwhile; endif; ?>
<?php if ( is_single() ) { ?>
<div class="navigation" style="border-top:0;">
	<div class="alignleft"><?php previous_post_link('%link', 'Previous'); ?></div>
	<div class="alignright"><?php next_post_link('%link', 'Next'); ?></div>
	<div style="clear:both;"></div>
</div>
<?php } else { ?>
<div class="navigation">
	<div class="alignleft"><?php posts_nav_link('','','Previous') ?></div>
	<div class="alignright"><?php posts_nav_link('','Next','') ?></div>
	<div style="clear:both;"></div>
</div>
<?php } ?>
			</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
