<?php

/**
 * Meta box input content
 * @return void
 */
function nx_metaboxes_input( $post ){

    $meta_data = '';

    if($post) $meta_data = get_post_meta( $post->ID , 'make_featured', true); ?>

    <label for="yesOption">
        <input type="radio" <?php if($meta_data === 'yes') echo 'checked'; ?> name="nx_make_featured" id="yesOption" value="yes">
        Yes&nbsp;&nbsp;
    </label>

    <label for="noOption">
        <input type="radio" <?php if(!$meta_data || $meta_data === 'no') echo 'checked'; ?> name="nx_make_featured" id="noOption" value="no">
        No&nbsp;&nbsp;&nbsp;
    </label>';

<?php 

}

/**
 * Setting basic input
 * @return void
 */
function nx_setbasic_input(){ 

$get_opts = get_option('nx_options');

?>

<div class="wrap">
    
    <section class="col-md-8 admin-wrap">

     <?php if(isset($_GET['status'])): ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Your settings saved succesfully!
        </div>
     <?php endif; ?>

        <h2 class="category-name">
            <i class="material-icons">&#xE8B8;</i>
            <span class="material-text">Basic Settings</span>
        </h2>
        <div class="admin-body">
            <form method="post" action="admin-post.php">

                <input type="hidden" name="action" value="nx_setbasic_output">

                <?php wp_nonce_field('nx_setbasic_output'); ?>

                <div class="form-group col-md-8">
                    <label for="nxLogo">Site Logo</label>
                    <div class="input-group">
                        <input type="text" placeholder="Paste URL or browse it" value="<?php echo $get_opts['site_logo']; ?>" class="form-control" name="basic[site_logo]" id="nxLogo">
                        <span class="input-group-addon browse-wp-image">
                            Browse
                        </span>
                    </div>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxFavicon">Favicon Icon</label>
                    <div class="input-group">
                        <input type="text" placeholder="Paste URL or browse it" class="form-control" value="<?php echo $get_opts['favicon_icon']; ?>" name="basic[favicon_icon]" id="nxFavicon">
                        <span class="input-group-addon browse-wp-image">
                            Browse
                        </span>
                    </div>
                </div>  

                <div class="form-group col-md-8">
                    <label for="nxTracker">JS Tracking Code</label>
                    <div class="input-group">
                        <textarea rows="10" class="admin_tracker" name="basic[tracker_code]" id="nxTracker"><?php echo stripslashes(htmlspecialchars_decode($get_opts['tracker_code'])); ?></textarea>
                    </div>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxNotice">Site Wide Notice (You can use HTML)</label>
                    <div class="input-group">
                        <textarea rows="10" class="admin_tracker" name="basic[site_notice]" id="nxNotice"><?php echo stripslashes(htmlspecialchars_decode($get_opts['site_notice'])); ?></textarea>
                    </div>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxBoost">Boost Site</label><br/>
                    <select name="basic[boost_site]">
                        <option value="yes" <?php if($get_opts['boost_site'] == 'yes') echo 'selected'; ?>>Yes</option>
                        <option value="no" <?php if($get_opts['boost_site'] == 'no') echo 'selected'; ?>>No</option>
                    </select>
                </div> 

                <div class="clearfix"></div> 
                <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning">
                        Save Settings
                    </button>
                </div> 

                <div class="clearfix"></div> 
            </form>
        </div>
    </section>  

</div>

<?php
}


/**
 * Setting custom input
 * @return void
 */
function nx_setads_input(){ 

$get_opts = get_option('nx_options');

?>

<div class="wrap">
    
    <section class="col-md-8 admin-wrap">

     <?php if(isset($_GET['status'])): ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Your settings saved succesfully!
        </div>
     <?php endif; ?>

        <h2 class="category-name">
            <i class="material-icons">&#xE873;</i>
            <span class="material-text">Ads Management</span>
        </h2>
        <div class="admin-body">
            <form method="post" action="admin-post.php">

                <input type="hidden" name="action" value="nx_setads_output">

                <?php wp_nonce_field('nx_setads_output'); ?>

                <div class="form-group col-md-8">
                    <label for="nxMobile">Mobile Users Only</label>
                    <textarea rows="8" class="admin_tracker" name="ads[mobile_users]" id="nxMobile"><?php echo stripslashes(htmlspecialchars_decode($get_opts['mobile_users'])); ?></textarea>
                </div> 

                 <div class="form-group col-md-8">
                    <label for="nxDesktop">Desktop Users Only</label>
                    <textarea rows="8" class="admin_tracker" name="ads[desktop_users]" id="nxDesktop"><?php echo stripslashes(htmlspecialchars_decode($get_opts['desktop_users'])); ?></textarea>
                </div>  

                 <div class="form-group col-md-8">
                    <label for="nxFooter">Footer Ad Code (Desktop)</label>
                    <textarea rows="8" class="admin_tracker" name="ads[footer_code]" id="nxFooter"><?php echo stripslashes(htmlspecialchars_decode($get_opts['footer_code'])); ?></textarea>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxHeader">Header Ad Code  (Desktop)</label>
                    <textarea rows="8" class="admin_tracker" name="ads[header_code]" id="nxHeader"><?php echo stripslashes(htmlspecialchars_decode($get_opts['header_code'])); ?></textarea>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxFooterMobile">Footer Ad Code (Mobile)</label>
                    <textarea rows="8" class="admin_tracker" name="ads[footer_code_mobile]" id="nxFooterMobile"><?php echo stripslashes(htmlspecialchars_decode($get_opts['footer_code_mobile'])); ?></textarea>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxHeaderMobile">Header Ad Code (Mobile)</label>
                    <textarea rows="8" class="admin_tracker" name="ads[header_code_mobile]" id="nxHeaderMobile"><?php echo stripslashes(htmlspecialchars_decode($get_opts['header_code_mobile'])); ?></textarea>
                </div> 


                <div class="clearfix"></div> 
                <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning">
                        Save Settings
                    </button>
                </div> 

                <div class="clearfix"></div> 
            </form>
        </div>
    </section>  

</div>


<?php
}


/**
 * Setting ads input
 * @return void
 */
function nx_setcustom_input(){

$get_opts = get_option('nx_options');

?>

<div class="wrap">
    
    <section class="col-md-8 admin-wrap">

     <?php if(isset($_GET['status'])): ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Your settings saved succesfully!
        </div>
     <?php endif; ?>

        <h2 class="category-name">
            <i class="material-icons">&#xE873;</i>
            <span class="material-text">Custom Code</span>
        </h2>
        <div class="admin-body">
            <form method="post" action="admin-post.php">

                <input type="hidden" name="action" value="nx_setcustom_output">

                <?php wp_nonce_field('nx_setcustom_output'); ?> 

                 <div class="form-group col-md-8">
                    <label for="nxcss">Custom CSS</label>
                    <textarea rows="8" class="admin_tracker" name="custom[custom_css]" id="nxcss"><?php echo $get_opts['custom_css']; ?></textarea>
                </div> 

                <div class="form-group col-md-8">
                    <label for="nxjs">Custom Javascript</label>
                    <textarea rows="8" class="admin_tracker" name="custom[custom_js]" id="nxjs"><?php echo stripslashes(htmlspecialchars_decode($get_opts['custom_js'])); ?></textarea>
                </div> 

                <div class="clearfix"></div> 
                <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning">
                        Save Settings
                    </button>
                </div> 

                <div class="clearfix"></div> 
            </form>
        </div>
    </section>  

</div>


<?php
}