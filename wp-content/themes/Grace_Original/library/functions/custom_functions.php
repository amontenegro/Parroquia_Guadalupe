<?php 

// Custom fields for WP write panel
// This code is protected under Creative Commons License: http://creativecommons.org/licenses/by-nc-nd/3.0/


//Featured Image Settings

$bizz_metaboxes = array(
		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Custom Slider Image Location",
			"type" 		=> "text",
			"desc"      => "Enter full path for image to use in the featured slider. (including <code>http://</code>)"
		),
		"url" => array (
			"name"		=> "url",
			"default" 	=> "",
			"label" 	=> "Custom Slider Image Destination",
			"type" 		=> "text",
			"desc"      => "Enter full URL where the image should link to. (including <code>http://</code>)"
		),
		"button1name" => array (
			"name"		=> "button1name",
			"default" 	=> "",
			"label" 	=> "Slider Button 1 Name",
			"type" 		=> "text",
			"desc"      => "Enter name for button 1, displayed below slider page content"
		),
		"button1url" => array (
			"name"		=> "button1url",
			"default" 	=> "",
			"label" 	=> "Custom Button 1 Destination",
			"type" 		=> "text",
			"desc"      => "Enter full URL where button1 should link to. (including <code>http://</code>)"
		),
		"button2name" => array (
			"name"		=> "button2name",
			"default" 	=> "",
			"label" 	=> "Slider Button 2 Name",
			"type" 		=> "text",
			"desc"      => "Enter name for button 2, displayed below slider page content"
		),
		"button2url" => array (
			"name"		=> "button2url",
			"default" 	=> "",
			"label" 	=> "Custom Button 2 Destination",
			"type" 		=> "text",
			"desc"      => "Enter full URL where button12 should link to. (including <code>http://</code>)"
		),
	);
	
$bizz_metaboxes_post = array(
		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Custom Thumbnail Image Location",
			"type" 		=> "text",
			"desc"      => "Enter full path for image to use as thumbnail in blog posts/menu list. (including <code>http://</code>)"
		),
	);
	
function bizzthemes_meta_box_content() {
	global $post, $bizz_metaboxes;
	echo ''."\n";
	foreach ($bizz_metaboxes as $bizz_metabox) {
		$bizz_metaboxvalue = get_post_meta($post->ID,$bizz_metabox["name"],true);
		if ($bizz_metaboxvalue == "" || !isset($bizz_metaboxvalue)) {
			$bizz_metaboxvalue = $bizz_metabox['default'];
		}
		echo "\t".'<div>';
		echo "\t\t".'<br/><p><strong><label for="'.$bizz_metabox.'">'.$bizz_metabox['label'].':</label></strong></p>'."\n";
		echo "\t\t".'<p><input size="100" type="'.$bizz_metabox['type'].'" value="'.$bizz_metaboxvalue.'" name="bizzthemes_'.$bizz_metabox["name"].'" id="'.$bizz_metabox.'"/></p>'."\n";
		echo "\t\t".'<p><span style="font-size:11px">'.$bizz_metabox['desc'].'</span></p>'."\n";	
		echo "\t".'</div>'."\n";
	}
	echo ''."\n\n";
}

function bizzthemes_meta_box_content_post() {
	global $post, $bizz_metaboxes_post;
	echo ''."\n";
	foreach ($bizz_metaboxes_post as $bizz_metabox) {
		$bizz_metaboxvalue = get_post_meta($post->ID,$bizz_metabox["name"],true);
		if ($bizz_metaboxvalue == "" || !isset($bizz_metaboxvalue)) {
			$bizz_metaboxvalue = $bizz_metabox['default'];
		}
		echo "\t".'<div>';
		echo "\t\t".'<br/><p><strong><label for="'.$bizz_metabox.'">'.$bizz_metabox['label'].':</label></strong></p>'."\n";
		echo "\t\t".'<p><input size="100" type="'.$bizz_metabox['type'].'" value="'.$bizz_metaboxvalue.'" name="bizzthemes_'.$bizz_metabox["name"].'" id="'.$bizz_metabox.'"/></p>'."\n";
		echo "\t\t".'<p><span style="font-size:11px">'.$bizz_metabox['desc'].'</span></p>'."\n";	
		echo "\t".'</div>'."\n";
	}
	echo ''."\n\n";
}

