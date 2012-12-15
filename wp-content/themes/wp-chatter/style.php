<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");
global $options;
foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

/* --------------[ User-Defined Adjustments from Stylesheet #2 ]-------------- */

@import 'style-2.css';

/* --------------[ Color Scheme Adjustgments ]-------------- */

<?php if ( $wp_chatter_colors == 'black' ) { ?>

/* ------[ Style Adjustments for Black Color Scheme ]-------- */

body {
	background-color: #333;
	background-image: url(images/black/bodybg.gif);
	}

#head-content {
	background-image: url(images/black/headbg.gif);
	}

#topnav li {
	background:url(images/black/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #666;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #333;
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #333;
	border-bottom: 0;
	background: #333;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #666; 
	border: 1px solid #666;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } elseif ( $wp_chatter_colors == 'burnt-orange' ) { ?>

/* ------[ Style Adjustments for Burnt Orange Color Scheme ]-------- */

body {
	background-color: #4D2600;
	background-image: url(images/burnt-orange/bodybg.gif);
	}

#head-content {
	background-image: url(images/burnt-orange/headbg.gif);
	}

a, a:link, a:visited {
	color:#663300;
	}

a:hover, a:active {
	color:#000;
	}

#topnav li {
	background:url(images/burnt-orange/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #996633;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #663300;
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #663300;
	border-bottom: 0;
	background: #663300;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #996633; 
	border: 1px solid #996633;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } elseif ( $wp_chatter_colors == 'gray' ) { ?>

/* ------[ Style Adjustments for Gray Color Scheme ]-------- */

body {
	background-color: #e5e5e5;
	background-image: url(images/gray/bodybg.gif);
	}

#head-content {
	background-color:#999;
	background-image: url(images/gray/headbg.gif);
	}

#page-top {
	background-image:url(images/gray/wrap-top.gif);
	} 

#topnav li {
	background:url(images/gray/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #bbb;
	}

#topnav li ul a:hover, 
#topnav li ul a:active,
#topnav li.current_page_item ul a:hover, 
#topnav li.current_page_item ul a:active,
#topnav li ul li.current_page_item a { 
	background-image:none;
	background:#aaa !important;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #999;
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #999;
	border-bottom: 0;
	background: #999;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #bbb; 
	border: 1px solid #bbb;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

#footer {
	background:#999;
	}

<?php } elseif ( $wp_chatter_colors == 'green' ) { ?>

/* ------[ Style Adjustments for Green Color Scheme ]-------- */

body {
	background-color: #333300;
	background-image: url(images/green/bodybg.gif);
	}

#head-content {
	background-image: url(images/green/headbg.gif);
	}

a, a:link, a:visited {
	color:#333300;
	}

a:hover, a:active {
	color:#000;
	}

#topnav li {
	background:url(images/green/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #339900;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #336600;
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #336600;
	border-bottom: 0;
	background: #336600;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #339900; 
	border: 1px solid #339900;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } elseif ( $wp_chatter_colors == 'hot-pink' ) { ?>

/* ------[ Style Adjustments for Hot Pink Color Scheme ]-------- */

body {
	background-color: #660044;
	background-image: url(images/pink/bodybg.gif);
	}

#head-content {
	background-image: url(images/pink/headbg.gif);
	}

a, a:link, a:visited {
	color:#990066;
	}

a:hover, a:active {
	color:#000;
	}

#topnav li {
	background:url(images/pink/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #cc0099;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #990066; 
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #990066;
	border-bottom: 0;
	background: #990066;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #CC0099; 
	border: 1px solid #CC0099;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } elseif ( $wp_chatter_colors == 'purple' ) { ?>

/* ------[ Style Adjustments for Purple Color Scheme ]-------- */

body {
	background-color: #3D1466;
	background-image: url(images/purple/bodybg.gif);
	}

#head-content {
	background-image: url(images/purple/headbg.gif);
	}

a, a:link, a:visited {
	color:#3D1466;
	}

a:hover, a:active {
	color:#000;
	}

