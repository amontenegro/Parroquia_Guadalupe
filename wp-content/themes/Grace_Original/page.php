<?php get_header(); ?>


<div class="breadcrumb_top ">
	<div class="breadcrumb_bottom container_12">
    	 <h1> <?php the_title(); ?> </h1>
         <?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<div class="breadcrumb">','</div>'); } ?>
         
     </div>
</div>  <!-- breadcrumbs #end -->

<div id="wrapper" class=" container_12 clearfix">
  	<div id="content"  class="grid_8">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
    <div id="post-<?php the_ID(); ?>" class="page">
     
      <?php the_content(); ?>
    </div>

  <!--/post-->
  <?php endwhile; else : ?>
  <div class="post box">
    <div class="entry-head">
      <h2><?php echo get_option('bizzthemes_404error_name'); ?></h2>
    </div>
    <div class="entry-content">
      <p><?php echo get_option('bizzthemes_404solution_name'); ?></p>
    </div>
  </div>
  <?php endif; ?>
    </div>
  
   <?php get_sidebar(); ?>
  
</div> <!-- wrapper #end -->

<?php get_footer(); ?>