function bizzthemes_metabox_insert($pID) {
	global $bizz_metaboxes;
	foreach ($bizz_metaboxes as $bizz_metabox) {
		$var = "bizzthemes_".$bizz_metabox["name"];
		if (isset($_POST[$var])) {			
			if( get_post_meta( $pID, $bizz_metabox["name"] ) == "" )
				add_post_meta($pID, $bizz_metabox["name"], $_POST[$var], true );
			elseif($_POST[$var] != get_post_meta($pID, $bizz_metabox["name"], true))
				update_post_meta($pID, $bizz_metabox["name"], $_POST[$var]);
			elseif($_POST[$var] == "")
				delete_post_meta($pID, $bizz_metabox["name"], get_post_meta($pID, $bizz_metabox["name"], true));
		}
	}
}

function bizzthemes_metabox_insert_post($pID) {
	global $bizz_metaboxes_post;
	foreach ($bizz_metaboxes_post as $bizz_metabox) {
		$var = "bizzthemes_".$bizz_metabox["name"];
		if (isset($_POST[$var])) {			
			if( get_post_meta( $pID, $bizz_metabox["name"] ) == "" )
				add_post_meta($pID, $bizz_metabox["name"], $_POST[$var], true );
			elseif($_POST[$var] != get_post_meta($pID, $bizz_metabox["name"], true))
				update_post_meta($pID, $bizz_metabox["name"], $_POST[$var]);
			elseif($_POST[$var] == "")
				delete_post_meta($pID, $bizz_metabox["name"], get_post_meta($pID, $bizz_metabox["name"], true));
		}
	}
}

function bizzthemes_meta_box() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box('bizzthemes-settings',$GLOBALS['themename'].' Custom Slider Settings','bizzthemes_meta_box_content','page','normal','high');
	}
}

function bizzthemes_meta_box_post() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box('bizzthemes-settings',$GLOBALS['themename'].' Custom Thumbnail Settings','bizzthemes_meta_box_content_post','post','normal','high');
	}
}

add_action('admin_menu', 'bizzthemes_meta_box');
add_action('wp_insert_post', 'bizzthemes_metabox_insert');

add_action('admin_menu', 'bizzthemes_meta_box_post');
add_action('wp_insert_post', 'bizzthemes_metabox_insert_post');


//Custom taxonomy // only works for WP 2.8

add_action( 'init', 'create_bizzthemes_taxonomies', 0 );

function create_bizzthemes_taxonomies() {
	register_taxonomy( 'menu_price', 'post', array( 'hierarchical' => false, 'label' => 'Gallery Price', 'query_var' => true, 'rewrite' => true ) );

}

// Excerpt length

function bm_better_excerpt($length, $ellipsis) {
$text = get_the_content();
$text = strip_tags($text);
$text = substr($text, 0, $length);
$text = substr($text, 0, strrpos($text, " "));
$text = $text.$ellipsis;
return $text;
}

// Relative dates