#topnav li {
	background:url(images/purple/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #4d1980;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #3D1466;
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #3D1466;
	border-bottom: 0;
	background: #3D1466;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #4D1980; 
	border: 1px solid #4D1980;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } elseif ( $wp_chatter_colors == 'red' ) { ?>

/* ------[ Style Adjustments for Red Color Scheme ]-------- */

body {
	background-color: #4D0000;
	background-image: url(images/red/bodybg.gif);
	}

#head-content {
	background-image: url(images/red/headbg.gif);
	}

a, a:link, a:visited {
	color:#660000;
	}

a:hover, a:active {
	color:#000;
	}

#topnav li {
	background:url(images/red/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #990000;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #660000;
	}


#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #660000;
	border-bottom: 0;
	background: #660000;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #990000; 
	border: 1px solid #990000;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } elseif ( $wp_chatter_colors == 'turquoise' ) { ?>

/* ------[ Style Adjustments for Turquoise Color Scheme ]-------- */

body {
	background-color: #004D4D;
	background-image: url(images/turq/bodybg.gif);
	}

#head-content {
	background-image: url(images/turq/headbg.gif);
	}

a, a:link, a:visited {
	color:#004D4D;
	}

a:hover, a:active {
	color:#000;
	}

#topnav li {
	background:url(images/turq/navbg-black.gif) bottom center no-repeat;
	}

#topnav li a:hover, #topnav li a:active, #topnav li ul {
	background: #999;
	}

.widgettitle, .content-col1 h2, li.title h2, h1.archive-title {
	background: #006666;
	}

#sidebar li ul.tabs li a, #sidebar li ul.tabs li a:link, #sidebar li ul.tabs li a:visited {
	border: 1px solid #006666;
	border-bottom: 0;
	background: #006666;
	}

#sidebar li ul.tabs li a:hover, #sidebar li ul.tabs li a:active {
	background: #999; 
	border: 1px solid #999;
	border-bottom: 0;    
	}

#sidebar li ul.tabs li a.on {
	background:#eee;
	border: 1px solid #ddd;
	border-bottom: 0; 
	}

<?php } ?>


/* --------------[ User-Defined Adjustments ]-------------- */

body {
	<?php if ( $wp_chatter_body_backgroundcolor ) { ?>
	background-color: <?php echo $wp_chatter_body_backgroundcolor; ?>;
	background-image:none;
	<?php } ?>
	font-size: <?php echo $wp_chatter_body_font_size; ?>;
	font-family: <?php echo $wp_chatter_body_font_family; ?>;
	<?php if ( $wp_chatter_body_font_color ) { ?>
	color: <?php echo $wp_chatter_body_font_color; ?>;
	<?php } ?>
	}

<?php if ( $wp_chatter_body_backgroundimage ) { ?>
body {
	background-image: url(<?php echo $wp_chatter_body_backgroundimage; ?>);
	background-repeat: <?php echo $wp_chatter_body_backgroundimage_repeat; ?>;
	background-position: <?php echo $wp_chatter_body_backgroundimage_position; ?>;
	background-attachment: fixed;
	}
<?php } ?>

h1, h2, h3, h4, h5, h6, h7, .sitetitle {
	font-family: <?php echo $wp_chatter_post_title_font; ?>;
	font-weight: <?php echo $wp_chatter_post_title_weight; ?>;
	}

/* -------------------[ Site Title Adjustments ]------------------- */

#sitetitle h1, #sitetitle .title {
	font-size: <?php echo $wp_chatter_site_title_size; ?>;
	color: <?php echo $wp_chatter_site_title_color; ?>;
	text-align: <?php echo $wp_chatter_site_title_alignment; ?>;
	font-weight: <?php echo $wp_chatter_site_title_weight; ?>;
	font-family: <?php echo $wp_chatter_site_title_font_family; ?>;
	}

#sitetitle .description { 
	color:<?php echo $wp_chatter_site_title_color; ?>;
	text-align:<?php echo $wp_chatter_site_title_alignment; ?>;
	}

<?php if ( $wp_chatter_site_title_option == 'Basic Text-Type Title' ) { ?>
#head-content {
	background-image: none;
	}
<?php } ?>

<?php if ( $wp_chatter_site_title_option == 'Image/Logo-Type Title' ) { ?>
#sitetitle {
	float:none;
	text-indent:-10000em;
	position:absolute;
	display:none;
	}
