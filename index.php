<?php
/**
 * Index Page -- Latest Page
 *
 */
    $sidebar_option = '';
    if(!is_active_sidebar('home_sidebar')) {
        $sidebar_option = 'disable';
    }
    
    if($sidebar_option == 'disable') :
        $containerNarrow = 'container--narrow';
    else:
        $containerNarrow = '';
    endif;
    
 ?>
<?php get_header();?>

<div class="site-content">
    <?php if($sidebar_option != 'disable' ): ?>
    <div class="atbs-keylin-block atbs-keylin-is-sticky-enable atbs-keylin-block--fullwidth atbs-keylin-listing--grid-2 atbs-keylin-listing--grid-2-has-sidebar">
        <div class="container">
            <div class="row">
                <div class="atbs-keylin-main-col" role="main">
                <?php
                    echo ATBS_Archive::archive_main_col('block_posts_listing_list_2_has_sidebar');
                 ?>
                <?php
                    if (function_exists('atbs_paginate')) {
                        echo ATBS_Core::atbs_get_pagination();
                    }
                ?>
                </div><!-- .atbs-keylin-main-col -->
                <div class="atbs-keylin-sub-col atbs-keylin-sub-col--right sidebar js-sticky-sidebar" role="complementary">
                    <?php dynamic_sidebar( 'home_sidebar' );?>
                </div> <!-- .atbs-sub-col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .atbs-keylin-block -->
    <?php else: ?>
    <div class="atbs-keylin-block atbs-keylin-is-sticky-enable atbs-keylin-block--fullwidth atbs-keylin-listing--grid-2">
        <div class="container <?php if($sidebar_option == 'disable') echo 'container--narrow';?>">
            <?php
                echo ATBS_Archive::archive_fullwidth('block_posts_listing_list_2');
             ?>
            <?php
                if (function_exists('atbs_paginate')) {
                    echo ATBS_Core::atbs_get_pagination();
                }
            ?>
        </div><!-- .container -->
    </div><!-- .atbs-keylin-block -->
    <?php endif; ?>
</div>
<?php get_footer();?>