<?php
/*
Template Name: Gallery Listing Page
*/
?>
<?php get_header(); ?>
<?php $is_page = true; ?>

<div class="container_16 page_wrap">
  <div id="content" class="grid_9">
    <?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<div class="breadcrumb">','</div>'); } ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <!-- Category Archive Start -->
    <?php 
	
	    $catQuery =  get_categories('include=9999999' . get_inc_categories("cat_exclude_") .''); 
	      
		$catCounter = 0;
		
		foreach ($catQuery as $category) {

		$catCounter++;

		$catLink = get_category_link($category->cat_id);

		echo '<h4>'.$category->name.'</h4>';
		
			echo '<ul class="gallerylist">';

			query_posts('cat='.$category->term_id.'&showposts=5');?>
    <?php while (have_posts()) : the_post(); ?>
    <li>
      <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
      <a title="Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=150&amp;w=240&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>"  /> <span class="hide-me">
      <?php the_title(); ?>
      </span> </a> <a href="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" rel="lightbox" title="<?php the_title(); ?>" class="i_zoom"> <img src="<?php echo bloginfo('template_url'); ?>/images/i_zoom.png" alt="" /> </a>
      <?php } ?>
    </li>
    <?php endwhile; ?>
    </ul>
    <?php }	?>
    <!-- Category Archive End -->
  </div>
  <!--/content -->
  <?php get_sidebar(); ?>
</div>
<!--/container_12 -->
<?php get_footer(); ?>
