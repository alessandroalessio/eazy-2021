<section class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-6 left">
				<?php if ( eazy_get_option('contacts_email') ) : ?><a href="mailto:<?php eazy_option('contacts_email') ?>" title="<?php echo esc_attr( __('Email', 'eazytheme') ) ?>"><i class="far fa-envelope"></i> <span class="label"><?php eazy_option('contacts_email') ?></span></a><?php endif; ?>
				<?php if ( eazy_get_option('contacts_phone') ) : ?><a href="tel:<?php eazy_option('contacts_phone') ?>" title="<?php echo esc_attr( __('Phone', 'eazytheme') ) ?>"><i class="fas fa-phone-alt"></i> <span class="label"><?php eazy_option('contacts_phone') ?></span></a><?php endif; ?>
			</div>
			<div class="col-6 right">
			<?php if ( eazy_get_option('contacts_fb') ) : ?><a href="<?php eazy_option('contacts_fb') ?>" title="<?php echo esc_attr( __('Facebook', 'eazytheme') ) ?>" class="icon-social" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
			<?php if ( eazy_get_option('contacts_ig') ) : ?><a href="<?php eazy_option('contacts_ig') ?>" title="<?php echo esc_attr( __('Instagram', 'eazytheme') ) ?>" class="icon-social" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
			</div>
		</div>
	</div>
</section>