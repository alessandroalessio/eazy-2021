jQuery(document).ready(function(){

    // Loading Products
    function loadProducts(){
        jQuery('#product-content-wrapper').addClass('loading');
        jQuery('.all-filter-wrapper').addClass('loading');
        var category = jQuery('#filter-category').val()
        var attribs = jQuery('.filter-attrib');
        // ajaxurl = ajaxurl + '?_embed&tipo_catalogo=' + category;
        var params = {};
        params['action'] = 'catalogue_ajax_request';
        params['tipo_catalogo'] = category;
        for ( i=0; i<attribs.length; i=i+1 ){ 
            if ( jQuery( attribs[i] ).prop('checked')==true ) {
                attribname = 'attr_'+attribs[i].name.replace('[]', '');
                if ( params[ attribname ] ) {
                    params[ attribname ] = params[ attribname ]+'|'+attribs[i].value;
                } else {
                    params[ attribname ] = attribs[i].value;
                }
            }
        }
        console.log(params);
        jQuery.ajax({
            url: ajaxurl,
            data: params,
            success:function(data) {
                jQuery('#product-content-wrapper').html(data).promise().done(function(){
                    jQuery('#product-content-wrapper').removeClass('loading');
                    jQuery('.all-filter-wrapper').removeClass('loading');
                });
            },
            error: function(errorThrown){
                window.alert(errorThrown);
            }
        });
    }

    // Manage select of Sub Category
    jQuery('.sub-category-wrapper a').bind('click', function(event){
        event.preventDefault();
        jQuery('.sub-category-wrapper a').removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('#filter-category').val( jQuery(this).attr('data-category') );
        loadProducts();
    });

    // Check box on li
    jQuery('.filter-wrapper li').bind('click', function(){
        var $checkBox = jQuery(this).find('input[type=checkbox]');
        if ($checkBox.prop('checked')==true) {
            $checkBox.prop('checked', false);
        } else {
            $checkBox.prop('checked', true);
        }
        loadProducts();
    });

    // Reset Attributes
    jQuery('#reset-filter').bind('click', function(){
        jQuery('.filter-wrapper li').find('input[type=checkbox]').prop('checked', false);
        loadProducts();
    });

});