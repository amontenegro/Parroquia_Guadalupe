<?php
/*
Plugin Name: RS Event
Plugin URI: http://livingos.com/wp/rs-event-plugin/
Description: Adds an "RS Event" panel to the posting page, allowing for a date to be set for the post and then displayed in the blog sidebar.
Author: Robert Sargant
Version: 0.9.7
Author URI: http://www.sargant.com/ [broken]

A modified version incorporating the WordPress 2.3 fixes from LivingOS and some of the ideas from Nudnik i.e. preset this year on Write Post form & if no time is set, leave it out plus some cosmetics. It does not include his change to 12 hour clock which I didn't think was helpful.

Mods by Rick Parsons:
-reduced the excerpt size from 55 to 20 words because 55 is a bit long for a sidebar.
-fixed a bug with timezoning in routine gmdate_i18n and another one in rs_event_list (right at the top).
-modified the algorithm, so that today's events stay on the page right up to the very end. I have done this so that I can keep the caption "Services this Sunday" without it changing over to next week's morning service part way through the day.
-changed the plugin registration and admin so that it works properly with WP2.7
*/

/*** INPUT CONTROLS *******************************************************/

/*** Add the RS Event controls to the posting sidebar */
/* 0.9.6 moved add_action('dbx_post_sidebar', 'rs_event_sidebar_controls'); */
add_action('admin_menu', 'rs_event_add_custom_box');

/*** Manipulate RS Event data when modifying posts */
add_action('edit_post', 'rs_event_save');
add_action('save_post', 'rs_event_save');
add_action('publish_post', 'rs_event_save');
add_action('delete_post', 'rs_event_delete');

/*** These defaults are used all over the place */

$rs_event_defaults = array
(
	"title"         => "Upcoming Events",
	"timespan"      => 365,
	"history"       => 0,
	"date_format"   => "jS M y",
	"time_format"   => "H:i",
	"time_separator"=> "at ",	// 0.9.6: from Nudnik -  Separator between date and time - trailing space reccommended
	"event_html"    => "<a href='%URL%'>%TITLE%</a>",
	"max_events"    => "4",
	"group_by_date" => 0,
	"no_events_msg" => "No hay eventos registrados.",
	"sort_order"    => "ASC",
	"category"      => 0,
);



/*** ADMIN CONTROLS *******************************************************/

/* 0.9.6 - Register function for the plugin in a new way for WP 2.7 */
function rs_event_add_custom_box()
{
	add_meta_box('rs_event_sectionid', 'RS Event', 'rs_event_sidebar_controls', 'post', 'advanced');
}

