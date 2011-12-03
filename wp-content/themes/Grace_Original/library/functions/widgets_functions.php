<?php

// Register widgetized areas
if ( function_exists('register_sidebar') ) {
    register_sidebars(1,array('name' => 'Sidebar Left','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
    register_sidebars(1,array('name' => 'Video Widget','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(3,array('name' => 'Front Content %d','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Header Navigation','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
}
	
// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active( $index = 1){
	$sidebars	= wp_get_sidebars_widgets();
	$key		= (string) 'sidebar-'.$index;
 
	return (isset($sidebars[$key]));
}


// =============================== Ads 125x125 widget ======================================

function adsWidget()
{
$img_url[1] = get_option('bizzthemes_ad_image_1');
$dest_url[1] = get_option('bizzthemes_ad_url_1');
$img_url[2] = get_option('bizzthemes_ad_image_2');
$dest_url[2] = get_option('bizzthemes_ad_url_2');
$img_url[3] = get_option('bizzthemes_ad_image_3');
$dest_url[3] = get_option('bizzthemes_ad_url_3');
$img_url[4] = get_option('bizzthemes_ad_image_4');
$dest_url[4] = get_option('bizzthemes_ad_url_4');
$img_url[5] = get_option('bizzthemes_ad_image_5');
$dest_url[5] = get_option('bizzthemes_ad_url_5');
$img_url[6] = get_option('bizzthemes_ad_image_6');
$dest_url[6] = get_option('bizzthemes_ad_url_6');

?>

<div class="ad-box">

<?php if ( get_option('bizzthemes_show_ads_top12') ) { ?>
       
    <div class="ads123456"> 
        
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[1]"; ?>"><img src="<?php echo "$img_url[1]"; ?>" alt="" /></a>

        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[2]"; ?>"><img src="<?php echo "$img_url[2]"; ?>" alt="" class="last" /></a>
        
    </div>
	
	<div class="fix"></div>
                
<?php } ?>

<?php if ( get_option('bizzthemes_show_ads_top34') ) { ?>
       
    <div class="ads123456"> 
        
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="" /></a>

        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="" class="last" /></a>
        
    </div> 

    <div class="fix"></div>	

<?php } ?>

<?php if ( get_option('bizzthemes_show_ads_top56') ) { ?>
       
    <div class="ads123456"> 
        
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[5]"; ?>"><img src="<?php echo "$img_url[5]"; ?>" alt="" /></a>

        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[6]"; ?>"><img src="<?php echo "$img_url[6]"; ?>" alt="" class="last" /></a>
        
    </div> 

    <div class="fix"></div>	

<?php } ?>

</div>
<!--/ad-box -->

<?php }

register_sidebar_widget('PT &rarr; Ads 125x125', 'adsWidget');

function adsWidgetAdmin() {

	echo '<input type="hidden" id="update_ads" name="update_ads" value="1" />';

}

register_widget_control('PT &rarr; Ads 125x125', 'adsWidgetAdmin', 200, 200);


// =============================== Popular Posts Widget ======================================

function PopularPostsSidebar()
{

    $settings_pop = get_option("widget_popularposts");

	$name = $settings_pop['name'];
	$number = $settings_pop['number'];
	if ($name <> "") { $popname = $name; } else { $popname = 'Popular Posts'; }
	if ($number <> "") { $popnumber = $number; } else { $popnumber = '10'; }

?>

<div class="widget popular">

	<h3 class="hl"><span><?php echo $popname; ?></span></h3>
	
		<ul>
			 
			<?php
			global $wpdb;
            $now = gmdate("Y-m-d H:i:s",time());
            $lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
            $popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT $popnumber";
            $posts = $wpdb->get_results($popularposts);
            $popular = '';
            if($posts){
                foreach($posts as $post){
	                $post_title = stripslashes($post->post_title);
		               $guid = get_permalink($post->ID);
					   
					      $first_post_title=substr($post_title,0,26);
            ?>
		        <li>
                    <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $first_post_title; ?></a> [...]
                    <br style="clear:both" />
                </li>
            <?php } } ?>

		</ul>
</div>

<?php
}
function PopularPostsAdmin() {

	$settings_pop = get_option("widget_popularposts");

	// check if anything's been sent
	if (isset($_POST['update_popular'])) {
		$settings_pop['name'] = strip_tags(stripslashes($_POST['popular_name']));
		$settings_pop['number'] = strip_tags(stripslashes($_POST['popular_number']));

		update_option("widget_popularposts",$settings_pop);
	}

	echo '<p>
			<label for="popular_name">Title:
			<input id="popular_name" name="popular_name" type="text" class="widefat" value="'.$settings_pop['name'].'" /></label></p>';
	echo '<p>
			<label for="popular_number">Number of popular posts:
			<input id="popular_number" name="popular_number" type="text" class="widefat" value="'.$settings_pop['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_popular" name="update_popular" value="1" />';

}

register_sidebar_widget('PT &rarr; Popular Posts', 'PopularPostsSidebar');
register_widget_control('PT &rarr; Popular Posts', 'PopularPostsAdmin', 250, 200);






 // =============================== Featured Video Widget ======================================
class FeaturedVideoWidget extends WP_Widget {
	function FeaturedVideoWidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget fvideo', 'description' => 'Auto Resized Featured Video' );		$this->WP_Widget('widget_fvideo', 'PT &rarr; Featured Video', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);		$embed_code = empty($instance['embed_code']) ? '&nbsp;' : apply_filters('widget_embed_code', $instance['embed_code']);
		    ?>						
            
            
            
             <div class="featured_video">
        <div class="video_title"><?php echo $title; ?></div>
        <div class="video"> 
        
        		<?php
	            $video_content = stripslashes($embed_code);				$video_content = preg_replace('/width=\"\d\d\d\"/i', 'width="300"', $video_content);				$video_content = preg_replace('/height=\"\d\d\d\"/i', 'height="250"', $video_content);
				echo $video_content; 
			?>		
        
        </div>
      </div>  <!-- featured video #end -->
            
            
          
            
            
			<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		$instance['title'] = strip_tags($new_instance['title']);		$instance['embed_code'] = ($new_instance['embed_code']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'embed_code' => '', 'client_name2' => '' ) );		$title = strip_tags($instance['title']);		$embed_code = ($instance['embed_code']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>			<p><label for="<?php echo $this->get_field_id('embed_code'); ?>">Video Full Embed Code: <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('embed_code'); ?>" name="<?php echo $this->get_field_name('embed_code'); ?>"><?php echo attribute_escape($embed_code); ?></textarea></label></p>
<?php
	}}
register_widget('FeaturedVideoWidget');





// =============================== Location Widget ======================================
class FeaturedLocationWidget extends WP_Widget {
	function FeaturedLocationWidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget Location', 'description' => 'Auto Resized Featured Video' );		
		$this->WP_Widget('widget_Location', 'PT &rarr; Location', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);		
		$embed_code = empty($instance['embed_code']) ? '&nbsp;' : apply_filters('widget_embed_code', $instance['embed_code']);
		$google_map = empty($instance['google_map']) ? '&nbsp;' : apply_filters('widget_google_map', $instance['google_map']);
		    ?>						
            
            
            
             <div class="location ">
             
             	<h3> <?php echo $title; ?> </h3>
         		
                
                <div class="google_map">
                	<?php echo $google_map; ?>
                </div>
                
                
        		<?php
	            $video_content = stripslashes($embed_code);				
				$video_content = preg_replace('/width=\"\d\d\d\"/i', 'width="300"', $video_content);				
				$video_content = preg_replace('/height=\"\d\d\d\"/i', 'height="250"', $video_content);
				echo $video_content; 
			?>		
            
            
            
            
        
      </div>
            
            
          
            
            
			<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);		
		$instance['embed_code'] = ($new_instance['embed_code']);
		$instance['google_map'] = ($new_instance['google_map']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'embed_code' => '', 'google_map' => '', 'client_name2' => '' ) );		
		$title = strip_tags($instance['title']);		
		$embed_code = ($instance['embed_code']);
		$google_map = ($instance['google_map']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>			
        <p><label for="<?php echo $this->get_field_id('embed_code'); ?>">Location Address &amp; Description here <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('embed_code'); ?>" name="<?php echo $this->get_field_name('embed_code'); ?>"><?php echo attribute_escape($embed_code); ?></textarea></label></p>
        <p><label for="<?php echo $this->get_field_id('google_map'); ?>">Google Map Script here <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('google_map'); ?>" name="<?php echo $this->get_field_name('google_map'); ?>"><?php echo attribute_escape($google_map); ?></textarea></label></p>
<?php
	}}
