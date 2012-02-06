  </div>

  <!-- Footer: START -->
  <div id="footer" class="container_12" >
    <div class="copyright">
      <p class="fl">&copy;
        <?php the_time('Y'); ?>
        <?php bloginfo(); ?>, todos los derechos reservados.
        <br/>
      <div class="fr">
        <?php if ( get_option('bizzthemes_footpages') <> "" ) { ?>
        <ul>
          <?php wp_list_pages('title_li=&depth=0&include=' . get_option('bizzthemes_footpages') .'&sort_column=menu_order'); ?>
        </ul>
        <?php } ?>
      </div>
    </div>
    <!--/copyright -->
  </div>
  <!--/footer -->
  <!-- Footer: END -->
  <?php wp_footer(); ?>
  <script src="<?php bloginfo('template_directory'); ?>/library/js/slimbox.js" type="text/javascript"></script>
  <?php if ( get_option('bizzthemes_google_analytics') <> "" ) { echo stripslashes(get_option('bizzthemes_google_analytics')); } ?>

     </div>
</body></html>