/*** Inserts some drop-down menus as an extra posting panel. */
function rs_event_sidebar_controls()
{
	/*** If there are existing post details, get values to autofill the form */
	if(isset($_REQUEST['post']))
	{
		$event_timestamp = get_post_meta($_REQUEST['post'], "rs_event", true); // 0.9.6: only first element needed

		if($event_timestamp)
		{	// 0.9.6: Change by Nudnik to allow for no time set
			$has_time = 1; // check for trailing "n"
			if ($event_timestamp{strlen($event_timestamp) - 1} == 'n')
			{
				$has_time = 0;
			}
			settype($event_timestamp, "integer"); //remove "n"
	
			list($year, $month, $day, $hour, $minute) = explode(" ", gmdate("Y n j G i", $event_timestamp)); // 0.9.6: from Nudnik - remove array ref.
			// Cast as int to get rid of the zero
			$hour = (int)$hour;
			$minute = (int)$minute;

			// 0.9.6 if no time, ensure none gets pre-selected
			if ($has_time == 0) {
				$hour = 99;
				$minute = 99;
			}
		}
	}
	else {	/* 0.9.6: from Nudnik - preselect current year */
		$year = date("Y");
	}

	?>

	<!-- 0.9.6: from Nudnik - Print current date, for user-friendliness -->
	<span style="color:#999;font-size:.85em;">Today is <?php echo date("j M Y"); ?></span>
	<br />

	<?php _e('Date:') ?>

	<br />

	<select name="rs_event_day" style="width: 4.5em">
	<option value=""><?php _e('Day') ?></option>
	<option value="">----</option>
	<?php for($d = 1; $d <= 31; $d++) { ?>
		<?php if($d == $day) { ?>
			<option selected="selected" value="<?php echo $d ?>"><?php echo $d ?></option>
		<?php } else { ?>
			<option value="<?php echo $d ?>"><?php echo $d ?></option>
		<?php } ?>

	<?php } ?>
	</select>

	<select name="rs_event_month" style="width: 6em;">
	<option value=""><?php _e('Month') ?></option>
	<option value="">----</option>
	<?php foreach(array( 1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec") as $id => $m) { ?>
		<?php if($id == $month) { ?>
			<option selected="selected" value="<?php echo $id ?>"><?php _e($m) ?></option>
		<?php } else { ?>
			<option value="<?php echo $id ?>"><?php _e($m) ?></option>
		<?php } ?>
	<?php } ?>
	</select>

	<!-- 0.9.6 remove unnecessary line break <br /> -->

	<select name="rs_event_year" style="width: 7em;">
	<!-- 0.9.6: from Nudnik - Preselect year and limit to 5 choices -->
	<option value=""><?php _e('Year') ?></option>
	<option value="">----</option>
	<?php for($y = date("Y") - 1; $y <= date("Y") + 3; $y++) { ?>
		<?php if($y == $year) { ?>
			<option selected="selected" value="<?php echo $y ?>"><?php echo $y ?></option>
		<?php } else { ?>
			<option value="<?php echo $y ?>"><?php echo $y ?></option>
		<?php } ?>
	<?php } ?>
	</select>

	

	<?php _e('Time: (Optional)') ?>

	<br />

	<select name="rs_event_hour" style="width: 5em;">
	<!-- 0.9.6: from Nudnic - preset "notime" value -->
	<option value="notime"><?php _e('Hour') ?></option>
	<option value="notime">----</option>
	<?php for($h = 0; $h <= 23; $h++) { ?>
		<?php if($h === $hour) { ?>
			<option selected="selected" value="<?php echo $h ?>"><?php echo str_pad($h, 2, "0", STR_PAD_LEFT) ?></option>
		<?php } else { ?>
			<option value="<?php echo $h ?>"><?php echo str_pad($h, 2, "0", STR_PAD_LEFT) ?></option>
		<?php } ?>
	<?php }   ?>
	</select>

	:

	<select name="rs_event_minute" style="width: 5em;">
	<option value=""><?php _e('Min') ?></option>
	<option value="">----</option>
	<?php for($mi = 0; $mi <= 55; $mi = $mi + 5) { ?>
		<?php if($mi === $minute) { ?>
			<option selected="selected" value="<?php echo $mi ?>"><?php echo str_pad($mi, 2, "0", STR_PAD_LEFT) ?></option>
		<?php } else { ?>
			<option value="<?php echo $mi ?>"><?php echo str_pad($mi, 2, "0", STR_PAD_LEFT) ?></option>
		<?php } ?>
	<?php } ?>
	</select>

	<br />
	<br />

	<?php if($event_timestamp) {?>
		<label for="rs-event-delete" class="selectit"><input id="rs-event-delete" type="checkbox" name="rs_event_delete" value="1" /> Delete Event</label>
	<?php }

}

function rs_event_save($id)
{
	if(!isset($id)) { $id = $_REQUEST['post_ID']; }

	if($_REQUEST['rs_event_delete']) 
	{
		delete_post_meta($id, "rs_event");
		return true;
	}
	elseif($_REQUEST['rs_event_year'] && $_REQUEST['rs_event_month'] && $_REQUEST['rs_event_day'])
	{	// 0.9.6: from Nudnik - check for no time entered
		if ($_REQUEST['rs_event_hour'] == "notime") {
			$pad_char = "n";
			$_REQUEST['rs_event_hour'] = 0;
			$_REQUEST['rs_event_minute'] = 0;
		}

		$hour	= ($_REQUEST['rs_event_hour']) ? $_REQUEST['rs_event_hour'] : 0;
		$minute = ($_REQUEST['rs_event_hour']) ? $_REQUEST['rs_event_minute'] : 0;

		/*** gmmktime stops PHP from interfering with local timezone settings */
		$ts = gmmktime($hour, $minute, 0, $_REQUEST['rs_event_month'], $_REQUEST['rs_event_day'], $_REQUEST['rs_event_year']);
		$ts .= "$pad_char"; // 0.9.6: from Nudnik - add indicator that no time is present
		
		delete_post_meta($id, "rs_event");
		add_post_meta($id, "rs_event", $ts);
		return true;
	}
}

/*** New in 0.6.2 - delete the event when the parent post is deleted */
function rs_event_delete($id)
{
	if(!isset($id)) { $id = $_REQUEST['post_ID']; }

	delete_post_meta($id, "rs_event");
	return true;
}


/*** OUTPUT DISPLAY CONTROLS **********************************************/


function rs_event_list($args = array())
{
	global $wpdb, $rs_event_defaults;

	/*** 0.9 - Use array_walk instead (cleaner) */
	$values = $rs_event_defaults;
	$callback = create_function('&$v, $k, $a', '$v = isset($a[$k]) ? $a[$k] : $v;');
	array_walk($values, $callback, $args);
	extract($values);

	/* 0.9.6: Correct timezone bug - use WordPress current time not GMT
	$lower_time = time() - ($history  * 24 * 60 * 60);
	$upper_time = time() + ($timespan * 24 * 60 * 60); */
	$lower_time = current_time('timestamp') - ($history  * 24 * 60 * 60);
	$upper_time = current_time('timestamp') + ($timespan * 24 * 60 * 60);

	/* 0.9.6: keep stuff visible until the current day ends */
	$lower_time = floor($lower_time / 86400) * 86400;
	$upper_time = floor($upper_time / 86400) * 86400;

	$where_category_clause = (0 == $values["category"]) ? '' : 'AND cats.term_taxonomy_id = '.$wpdb->escape(stripslashes($category)); // 0.9.6: from LivingOS - Allow for WP 2.3

	/*** Modified in 0.6.3 - only select published posts ***/
	/*** 0.9 - don't show postdated posts, grab excerpt, DISTINCT modifier if no category restriction ***/
	/* 0.9.6 - from LivingOS - This section has been modified for WP 2.3 */
	$query_string = "
  SELECT DISTINCT
    meta.meta_value as `date`, 
    post.post_title as `title`,
    post.post_content as `fulltext`, 
    post.ID as id,
    post.post_excerpt as `excerpt`
  FROM 
    {$wpdb->postmeta} as meta, 
    {$wpdb->posts} as post,
    {$wpdb->term_relationships} as cats
  WHERE
    meta.post_id = post.ID
  AND
    post.ID = cats.object_id
  AND
    meta.meta_key = 'rs_event'
  AND
    post.post_date <= '".current_time('mysql')."'
  AND
    meta.meta_value >= {$lower_time}
  AND
    meta.meta_value <= {$upper_time}
  AND
    post.post_status = 'publish'
  {$where_category_clause}
  ORDER BY 
    meta.meta_value {$sort_order}";

	/*** 0.5.1 - Allow event limiting */
	if($max_events != 0) { $query_string .= " LIMIT {$max_events}"; }

	/*** Get a list of the events from our query string */
	$event_list = $wpdb->get_results($query_string);

	/*** Items for outputting will be placed here for imploding later */
	$output_array = array();

	/*** If the query has returned an array, do stuff */
	if(is_array($event_list) && sizeof($event_list) > 0)
	{
		/*** To store previous dates if we have $group_by_date turned on */
		$previous_date = false;

		/*** Loop through each event */
		foreach($event_list as $event)
		{
			/*** Format the date/time/HTML now */
			// 0.9.6: from Nudnik - check if there's a time, set variable
			$show_time = 1;
			if (strlen($event->date) == 11) {
				$show_time = 0;
				settype($event->date, "integer");
			}

			$output_date = gmdate_i18n($date_format, $event->date);
			$output_time = gmdate_i18n($time_format, $event->date);
      
			/***
			Fake an excerpt if it doesn't exist
			Nicked from WP 2.0.3 functions-formatting.php line 721 (stupid globals)
			*/
			if('' == $event->excerpt)
			{
				$event->excerpt = $event->fulltext;
				$event->excerpt = apply_filters('the_content', $event->excerpt);
				$event->excerpt = str_replace(']]>', ']]&gt;', $event->excerpt);
				$event->excerpt = strip_tags($event->excerpt);
				$excerpt_length = 20; /* 0.9.6 modified from 55 which is too many for sidebars */
				$words = explode(' ', $event->excerpt, $excerpt_length + 1);
				if (count($words) > $excerpt_length) 
				{
					array_pop($words);
					array_push($words, '[...]');
					$event->excerpt = implode(' ', $words);
				}
			}

			/*** Tidy these up into keys/values and add filters */
			$replacements = array
			(
				'%URL%' => get_permalink($event->id),
				'%DATE%' => apply_filters('the_date', $output_date),
				'%TIME%' => apply_filters('the_time', $output_time),
				'%TITLE%' => apply_filters('the_title', $event->title),
				'%FULLTEXT%' => apply_filters('the_content', $event->fulltext),
				'%EXCERPT%' => apply_filters('the_excerpt', $event->excerpt),
			);

			$replacements['%TIME%'] = $values['time_separator'] . $replacements['%TIME%']; // 0.9.6: from Nudnik - prepend the time separator to the time output
			if ($show_time == 0) {
				$replacements['%TIME%'] = "";
			}

			$output_html = str_replace(array_keys($replacements), array_values($replacements), $event_html);

			/*** If we are not grouping by date, output as a list item now. */
			if($group_by_date == false) { $output_array[] = $output_html; }

			/*** If we are grouping by date */
			else {
				/*** If this is a new date, create a new element in the array */
				if($output_date != $previous_date)
				{
					$output_array[] = "$output_date<br />";
					$previous_date = $output_date;
				}

				/*** Append the event's HTML onto the last item in the list */
				$output_array[count($output_array)-1] .= "$output_html<br />";

			}
		}
	}
	/*** If no array returned, say nothing */
	else { $output_array[] = $rs_event_defaults["no_events_msg"]; }

	/*** Now output the array */
	echo "<ul><li>".implode("</li><li>", $output_array)."</li></ul>";

} // end rs_event_list






/*** WIDGET FUNCTIONS *****************************************************/
 
function widget_rs_event_init()
{
  if (!function_exists('register_sidebar_widget')) { return; }
  
  function widget_rs_event($args)
  {
    global $rs_event_defaults;
    extract($args);
    $options = get_option('widget_rs_event');
		$title = $options['title'];
    
    echo $before_widget . $before_title . $title . $after_title;
    
    foreach($rs_event_defaults as $key => $value)
		{
		  if(!$options[$key]) { $options[$key] = $value; }
		}
    
		rs_event_list($options);
		echo $after_widget;
  }
  
  register_sidebar_widget('RS Event', 'widget_rs_event');
  
  
  
  function widget_rs_event_control()
  {
    global $rs_event_defaults;
		$options = get_option('widget_rs_event');
		
		foreach($rs_event_defaults as $key => $value)
		{
		  if(!$options[$key]) { $options[$key] = $value; }
		}
		
		if($_POST['rs_event_submit'])
		{
		  $callback = create_function('&$v,$k', '$v = stripslashes($_POST["rs_event_".$k]); if($k != "event_html" && $k != "no_events_msg"){$v = strip_tags($v);}');
			array_walk($options, $callback);
			update_option('widget_rs_event', $options);
		}
		
		$callback = create_function('&$v,$k', '$v = htmlspecialchars($v, ENT_QUOTES);');
		array_walk($options, $callback);
		extract($options);
		?>

<script type="text/javascript">
  function insert_tag(value) {rs_event_insert_at_cursor(document.getElementById("rs_event_event_html"), '%'+value+'%');} 
  function rs_event_insert_at_cursor(f,v) { if(document.selection){f.focus();sel=document.selection.createRange();sel.text=v;}else if (f.selectionStart||f.selectionStart=="0"){var startPos=f.selectionStart;var endPos = f.selectionEnd;f.value = f.value.substring(0, startPos)+v+f.value.substring(endPos, f.value.length);} else {f.value+=v;}}
</script>

<fieldset style="float: left; width: 340px">
  <legend style="font-weight: bold">Output Options</legend>
  <p style="text-align:right">
    <label for="rs_event_title">Title:</label>
    <input style="width: 200px;" id="rs_event_title" name="rs_event_title" type="text" value="<?php echo $title ?>" />
  </p>
  <p style="text-align:right">
    <label for="rs_event_event_html">Output HTML:</label>
    <input style="width: 200px" id="rs_event_event_html" name="rs_event_event_html" type="text" value="<?php echo $event_html ?>" />
  </p>
  <p style="text-align:right">
    <small>
      Insert: 
      <a href="javascript:insert_tag('URL')"><code>URL</code></a>, 
      <a href="javascript:insert_tag('TITLE')"><code>TITLE</code></a>, 
      <a href="javascript:insert_tag('DATE')"><code>DATE</code></a>,
      <a href="javascript:insert_tag('TIME')"><code>TIME</code></a>,
      <a href="javascript:insert_tag('FULLTEXT')"><code>FULLTEXT</code></a>,
      <a href="javascript:insert_tag('EXCERPT')"><code>EXCERPT</code></a>
    </small>
  </p>
  <p style="text-align:right">
    <label for="rs_event_no_events_msg">"No events" message:</label>
    <input style="width: 150px" id="rs_event_no_events_msg" name="rs_event_no_events_msg" type="text" value="<?php echo $no_events_msg ?>" />
  </p>
  <p style="text-align:right;">
    "Group by date" formatting? 
    <label for="rs_event_group_by_date_true"><input type="radio" name="rs_event_group_by_date" id="rs_event_group_by_date_true" value="1" <?php echo ($group_by_date?'checked="checked"':'') ?> /> Yes</label>
    <label for="rs_event_group_by_date_false"><input type="radio" name="rs_event_group_by_date" id="rs_event_group_by_date_false" value="0" <?php echo (!$group_by_date?'checked="checked"':'') ?> /> No</label>
  </p>
  <p style="text-align:right">
    <label for="rs_event_date_format">Date Formatting:</label>
    <input style="width: 70px;" id="rs_event_date_format" name="rs_event_date_format" type="text" value="<?php echo $date_format ?>" />
  </p>
  <p style="text-align:right">
    <label for="rs_event_time_format">Time Formatting:</label>
    <input style="width: 70px;" id="rs_event_time_format" name="rs_event_time_format" type="text" value="<?php echo $time_format ?>" />
  </p>
  <p style="text-align:right">
    <a href="http://codex.wordpress.org/Formatting_Date_and_Time">Documentation on time and date formatting</a>
  </p>
</fieldset>
<fieldset style="float: right; width: 340px">
  <legend style="font-weight: bold">Selection Options</legend>
  <p style="text-align:right">
    <label for="rs_event_timespan">Timespan:</label>
    <input style="width: 40px; text-align: right" id="rs_event_timespan" name="rs_event_timespan" type="text" value="<?php echo $timespan ?>" /> days
  </p>
  <p style="text-align:right;">
    <label for="rs_event_history">History:</label>
    <input style="width: 40px; text-align: right" id="rs_event_history" name="rs_event_history" type="text" value="<?php echo $history ?>" /> days
  </p>
  <p style="text-align:right">
    <label for="rs_event_max_events">Show up to (0 for all): </label>
    <input style="width: 40px; text-align: right" id="rs_event_max_events" name="rs_event_max_events" type="text" value="<?php echo $max_events ?>" /> events
  </p>
  <p style="text-align:right">
    Sort Order:
    <label for="rs_event_sort_order_asc"><input type="radio" name="rs_event_sort_order" id="rs_event_sort_order_asc" value="ASC" <?php echo ("ASC" == $sort_order) ?'checked="checked"':'' ?> /> Ascending</label>
    <label for="rs_event_sort_order_desc"><input type="radio" name="rs_event_sort_order" id="rs_event_sort_order_desc" value="DESC" <?php echo ("DESC" == $sort_order) ?'checked="checked"':'' ?> /> Descending</label>
  </p>
</fieldset>
<input type="hidden" id="rs_event_submit" name="rs_event_submit" value="1" />
    
    <?php
	}
	
	register_widget_control('RS Event', 'widget_rs_event_control', 700, 350);
}

add_action('plugins_loaded', 'widget_rs_event_init');



/*** The standard date_i18n uses machine timezones - BAD! *****************/

function gmdate_i18n($dateformatstring, $unixtimestamp)
{
	global $month, $weekday, $month_abbrev, $weekday_abbrev;
	$i = $unixtimestamp;
	if ((!empty($month)) && (!empty($weekday)))
  {
		$datemonth = $month[gmdate('m', $i)]; /* 0.9.6: fixed to properly use gmdate */
		$datemonth_abbrev = $month_abbrev[$datemonth];
		$dateweekday = $weekday[gmdate('w', $i)]; /* 0.9.6: ditto */
		$dateweekday_abbrev = $weekday_abbrev[$dateweekday];
		$dateformatstring = ' '.$dateformatstring;
		$dateformatstring = preg_replace("/([^\\\])D/", "\${1}".backslashit($dateweekday_abbrev), $dateformatstring);
		$dateformatstring = preg_replace("/([^\\\])F/", "\${1}".backslashit($datemonth), $dateformatstring);
		$dateformatstring = preg_replace("/([^\\\])l/", "\${1}".backslashit($dateweekday), $dateformatstring);
		$dateformatstring = preg_replace("/([^\\\])M/", "\${1}".backslashit($datemonth_abbrev), $dateformatstring);
		$dateformatstring = substr($dateformatstring, 1, strlen($dateformatstring)-1);
	}
	$j = @gmdate($dateformatstring, $i);
	return $j;
}

?>