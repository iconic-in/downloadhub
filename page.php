<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<div class="row">

<section class="left-wrapper col-md-8">
    <h1 class="page-title">
        <i class="material-icons">&#xE02F;</i>
        <span class="material-text">
            <?php echo the_title(); ?>
        </span>
    </h1>

    <main class="page-body">
        <?php the_content(); ?>
    </main>
    <?php get_template_part('template-parts/comment', 'layout'); ?>

</section>
<aside class="primary-sidebar col-md-4">
    <?php get_sidebar(); ?>
</aside>

</div>

<?php endwhile; ?>

<?php get_footer(); ?>