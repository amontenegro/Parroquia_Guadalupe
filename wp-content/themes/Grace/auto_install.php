<?php
set_time_limit(0);
global  $wpdb;
//require_once (TEMPLATEPATH . '/delete_data.php');

/////////////// TERMS & products START ///////////////
$category_array = array('Blog','Our Ministries','Upcoming Events');
$dummy_image_path = get_template_directory_uri().'/images/dummy/';

$post_array = array();
$post_author = $wpdb->get_var("SELECT ID FROM $wpdb->users order by ID asc limit 1");
$post_info = array();
$post_info[] = array(
					"post_title"	=>	'Sample Lorem Ipsum Post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'another sample post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Sample Blog Post',
					"post_content"	=>	'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
					);
$post_info[] = array(
					"post_title"	=>	'What is Lorem Ipsum?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Letraset sheets',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Why do we use it?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);				
$post_array['Blog'] = $post_info;
//====================================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'01.png',	
			);
$post_info[] = array(
					"post_title"	=>	'Womens Group',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'02.png',
				);
$post_info[] = array(
					"post_title"	=>	'Robles Community Group',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'03.png',
				);
$post_info[] = array(
					"post_title"	=>	'Women Bible Study',
					"post_content"	=>	'Aorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'01.png',
				);
$post_info[] = array(
					"post_title"	=>	'Small Group Events',
					"post_content"	=>	'Qorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'02.png',
				);
$post_info[] = array(
					"post_title"	=>	'Mens Breakfast',
					"post_content"	=>	'Qorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.
					
					Qorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 5 end///

$post_array['Our Ministries'] = $post_info;
//===============================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'01.png',	
					"rs_event"		=>	mktime(date('h'),date('i'),date('s'),date('m')+1,date('d'),date('Y')).'n',
			);
$post_info[] = array(
					"post_title"	=>	'Womens Group',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'02.png',
					"rs_event"		=>	mktime(date('h'),date('i'),date('s'),date('m')+1,date('d'),date('Y')).'n',
				);
$post_info[] = array(
					"post_title"	=>	'Robles Community Group',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'03.png',
					"rs_event"		=>	mktime(date('h'),date('i'),date('s'),date('m')+1,date('d'),date('Y')).'n',
				);
$post_info[] = array(
					"post_title"	=>	'Women Bible Study',
					"post_content"	=>	'Aorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'01.png',
					"rs_event"		=>	mktime(date('h'),date('i'),date('s'),date('m')+1,date('d'),date('Y')).'n',
				);
$post_info[] = array(
					"post_title"	=>	'Small Group Events',
					"post_content"	=>	'Qorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"image"			=> $dummy_image_path.'02.png',
					"rs_event"		=>	mktime(date('h'),date('i'),date('s'),date('m')+1,date('d'),date('Y')).'n',
				);
