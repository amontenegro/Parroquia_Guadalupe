<?php get_header(); ?>
<?php if (is_paged()) $is_paged = true; ?>

<div class="breadcrumb_top ">
	<div class="breadcrumb_bottom container_12">
    	 <h1> <?php the_title(); ?> </h1>
         <?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<div class="breadcrumb">','</div>'); } ?>
         
     </div>
</div> <!-- breadcrumbs #end -->

<div id="wrapper" class=" container_12 clearfix">
  <div id="content"  class="grid_8">
 
    <!-- AdSense Search: START -->
    <?php if (get_option('bizzthemes_search_adsense') <> "") { ?>
    <br/>
    <div class="adsense-468"> <?php echo stripslashes(get_option('bizzthemes_search_adsense')); ?> </div>
    <br/>
    <?php } ?>
    <!-- AdSense Search: END -->
    <div class="fix"></div>
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
    <div id="post-<?php the_ID(); ?>" class="posts clearfix page">
      <div class="post_top">
        <div class="post_title clearfix"> <span class="post_comments"><a href="#comments">
          <?php comments_number('0', '1', '%'); ?>
          </a></span>
          <div class="post_top">
            <h3> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
              </a> </h3>
            <p class="postedby"> Posted on <span class="month">
              <?php the_time('M'); ?>
              </span>
              <?php the_time('d'); ?>
              ,
              <?php the_time('Y'); ?>
              in <span class="category">
              <?php the_category(" &amp; "); ?>
              </span></p>
          </div>
        </div>
      </div>
      <!-- posttop #end -->
      <div class="post_content">
       <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
       <div class="post_img clearfix"> <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;w=300&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>"    />   
         </div>
         <?php } ?>
         
        <?php if ( get_option( 'bizzthemes_postcontent_full' )) { ?>
        <?php the_content(); ?>
        <?php } else { ?>
        <?php the_excerpt(); ?>
        <?php } ?>
        
        <?php if (get_post_meta($post->ID, "time", true)) { ?>
          <p class="event_time"><b>Event Time Schedule :</b> <?php echo get_post_meta($post->ID, "time", true); ?> </p>
          <?php } ?>
        
      </div>
    </div>
    <!--/posts-->
    <?php endwhile; ?>
    <div class="pagination">
      <?php if (function_exists('wp_pagenavi')) { ?>
      <?php wp_pagenavi(); ?>
      <?php } ?>
    </div>
    <?php endif; ?>
  </div>
  <!--/content -->
  <?php get_sidebar(); ?>
</div>
<!--/container_12 -->
<?php get_footer(); ?>