register_widget('FeaturedLocationWidget');



// =============================== Services Widget ======================================
class ServiceTimingsWidget extends WP_Widget {
	function ServiceTimingsWidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget services', 'description' => 'Auto Resized Featured Video' );		
		$this->WP_Widget('widget_service', 'PT &rarr; Service Timings', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);		
		$embed_code = empty($instance['embed_code']) ? '&nbsp;' : apply_filters('widget_embed_code', $instance['embed_code']);
		$google_map = empty($instance['google_map']) ? '&nbsp;' : apply_filters('widget_google_map', $instance['google_map']);
		?>						
            
            <div class="widget-spot">
            	<div class="widget">
                <h3> <?php echo $title; ?> </h3>
             	<div class="services">
            		<div class="services_bottom">            
                            <?php echo $google_map; ?>
      				</div>
            	</div>
            </div>
		</div>
          
            
            
			<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);		
		$instance['google_map'] = ($new_instance['google_map']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'embed_code' => '', 'google_map' => '', 'client_name2' => '' ) );		
		$title = strip_tags($instance['title']);		
		$google_map = ($instance['google_map']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>			
        <p><label for="<?php echo $this->get_field_id('google_map'); ?>">Services Timing Details here <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('google_map'); ?>" name="<?php echo $this->get_field_name('google_map'); ?>"><?php echo attribute_escape($google_map); ?></textarea></label></p>
<?php
	}}
