<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0 Feed for Nakedbeatz News" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3 - <?php bloginfo('name'); ?> " href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/suckerfish.js"></script>

<?php wp_head(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>
<script type="text/javascript">
var popvid = null;                          // will store the window reference

function popWin(divId) {
   if (typeof(divId)=='string') { divId=document.getElementById(divId); }
   if (!popvid||popvid.closed) {
      popvid=window.open('http://www.nakedbeatz.com/video','_blank','width=320,height=315,status=no,resizable=no,toolbar=no,menubar=no,location=no');
   }
   popvid.document.body.style.backgroundColor='black';
   popvid.focus();
   popvid.document.body.innerHTML='<BR><center>'+divId.innerHTML+'</center>';
   return false;
}

window.onunload=function() {
   // if the user is navigating away from the page, check to see if we
   // opened a video window and if we did, make sure it's closed.
   if (popvid) {
      //popvid.close();
   }
}

</script>
</head>

<body>

<div id="wrap">

	<div id="header" class="clearfix">

		<div id="head-content" class="clearfix">

			<div id="sitetitle">
				<?php if (is_home()) {  ?>
				<h1><?php bloginfo('name'); ?></h1> 
				<?php } else { ?> 
				<div class="title"><?php bloginfo('name'); ?></div> 
				<?php } ?>
				<div class="description"><?php bloginfo('description'); ?></div>
			</div>

			<?php if ( $wp_chatter_ad468head == yes ) { ?>
			<div id="head-banner468">
				<?php echo get_xtrban_banner(); ?>
			</div>
			<?php } ?>
		</div>
	</div>

	<div id="topnav" class="clearfix">
		<ul class="clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'top-navigation') ); ?>			
		</ul>
	</div>

	<div id="page" class="clearfix">

		<?php if ( $wp_chatter_hide_cats == 'no' ) { ?>
		<div id="nav" class="clearfix">
			<ul class="clearfix">
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</div>
		<?php } ?>
