<div class="tab">
    <input type="checkbox" id="chck<?php the_ID() ?>">
    <div class="d-flex">
      <div class="square-container">◼</div>
      <div class="content-container">
        <label class="tab-label before-square" for="chck<?php the_ID() ?>"><?php the_title(); ?></label>
        <div class="tab-content">
            <?php the_content(); ?>
        </div>
      </div>
    </div>
</div>
