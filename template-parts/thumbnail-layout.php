<figure>
  <?php //if(has_post_thumbnail()): the_post_thumbnail(); else: ?>
    <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
  <?php //endif; ?>
  <figcaption>
    <a href="<?php the_permalink(); ?>">
        <p><?php the_title(); ?></p>
    </a>
  </figcaption>
   <a href="<?php the_permalink(); ?>">
      <div class="thumb-hover">
        <span class="btn btn-primary">Download</span>
      </div>
    </a>
</figure>