register_widget('ServiceTimingsWidget');







// =============================== Upcomming Events Widget (particular category) ======================================

class UpcomingEvents extends WP_Widget {

	function UpcomingEvents() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget  Upcoming Events', 'description' => 'List of Upcomming Events in particular category' );
		$this->WP_Widget('widget_event_posts', 'PT &rarr; Upcoming Events', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
		$post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
		$post_link = empty($instance['post_link']) ? '&nbsp;' : apply_filters('widget_post_link', $instance['post_link']);
		
		
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<ul class="eventlist">';
		        ?>
                
			   <?php rs_event_list() ?>
                
			    <?php
	    echo '</ul>';
			
			 
		
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['post_number'] = strip_tags($new_instance['1']);
		$instance['post_link'] = strip_tags($new_instance['post_link']);
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => '', 'post_number' => '' ) );
		$title = strip_tags($instance['title']);
		$category = strip_tags($instance['category']);
		$post_number = strip_tags($instance['1']);
		$post_link = strip_tags($instance['post_link']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
	
<?php
	}
}
register_widget('UpcomingEvents');


// =============================== Our Ministries Widget (particular category) ======================================

class OtherCategory1 extends WP_Widget {
	function OtherCategory1() {
	//Constructor
		$widget_ops = array('classname' => 'widget latest posts', 'description' => 'List of Other Category(#1) in particular category' );
		$this->WP_Widget('widget_posts4', 'PT &rarr; Our Ministries', $widget_ops);
	}

