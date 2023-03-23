<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<div class="row">

<section class="left-wrapper col-md-8">
    <h1 class="page-title">
        <i class="material-icons">&#xE02C;</i>
        <span class="material-text">
            <?php the_title(); ?>
        </span>
    </h1>

    <div class="page-meta">
        <span>
          <i class="material-icons">&#xE916;</i>
          <em class="material-text"><?php echo the_date(); ?></em>
        </span>
        <?php 

        $categories = get_the_category(get_the_ID());
        $tags = wp_get_post_tags(get_the_ID());

        $tags_array = array_merge($categories, $tags);

         foreach ($tags_array as $k) {

            $folder = ($k->taxonomy == 'category')? 'category' : 'tag';
            
            echo '<a href="/'.$folder.'/'.$k->slug.'">
                    <i class="material-icons">&#xE2C7;</i>
                    <em class="material-text">'.ucwords($k->name).'</em>
                  </a>';
        }

        ?>
    </div>
    
    <main class="page-body">
        <?php the_content(); ?>
    </main>

    <?php get_template_part('template-parts/comment', 'layout'); ?>

    <h3 class="page-title">
        <i class="material-icons">&#xE06E;</i>
        <span class="material-text">
           You may also like
        </span>
    </h3>
    <div class="related-wrapper thumbnail-wrapper">
        <?php 

         $term_ids = wp_list_pluck($categories,'term_id');

         $recent_data = new WP_Query( array(
          'post_type' => array('post'),
          'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $term_ids,
                    'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                 )),
          'posts_per_page' => 8,
          'orderby' => 'ID',
          'order' => 'DESC',
          'post__not_in'=>array($post->ID)
       ));

        while($recent_data->have_posts()): $recent_data->the_post(); ?>

        <div class="thumb col-md-3 col-sm-3 col-xs-6">
            <?php get_template_part('template-parts/thumbnail', 'layout'); ?> 
       </div>
    <?php endwhile; wp_reset_query(); ?> 

    <div class="clearfix"></div>
    </div>


</section>
<aside class="primary-sidebar col-md-4">
    <?php get_sidebar(); ?>
</aside>

</div>

<?php endwhile; ?>

<?php get_footer(); ?>