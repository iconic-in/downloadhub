<?php get_header(); ?>

<?php if(is_home() && !is_paged()): ?>
<?php 

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'meta_key'   => 'make_featured',
    'meta_value' => 'yes',
    'orderby'    => 'id',
    'order'      => 'DESC',   
);

$featured_data = new WP_Query($args);
$featured_data = $featured_data->posts;

$split_array = array_chunk($featured_data, 6);

$split_count = 0;

?>

<section class="carousel-container">


    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide">  

            <div class="carousel-inner">
            <?php foreach ($split_array as $items): ?>

                <div class="item <?php if($split_count == 0) echo 'active'; ?>">
                   
                    <?php

                    foreach ($items as $k)
                    {
                    
                    
                     $thumbnail = '<img src="'.catch_that_image($k).'" alt="'.$k->post_title.'" class="img-responsive">';

                     //if(has_post_thumbnail($k->ID))
                          //$thumbnail = get_the_post_thumbnail($k->ID);

                        echo '<div class="carousel-item col-sm-2 col-xs-6">
                                <a class="thumbnail" href="/'.$k->post_name.'">
                                        '.$thumbnail.'
                                    <span class="name">'.$k->post_title.'</span>
                                </a>
                            </div>';
                    }


                    ?>
                </div>

            <?php $split_count++; endforeach; ?>

            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="material-icons">&#xE314;</i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="material-icons">&#xE315;</i>
            </a>
        
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<div class="home-categories">
    <ul class="list-inline">
        <?php

        $categories = get_categories( array(
              'orderby' => 'name',
              'order'   => 'ASC'
          ));

       foreach ($categories as $category) {

         echo '<a href="'.get_category_link($category->term_id).'">
              '.$category->name.'
            </a>';

        }
        ?>
        <div class="clearfix"></div>
    </ul>
</div>

<?php get_template_part('template-parts/notice', 'layout'); ?>

<h2 class="category-name">
    <i class="material-icons">&#xE80E;</i> 
    <span class="material-text">Latest Movies</span>
</h2>

<?php else: ?>

<h2 class="category-name">
    <i class="material-icons">&#xE2C7;</i>
    <span class="material-text"><?php 
    
    if(is_archive()) the_archive_title(); 
    elseif(is_search()) echo 'Search - '.get_search_query();
    elseif(is_404()) echo '404 Page Not Found!';
    else echo 'Archive';

    ?></span>
</h2>

<?php endif; ?>

<section class="home-wrapper thumbnail-wrapper">
  
<?php  if(have_posts()): // if have posts ?> 

    <?php while(have_posts()): the_post(); ?>
    
         <div class="thumb col-md-2 col-sm-4 col-xs-6">

            <?php get_template_part('template-parts/thumbnail', 'layout'); ?>

         </div>

   <?php endwhile; ?>

  <div class="clearfix"></div>
  <div class="col-md-12 text-center pagination-wrapper">
        <?php nx_pagination(); ?>
   </div>

<?php else: ?> 
    
    <div class="error-not-found col-md-12">
        <div class="col-sm-4 col-sm-offset-3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/404.png" alt="404 Not found">
        </div>
        <div class="clearfix"></div>
    </div>

<?php endif; ?>

    <div class="clearfix"></div>
</section>



<?php get_footer(); ?>