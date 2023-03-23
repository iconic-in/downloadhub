
<?php dynamic_sidebar('sidebar'); ?>

<div class="widget-title">
    <i class="material-icons">&#xE1BD;</i>
    <span class="material-text">
        Categories
    </span>
</div>
<div class="widget-body widget-category">
    <ul class="list-group">
        <?php

        $categories = get_categories( array(
              'orderby' => 'name',
              'order'   => 'ASC'
          ));

       foreach ($categories as $category) {

         echo '<a href="'.get_category_link($category->term_id).'" class="list-group-item col-sm-6">
              '.$category->name.'
            </a>';

        }
        ?>
        <div class="clearfix"></div>
    </ul>
</div>
<div class="widget-title">
    <i class="material-icons">&#xE05E;</i>
    <span class="material-text">
        Recent Posts
    </span>
</div>
<div class="widget-body widget-recent thumbnail-wrapper">
    <?php 
      $query_args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 12,
                'order' => 'DESC',
                'orderby' => 'date',
                );
      $recent_data = new WP_Query($query_args);

      while($recent_data->have_posts()): $recent_data->the_post(); ?>

        <div class="thumb col-md-4 col-sm-4 col-xs-6">
            <?php get_template_part('template-parts/thumbnail', 'layout'); ?>
       </div>
       
    <?php endwhile; ?> 
    <div class="clearfix"></div>
</div>
