<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62446c0ff3d20',
        'title' => 'Info Extra - Pagina Onepage',
        'fields' => array(
            array(
                'key' => 'field_62446c1d29c15',
                'label' => 'Modulo di contatto',
                'name' => 'contact_form',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'wpcf7_contact_form',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/page-onepage.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
endif;		
?>