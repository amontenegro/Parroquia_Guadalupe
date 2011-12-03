<?php get_header(); ?>
<?php if (is_paged()) $is_paged = true; ?>
<?php
		
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
			
	?>
    
    <div class="breadcrumb_top ">
	<div class="breadcrumb_bottom container_12">
    	  <?php if (is_category()) { ?>
        <h1><?php echo single_cat_title(); ?></h1>
        <?php } elseif (is_day()) { ?>
        <h1>
          <?php the_time('F jS, Y'); ?>
        </h1>
        <?php } elseif (is_month()) { ?>
        <h1>
          <?php the_time('F, Y'); ?>
        </h1>
        <?php } elseif (is_year()) { ?>
        <h1>
          <?php the_time('Y'); ?>
        </h1>
        <?php } elseif (is_author()) { ?>
        <h1><?php echo $curauth->nickname; ?></h1>
        <?php } elseif (is_tag()) { ?>
        <h1><?php echo single_tag_title('', true); ?></h1>
        <?php } elseif (is_search()) { ?>
        <h1><?php printf(__('%s'), $s) ?></h1>
        <?php } ?>
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
      <?php if ( get_option( 'bizzthemes_commentcount' )) { ?>
      <?php } ?>
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
        
         <?php  //to check against expiration date; 
        $timestamp = strtotime("now + 8 hours");  
        $currentdate = date('YmdHis', $timestamp);
        $expirationdate = get_post_custom_values('eventdate');
        if (is_null($expirationdate)) {	
                    $expirestring = '30005050235959'; //MAKE UN-EXPIRING POSTS ALWAYS SHOW UP;
        } else { 
          
        if (is_array($expirationdate)) {	
                                $expirestringarray = implode($expirationdate);	
                                }
        $markup = array("/",":"," ");
        $expirestring = str_replace($markup,"",$expirestringarray);
        } //else 
        if (( $expirestring > $currentdate ) || (is_archive())) { ?>
        
        
        
        <?php if (get_post_meta($post->ID, "eventdate", true)) { ?>
          <p class="event_time"><b>Event Time Schedule :</b> <?php echo get_post_meta($post->ID, "eventdate", true); ?> </p>
          <?php } ?>
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
