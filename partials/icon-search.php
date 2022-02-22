<?php 
$icon_search_header = true;//str_replace('http://', '', eazy_get_option('contacts_whatsapp'));
if ( $icon_search_header!='' ) : ?>
    <a class="icon-search icon-header" href="#" target="_blank" title="Cerca">
        <ion-icon name="search-outline"></ion-icon>
    </a>
<?php endif; ?>