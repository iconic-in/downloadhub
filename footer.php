</section>
    
  <?php $theme_opts = get_option('nx_options'); ?>

    <?php if($theme_opts['footer_code'] && !wp_is_mobile()): ?>
      <div class="header-adcode">  
        <?php echo stripslashes(htmlspecialchars_decode($theme_opts['footer_code'])); ?>
      </div>  
    <?php elseif($theme_opts['footer_code_mobile'] && wp_is_mobile()): ?>
        <div class="header-adcode">  
        <?php echo stripslashes(htmlspecialchars_decode($theme_opts['footer_code_mobile'])); ?>
      </div>  
    <?php endif; ?>

    <footer class="primay-footer">
        
        <div class="container"> 
            
            <div class="col-sm-6 footer-brand">
                <p><?php echo date('Y'); ?> &copy; <span><?php echo ucwords(parse_url(get_site_url(), PHP_URL_HOST)); ?></span> All Rights Reserved.</p>    
            </div>    
            <div class="col-sm-6 text-right">
                <?php 

                    wp_nav_menu([

                        'theme_location' => 'footer',
                        'menu_class' => 'list-inline'

                    ]);

                 ?>
            </div>
            
            <div class="clearfix"></div>
            
        </div>

    </footer>   

<?php wp_footer(); 

// tracker code
echo stripslashes(htmlspecialchars_decode($theme_opts['tracker_code']));

// mobile or desktop
if(wp_is_mobile()) echo stripslashes(htmlspecialchars_decode($theme_opts['mobile_users']));
else echo stripslashes(htmlspecialchars_decode($theme_opts['desktop_users']));

// custom js
if($theme_opts['custom_js']){
    echo '<script>';
        echo stripslashes(htmlspecialchars_decode($theme_opts['custom_js']));
    echo '</script>';
}

?>

</section>






</body>
</html>