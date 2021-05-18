<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
        <?php echo get_template_part('partials/footer', 'logo'); ?>
      </div>
      <div class="col-md-9 footer-text">
        <?php eazy_option('footer_text') ?>
      </div>
      <div class="col-md-2 footer-icons">
        <?php if ( eazy_get_option('contacts_fb') ) : ?><a href="<?php eazy_option('contacts_fb') ?>" title="<?php echo esc_attr( __('Facebook', 'eazytheme') ) ?>" class="icon-social x2" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
        <?php if ( eazy_get_option('contacts_ig') ) : ?><a href="<?php eazy_option('contacts_ig') ?>" title="<?php echo esc_attr( __('Instagram', 'eazytheme') ) ?>" class="icon-social x2" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>