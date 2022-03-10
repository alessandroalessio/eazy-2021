<div class="repeatable-elements">
    <div class="container">
        <div class="row">
            <?php
            for ($i=1; $i<=100; $i++) :
                $el = get_field('page_repeatable_elements_'.$i);
                if ( !is_array($el) || count($el)==0 ) break;

                if ( !$args['template'] ) {
                    ?>
                    <div class="col-md-6">
                        <a href="<?php echo ( $el['link']!='' ) ? $el['link'] : '#'; ?>" class="d-block position-relative">
                            <?php
                            // Image
                            $image = wp_get_attachment_image_url($el['image'], '620x400');
                            eazy_img($image);
                            ?>
                            <div class="overlay">
                                <h4 class="title"><?php echo $el['title'] ?></h4>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            endfor;
            ?>
        </div>
    </div>
</div>