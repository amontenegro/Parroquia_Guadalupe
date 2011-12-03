<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>
<?php if ( is_home() ) { ?>
<?php bloginfo('description'); ?>
&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_search() ) { ?>
Search Results&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_author() ) { ?>
Author Archives&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php wp_title(''); ?>
<?php } ?>
<?php if ( is_page() ) { ?>
<?php wp_title(''); ?>
<?php } ?>
<?php if ( is_category() ) { ?>
<?php single_cat_title(); ?>
&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_month() ) { ?>
<?php the_time('F'); ?>
&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
<?php bloginfo('name'); ?>
&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;
<?php single_tag_title("", true); } } ?>
</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_home()) { ?>
<?php if ( get_option('bizzthemes_meta_description') <> "" ) { ?>
<meta name="description" content="<?php echo stripslashes(get_option('bizzthemes_meta_description')); ?>" />
<?php } ?>
<?php if ( get_option('bizzthemes_meta_keywords') <> "" ) { ?>
<meta name="keywords" content="<?php echo stripslashes(get_option('bizzthemes_meta_keywords')); ?>" />
<?php } ?>
<?php if ( get_option('bizzthemes_meta_author') <> "" ) { ?>
<meta name="author" content="<?php echo stripslashes(get_option('bizzthemes_meta_author')); ?>" />
<?php } ?>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<?php if ( get_option('bizzthemes_favicon') <> "" ) { ?>
<link rel="icon" type="image/png" href="<?php echo get_option('bizzthemes_favicon'); ?>" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('bizzthemes_feedburner_url') <> "" ) { echo get_option('bizzthemes_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 7]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/pngfix.js"></script>
<![endif]-->
<?php if ( get_option('bizzthemes_scripts_header') <> "" ) { echo stripslashes(get_option('bizzthemes_scripts_header')); } ?>
<?php wp_enqueue_script('jquery'); ?>
<?php if (is_home()) {

	  wp_enqueue_script( 'stepcarousel', get_bloginfo('template_directory').'/library/js/stepcarousel.js', array( 'jquery' ) );

	  wp_enqueue_script( 'stepcarousel-setup', get_bloginfo('template_directory').'/library/js/stepcarousel-setup.js', array( 'jquery' ) );
	}
?>
<?php wp_head(); ?>

<?php if ( get_option('bizzthemes_customcss') ) { ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css">
<?php } ?>
</head>
<body>
<div id="page"  >
     <div  id="header">
     	<div class="container_12" >
      <div class="h_left" id="logo-spot">
        <?php if ( get_option('bizzthemes_show_blog_title') ) { ?>
        <div class="blog-title"><a href="<?php echo get_option('home'); ?>/">
          <?php bloginfo('name'); ?>
          </a></div>
        <div class="blog-description">
          <?php bloginfo('description'); ?>
        </div>
        <?php } else { ?>
        <h1 class="logo"> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"> <img src="<?php if ( get_option('bizzthemes_logo_url') <> "" ) { echo get_option('bizzthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo.png'; } ?>" alt="<?php bloginfo('name'); ?>" /> </a> </h1>
        <!--/logo-->
        <?php } ?>
      </div>
      <!--/logo-spot-->
      
        <p class="slogan"><?php bloginfo('description'); ?> </p>
      
       
     </div>
  </div>
  <!-- header  #end -->
  <?php
		global $wpdb;
		$blogcatname = get_option('bizzthemes_blogcategory');
		$cat_id = $wpdb->get_var("SELECT term_ID FROM $wpdb->terms WHERE name = '$blogcatname'");
    ?>
  <div id="nav-menu" class="clearfix">
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Navigation') ){}else{  ?>	
    <ul >
      <li class="hometab <?php if ( is_home() ) { ?>current_page_item <?php } ?>"><a href="<?php echo get_option('home'); ?>/"><?php echo get_option('bizzthemes_home_name'); ?></a></li>
      <?php wp_list_pages('title_li=&depth=0&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
      
	<?php wp_list_categories('title_li=&exclude=9999999' . get_inc_categories("cat_exclude_") .''); ?>
       
    </ul>
    <?php }?>
    <!--/page-menu-->
  </div>
</div>
<!-- header top #end -->
