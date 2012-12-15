<?php if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar - Left',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>',
	));
	register_sidebar(array('name'=>'Right Sidebar - Top',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>',
	));
	register_sidebar(array('name'=>'Sidebar - Column 2',
	'before_title' => '<h2 class="home-title">',
	'after_title' => '</h2>',
	'before_widget' => '<div class="homepost maincontent">',
	'after_widget'  => '</div>',
	));
	register_sidebar(array('name'=>'Footer'));

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if ( !function_exists('wp_list_comments') ) 
		$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}

// This function creates a better tag cloud widget.
function wp_widget_tag_cloud2($args) {
	extract($args);
	$options = get_option('widget_tag_cloud2');
	$title = empty($options['title']) ? __('Tags') : $options['title'];

	echo $before_widget;
	echo $before_title . $title . $after_title;
	wp_tag_cloud('format=list');
	echo $after_widget;
}

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
array(
'top-navigation' => __( 'Top Navigation' ),
'sidetab-radio-navigation' => __( 'Side Tab Navigation' ))
);
}

// This function limits the number of words in the magazine home page excerpt.
function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}


// Add tag cloud widget to the Widgets panel.
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Tag Cloud'), 'wp_widget_tag_cloud2');

// Remove yucky or un-needed widgets from the Widgets panel.
function remove_yucky_widgets() {
		unregister_sidebar_widget( 'tag_cloud' );
		unregister_sidebar_widget( 'calendar' );
		unregister_sidebar_widget( 'search' );
}

add_action('widgets_init', 'remove_yucky_widgets');

// WP-Chatter Options Panel
$themename = "WP-Chatter";
$shortname = "wp_chatter";

