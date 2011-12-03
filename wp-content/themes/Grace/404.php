<?php get_header(); ?>

<div class="breadcrumb_top ">
	<div class="breadcrumb_bottom container_12">
    	  <h1>404 Page</h1>
         <?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<div class="breadcrumb">','</div>'); } ?>
         
     </div>
</div> <!-- breadcrumbs #end -->


<div id="wrapper" class=" container_12 clearfix">

<div id="content" class="grid_8">
   <div class="pagespot">
    <div class="post archive-spot">
      <h2><?php echo get_option('bizzthemes_404error_name'); ?></h2>
      <div class="cat-spot">
        <p><?php echo get_option('bizzthemes_404solution_name'); ?></p>
      </div>
      <div class="fix"></div>
    </div>
    <!--/post-->
  </div>
  <!--/pagespot -->
</div>
<!--/grid_12 -->
<?php get_sidebar(); ?>
</div>
<!--/container_12 -->
<?php get_footer(); ?>