function relativeDate($posted_date) {
    
    $tz = 0;    // change this if your web server and weblog are in different timezones
                // see project page for instructions on how to do this
    
    $month = substr($posted_date,4,2);
    
    if ($month == "02") { // february
    	// check for leap year
    	$leapYear = isLeapYear(substr($posted_date,0,4));
    	if ($leapYear) $month_in_seconds = 2505600; // leap year
    	else $month_in_seconds = 2419200;
    }
    else { // not february
    // check to see if the month has 30/31 days in it
    	if ($month == "04" or 
    		$month == "06" or 
    		$month == "09" or 
    		$month == "11")
    		$month_in_seconds = 2592000; // 30 day month
    	else $month_in_seconds = 2678400; // 31 day month;
    }
  
/* 
some parts of this implementation borrowed from:
http://maniacalrage.net/archives/2004/02/relativedatesusing/ 
*/
  
    $in_seconds = strtotime(substr($posted_date,0,8).' '.
                  substr($posted_date,8,2).':'.
                  substr($posted_date,10,2).':'.
                  substr($posted_date,12,2));
    $diff = time() - ($in_seconds + ($tz*3600));
    $months = floor($diff/$month_in_seconds);
    $diff -= $months*2419200;
    $weeks = floor($diff/604800);
    $diff -= $weeks*604800;
    $days = floor($diff/86400);
    $diff -= $days*86400;
    $hours = floor($diff/3600);
    $diff -= $hours*3600;
    $minutes = floor($diff/60);
    $diff -= $minutes*60;
    $seconds = $diff;

    if ($months>0) {
        // over a month old, just show date ("Month, Day Year")
        echo ''; the_time('F jS, Y');
    } else {
        if ($weeks>0) {
            // weeks and days
            $relative_date .= ($relative_date?', ':'').$weeks.' '.get_option('bizzthemes_relative_week').''.($weeks>1?''.get_option('bizzthemes_relative_s').'':'');
            $relative_date .= $days>0?($relative_date?', ':'').$days.' '.get_option('bizzthemes_relative_day').''.($days>1?''.get_option('bizzthemes_relative_s').'':''):'';
        } elseif ($days>0) {
            // days and hours
            $relative_date .= ($relative_date?', ':'').$days.' '.get_option('bizzthemes_relative_day').''.($days>1?''.get_option('bizzthemes_relative_s').'':'');
            $relative_date .= $hours>0?($relative_date?', ':'').$hours.' '.get_option('bizzthemes_relative_hour').''.($hours>1?''.get_option('bizzthemes_relative_s').'':''):'';
        } elseif ($hours>0) {
            // hours and minutes
            $relative_date .= ($relative_date?', ':'').$hours.' '.get_option('bizzthemes_relative_hour').''.($hours>1?''.get_option('bizzthemes_relative_s').'':'');
            $relative_date .= $minutes>0?($relative_date?', ':'').$minutes.' '.get_option('bizzthemes_relative_minute').''.($minutes>1?''.get_option('bizzthemes_relative_s').'':''):'';
        } elseif ($minutes>0) {
            // minutes only
            $relative_date .= ($relative_date?', ':'').$minutes.' '.get_option('bizzthemes_relative_minute').''.($minutes>1?''.get_option('bizzthemes_relative_s').'':'');
        } else {
            // seconds only
            $relative_date .= ($relative_date?', ':'').$seconds.' '.get_option('bizzthemes_relative_minute').''.($seconds>1?''.get_option('bizzthemes_relative_s').'':'');
        }
        
        // show relative date and add proper verbiage
    	echo ''.get_option('bizzthemes_relative_posted').' '.$relative_date.' '.get_option('bizzthemes_relative_ago').'';
    }
    
}

function isLeapYear($year) {
        return $year % 4 == 0 && ($year % 400 == 0 || $year % 100 != 0);
}

    if(!function_exists('how_long_ago')){
        function how_long_ago($timestamp){
            $difference = time() - $timestamp;

            if($difference >= 60*60*24*365){        // if more than a year ago
                $int = intval($difference / (60*60*24*365));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_year').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60*24*7*5){  // if more than five weeks ago
                $int = intval($difference / (60*60*24*30));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_month').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60*24*7){        // if more than a week ago
                $int = intval($difference / (60*60*24*7));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_week').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60*24){      // if more than a day ago
                $int = intval($difference / (60*60*24));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_day').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60){         // if more than an hour ago
                $int = intval($difference / (60*60));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_hour').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60){            // if more than a minute ago
                $int = intval($difference / (60));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_minute').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } else {                                // if less than a minute ago
                $r = ''.get_option('bizzthemes_relative_moments').' '.get_option('bizzthemes_relative_ago').'';
            }

            return $r;
        }
    }

/*
Plugin Name: WP-PageNavi 
Plugin URI: http://www.lesterchan.net/portfolio/programming.php 
*/ 

function wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {

	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '<strong>&laquo;</strong>';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '<strong>&raquo;</strong>';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(is_tag()) {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		} elseif (!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);	
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div class='Navi'>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">&laquo; '.get_option('bizzthemes_pagination_first_name').'</a>';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<strong class='on'>$i</strong>";
					} else {
						echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo '<a href="'.get_pagenum_link($max_page).'">'.get_option('bizzthemes_pagination_last_name').' &raquo;</a>';
			}
			echo "</div> $after";
		}
	}
}

// Use Noindex for sections specified in theme admin

function bizzthemes_noindex_head() { 

    if ((is_category() && get_option('bizzthemes_noindex_category')) ||
	    (is_tag() && get_option('bizzthemes_noindex_tag')) ||
		(is_day() && get_option('bizzthemes_noindex_daily')) ||
		(is_month() && get_option('bizzthemes_noindex_monthly')) ||
		(is_year() && get_option('bizzthemes_noindex_yearly')) ||
		(is_author() && get_option('bizzthemes_noindex_author')) ||
		(is_search() && get_option('bizzthemes_noindex_search'))) {

		$meta_string .= '<meta name="robots" content="noindex,follow" />';
	}
	
	echo $meta_string;
	
}

add_action('wp_head', 'bizzthemes_noindex_head');

?>