$post_info[] = array(
					"post_title"	=>	'Mens Breakfast',
					"post_content"	=>	'Qorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.
					
					Qorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 5 end///

$post_array['Upcoming Events'] = $post_info;
//===============================================================================//

for($c=0;$c<count($category_array);$c++)
{
	$cat_name = $category_array[$c];
	if(is_array($cat_name))
	{
		$parent_cat_id = '0';
		$cat_name_arr = $cat_name;
		for($i=0;$i<count($cat_name_arr);$i++)
		{
			$cat_id = '';
			$cat_name = $cat_name_arr[$i];
			$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$cat_name\"");
			if($cat_id=='')
			{
				$srch_arr = array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
				$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','','');
				$slug = str_replace($srch_arr,$replace_arr,$cat_name);
				$cat_sql = "insert into $wpdb->terms (name,slug) values (\"$cat_name\",\"$slug\")";
				$wpdb->query($cat_sql);
				$last_cat_id = $wpdb->get_var("SELECT max(term_id) FROM $wpdb->terms");
				$cat_id  = $last_cat_id;
				$count = count($post_array[$cat_name]);
				$tt_sql = "insert into $wpdb->term_taxonomy (term_id,taxonomy,parent,count) values (\"$last_cat_id\",'category',\"$parent_cat_id\",\"$count\")";
				$wpdb->query($tt_sql);
				$last_tt_id = $wpdb->get_var("SELECT max(term_taxonomy_id) FROM $wpdb->term_taxonomy");
				if($post_array[$cat_name])
				{
					$post_info_arr = $post_array[$cat_name];
					set_post_info_autorun($post_info_arr);
				}				
			}else
			{
				$last_cat_id = $cat_id;
				$count = count($post_array[$cat_name]);
				$last_tt_id = $wpdb->get_var("SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy tt where tt.term_id=\"$last_cat_id\" and tt.taxonomy='category'");
				if($post_array[$cat_name])
				{
					$post_info_arr = $post_array[$cat_name];
					set_post_info_autorun($post_info_arr);
				}
				$tt_update_sql = "update $wpdb->term_taxonomy set count=count+$count where term_id=\"$last_cat_id\"";
				$wpdb->query($tt_update_sql);
			}
			if($i==0)
			{
				$parent_cat_id = $last_cat_id;
			}
		}
	}else
	{
		$cat_id = '';
		$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$cat_name\"");
		if($cat_id=='')
		{
			$srch_arr = array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
				$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','','');
			$slug = str_replace($srch_arr,$replace_arr,$cat_name);
			$cat_sql = "insert into $wpdb->terms (name,slug) values (\"$cat_name\",\"$slug\")";
			$wpdb->query($cat_sql);
			$last_cat_id = $wpdb->get_var("SELECT max(term_id) FROM $wpdb->terms");
			$count = count($post_array[$cat_name]);
			$parent_cat_id = 0;
			$tt_sql = "insert into $wpdb->term_taxonomy (term_id,taxonomy,parent,count) values (\"$last_cat_id\",'category',\"$parent_cat_id\",\"$count\")";
			$wpdb->query($tt_sql);
			$last_tt_id = $wpdb->get_var("SELECT max(term_taxonomy_id) FROM $wpdb->term_taxonomy");
			if($post_array[$cat_name])
			{
				$post_info_arr = $post_array[$cat_name];
				set_post_info_autorun($post_info_arr);
			}	
		}else
		{
			$last_cat_id = $cat_id;
			$count = count($post_array[$cat_name]);
			$tt_update_sql = "update $wpdb->term_taxonomy set count=count+$count where term_id=\"$last_cat_id\"";
			$wpdb->query($tt_update_sql);
			$last_tt_id = $wpdb->get_var("SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy tt where tt.term_id=\"$last_cat_id\" and tt.taxonomy='category'");
			if($post_array[$cat_name])
			{
				$post_info_arr = $post_array[$cat_name];
				set_post_info_autorun($post_info_arr);
			}
		}
	}
}