$options = array (

// Basic Site Settings

	array(    "name" => "Basic Site Settings",
		"id" => $shortname."_basic_settings",
		"type" => "header"),

	array(    "name" => "Color Scheme",
		"id" => $shortname."_colors",
		"type" => "select",
		"std" => "default",
		"options" => array("default", "black", "burnt-orange", "gray", "green", "hot-pink", "purple", "red", "turquoise" ),
		"help" => "You have 8 different color schemes from which to select."),

	array(    "name" => "Home Page Layout",
		"id" => $shortname."_home_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Single Post Layout",
		"id" => $shortname."_single_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Archive Page Layout",
		"id" => $shortname."_archive_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Page Layout",
		"id" => $shortname."_page_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Small Sidebar Location",
		"id" => $shortname."_side_left_loc",
		"type" => "select",
		"std" => "Left of Content",
		"options" => array("Left of Content", "Right of Content"),
		"help" => ""),

	array(    "name" => "Hide Category Navigation",
		"id" => $shortname."_hide_cats",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "By selecting yes, you will remove the category navigation bar."),

// Home Page Post Settings

		array(    "name" => "Home Page Post Settings",
		"id" => $shortname."_home_page_post_settings",
		"type" => "header"),

	array(    "name" => "Featured Articles on Home Page",
		"id" => $shortname."_features_on",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "By selecting no, you will remove the Featured Articles section from the home page."),

	array(    "name" => "How Would You Like to Display Feature Articles?",
		"id" => $shortname."_feature_display",
		"type" => "select",
		"std" => "Display in Glider",
		"options" => array("Display in Glider", "Display Separately"),
		"help" => ""),


	array(    "name" => "How Many Featured Articles",
		"id" => $shortname."_features_number",
		"type" => "select",
		"std" => "6",
		"options" => array("6", "5", "4", "3", "2", "1"),
		"help" => "How many featured articles should be shown in the Featured Articles section; limited to 6."),

	array(    "name" => "Scroll Featured Articles Automatically",
		"id" => $shortname."_features_auto_glide",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Select no to turn off the auto-scroll function for your Featured Articles."),

	array(    "name" => "Display Posts by Category on Home Page",
		"id" => $shortname."_home_posts_by_cat",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "You can display up to 4 boxes of posts on your home page; each box containing posts from a specific category. Select 'Yes' above to do so.<br /><strong>Note: Make sure your Reading Settings are set to display AT LEAST 15 posts per page. You may need to increase that number to display Other Recent Articles below the category boxes.</strong>"),

	array(    "name" => "Stack Category Boxes",
		"id" => $shortname."_home_posts_stack",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "By default, your category boxes will align side-by-side. Select yes, to stack the category boxes on top of each other."),

	array(    "name" => "How Many Posts In Each Category",
		"id" => $shortname."_num_home_posts_by_cat",
		"type" => "select",
		"std" => "3",
		"options" => array("3","2","4","5","6"),
		"help" => "Select the number of posts in each category."),

	array(    "name" => "Category Box 1 (top left box)",
		"id" => $shortname."_cat_box_1",
		"type" => "text",
		"help" => "Enter a CATEGORY SLUG (not the Category Name) <strong>EXACTLY</strong> as it appears on your list of categories (click the 'Categories' link under the 'Posts' tab)."),

	array(    "name" => "Category Box 1 Title",
		"id" => $shortname."_cat_box_1_title",
		"type" => "text",
		"help" => "Enter a title for Category Box 1."),

	array(    "name" => "Category Box 2 (top right box)",
		"id" => $shortname."_cat_box_2",
		"type" => "text",
		"help" => "Enter a CATEGORY SLUG (not the Category Name) <strong>EXACTLY</strong> as it appears on your list of categories (click the 'Categories' link under the 'Posts' tab)."),

	array(    "name" => "Category Box 2 Title",
		"id" => $shortname."_cat_box_2_title",
		"type" => "text",
		"help" => "Enter a title for Category Box 2."),

	array(    "name" => "Category Box 3 (bottom left box)",
		"id" => $shortname."_cat_box_3",
		"type" => "text",
		"help" => "Enter a CATEGORY SLUG (not the Category Name) <strong>EXACTLY</strong> as it appears on your list of categories (click the 'Categories' link under the 'Posts' tab)."),

	array(    "name" => "Category Box 3 Title",
		"id" => $shortname."_cat_box_3_title",
		"type" => "text",
		"help" => "Enter a title for Category Box 3."),

	array(    "name" => "Category Box 4 (bottom right box)",
		"id" => $shortname."_cat_box_4",
		"type" => "text",
		"help" => "Enter a CATEGORY SLUG (not the Category Name) <strong>EXACTLY</strong> as it appears on your list of categories (click the 'Categories' link under the 'Posts' tab)."),

	array(    "name" => "Category Box 4 Title",
		"id" => $shortname."_cat_box_4_title",
		"type" => "text",
		"help" => "Enter a title for Category Box 4."),

	array(    "name" => "List Other Recent Articles Below Categories",
		"id" => $shortname."_other_articles",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "By default, Other Recent Articles will appear below your category boxes. Select no to remove them."),

// Site Title Settings

		array(    "name" => "Site Title Settings",
		"id" => $shortname."_site_title_settings",
		"type" => "header"),

		array(    "name" => "Site Title Option",
		"id" => $shortname."_site_title_option",
		"type" => "select",
		"std" => "Basic Text-Type Title",
		"options" => array("Basic Text-Type Title", "Image/Logo-Type Title"),
		"help" => "You can use simple text as your site title or you can use an image. If you have a Custom Image/Logo you'd like to use, you can enter the URL below."),

	array(    "name" => "Site Title Font Family",
		"id" => $shortname."_site_title_font_family",
		"type" => "select",
		"std" => "arial,helvetica,sans-serif",
		"options" => array("arial,helvetica,sans-serif", "georgia,times,serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif", "rockwell,georgia,serif","cambria,georgia,serif"),
		"help" => "Applies only to Basic Text-Type Title option."),

		array(    "name" => "Site Title Color",
		"id" => $shortname."_site_title_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "Example: #ffffff. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>. Applies only to Basic Text-Type Title option."),

		array(    "name" => "Site Title Size",
		"id" => $shortname."_site_title_size",
		"type" => "text",
		"std" => "36px",
		"help" => "Enter the size of your Site Title in px (e.g. 36px). Applies only to Basic Text-Type Title option."),

	array(    "name" => "Site Title Weight",
		"id" => $shortname."_site_title_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold", "normal"),
		"help" => "Applies only to Basic Text-Type Title option."),

		array(    "name" => "Site Title Alignment",
		"id" => $shortname."_site_title_alignment",
		"type" => "select",
		"std" => "Left",
		"options" => array("Left", "Center", "Right"),
		"help" => "Applies only to Basic Text-Type Title option."),

	array(    "name" => "Site Title Background Color",
		"id" => $shortname."_header_bg_color",
		"std" => "",
		"type" => "text",
		"help" => "Example: #000000. Leave blank to use default background. This is the entire header area behind the site title. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Custom Image/Logo URL",
		"id" => $shortname."_site_logo_url",
		"std" => "",
		"type" => "textarea",
		"help" => "Upload your logo file (logo width should not exceed 960px; height should not exceed 110px;), and enter the URL for the file location (e.g. http://www.mysite.com/images/logo.gif)."),

	array(    "name" => "Custom Image/Logo Position",
		"id" => $shortname."_site_logo_position",
		"std" => "0px 0px",
		"type" => "text",
		"help" => "The first digit is the number of pixels to move the logo from the left. Second digit is the number of pixels to move the logo from the top of the header area. If unsure, leave the default values."),

// Basic Post Settings

		array(    "name" => "Basic Post Settings",
		"id" => $shortname."_basic_post_settings",
		"type" => "header"),

	array(    "name" => "Post Excerpts or Content",
		"id" => $shortname."_post_content",
		"type" => "select",
		"std" => "Excerpts",
		"options" => array("Excerpts", "Content"),
		"help" => "On your home page and archive/category pages, you can display post excerpts or the full post content. See <a href='http://codex.wordpress.org/Glossary#Excerpt'>here</a> for more info."),

	array(    "name" => "Add Default Post Thumbnail",
		"id" => $shortname."_default_thumbs",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "If you don't add your own thumbnail image to a post, WP-Chatter can add a default, generic thumbnail image for you. To change the default thumbnail, select an image, rename it to def-thumb.gif, and upload it to your wp-content/images/ folder."),

	array(    "name" => "Size of Author Profile Gravatar",
		"id" => $shortname."_grav_size",
		"type" => "select",
		"std" => "36",
		"options" => array("36", "48", "60", "72", "84", "96"),
		"help" => "This is the pixel size of the Gravatar that will be used in the author profile section found at the top of the single post page."),

	array(    "name" => "Hide Author Bio on Single Post",
		"id" => $shortname."_hide_auth_bio",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "If you'd like to hide the author bio found at the top of the single post page, select yes above."),

// Subscription Form and Sidebar Contact Settings

		array(    "name" => "Subscription Form and Sidebar Contact Settings",
		"id" => $shortname."_subscription_form_settings",
		"type" => "header"),

	array(    "name" => "Use Google/Feedburner Email",
		"id" => $shortname."_fb_email",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Feedburner Email allows publishers to deliver their content to subscribers via email. See <a href='http://www.feedburner.com/fb/a/publishers/fbemail'>here</a> for more info. Select no to use an alternate email list provider, and enter your form code below."),

	array(    "name" => "Google/Feedburner Feed URI",
		"id" => $shortname."_fb_feed_id",
		"std" => "",
		"type" => "text",
		"help" => "For example, in this Google/Feedburner feed URL: http://feeds2.feedburner.com/<strong>solostream</strong>, the Feed URI is <strong>solostream</strong>."),

	array(    "name" => "Alternate Email List Form Code",
		"id" => $shortname."_alt_email_code",
		"std" => "",
		"type" => "textarea",
		"help" => "If using an alternate email list provider, enter your subscription form code here."),

	array(    "name" => "Twitter URL",
		"id" => $shortname."_twitter_url",
		"std" => "",
		"type" => "textarea",
		"help" => "Enter your Twitter URL ... e.g. http://www.twitter/twitterusername."),

	array(    "name" => "Facebook Profile URL",
		"id" => $shortname."_facebook_url",
		"std" => "",
		"type" => "textarea",
		"help" => "Enter your Facebook Profile URL ... e.g. http://www.facebook.com/home.php#/profile.php?id=123456789."),

	array(    "name" => "Mixcloud Profile URL",
		"id" => $shortname."_mixcloud_url",
		"std" => "",
		"type" => "textarea",
		"help" => "Enter your mixcloud Profile URL ... e.g. http://www.mixcloud/Nakedbeatz."),

	array(    "name" => "YouTube Profile URL",
		"id" => $shortname."_youtube_url",
		"std" => "",
		"type" => "textarea",
		"help" => "Enter your YouTube Profile URL ... e.g. http://www.youtube.com/myprofile."),

// Advertisement Settings

	array(    "name" => "Advertisement Settings",
		"id" => $shortname."_ad_settings",
		"type" => "header"),

	array(    "name" => "Display 468x60 Ad in Header",
		"id" => $shortname."_ad468head",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Select no to remove the 468x60 banner advertisement in the site header next to the site title. Enter your own ad code below."),

	array(    "name" => "Header 468x60 Ad Code",
		"id" => $shortname."_ad468head_code",
		"std" => "<a href='http://secure.hostgator.com/cgi-bin/affiliates/clickthru.cgi?id=mdp859300' target='_blank'><img src='http://www.hostgator.com/affiliates/banners/hgator-468x60c.gif' alt='banner ad' /></a>",
		"type" => "textarea",
		"help" => "Replace the above code with your own advertising code."),

	array(    "name" => "Display 468x60 Ad Above Posts",
		"id" => $shortname."_ad468",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Select no to remove the 468x60 banner advertisement just above your posts. Enter your own ad code below."),

	array(    "name" => "468x60 Ad Code",
		"id" => $shortname."_ad468_code",
		"std" => "<a href='http://secure.hostgator.com/cgi-bin/affiliates/clickthru.cgi?id=mdp859300' target='_blank'><img src='http://www.hostgator.com/affiliates/banners/hgator-468x60c.gif' alt='banner ad' /></a>",
		"type" => "textarea",
		"help" => "Replace the above code with your own advertising code."),

	array(    "name" => "Display 300x250 Ad Top Right Sidebar",
		"id" => $shortname."_ad300",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "Select yes to place a 300x250 banner ad at the top of the right sidebar. Enter your own ad code below."),

	array(    "name" => "Top Right Sidebar 300x250 Ad Code",
		"id" => $shortname."_ad300_code",
		"std" => "",
		"type" => "textarea",
		"help" => "Enter your ad code here."),

// Basic Style Settings

		array(    "name" => "Basic Style Settings",
		"id" => $shortname."_basic_style_settings",
		"type" => "header"),

	array(    "name" => "Body Background Color",
		"id" => $shortname."_body_backgroundcolor",
		"std" => "",
		"type" => "text",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Body Background Image URL",
		"id" => $shortname."_body_backgroundimage",
		"std" => "",
		"type" => "textarea",
		"help" => "If you'd like to use an image as your body background, enter the URL for its location here (e.g. http://www.mysite.com/images/background.gif)"),

	array(    "name" => "Repeat Body Background Image",
		"id" => $shortname."_body_backgroundimage_repeat",
		"type" => "select",
		"std" => "repeat",
		"options" => array("repeat", "no-repeat", "repeat-x", "repeat-y"),
		"help" => "For info on this property, see <a href='http://www.w3schools.com/css/pr_background-repeat.asp'>here</a>."),

	array(    "name" => "Body Background Image Position",
		"id" => $shortname."_body_backgroundimage_position",
		"type" => "text",
		"std" => "top left",
		"help" => "For info on this property, see <a href='http://www.w3schools.com/css/pr_background-position.asp'>here</a>."),

	array(    "name" => "Page Font Color",
		"id" => $shortname."_body_font_color",
		"std" => "",
		"type" => "text",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Page Font Family",
		"id" => $shortname."_body_font_family",
		"type" => "select",
		"std" => "arial,helvetica,sans-serif",
		"options" => array("arial,helvetica,sans-serif", "georgia,times,serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif", "rockwell,georgia,serif","cambria,georgia,serif"),
		"help" => ""),

	array(    "name" => "Page Font Size",
		"id" => $shortname."_body_font_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Post Title Font Family",
		"id" => $shortname."_post_title_font",
		"type" => "select",
		"std" => "arial,helvetica,sans-serif",
		"options" => array("arial,helvetica,sans-serif", "georgia,times,serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif", "rockwell,georgia,serif","cambria,georgia,serif"),
		"help" => ""),

	array(    "name" => "Post Title Weight",
		"id" => $shortname."_post_title_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold", "normal"),
		"help" => ""),

// Top Nav Style Settings

	array(    "name" => "Top Navigation Style Settings",
		"id" => $shortname."_top_nav_style_settings",
		"type" => "header"),

	// array(    "name" => "Top Navigation Background Color",
		// "id" => $shortname."_topnav_bg_color",
		// "type" => "text",
		// "std" => "",
		// "help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Top Navigation Font Size",
		"id" => $shortname."_topnav_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Top Navigation Font Weight",
		"id" => $shortname."_topnav_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold", "normal"),
		"help" => ""),

	array(    "name" => "Top Navigation Link Color",
		"id" => $shortname."_topnav_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Top Navigation Hover Link Color",
		"id" => $shortname."_topnav_link_hover_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	// array(    "name" => "Top Navigation Hover Background Color",
		// "id" => $shortname."_topnav_link_hover_bg_color",
		// "type" => "text",
		// "std" => "",
		// "help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Category Style Settings

	array(    "name" => "Category Navigation Style Settings",
		"id" => $shortname."_cat_nav_style_settings",
		"type" => "header"),

	array(    "name" => "Category Navigation Background Color",
		"id" => $shortname."_catnav_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Category Navigation Font Size",
		"id" => $shortname."_catnav_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Category Navigation Font Weight",
		"id" => $shortname."_catnav_weight",
		"type" => "select",
		"std" => "normal",
		"options" => array("normal", "bold"),
		"help" => ""),

	array(    "name" => "Category Navigation Link Color",
		"id" => $shortname."_catnav_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Category Navigation Hover Link Color",
		"id" => $shortname."_catnav_link_hover_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Category Navigation Hover Background Color",
		"id" => $shortname."_catnav_link_hover_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Featured Style Settings

	array(    "name" => "Featured Articles Glider Style Settings",
		"id" => $shortname."_featured_style_settings",
		"type" => "header"),

	array(    "name" => "Featured Articles Glider Content Background Color",
		"id" => $shortname."_featured_content_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Leave blank to use default image. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Glider Controls Background Color",
		"id" => $shortname."_featured_controls_bg_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Glider Font Color",
		"id" => $shortname."_featured_font_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "#ffffff is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Glider Font Size",
		"id" => $shortname."_featured_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Featured Articles Glider Link Color",
		"id" => $shortname."_featured_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Glider Hover Link Color",
		"id" => $shortname."_featured_link_hover_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Left Sidebar Style Settings

	array(    "name" => "Left Sidebar Style Settings",
		"id" => $shortname."_left_sidebar_style_settings",
		"type" => "header"),

	array(    "name" => "Left Sidebar Font Size",
		"id" => $shortname."_left_sidebar_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Left Sidebar Link Color",
		"id" => $shortname."_left_sidebar_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Left Sidebar Hover Link Color",
		"id" => $shortname."_left_sidebar_link_hover_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Main Content Style Settings

	array(    "name" => "Main Content Style Settings",
		"id" => $shortname."_content_style_settings",
		"type" => "header"),

	array(    "name" => "Main Content Font Size",
		"id" => $shortname."_content_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Main Content Link Color",
		"id" => $shortname."_content_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Main Content Hover Link Color",
		"id" => $shortname."_content_link_hover_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Right Sidebar Style Settings

	array(    "name" => "Right Sidebar Style Settings",
		"id" => $shortname."_right_sidebar_style_settings",
		"type" => "header"),

	array(    "name" => "Right Sidebar Font Size",
		"id" => $shortname."_right_sidebar_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Right Sidebar Link Color",
		"id" => $shortname."_right_sidebar_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Right Sidebar Hover Link Color",
		"id" => $shortname."_right_sidebar_hover_link_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Footer Style Settings

	array(    "name" => "Footer Style Settings",
		"id" => $shortname."_footer_style_settings",
		"type" => "header"),

	array(    "name" => "Footer Font Size",
		"id" => $shortname."_footer_font_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Footer Font Color",
		"id" => $shortname."_footer_font_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Footer Link Color",
		"id" => $shortname."_footer_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #ffffff. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Footer Hover Link Color",
		"id" => $shortname."_footer_hover_link_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "WP-Chatter Theme Settings", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap" id="backtotop">
<h2><?php echo $themename; ?> Theme Settings</h2>

<p style="width:70%;"><strong>Thanks so much for your purchase of WP-Chatter!</strong> A great deal of time, energy and brain power went into making this theme as simple and flexible as possible (within reason, of course).</p>

<p style="width:70%;"><strong>Below, you'll find oodles of optional settings for the theme</strong>. If you're in a hurry, WP-Chatter will function just fine without changing any of the default values below (although you may want to go ahead and fill in your <a href="#<?php echo $shortname; ?>_subscription_form_settings">Subscription Form and Sidebar Contact Settings</a>).</p>

<p style="width:70%;"><strong>On the other hand, if you're in the mood to tinker</strong>, go ahead and change some of the settings just to see what sort of site you can create for yourself.</p>

<p style="width:70%;"><strong>If you run into trouble and don't know what to do</strong>, feel free to contact Solostream via <a href="http://www.solostream.com/support">the support forum</a>.</p>

<p style="width:70%;"><strong>Wherever you see 'Save Changes' it will save changes for ALL theme settings.</strong></p>

<ol>
	<li><a href="#<?php echo $shortname; ?>_basic_settings">Basic Site Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_home_page_post_settings">Home Page Post Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_site_title_settings">Site Title Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_basic_post_settings">Basic Post Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_subscription_form_settings">Subscription Form and Sidebar Contact Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_ad_settings">Advertisement Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_basic_style_settings">Basic Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_top_nav_style_settings">Top Navigation Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_cat_nav_style_settings">Category Navigation Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_featured_style_settings">Featured Articles Glider Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_left_sidebar_style_settings">Left Sidebar Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_content_style_settings">Main Content Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_right_sidebar_style_settings">Right Sidebar Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_footer_style_settings">Footer Style Settings</a></li>
</ol>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) {

if ($value['type'] == "text") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	<div style="font-size:8pt;padding-bottom:10px;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "header") { ?>
<tr colspan=2><td>
<p class="submit">
	<input name="save" type="submit" value="<?php _e('Save Changes'); ?>" />
	<input type="hidden" name="action" value="save" />
</p>
</td></tr>
<tr colspan=2><td><a href="#backtotop"><?php _e("Go to Top"); ?></a></td></tr>
<tr>
	<td colspan=2><h3 id="<?php echo $value['id']; ?>" style="text-align:left;padding-bottom:5px;border-bottom:1px solid #ccc;font-family:georgia,times,serif;margin-bottom:10px;font-size:16pt;color:#666;font-weight:normal;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php } elseif ($value['type'] == "textarea") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
		<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="3" cols="90"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] ) ); } else { echo stripslashes($value['std'] ); } ?></textarea>
		<div style="font-size:8pt;padding-bottom:10px;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="top">
        <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
		<div style="font-size:8pt;padding-bottom:10px;"><?php echo $value['help']; ?></div>
        </td>
    </tr>

<?php
}
}
?>

</table>

<p class="submit">
	<input name="save" type="submit" value="<?php _e('Save Changes'); ?>" />
	<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
	<p class="submit" style="float:right;">
		<input name="reset" type="submit" value="<?php _e('Delete all Data and Reset to Default Settings'); ?>" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>

<?php
}

function mytheme_wp_head() { ?>
<link href="<?php bloginfo('template_directory'); ?>/style.php" rel="stylesheet" type="text/css" />
<?php }

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin');

// DJ Profiles Section

add_action('init', 'nbprofiles_register');
 
function nbprofiles_register() {
 
	$labels = array(
		'name' => _x('Artists and DJs', 'post type general name'),
		'singular_name' => _x('Profile Item', 'post type singular name'),
		'add_new' => _x('Add New Profile', 'nbprofile item'),
		'add_new_item' => __('Add New Artist Profile'),
		'edit_item' => __('Edit Artist Profile'),
		'new_item' => __('New NakedBeatz Artist'),
		'view_item' => __('View Artist Profile'),
		'search_items' => __('Search Profiles'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'nbprofile' , $args );
}

register_taxonomy("Skills", array("nbprofile"), array("hierarchical" => true, "label" => "Artist Skills", "singular_label" => "Skill", "rewrite" => true));

add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("year_completed-meta", "Year Completed", "year_completed", "nbprofile", "side", "low");
  add_meta_box("networking_meta", "Social Media - DJ Links", "networking_meta", "nbprofile", "normal", "high");
}
 
function year_completed(){
  global $post;
  $custom = get_post_custom($post->ID);
  $year_completed = $custom["year_completed"][0];
  ?>
  <label>Year:</label>
  <input name="year_completed" value="<?php echo $year_completed; ?>" />
  <?php
}
 
function networking_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $nb_facebook = $custom["nb_facebook"][0];
  $nb_twitter = $custom["nb_twitter"][0];
  $nb_myspace = $custom["nb_myspace"][0];
  $nb_mixcloud = $custom["nb_mixcloud"][0];
  $nb_soundcloud = $custom["nb_soundcloud"][0];
  ?>
  <p><label>Facebook:</label><br />
  <input type="text" name="nb_facebook" value="<?php echo $nb_facebook; ?>" /></p>
  <p><label>Twitter:</label><br />
  <input type="text" name="nb_twitter" value="<?php echo $nb_twitter; ?>" /></p>
  <p><label>YouTube:</label><br />
  <input type="text" name="nb_youtube" value="<?php echo $nb_youtube; ?>" /></p>
  <p><label>MySpace:</label><br />
  <input type="text" name="nb_myspace" value="<?php echo $nb_myspace; ?>" /></p>
  <p><label>Mixcloud:</label><br />
  <input type="text" name="nb_mixcloud" value="<?php echo $nb_mixcloud; ?>" /></p>
  <p><label>SoundCloud:</label><br />
  <input type="text" name="nb_soundcloud" value="<?php echo $nb_soundcloud; ?>" /></p>
  <?php
}

add_action('save_post', 'save_details');

function save_details(){
  global $post;
 
  update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
  update_post_meta($post->ID, "nb_facebook", $_POST["nb_facebook"]);
  update_post_meta($post->ID, "nb_twitter", $_POST["nb_twitter"]);
  update_post_meta($post->ID, "nb_youtube", $_POST["nb_youtube"]);
  update_post_meta($post->ID, "nb_myspace", $_POST["nb_myspace"]);
  update_post_meta($post->ID, "nb_mixcloud", $_POST["nb_mixcloud"]);
  update_post_meta($post->ID, "nb_soundcloud", $_POST["nb_soundcloud"]);
}

add_action("manage_posts_custom_column",  "nbprofile_custom_columns");
add_filter("manage_edit-nbprofile_columns", "nbprofile_edit_columns");
 
function nbprofile_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Artist",
    "description" => "Profile Information",
    "year" => "Year Completed",
    "skills" => "Skills",
  );
 
  return $columns;
}
function nbprofile_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "description":
      the_excerpt();
      break;
    case "year":
      $custom = get_post_custom();
      echo $custom["year_completed"][0];
      break;
    case "skills":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;
  }
}

add_theme_support('post-thumbnails');

?>
