<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>
 
<?php if ( $wp_chatter_features_on == 'yes' && $wp_chatter_home_posts_by_cat == 'yes' && $wp_chatter_feature_display == 'Display Separately' ) { ?>
<?php include (TEMPLATEPATH . '/index2.php'); ?>
<?php } elseif ( $wp_chatter_features_on == 'yes' && $wp_chatter_home_posts_by_cat == 'yes' && $wp_chatter_feature_display == 'Display in Glider' ) { ?>
<?php include (TEMPLATEPATH . '/index3.php'); ?>
<?php } elseif ( $wp_chatter_features_on == 'no' && $wp_chatter_home_posts_by_cat == 'yes' ) { ?>
<?php include (TEMPLATEPATH . '/index3.php'); ?>
<?php } else { ?>
<?php include (TEMPLATEPATH . '/index1.php'); ?>
<?php } ?>