<?php } ?>

<?php if ( $wp_chatter_ad468head == 'no' ) { ?>
#sitetitle {
	width:960px;
	}
<?php } ?>

<?php if ( $wp_chatter_site_title_option == 'Image/Logo-Type Title' && $wp_chatter_site_logo_url ) { ?>
#head-content {
	background: transparent;
	background-image: url(<?php echo $wp_chatter_site_logo_url; ?>);
	background-position: <?php echo $wp_chatter_site_logo_position; ?>;
	background-repeat: no-repeat;
	}
<?php } ?>

/* ----------[ Header Background Color Adjustments ]---------- */

<?php if ( $wp_chatter_header_bg_color ) { ?>
#head-content {
	background-color: <?php echo $wp_chatter_header_bg_color; ?>;
	}
<?php } ?>

/* ----------[ Left Sidebar Float Adjustments ]----------- */

<?php if ( $wp_chatter_side_left_loc == 'Left of Content' ) { ?>
#content .col-3 { float:right; }
#sidebarleft { float:left; }
<?php } else { ?>
#content .col-3 { float:left; }
#sidebarleft { float:right; }
<?php } ?>

/* --------------[ Top Navigation Adjustments ]-------------- */

#topnav {
	<?php if ( $wp_chatter_topnav_bg_color ) { ?>
	background: <?php echo $wp_chatter_topnav_bg_color; ?>;
	<?php } ?>
	font-size: <?php echo $wp_chatter_topnav_size; ?>; 
	font-weight: <?php echo $wp_chatter_topnav_weight; ?>;	
	}

#topnav li a, #topnav li a:link, #topnav li a:visited {
	<?php if ( $wp_chatter_topnav_link_color ) { ?>
	color: <?php echo $wp_chatter_topnav_link_color; ?>;
	<?php } ?>
	}

#topnav li a:hover, #topnav li a:active  {
	<?php if ( $wp_chatter_topnav_link_hover_color ) { ?>
	color: <?php echo $wp_chatter_topnav_link_hover_color; ?>;
	<?php } ?>
	<?php if ( $wp_chatter_topnav_link_hover_bg_color ) { ?>
	background: <?php echo $wp_chatter_topnav_link_hover_bg_color; ?>;
	<?php } ?>
	}

<?php if ( $wp_chatter_topnav_bg_color ) { ?>
#topnav li ul {
	background: <?php echo $wp_chatter_topnav_bg_color; ?>;
	}
<?php } ?>

/* --------------[ Category Navigation Adjustments ]-------------- */

#nav {
	<?php if ( $wp_chatter_catnav_bg_color ) { ?>
	background: <?php echo $wp_chatter_catnav_bg_color; ?>;
	<?php } ?>
	font-size: <?php echo $wp_chatter_catnav_size; ?>; 
	font-weight: <?php echo $wp_chatter_catnav_weight; ?>;	
	}

#nav li a, #nav li a:link, #nav li a:visited {
	<?php if ( $wp_chatter_catnav_link_color ) { ?>
	color: <?php echo $wp_chatter_catnav_link_color; ?>;
	<?php } ?>
	}

#nav li a:hover, #nav li a:active  {
	<?php if ( $wp_chatter_catnav_link_hover_color ) { ?>
	color: <?php echo $wp_chatter_catnav_link_hover_color; ?>;
	<?php } ?>
	<?php if ( $wp_chatter_catnav_link_hover_bg_color ) { ?>
	background: <?php echo $wp_chatter_catnav_link_hover_bg_color; ?>;
	<?php } ?>
	}

<?php if ( $wp_chatter_catnav_bg_color ) { ?>
#nav li ul {
	background: <?php echo $wp_chatter_catnav_bg_color; ?>;
	}
<?php } ?>

/* --------------[ Features Adjustments ]-------------- */

#my-glider {
<?php if ( $wp_chatter_featured_content_bg_color ) { ?>
	background-color: <?php echo $wp_chatter_featured_content_bg_color; ?>;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 0 0;
<?php } ?>
	color: <?php echo $wp_chatter_featured_font_color; ?>;
	font-size: <?php echo $wp_chatter_featured_size; ?>;
	}

