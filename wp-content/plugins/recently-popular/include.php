<?php
// Copyright (c) 2008 Eric Biven
// Released under the FreeBSD license:
// http://www.freebsd.org/copyright/freebsd-license.html
//
// For Recently Popular 0.7.2

/*
 * Deprecated since 0.4.8.1
 */
function get_recently_popular (
				$interval_length = '',
				$interval_type = '',
				$limit = '',
				$user_type = '',
				$post_type = '',
				$output_format = '',
				$categories = '',
				$date_format = '',
				$display = '' ) {

	$ops = array (
		'interval_length' => $interval_length,
		'interval_type' => $interval_type,
		'limit' => $limit,
		'user_type' => $user_type,
		'post_type' => $post_type,
		'output_format' => $output_format,
		'categories' => $categories,
		'date_format' => $date_format,
		'display' => $display
	);

	foreach ($ops as $key => $value) {
		if (!is_int($value) && empty($value)) { unset ($ops[$key]); }
	}

	return get_recently_popular2($ops);
}

/*
 * Since 0.4.8.1; Deprecated since 0.7
 */
function get_recently_popular2 ($ops = "") {
    if (is_string($ops)) {
		parse_str($ops, $o);
	}
	else {
		$o = $ops;
	}
	
	$rp = new RecentlyPopular();
	$rp->get_counts($o);
}

class RecentlyPopularUtil {

    public static $defaults = array(
        'categories' => '',
        'date_format' => 'Y-m-d',
        'default_thumbnail_url' => '',
        'display' => true,
        'enable_categories' => false,
    	'interval_length' => 1,
        'interval_type' => 'MONTH',
        'limit' => 10,
        'max_length' => 0,
        'max_excerpt_length' => 0,
        'output_format' => '<a href="%post_url%">%post_title%</a>',
        'post_type' => RecentlyPopularPostType::ALL,
        'relative_time' => 0,
    	'title' => 'Recently Popular',
        'user_type' => RecentlyPopularUserType::ANONYMOUS,
    );
    
    public static function relative_timestamp($length, $type) {
    	$length--;
    	switch ( $type ) {
    		case 'HOUR' :
    			$time_start = mktime(date("H")-$length, 0, 0, date("m"), date("d"), date("Y"));
    			break;
    
    		case 'DAY' :
    			$time_start = mktime(0, 0, 0, date("m"), date("d")-$length, date("Y"));
    			break;
    
    		case 'WEEK' :
    			$length = ($length * 7 + date ("w") );
    			$time_start = mktime(0, 0, 0, date("m"), date("d")-$length, date("Y"));
    			break;
    
    		case 'MONTH' :
    			$time_start = mktime(0, 0, 0, date("m")-$length, 1, date("Y"));
    			break;
    
    		case 'YEAR' :
    			$time_start = mktime(0, 0, 0, 1, 1, date("Y")-$length);
    			break;
    
    		default :
    			$time_start = time();
    			break;
    	}
    
    	$timeframe = time() - $time_start;
    	return $timeframe;
    }
    
    /*
     * Truncate a string and add elipses if required.
     */
    public static function truncate($string, $length = 30, $tail = "...") {
    	if ($length == 0) { return $string; }
    	$string = trim($string);
    	$txtl = strlen($string);
    	if($txtl > $length) {
    		for($i=1; $string[$length-$i]!=" "; $i++) {
    			if($i == $length) {
    				return substr($string, 0, $length).$tail;
    			}
    		}
    		for(; $string[$length - $i]=="," || $string[$length - $i]=="." || $string[$length - $i]==" "; $i++) {;}
    		$string = substr($string, 0, $length - $i + 1).$tail;
    	}
    	return $string;
    }
    
    // Credit to http://www.addedbytes.com/lab/php-querystring-functions/,
    // with modifications.
    public static function add_query_string_item($key, $value, $url = '') {
        // If the user didn't give us an url use the current one.
        $url = (!isset($url) || strlen($url) ==  0) ? $_SERVER['REQUEST_URI'] : $url;
        $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
        $url = substr($url, 0, -1);
        if (strpos($url, '?') === false) {
            return $url . '?' . $key . '=' . $value;
        } else {
            return $url . '&' . $key . '=' . $value;
        }
    }

    // Credit to http://www.addedbytes.com/lab/php-querystring-functions/,
    // with modifications.
    public static function remove_query_string_item($key, $url = '') {
        // If the user didn't give us an url use the current one.
        $url = (!isset($url) || strlen($url) ==  0) ? $_SERVER['REQUEST_URI'] : $url;
        $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
        $url = substr($url, 0, -1);
        return $url;
    }
}

class RecentlyPopularUserType {
    // Types of users for recorded page views.
    const ALL = 0;
    const ANONYMOUS = 1;
    const REGISTERED = 2;
}

class RecentlyPopularPostType {
    // Types of posts
    const ALL = 0;
    const PAGES = 1;
    const POSTS = 2;
}
