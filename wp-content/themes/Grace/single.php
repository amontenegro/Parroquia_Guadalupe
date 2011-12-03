<?php get_header(); ?>

<div class="breadcrumb_top ">
	<div class="breadcrumb_bottom container_12">
    	 <h1> <?php the_title(); ?> </h1>
         <?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<div class="breadcrumb">','</div>'); } ?>
         
     </div>
</div> <!-- breadcrumbs #end -->

<div id="wrapper" class=" container_12 clearfix">
  <div id="content"  class="grid_8">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
   
    <div id="post-<?php the_ID(); ?>" class="posts clearfix page">
      <div class="post_top">
        <div class="post_title clearfix"> <span class="post_comments"><a href="#comments">
          <?php comments_number('0', '1', '%'); ?>
          </a></span>
          <div class="post_top">
            <h3>
              <?php the_title(); ?>
            </h3>
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
            <div class="post_img clearfix">
                <img src="<?php echo get_post_meta($post->ID, "image"); ?>" alt="<?php the_title(); ?>" class="fl"/>
            </div>
         <?php } ?>
        
         
        <?php the_content(); ?>
        
        
        <?php if (get_post_meta($post->ID, "time", true)) { ?>
          <p class="event_time"><b>Event Time Schedule :</b> <?php echo get_post_meta($post->ID, "time", true); ?> </p>
          <?php } ?>
        
      </div>
    </div>
    <!--/posts-->
    
    <!-- AdSense Comments: START -->
    <?php if (get_option('bizzthemes_comment_adsense') <> "") { ?>
    <br/>
    <div class="adsense-468"> <?php echo stripslashes(get_option('bizzthemes_comment_adsense')); ?> </div>
    <br/>
    <br/>
    <?php } ?>
    <!-- AdSense Comments: END -->
    <div class="fix"></div>
    <div id="comments">
      <?php comments_template(); ?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <!--/content -->
  <?php get_sidebar(); ?>
</div>
<!--/container_12 -->
<?php get_footer(); ?>