$pages_array = array(array('About','Sub Page 1','Sub Page 2'),'Contact Us','Terms of Use','Sample Slider Page','Sample Slider 2','More slides');
$page_info_arr = array();
$page_info_arr['About'] = '
<p>He worshipped this new angel with furtive eye, till he saw that she had discovered him; then he pretended he did not know she was present, and began to show off in all sorts of absurd boyish ways, in order to win her admiration. He kept up this grotesque foolishness for some time; but by-and-by, while he was in the midst of some dangerous gymnastic performances, he glanced aside and saw that the little girl was wending her way toward the house. Tom came up to the fence and leaned on it, grieving, and hoping she would tarry yet awhile longer. She halted a moment on the steps and then moved toward the door. Tom heaved a great sigh as she put her foot on the threshold. But his face
lit up, right away, for she tossed a pansy over the fence a moment before she disappeared.</p>
<p>The boy ran around and stopped within a foot or two of the flower, and then shaded his eyes with his hand and began to look down street as if he had discovered something of interest going on in that direction. Presently he picked up a straw and began trying to balance it on his nose, with his head tilted far back; and as he moved from side to side, in his efforts, he edged nearer and nearer toward the pansy; finally his bare foot rested upon it, his pliant toes closed upon it, and he hopped away with the treasure and disappeared round the corner. But only for a minute–only while he could button the flower inside his jacket, next his heart–or next his stomach, possibly, for he was not much posted in anatomy, and not hypercritical, anyway.</p>
<p>He returned, now, and hung about the fence till nightfall, showing off, as before; but the girl never exhibited herself again, though Tom comforted himself a little with the hope that she had been near some window, meantime, and been aware of his attentions. Finally he strode home reluctantly, with his poor head full of visions.</p>
<p>All through supper his spirits were so high that his aunt wondered what had got into the child. He took a good scolding about clodding Sid, and did not seem to mind it in the least. He tried to steal sugar under his aunts very nose, and got his knuckles rapped for it. He said:</p>
<p>Aunt, you don’t whack Sid when he takes it.</p>
<p>Well, Sid don’t torment a body the way you do. You’d be always into that sugar if I warnt watching you.</p>';
$page_info_arr['Sub Page 1'] = '
<p>He worshipped this new angel with furtive eye, till he saw that she had discovered him; then he pretended he did not know she was present, and began to show off in all sorts of absurd boyish ways, in order to win her admiration. He kept up this grotesque foolishness for some time; but by-and-by, while he was in the midst of some dangerous gymnastic performances, he glanced aside and saw that the little girl was wending her way toward the house. Tom came up to the fence and leaned on it, grieving, and hoping she would tarry yet awhile longer. She halted a moment on the steps and then moved toward the door. Tom heaved a great sigh as she put her foot on the threshold. But his face
lit up, right away, for she tossed a pansy over the fence a moment before she disappeared.</p>
<p>The boy ran around and stopped within a foot or two of the flower, and then shaded his eyes with his hand and began to look down street as if he had discovered something of interest going on in that direction. Presently he picked up a straw and began trying to balance it on his nose, with his head tilted far back; and as he moved from side to side, in his efforts, he edged nearer and nearer toward the pansy; finally his bare foot rested upon it, his pliant toes closed upon it, and he hopped away with the treasure and disappeared round the corner. But only for a minute–only while he could button the flower inside his jacket, next his heart–or next his stomach, possibly, for he was not much posted in anatomy, and not hypercritical, anyway.</p>
<p>He returned, now, and hung about the fence till nightfall, showing off, as before; but the girl never exhibited herself again, though Tom comforted himself a little with the hope that she had been near some window, meantime, and been aware of his attentions. Finally he strode home reluctantly, with his poor head full of visions.</p>
<p>All through supper his spirits were so high that his aunt wondered what had got into the child. He took a good scolding about clodding Sid, and did not seem to mind it in the least. He tried to steal sugar under his aunts very nose, and got his knuckles rapped for it. He said:</p>
<p>Aunt, you don’t whack Sid when he takes it.</p>
<p>Well, Sid don’t torment a body the way you do. You’d be always into that sugar if I warnt watching you.</p>';
$page_info_arr['Sub Page 2'] = '
<p>While he was in the midst of some dangerous gymnastic performances, he glanced aside and saw that the little girl was wending her way toward the house. Tom came up to the fence and leaned on it, grieving, and hoping she would tarry yet awhile longer. She halted a moment on the steps and then moved toward the door. Tom heaved a great sigh as she put her foot on the threshold. But his face  lit up, right away, for she tossed a pansy over the fence a moment before she disappeared.</p>
<p>The boy ran around and stopped within a foot or two of the flower, and then shaded his eyes with his hand and began to look down street as if he had discovered something of interest going on in that direction. Presently he picked up a straw and began trying to balance it on his nose, with his head tilted far back; and as he moved from side to side, in his efforts, he edged nearer and nearer toward the pansy; finally his bare foot rested upon it, his pliant toes closed upon it, and he hopped away with the treasure and disappeared round the corner. But only for a minute–only while he could button the flower inside his jacket, next his heart–or next his stomach, possibly, for he was not much posted in anatomy, and not hypercritical, anyway.</p>
<p>He returned, now, and hung about the fence till nightfall, showing off, as before; but the girl never exhibited herself again, though Tom comforted himself a little with the hope that she had been near some window, meantime, and been aware of his attentions. Finally he strode home reluctantly, with his poor head full of visions.</p>
<p>All through supper his spirits were so high that his aunt wondered what had got into the child. He took a good scolding about clodding Sid, and did not seem to mind it in the least. He tried to steal sugar under his aunts very nose, and got his knuckles rapped for it. He said:</p>
<p>Aunt, you don’t whack Sid when he takes it.</p>
<p>Well, Sid don’t torment a body the way you do. You’d be always into that sugar if I warn’t watching you.</p>';
$page_info_arr['Sub Page 2'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Contact Us'] = '
<div ><img src="'.$dummy_image_path.'googlemap.png"  alt="" class="imgright" /> </div>
<h4> North America </h4>
<p>Company Name here (Main) <br />
401 Elliott Avenue West<br />
Seattle, WA 98119 </p>
<p>Tel.: (206) 272-5555<br />
FAX: (206) 272-5556<br />
Toll Free: (888) 88BIGIP<br />
email: <a href="#">info@company.com</a> </p>
<hr />
<h4> Latin America</h4>
<p>Company Name here (Branch)<br />
401 Elliott Avenue West<br />
Seattle, WA 98119 </p>
<p>Tel.: (206) 272-5555<br />
FAX: (206) 272-5556<br />
Toll Free: (888) 88BIGIP<br />
email: <a href="#">info@company.com</a> </p>
<hr />
<h4>Europe</h4>
<p>Company Name here (Branch)<br />
401 Elliott Avenue West<br />
Seattle, WA 98119</p>
<p>Tel.: (206) 272-5555<br />
FAX: (206) 272-5556<br />
Toll Free: (888) 88BIGIP<br />
email: <a href="#">info@company.com</a></p>
';
$page_info_arr['Terms of Use'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec libero.</p>
<p>Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec libero. </p>
';
$page_info_arr['Sample Slider Page'] = '
<p>Talk about your church and invite people to check out your website, listen to your online sermons, or highlight your latest blog post. If you are looking to bring back site visitors, make this an informative paragraph that links to a more detailed.</p>';
$page_info_key_arr['Sample Slider Page']['image'] = $dummy_image_path.'01.png';
$page_info_key_arr['Sample Slider Page']['button1name'] = 'Learn More';
$page_info_key_arr['Sample Slider Page']['button1url'] = 'http://templatic.com';

$page_info_arr['Sample Slider 2'] = '
<P>You may place almost anything in this slider. Because the content in the slider comes directly from the page you create and assign in the slider. </p>
<ul><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pravesent aliquam</li><li>am blandit quam ut lacus. Quisque ornare risus quis  ligula.</li><li>am blandit quam ut lacus. Quisque ornare risus quis  ligula.</li><li>am blandit quam ut lacus. Quisque ornare risus quis  ligula.</li></ul>';
$page_info_key_arr['Sample Slider 2']['button1name'] = 'Buy this theme';
$page_info_key_arr['Sample Slider 2']['button1url'] = 'http://templatic.com';

$page_info_arr['More slides'] = '
<p>You may create as many slides as you wish. Simply create a new page and assign the page ID in theme control panel. Thats it. The page will automatically appear in the slider here, just like this slide.</p>
<ul><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pravesent aliquam</li><li>Qam blandit quam ut lacus. Quisque ornare risus quis  ligula.</li><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pravesent aliquam</li><li>am blandit quam ut lacus. Quisque ornare risus quis  ligula.</li></ul>';
$page_info_key_arr['More slides']['button1name'] = 'Learn More';
$page_info_key_arr['More slides']['button1url'] = 'http://templatic.com';

set_page_info_autorun($pages_array,$page_info_arr);
function set_page_info_autorun($pages_array,$page_info_arr_arg)
{
	global $post_author,$wpdb,$page_info_key_arr;
	$last_tt_id = 1;
	if(count($pages_array)>0)
	{
		$page_info_arr = array();
		for($p=0;$p<count($pages_array);$p++)
		{
			if(is_array($pages_array[$p]))
			{
				for($i=0;$i<count($pages_array[$p]);$i++)
				{
					$page_info_arr1 = array();
					$page_info_arr1['post_title'] = $pages_array[$p][$i];
					$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p][$i]];
					$page_info_arr1['post_parent'] = $pages_array[$p][0];
					$page_info_arr[] = $page_info_arr1;
				}
			}
			else
			{
				$page_info_arr1 = array();
				$page_info_arr1['post_title'] = $pages_array[$p];
				$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p]];
				$page_info_arr1['post_parent'] = '';
				$page_info_arr[] = $page_info_arr1;
			}
		}

		if($page_info_arr)
		{
			for($j=0;$j<count($page_info_arr);$j++)
			{
				$post_title = $page_info_arr[$j]['post_title'];
				$post_content = addslashes($page_info_arr[$j]['post_content']);
				$post_parent = $page_info_arr[$j]['post_parent'];
				if($post_parent!='')
				{
					$post_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_parent\" and post_type='page'");
				}else
				{
					$post_parent_id = 0;
				}
				$post_date = date('Y-m-d H:s:i');
				$post_name = strtolower(str_replace(array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_','/'),array('','','','','','','','','','','','','','','','','','','','',',','','',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='page'");
				if($post_name_count>0)
				{
					echo '';
				}else
				{
					$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_title,post_content,post_name,post_parent,post_type) values (\"$post_author\", \"$post_date\", \"$post_date\",  \"$post_title\", \"$post_content\", \"$post_name\",\"$post_parent_id\",'page')";
					$wpdb->query($post_sql);
					$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
					$guid = get_option('siteurl')."/?p=$last_post_id";
					$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
					$wpdb->query($guid_sql);
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
					$wpdb->query($ter_relation_sql);
					update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
					if($page_info_key_arr)
					{
						$page_info_key_arr_key = $page_info_key_arr[$post_title];
						if($page_info_key_arr_key)
						{
							foreach($page_info_key_arr_key as $key=>$val)
							{
								if($key)
								{
									update_post_meta( $last_post_id, $key, $val );
								}
							}
						}
					}
				}
			}
		}
	}
}
function set_post_info_autorun($post_info_arr)
{
	if(count($post_info_arr)>0)
	{
		global $last_tt_id,$feature_cat_name,$post_author,$wpdb;
		for($p=0;$p<count($post_info_arr);$p++)
		{
			$post_title = $post_info_arr[$p]['post_title'];
			$post_content = $post_info_arr[$p]['post_content'];
			$post_date = date('Y-m-d H:s:i');
			$post_IDs = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_title\" and post_type='post'");
			if($post_IDs==0)
			{
				$post_name = strtolower(str_replace(array('&amp;',"'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_','/'),array('','','','','','','','','','','','','','','','','','','','',',','','',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name like \"$post_name%\" and post_type='post'");
				if($post_name_count>0)
				{
					$post_name = $post_name.'-'.($post_name_count+1);
				}
				$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
				$wpdb->query($post_sql);
				$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
				$guid = get_option('siteurl')."/?p=$last_post_id";
				$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
				$wpdb->query($guid_sql);
				if($post_info_arr[$p]['post_meta'])
				{
					foreach($post_info_arr[$p]['post_meta'] as $mkey=>$mval)
					{
						update_post_meta( $last_post_id, $mkey, $mval );
					}
				}
				update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				if($post_info_arr[$p]['post_tags'])
				{
					set_post_tag($last_post_id,$post_info_arr[$p]['post_tags']);
				}
				$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
				$wpdb->query($ter_relation_sql);
				$post_feature = $post_info_arr[$p]['post_feature'];
				$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
				
				if($post_feature && $feature_cat_id)
				{
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
					$wpdb->query($ter_relation_sql);
					$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
					$wpdb->query($tt_update_sql);
				}
			}
		}
	}
}
/////////////// TERMS END ///////////////
/////////////// Design Settings START ///////////////
update_option("bizzthemes_alt_stylesheet",'1-default.css');
update_option("bizzthemes_feedburner",'http://feeds2.feedburner.com/templatic');
update_option("bizzthemes_feedburnerid",'templatic/eKPs');

$slider_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'More slides' and post_type='page'");
update_option("pag_exclude_$slider_id",$slider_id);
$slider2_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Sample Slider 2' and post_type='page'");
update_option("pag_exclude_$slider2_id",$slider2_id);
$sample_slider_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Sample Slider Page' and post_type='page'");
update_option("pag_exclude_$sample_slider_id",$sample_slider_id);
$term_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Terms of Use' and post_type='page'");
update_option("pag_exclude_$term_id",$term_id);
$contact_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Contact Us' and post_type='page'");
update_option("pag_exclude_$contact_id",$contact_id);

update_option("cat_exclude_1",1);
/*$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name like 'Asides'");
update_option("cat_exclude_$cat_id",$cat_id);
*/
update_option("bizzthemes_breadcrumbs","true"); 
update_option("bizzthemes_footpages","$contact_id,$term_id");
update_option("bizzthemes_postcontent_full",'true');
update_option("bizzthemes_sliderpages","$sample_slider_id,$slider2_id,$slider_id");
update_option("bizzthemes_featheight",'290');

update_option("bizzthemes_show_ads_top12",'true');
update_option("bizzthemes_ad_image_1",$dummy_image_path.'ad-125x125.png');
update_option("bizzthemes_ad_url_1",'http://www.templatic.com');
update_option("bizzthemes_ad_image_2",$dummy_image_path.'ad-125x125.png');
update_option("bizzthemes_ad_url_2",'http://www.templatic.com');
update_option("bizzthemes_show_ads_top34",'true');
update_option("bizzthemes_ad_image_3",$dummy_image_path.'ad-125x125.png');
update_option("bizzthemes_ad_url_3",'http://www.templatic.com');
update_option("bizzthemes_ad_image_4",$dummy_image_path.'ad-125x125.png');
update_option("bizzthemes_ad_url_4",'http://www.templatic.com');
update_option("bizzthemes_show_ads_top56",'true');
update_option("bizzthemes_ad_image_5",$dummy_image_path.'ad-125x125.png');
update_option("bizzthemes_ad_url_5",'http://www.templatic.com');
update_option("bizzthemes_ad_image_6",$dummy_image_path.'ad-125x125.png');
update_option("bizzthemes_ad_url_6",'http://www.templatic.com');


update_option("bizzthemes_home_name",'Home'); ////
update_option("bizzthemes_search_name",'Search');
update_option("bizzthemes_search_nothing_found",'Nothing found, please search again.');
update_option("bizzthemes_general_tags_name",'Tags');
update_option("bizzthemes_browsing_category",'Browsing Category');
update_option("bizzthemes_browsing_tag",'Browsing Tag');
update_option("bizzthemes_browsing_author",'Browsing Posts of Author');
update_option("bizzthemes_browsing_search",'Browsing Posts filed under Search Term');
update_option("bizzthemes_browsing_day",'Browsing Day');
update_option("bizzthemes_browsing_month",'Browsing Month');
update_option("bizzthemes_browsing_year",'Browsing Year');
update_option("bizzthemes_404error_name",'Error 404 | Nothing found!');
update_option("bizzthemes_404solution_name",'Sorry, but you are looking for something that is not here.');
update_option("bizzthemes_password_protected_name",'This post is password protected. Enter the password to view comments.');
update_option("bizzthemes_comment_responsesa_name",'No Comments');
update_option("bizzthemes_comment_responsesb_name",'One Comment');
update_option("bizzthemes_comment_responsesc_name",'% Comments');
update_option("bizzthemes_comment_trackbacks_name",'Trackbacks For This Post');
update_option("bizzthemes_comment_moderation_name",'Your comment is awaiting moderation.');
update_option("bizzthemes_comment_conversation_name",'Be the first to start a conversation');
update_option("bizzthemes_comment_closed_name",'Comments are closed.');
update_option("bizzthemes_comment_off_name",'Comments are off for this post');
update_option("bizzthemes_comment_reply_name",'Leave a Reply');
update_option("bizzthemes_comment_mustbe_name",'You must be');
update_option("bizzthemes_comment_loggedin_name",'logged in');
update_option("bizzthemes_comment_postcomment_name",'to post a comment.');
update_option("bizzthemes_comment_name_name",'Name');
update_option("bizzthemes_comment_mail_name",'Mail');
update_option("bizzthemes_comment_website_name",'Website');
update_option("bizzthemes_comment_addcomment_name",'Add Comment');
update_option("bizzthemes_comment_justreply_name",'Reply');
update_option("bizzthemes_comment_edit_name",'Edit');
update_option("bizzthemes_comment_delete_name",'Delete');
update_option("bizzthemes_comment_spam_name",'Spam');
update_option("bizzthemes_pagination_first_name",'First');
update_option("bizzthemes_pagination_last_name",'Last');
update_option("bizzthemes_relative_posted",'Posted');
update_option("bizzthemes_relative_ago",'ago');
update_option("bizzthemes_relative_s",'s');
update_option("bizzthemes_relative_year",'year');
update_option("bizzthemes_relative_month",'month');
update_option("bizzthemes_relative_week",'week');
update_option("bizzthemes_relative_day",'day');
update_option("bizzthemes_relative_hour",'hour');
update_option("bizzthemes_relative_minute",'minute');
update_option("bizzthemes_relative_second",'second');
update_option("bizzthemes_relative_moments",'moments');
/////////////// Design Settings END ///////////////

/////////////// WIDGET SETTINGS START ///////////////
$sidebars_widgets = get_option('sidebars_widgets');  //collect widget informations
$event_info = array();
$event_info[1] = array(
					"title"				=>	'Upcoming Events',
					"category"			=>	'',
					"post_number"		=>	'',
					"post_link"			=>	'',
					);
$event_info['_multiwidget'] = '1';
update_option('widget_widget_event_posts',$event_info);
$event_info = get_option('widget_widget_event_posts');
krsort($event_info);
foreach($event_info as $key1=>$val1)
{
	$event_info_key = $key1;
	if(is_int($event_info_key))
	{
		break;
	}
}
$service_info = array();
$service_info = array(
					"title"				=>	'Services',
					"google_map"		=>	'<p><b>SUNDAYS </b><br />
Morning Worship Services <br />
Traditional - 8:15 &amp; 11 a.m. <br />
Contemporary 9:30 a.m.<br />
Sunday School: 9:30 &amp; 11 a.m. </p>

<p><b>WEDNESDAYS</b> <br />
Fellowship Dinner -. 5 p.m. <br />
Children Activities - 6 p.m.<br />
Prayer Meeting, Youth Activities 6:30 p.m.</p>',
					);
$service_info['_multiwidget'] = '1';
update_option('widget_widget_service',$service_info);
$service_info = get_option('widget_widget_service');
krsort($service_info);
foreach($service_info as $key1=>$val1)
{
	$service_info_key = $key1;
	if(is_int($service_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-1"] = array("widget_event_posts-$event_info_key","widget_service-$service_info_key");
//////////////////////////////////////////////////////
$fvideo_info = array();
$fvideo_info[1] = array(
					"title"				=>	'Featured Video',
					"embed_code"		=>	'<object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/__-Bf8IvRfQ&hl=en&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/__-Bf8IvRfQ&hl=en&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>',
					);
$fvideo_info['_multiwidget'] = '1';
update_option('widget_widget_fvideo',$fvideo_info);
$fvideo_info = get_option('widget_widget_fvideo');
krsort($fvideo_info);
foreach($fvideo_info as $key1=>$val1)
{
	$fvideo_info_key = $key1;
	if(is_int($fvideo_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-2"] = array("widget_fvideo-$fvideo_info_key");
//////////////////////////////////////////////////////
$post_info = array();
$Cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name like 'Upcoming Events'");
$post_info[1] = array(
					"title"				=>	'Recent Posts',
					"category"			=>	"$Cat_id",
					"post_number"		=>	'6',
					"post_link"			=>	'',
					);
$post_info['_multiwidget'] = '1';
update_option('widget_widget_posts',$post_info);
$post_info = get_option('widget_widget_posts');
krsort($post_info);
foreach($post_info as $key1=>$val1)
{
	$post_info_key = $key1;
	if(is_int($post_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-3"] = array("widget_posts-$post_info_key");
//////////////////////////////////////////////////////
$post_info = array();
$Cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name like 'Our Ministries'");
$post_info[1] = array(
					"title"				=>	'Our Ministries',
					"category"			=>	"$Cat_id",
					"post_number"		=>	'4',
					"post_link"			=>	'',
					);
$post_info['_multiwidget'] = '1';
update_option('widget_widget_posts4',$post_info);
$post_info = get_option('widget_widget_posts4');
krsort($post_info);
foreach($post_info as $key1=>$val1)
{
	$post_info_key = $key1;
	if(is_int($post_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-4"] = array("widget_posts4-$post_info_key");
//////////////////////////////////////////////////////
$post_info = array();
$post_info[1] = array(
					"title"				=>	'Location',
					"embed_code"		=>	"<p><b>Grace Fellowship Church </b>14400 Dogwood RoadSnellville, GA 30078 <br />Google Map<br />770.979.7000 </p><p>We are located on Dogwood Rd. between Webb Gin House Rd. and Highway 124 (Scenic Highway) in Snellville.  We are about 1/2 mile east of Brookwood High School and clearly visible from Ronald Reagan Parkway. </p>",
					"google_map"		=>	'<img src="'.$dummy_image_path.'googlemap.png" alt="" >',
					);
$post_info['_multiwidget'] = '1';
update_option('widget_widget_location',$post_info);
$post_info = get_option('widget_widget_location');
krsort($post_info);
foreach($post_info as $key1=>$val1)
{
	$post_info_key = $key1;
	if(is_int($post_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-5"] = array("widget_location-$post_info_key");
//////////////////////////////////////////////////////
update_option('sidebars_widgets',$sidebars_widgets);  //save widget iformations
/////////////// WIDGET SETTINGS END ///////////////
?>