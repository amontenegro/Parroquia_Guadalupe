 <?php  include(TEMPLATEPATH . '/library/includes/featured-slider.php'); ?>

<div id="wrapper" class=" container_12 clearfix">
 
		 <?php global $is_home; ?>

		<?php if ( $is_home ) { ?>
 
 	<?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(3) || is_sidebar_active(4) || is_sidebar_active(5)) ) { // Don't show on the front page ?>
  

  		<div id="content"  class="grid_8">
         	  <div class="widget-spot grid_4" >
   			    <?php dynamic_sidebar(3);  ?>	
 		    </div>
            
              <div class="widget-spot grid_4 ">
 			    <?php dynamic_sidebar(4);  ?>	
 		    </div>
            
              <div class="widget-spot ">
 			    <?php dynamic_sidebar(5);  ?>	
 		    </div>
            
            
        </div>
  		 
              <?php } ?>
	<?php } ?>
            
 	
      <?php get_sidebar(); ?>
 
</div> <!-- wrapper #end -->






