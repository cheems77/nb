<?php

/*
Plugin Name: Adsense Daemon
Version: 1.0
Plugin URI: http://www.mkyong.com/blog/adsense-daemon-wordpress-plugin
Author: Yong Mook Kim
Author URI: http://www.mkyong.com/
Description: Integrate "Google Adsense" Into Wordpress Content 
*/ 

/*
http://www.mkyong.com/blog/tiny-adsense-wordpress-plugin for any help ,support ,requests, suggestions or updates
*/
		
//hook hook
add_action('admin_menu', 'ad_admin_menu');
add_filter('the_content', 'ad_content_hook');

if(!get_option('ad_appendType')){
	ad_resetIt();
}

function ad_resetIt(){
        delete_option('ad_appendType');
        update_option('ad_display_post', "checked=on");
}

function ad_admin_menu() {
	add_submenu_page('options-general.php', 'Adsense Daemon Options', 'Adsense Daemon', 8, 'Adsense Daemon', 'ad_menu');
}

function ad_menu(){
   
  if ($_REQUEST['ad_save']) {
	  
		update_option('ad_appendType', $_REQUEST['ad_appendType']);		

        if($_POST['ad_post'] == "on") update_option('ad_display_post', "checked=on");
        else update_option('ad_display_post', "");

		echo '<div id="message" class="updated fade"><p>Saved.</p></div>';

  }  else if($_REQUEST['ad_clear']){
	
        ad_resetIt();

		echo '<div id="message" class="error fade"><p>Cleared.</p></div>';
			
  }

  // load options from db to display
  $ad_appendType = get_option('ad_appendType');
  
  // display options
  print_ad_menu_form($ad_appendType);
}

function print_ad_menu_form($ad_appendType=''){
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="ad_form" name="ad_form">

<div class="wrap" id="ad_options">
<fieldset>

<h2>Adsense Daemon Plugin Setup</h2>

<table width="100%">
<tr>

<td>

<div class="wrap">

<h3>Adsense Daemon Append Options</h3>

<p>Select where the Google Adsense you want to integrate into wordpress content</p>

<p>
<select name="ad_appendType">
<option value="none"<?php echo ($ad_appendType=="none") ? " selected" : ""; ?>>--None--</option>
<option value="left_float"<?php echo ($ad_appendType=="left_float") ? " selected" : ""; ?>>Left Float Type</option>
<option value="right_float"<?php echo ($ad_appendType=="right_float") ? " selected" : ""; ?>>Right Float Type</option>
<option value="before_content"<?php echo ($ad_appendType=="before_content") ? " selected" : ""; ?>>Before Content Type</option>
<option value="after_content"<?php echo ($ad_appendType=="after_content") ? " selected" : ""; ?>>After Content Type</option>
<option value="middle_content_1"<?php echo ($ad_appendType=="middle_content_1") ? " selected" : ""; ?>>Middle Content - Paragrap 1</option>
<option value="middle_content_2"<?php echo ($ad_appendType=="middle_content_2") ? " selected" : ""; ?>>Middle Content - Paragrap 2</option>
<option value="middle_content_3"<?php echo ($ad_appendType=="middle_content_3") ? " selected" : ""; ?>>Middle Content - Paragrap 3</option>
</select> 
</p>

<h3>Google Adsense Allow Display Options </h3>

<p>Google Adsense allow to display in post page only</p>

<p>
<INPUT TYPE=CHECKBOX NAME="ad_post" <?php echo get_option('ad_display_post'); ?>>post pages<BR>
</p>


</td>
</tr>


</table>

</fieldset>


<p class="submit"><input name="ad_clear" id="reset" style='width:150px' value="Reset Options" type="submit" />
<input name="ad_save" id="save" style='width:150px' value="Save Changes" type="submit" /></p>
</div>
</form>

<?php
}

function ad_content_hook($content = ''){

     if(is_single() && !get_option('ad_display_post') == 'checked=on' )
           return $content;
	
     $ad_code_img_right ='<div  class="ads-right-dot" >
<br>
<script type="text/javascript"><!--
google_ad_client = "pub-2836379775501347";
/* 200x200, created 11/21/08 */
google_ad_slot = "0946435020";
google_ad_width = 200;
google_ad_height = 200;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>';
        
	$ad_code_text_left = '
<div class="ads-dot">
<b>&nbsp;Sponsored Links</b><br>
<script type="text/javascript">
<!--
google_ad_client = "pub-2836379775501347";
/* 250x250, created 11/21/08 */
google_ad_slot = "8523271530";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
';

	$ad_left_flag = false;
	$ad_right_flag = false;
	$ad_before_flag = false;
	$ad_after_flag = false;
	$ad_middle_flag = false;
	
	
     $ad_appendType = get_option('ad_appendType');
	
	//left float
	 $ad_left_float = "<div style='float:left'><br>" ;

	 if($ad_appendType=='left_float'){
		 $ad_left_float .= ' ' . $ad_code;
		 $ad_left_flag = true;
	 }
	
	 $ad_left_float .= "</div>";
		  
	//right float 
	 $ad_right_float = "<div style='float:right'><br>" ;
	 
	 if($ad_appendType=='right_float'){
		 $ad_right_float .= ' ' . $ad_code;
		 $ad_right_flag = true;
	 }
	 
	 $ad_right_float .= "</div>";
		  
	//before content
	 $ad_before_content = "<div><br>" ;
	 
	 if($ad_appendType=='before_content'){
		 $ad_before_content .= ' ' . $ad_code;

		 $ad_before_flag = true;
	 }


	 $ad_before_content .= "</div>";
	 
	 //after content
	 $ad_after_content = "<div><br>" ;
	 
	 if($ad_appendType=='after_content'){
		 $ad_after_content .= ' ' . $ad_code;
		 $ad_after_flag = true;
	 }
	 
	 $ad_after_content .= "</div>";
	 
	
	 if($ad_appendType=='middle_content_1'){
		 $ad_middle_content .= ' ' . $ad_code;
		 $ad_middle_flag = true;
	 }
	 
	 $ad_middle_content .= "</div>";
	 
	 
	if($ad_left_flag == true)
		$content = $ad_left_float . $content;
	
	if($ad_right_flag == true)
		$content = $ad_right_float . $content;
	
	if($ad_before_flag == true)
		$content = $ad_before_content . $content;
	
	if($ad_after_flag == true)
		$content = $content . $ad_after_content;

	if($ad_middle_flag == true)
	{
		$poses = array();
        $poseslast = array();

		$lastpos = -1;
	
		$findchar = "<p>";
		
			
		if(strpos($content, "<p") === false)
		  $repchar = "<br";

		while(strpos($content, $findchar, $lastpos+1) !== false){
		  $lastpos = strpos($content, $findchar, $lastpos+1);
		  $poses[] = $lastpos;
		}
		
		//$pickme = $poses[rand(0, sizeof($poses)-1)];
		$pickme = $poses[0];

        $content = substr_replace($content, $ad_code_img_right, $pickme, 0);
                
		//reset it
        $lastpos = -1;

    
	/*	
        $posesize = count($poses);

		if($posesize>12)
		{
			$pickme = $poses[10] + strlen($ad_code_img_right);
			$content = substr_replace($content, $ad_code_text_left, $pickme , 0);
		}
	*/
	
        //$content .= "Test : " . count($poses) . "Pick Me : " . $pickme2 . "=" . $posesize;

	}
		
	
	
     return $content;
}

?>
