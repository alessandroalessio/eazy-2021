<?php echo get_template_part('partials/before-footer-cta-row') ?>

<footer class="footer">
  <?php if ( is_active_sidebar( 'prefooter' ) && eazy_get_option('prefooter_show') ) : ?>
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <?php dynamic_sidebar( 'prefooter' ); ?>
          <div class="col footer-icons">
            <?php if ( eazy_get_option('contacts_fb') ) : ?><a href="<?php eazy_option('contacts_fb') ?>" title="<?php echo esc_attr( __('Facebook', 'eazytheme') ) ?>" class="icon-social x2" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/build/img/social/facebook.svg" width="12" height="12"></a><?php endif; ?>
            <?php if ( eazy_get_option('contacts_ig') ) : ?><a href="<?php eazy_option('contacts_ig') ?>" title="<?php echo esc_attr( __('Instagram', 'eazytheme') ) ?>" class="icon-social x2" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/build/img/social/instagram.svg" width="12" height="12"></a><?php endif; ?>
            <?php if ( eazy_get_option('contacts_lk') ) : ?><a href="<?php eazy_option('contacts_lk') ?>" title="<?php echo esc_attr( __('Linkedin', 'eazytheme') ) ?>" class="icon-social x2" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/build/img/social/linkedin.svg" width="12" height="12"></a><?php endif; ?>
            <?php if ( eazy_get_option('contacts_yt') ) : ?><a href="<?php eazy_option('contacts_yt') ?>" title="<?php echo esc_attr( __('YouTube', 'eazytheme') ) ?>" class="icon-social x2" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/build/img/social/youtube.svg" width="12" height="12"></a><?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="container pb-4">
    <div class="row align-items-center">
      <?php if ( eazy_get_option('footer_logo') ) : ?>
        <div class="col-md-1">
          <?php echo get_template_part('partials/footer', 'logo'); ?>
        </div>
      <?php endif; ?>
      <div class="col-12 footer-text text-center">
        <div><?php eazy_option('footer_text') ?></div>
        <div><?php echo do_shortcode('[social_icons][/social_icons]'); ?></div>
      </div>
      <!-- <div class="col-md-6 right">
        <div class="footer-nav-wrapper">
          <?php echo get_template_part('partials/footer', 'navbar'); ?>
        </div>
      </div> -->
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
<?php if ( is_page_template() && eazy_get_page_template_slug_clean()=='page-sedi'  ) { ?>
  <?php get_template_part('partials/google-maps-include-api-key'); ?>
<?php } ?>

</body>
</html>