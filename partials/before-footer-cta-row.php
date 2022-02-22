<?php 
global $forza_riga_contatti;
$mostra_riga_cta_contatti = get_field('mostra_riga_cta_contatti', get_the_ID());
if ( (isset($mostra_riga_cta_contatti) && $mostra_riga_cta_contatti===true) || isset($forza_riga_contatti) && $forza_riga_contatti===true ) : ?>
    <div class="before-footer-cta-row-wrapper" style="background-image: url('<?php echo eazy_get_option('before_footer_bg'); ?>');" >
        <div class="container">
            <div class="row">
                <div class="col-12 text-center before-footer-text">
                    <?php echo eazy_get_option('before_footer_text'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6 before-footer-email-wrapper">
                    <a href="mailto:<?php echo eazy_get_option('contacts_email'); ?>" title="Scrivici" class="border border-white button-phone">Scrivici <ion-icon name="mail-outline"></ion-icon></a>
                </div>
                <div class="col-6 before-footer-phone-wrapper">
                    <a href="tel:<?php echo eazy_get_option('contacts_phone'); ?>" title="Chiamaci" class="border border-white button-phone">Chiamaci <ion-icon name="call-outline"></ion-icon></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>