<?php if ( $wp_chatter_featured_controls_bg_color ) { ?>
#my-glider .controls ul {
	background-color: <?php echo $wp_chatter_featured_controls_bg_color; ?>;
	}
<?php } ?>

<?php if ( $wp_chatter_featured_link_color ) { ?>
#my-glider a, #my-glider a:link, #my-glider a:visited, #my-glider .controls li.feat-head {
	color: <?php echo $wp_chatter_featured_link_color; ?>;
	}
<?php } ?>

<?php if ( $wp_chatter_featured_link_color ) { ?>
#my-glider a:hover, #my-glider a:active, #my-glider .controls a.active {
	color:<?php echo $wp_chatter_featured_link_hover_color; ?> !important;
	}
<?php } ?>

<?php if ( $wp_chatter_featured_controls_border_color ) { ?>
#my-glider .controls li {
	border-color:<?php echo $wp_chatter_featured_controls_border_color; ?>;
	}
<?php } ?>

/* --------------[ Main Content Adjustments ]-------------- */

.maincontent {
	font-size: <?php echo $wp_chatter_content_size; ?>;
	}

.maincontent a, .maincontent a:link, .maincontent a:visited { 
	<?php if ( $wp_chatter_content_link_color ) { ?>
	color: <?php echo $wp_chatter_content_link_color; ?>;
	<?php } ?>
	}

.maincontent a:hover, .maincontent a:active, .post h1 a:active, .post h1 a:hover, .post h2 a:active, .post h2 a:hover { 
	<?php if ( $wp_chatter_content_link_hover_color ) { ?>
	color: <?php echo $wp_chatter_content_link_hover_color; ?>;
	<?php } ?>
	}

/* --------------[ Sidebar-Left Adjustments ]-------------- */

#sidebarleft {
	font-size: <?php echo $wp_chatter_left_sidebar_size; ?>;
	}

#sidebarleft a, #sidebar-left a:link, #sidebar-left a:visited { 
	<?php if ( $wp_chatter_left_sidebar_link_color ) { ?>
	color: <?php echo $wp_chatter_left_sidebar_link_color; ?>;
	<?php } ?>
	}

#sidebarleft a:hover, #sidebar-left a:active { 
	<?php if ( $wp_chatter_left_sidebar_link_hover_color ) { ?>
	color: <?php echo $wp_chatter_left_sidebar_link_hover_color; ?>;
	<?php } ?>
	}

/* --------------[ Sidebar-Right Adjustments ]-------------- */

#contentright {
	font-size: <?php echo $wp_chatter_right_sidebar_size; ?>;
	}

<?php if ( $wp_chatter_right_sidebar_link_color ) { ?>
#contentright a, #contentright a:link, #contentright a:visited { 
	color: <?php echo $wp_chatter_right_sidebar_link_color; ?>;
	}
	<?php } ?>

<?php if ( $wp_chatter_right_sidebar_hover_link_color ) { ?>
#contentright a:hover, #contentright a:active { 
	color: <?php echo $wp_chatter_right_sidebar_hover_link_color; ?>;
	}
<?php } ?>

/* --------------[ Footer Adjustments ]-------------- */

#footer {
	font-size:<?php echo $wp_chatter_footer_font_size; ?>;
	color:<?php echo $wp_chatter_footer_font_color; ?>;
	}

#footer a, #footer a:link, #footer a:visited { 
	<?php if ( $wp_chatter_footer_link_color ) { ?>
	color: <?php echo $wp_chatter_footer_link_color; ?>;
	<?php } ?>
	}

#footer a:hover, #footer a:active { 
	<?php if ( $wp_chatter_footer_hover_link_color ) { ?>
	color: <?php echo $wp_chatter_footer_hover_link_color; ?>;
	<?php } ?>
	}

<?php if ( $wp_chatter_home_posts_stack == 'yes' ) { ?>
/* --------------[ Adjustments for Stacked Categories ]-------------- */

.content-col1 {
	width:100%;
	float:none;
	margin:0;
	padding:0;
	}

.content-col2 {
	width:100%;
	float:none;
	margin:0;
	padding:0;
	}
<?php } ?>