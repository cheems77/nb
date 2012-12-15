<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/tabs.js"></script>

	<ul class="tabs clearfix">  
		<li><a href="javascript:tabSwitch_2(1, 4, 'tab_', 'content_');" id="tab_1" class="on"><?php _e("Radio"); ?></a></li>
		<li><a href="javascript:tabSwitch_2(2, 4, 'tab_', 'content_');" id="tab_2"><?php _e("Subscribe"); ?></a></li>
		<li><a href="javascript:tabSwitch_2(3, 4, 'tab_', 'content_');" id="tab_3"><?php _e("Archives"); ?></a></li>  
		<li><a href="javascript:tabSwitch_2(4, 4, 'tab_', 'content_');" id="tab_4"><?php _e("Popular"); ?></a></li>
	</ul>

	<div style="clear:both;"></div>
       
	<div id="content_1" class="cat_content">
		<div class="sidebox">
			<ul>
				<?php wp_nav_menu( array( 'theme_location' => 'sidetab-radio-navigation') ); ?>	
			</ul>
		</div>
	</div>

	<div id="content_2" class="cat_content" style="display:none">
		<ul>
<?php if ( $wp_chatter_fb_feed_id ) { ?>
			<li class="email">
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $wp_chatter_fb_feed_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					<input type="hidden" value="<?php echo $wp_chatter_fb_feed_id; ?>" name="uri"/>
					<input type="hidden" name="loc" value="en_US"/>
					<p><img src="<?php bloginfo('stylesheet_directory'); ?>/images/email.gif" alt="email" style="float:left;margin: 4px 5px 0 0;" />Subscribe Via Email<br />
					<input type="text" id="sub" name="email" value="" /> <input id="subbutton" type="submit" value="<?php _e('submit'); ?>" /><br />
					<small><?php _e('Privacy guaranteed. We will not share your information.'); ?></small></p>
				</form>
			</li>
<?php } elseif ( $wp_chatter_alt_email_code ) { ?>
			<li class="email">
				<?php echo stripslashes($wp_chatter_alt_email_code); ?>
			</li>
<?php } ?>
			<li class="feeds">
				<a href="<?php bloginfo('rss2_url'); ?>"><?php _e("Subscribe via RSS Feed"); ?></a>
			</li>
<?php if ( $wp_chatter_twitter_url ) { ?>
			<li class="twitter">
				<a href="<?php echo stripslashes($wp_chatter_twitter_url); ?>"><?php _e("Follow Us on Twitter"); ?></a>
			</li>
<?php } ?>
<?php if ( $wp_chatter_facebook_url ) { ?>
			<li class="facebook">
				<a href="<?php echo stripslashes($wp_chatter_facebook_url); ?>"><?php _e("Connect With Us on Facebook"); ?></a>
			</li>
<?php } ?>
<?php if ( $wp_chatter_mixcloud_url ) { ?>
			<li class="mixcloud">
				<a href="<?php echo stripslashes($wp_chatter_mixcloud_url); ?>"><?php _e("Find Us on Mixcloud"); ?></a>
			</li>

<?php } ?>
<?php if ( $wp_chatter_youtube_url ) { ?>
			<li class="youtube">
				<a href="<?php echo stripslashes($wp_chatter_youtube_url); ?>"><?php _e("Visit our YouTube Channel"); ?></a>
			</li>

<?php } ?>
		</ul> 
	</div>

	<div id="content_3" class="cat_content" style="display:none">
		<div class="sidebox">
			<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
				<option value=""><?php echo attribute_escape(__('Select Month')); ?></option> 
				<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
			</select>
		</div> 
	</div>

	<div id="content_4" class="cat_content" style="display:none">
		<?php /* <a href="http://eric.biven.us/2008/12/03/recently-popular-wordpress-plugin/">Recently Popular </a> plugin would work really well here. */ ?>
<?php if ( function_exists('get_recently_popular') ) : ?>
		<ul class="clearfix"><?php get_recently_popular(2, 'WEEK', 5, 0, 2); ?></ul>
<?php else : ?>
		<div class="sidebox"><p><?php _e('This feature has not been activated yet.'); ?></p></div>
<?php endif; ?>

	</div>