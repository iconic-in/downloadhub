<?php $theme_opts = get_option('nx_options'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="theme-color" content="#f57f26">
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php if($theme_opts['favicon_icon']): ?>
        <link rel="shortcut icon" href="<?php echo $theme_opts['favicon_icon']; ?>" />
    <?php endif; ?>
<?php wp_head(); ?>
<?php 

// custom css
if($theme_opts['custom_css']){
    echo '<style type="text/css">';
        echo $theme_opts['custom_css'];
    echo '</style>';
}


?>
</head>
<body <?php body_class(); ?>>

<header class="primary-header">
                
     <nav class="navbar navbar-default">

        <div class="container">

            <div class="pull-right">
                <button type="button" class="navbar-toggle" id="search-toggle">
                    <i class="material-icons">&#xE8B6;</i>
                </button>
                <div class="clearfix"></div>
            </div>
            
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" id="menu-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                   <img src="<?php echo $theme_opts['site_logo']; ?>" alt="Site Main Logo">
                </a>
           </div>


            <div class="navbar-nav primary-menu">
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class' => 'list-inline'
                    ]);
                 ?>
            </div>

            <div class="navbar-search navbar-right col-md-3 col-sm-4">
                <form method="get" id="searchForm" action="/">
                    <div class="input-group">
                        <input type="search" name="s" class="form-control" placeholder="Search here.." autocomplete="off">
                        <span class="input-group-addon" id="searchSubmit">
                             Search
                        </span>
                    </div>
                </form>
            </div>

        </div>
                

        </nav>

        <div class="clearfix"></div>

</header>

<section class="container content-wrapper">

<?php if(!is_front_page() || is_paged()): ?>
<br/>

<?php get_template_part('template-parts/notice', 'layout'); ?>

    <?php if($theme_opts['header_code'] && !wp_is_mobile()): ?>
      <div class="header-adcode">  
        <?php echo stripslashes(htmlspecialchars_decode($theme_opts['header_code'])); ?>
      </div>  
    <?php elseif($theme_opts['header_code_mobile'] && wp_is_mobile()): ?>
        <div class="header-adcode">  
        <?php echo stripslashes(htmlspecialchars_decode($theme_opts['header_code_mobile'])); ?>
      </div>  
    <?php endif; ?>

<?php endif; ?>