	function widget($args, $instance) {
	// prints the widget
		global $thumb_url;
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
		$post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
		$post_link = empty($instance['post_link']) ? '&nbsp;' : apply_filters('widget_post_link', $instance['post_link']);

		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<ul class="ministries clearfix">';

		        ?>
				<?php 
			        global $post;
			        $latest_menus = get_posts('numberposts='.$post_number.'postlink='.$post_link.'&category='.$category.'');
                    foreach($latest_menus as $post) :
                    setup_postdata($post);

			    ?>
                <li class="clearfix">
                    
                    <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                              <a class="widget-title" href="<?php the_permalink(); ?>"> <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=58&amp;w=58&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>"    /></a>   
    					   <?php } ?>
              
                	<h4><a class="widget-title" href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>   </h4>
                    <p class="featured-excerpt"><?php echo bm_better_excerpt(90, ' ... '); ?> </p>
                  
                 
                  
                </li>
                <?php endforeach; ?>
                <?php

	    echo '</ul>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['post_number'] = strip_tags($new_instance['post_number']);
		$instance['post_link'] = strip_tags($new_instance['post_link']);
		return $instance;

	}

	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => '', 'post_number' => '' ) );
		$title = strip_tags($instance['title']);
		$category = strip_tags($instance['category']);
		$post_number = strip_tags($instance['post_number']);
		$post_link = strip_tags($instance['post_link']);

?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">Title:
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('category'); ?>">Categories (<code>IDs</code> separated by commas):
    <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo attribute_escape($category); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('post_number'); ?>">Number of posts:
    <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="text" value="<?php echo attribute_escape($post_number); ?>" />
  </label>
</p>
<?php
	}

}

register_widget('OtherCategory1');

// =============================== Latest Posts Widget (particular category) ======================================

class LatestPostsParticular2 extends WP_Widget {

	function LatestPostsParticular2() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget latest posts', 'description' => 'List of latest menus in particular category' );
		$this->WP_Widget('widget_posts', 'PT &rarr; Recent Posts', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
		$post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
		$post_link = empty($instance['post_link']) ? '&nbsp;' : apply_filters('widget_post_link', $instance['post_link']);
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<ul class="postlist">';
		        ?>
                
 			    <?php 
			        global $post;
			        $latest_menus = get_posts('numberposts='.$post_number.'postlink='.$post_link.'&category='.$category.'');
                    foreach($latest_menus as $post) :
                    setup_postdata($post);
			    ?>
			  
			    <li>
 					 <h4> <a class="widget-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>
  			        <p class="featured-excerpt"> by <?php the_author(); ?> on <?php the_time('M j, Y') ?> </p>
 			    </li>
			  
			    <?php endforeach; ?>
			    <?php
	    echo '</ul>';
			
			 
		
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['post_number'] = strip_tags($new_instance['post_number']);
		$instance['post_link'] = strip_tags($new_instance['post_link']);
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => '', 'post_number' => '' ) );
		$title = strip_tags($instance['title']);
		$category = strip_tags($instance['category']);
		$post_number = strip_tags($instance['post_number']);
		$post_link = strip_tags($instance['post_link']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('category'); ?>">Categories (<code>IDs</code> separated by commas): <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo attribute_escape($category); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('post_number'); ?>">Number of posts: <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="text" value="<?php echo attribute_escape($post_number); ?>" /></label></p>
<?php
	}
}
register_widget('LatestPostsParticular2');

// =============================== Flickr widget ======================================

function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

<div class="widget flickr">
			
        <h3><span>flickr</span></h3>
				
		<div class="fix"></div>
            			
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>  
		
		<div class="fix"></div>
		
</div>		

<?php
}
function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('PT &rarr; Flickr Photos', 'flickrWidget');
register_widget_control('PT &rarr; Flickr Photos', 'flickrWidgetAdmin', 250, 200);

// =============================== Widget Title ======================================

class SimpleTitle extends WP_Widget {

	function SimpleTitle() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget title', 'description' => 'Title for widget (used in Restaurant Hours)' );
		$this->WP_Widget('widget_stitle', 'PT &rarr; Widget Title', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };

		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title (i.e. Restaurant Hours): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
	}
}
register_widget('SimpleTitle');