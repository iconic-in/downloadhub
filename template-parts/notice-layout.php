<?php $theme_opts = get_option('nx_options'); ?>
<?php if($theme_opts['site_notice']): ?>
<section class="alert alert-success sitewide-notice">
    <?php echo stripslashes(htmlspecialchars_decode($theme_opts['site_notice'])); ?>
</section>
<?php endif; ?>