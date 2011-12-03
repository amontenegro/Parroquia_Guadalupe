<div id="banner" class="clearfix" >
  <div class="banner_top">
    <div class="banner_bottom clearfix">
      <?php
	// Split the featured pages from the options, and put in an array
	$sliderpages = get_option('bizzthemes_sliderpages');
	$sliderarray=split(",",$sliderpages);
	$sliderarray = array_diff($sliderarray, array(""));
	
    if ( get_option('bizzthemes_imgslideheight') != "") { $slideimgheight = get_option('bizzthemes_imgslideheight'); } else { $slideimgheight = "250"; };
	if ( get_option('bizzthemes_imgslidewidth') != "") { $slideimgwidth = get_option('bizzthemes_imgslidewidth'); } else { $slideimgwidth = "350"; };
	
?>
      <div class="featslider">
        <div class="wrap-slider">
          <div class=" stepcarousel" id="mygallery" <?php if ( get_option('bizzthemes_featheight') != "") { ?>style="height: <?php echo get_option('bizzthemes_featheight');  ?>px"<?php } ?>>
            <div class="belt">
              <?php foreach ( $sliderarray as $featitem ) { ?>
              <?php query_posts('page_id=' . $featitem); ?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="panel">
                <div class="slider-post">
                  <div class="slider-title">
                    <?php the_title(); ?>
                  </div>
                  <?php if (get_post_meta($post->ID, "image", true)) { ?>
                  <a title="<?php the_title(); ?>" href="<?php echo get_post_meta($post->ID, "url", true); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php echo $slideimgheight; ?>&amp;w=<?php echo $slideimgwidth; ?>&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="fl" /></a>
                  <?php } ?>
                  <?php the_content(); ?>
                   <div id="action" >
                  <?php if (get_post_meta($post->ID, "button1name", true)) { ?>
                  <a class="button" title="<?php echo get_post_meta($post->ID, "button1name", true); ?>" href="<?php echo get_post_meta($post->ID, "button1url", true); ?>"><?php echo get_post_meta($post->ID, "button1name", true); ?> &raquo;</a>   
                  <?php } ?>
                  
                  
                   <?php if (get_post_meta($post->ID, "button2name", true)) { ?>
                 <a class="button" title="<?php echo get_post_meta($post->ID, "button2name", true); ?>" href="<?php echo get_post_meta($post->ID, "button2url", true); ?>"><?php echo get_post_meta($post->ID, "button2name", true); ?> &raquo;</a> 
                 
                
                   <?php } ?>
                  
                   </div>
                 
                  <div class="clear">
                    <!---->
                  </div>
                </div>
                <!--/post -->
              </div>
              <!--/panel -->
              <?php endwhile; endif; } ?>
            </div>
            <!--/belt -->
          </div>
          <!--/stepcarousel -->
          
            <div class="featured-button-r b_next" <?php if ( get_option('bizzthemes_featheight') != "") { ?>style="top: <?php echo (get_option('bizzthemes_featheight') / 2); ?>px"<?php } ?>><a href="javascript:stepcarousel.stepBy('mygallery', 1)">Next</a></div>
              <div class="featured-button-l b_previous" <?php if ( get_option('bizzthemes_featheight') <> "") { ?>style="top: <?php echo (get_option('bizzthemes_featheight') / 2); ?>px"<?php } ?>><a href="javascript:stepcarousel.stepBy('mygallery', -1)">Previous </a></div>

          
          
          
          
         
         
          <div class="clearfix">
            <!---->
          </div>
        </div>
      </div>
    
      
      
       <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>
    
   
      
    
    </div> <!-- banner bottom #end -->
  </div>  <!-- banner top #end -->
</div> <!-- banner #end -->
