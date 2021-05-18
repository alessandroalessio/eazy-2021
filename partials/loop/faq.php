<div class="tab">
    <input type="checkbox" id="chck<?php the_ID() ?>">
    <label class="tab-label" for="chck<?php the_ID() ?>"><?php the_title(); ?></label>
    <div class="tab-content">
        <?php the_content(); ?>
    </div>
</div>
