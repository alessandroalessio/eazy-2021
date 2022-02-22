<?php 
$whatsapp_number = str_replace('http://', '', eazy_get_option('contacts_whatsapp'));
if ( $whatsapp_number!='' ) : ?>
    <a class="icon-whatsapp" href="https://wa.me/<?php echo $whatsapp_number; ?>" target="_blank" title="Whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>
<?php endif; ?>