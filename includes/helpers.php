<?php 

/**
 * Pretty print
 * @param  string $text
 * @param bool $if_dump
 * @return string
 */
function pp($text, $dump = null){
    echo '<pre>'; 

    if(!$dump) print_r($text); 
    else var_dump($dump);
    
    echo '</pre>';
    exit(0);
}

/**
 * Bootstrap Pagination
 * @return string
 */
function nx_pagination() {

    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_text'  => __('<i class="material-icons">&#xE314;</i><span class="material-text">Previous</span>'),
            'next_text'  => __('<span class="material-left">Next</span><i class="material-icons">&#xE315;</i>'),
            'type'  => 'array',
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagination-wrap"><ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
        echo '</ul></div>';
        }
}

/**
 * Boost site
 * @return void
 */
function nx_boost_site(){

    add_filter('style_loader_src', 'nx_remove_version', 9999 );
    add_filter('script_loader_src', 'nx_remove_version', 9999 );

    // remove emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
}

/**
 * Remove static version
 */
function nx_remove_version($src){

    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}


/**
* Catch first image
*/
function catch_that_image($post = null) {
  
  if(!$post) global $post, $posts;
  
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = get_template_directory_uri().'/assets/default.png';
  }
  return $first_img;
}