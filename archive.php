<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php
    get_header('archive');

    $archiveLayout  = ATBS_Core::bk_get_theme_option('bk_archive_content_layout');
    $headingStyle   = ATBS_Core::bk_get_theme_option('bk_archive_header_style');
    $sidebar        = ATBS_Core::bk_get_theme_option('bk_archive_sidebar_select');
    $sidebarPos     = ATBS_Core::bk_get_theme_option('bk_archive_sidebar_position');
    $sidebarSticky  = ATBS_Core::bk_get_theme_option('bk_archive_sidebar_sticky');

    $headingInverse = 'no';
    $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle, $headingInverse);
    $sidebar_option = '';
    if(!is_active_sidebar($sidebar)) {
        $sidebar_option = 'disable';
    }


?>
<div class="site-content archive_page">
	<div class="container <?php if($sidebar_option == 'disable') echo 'container--narrow';?>">
        <div class="block-heading <?php echo esc_html($headingClass);?>">
			<h2 class="block-heading__title page-heading__title">
                <?php
                    if ( is_day() ) :
                		printf( esc_html__( 'Daily Archives: %s','keylin'), get_the_date() );
                	elseif ( is_month() ) :
                		printf( esc_html__( 'Monthly Archives: %s','keylin'), get_the_date( _x( 'F Y', 'monthly archives date format','keylin') ) );
                	elseif ( is_year() ) :
                		printf( esc_html__( 'Yearly Archives: %s','keylin'), get_the_date( _x( 'Y', 'yearly archives date format','keylin') ) );
                    else :
                		esc_html_e( 'Archives','keylin');
                	endif;
                ?>
            </h2>
        </div>
	</div>
    <?php if (
        ($archiveLayout == 'block_posts_listing_grid_1_has_sidebar')     ||
        ($archiveLayout == 'block_posts_listing_grid_2_has_sidebar')     ||
        ($archiveLayout == 'block_posts_listing_grid_3_has_sidebar')     ||
        ($archiveLayout == 'block_posts_listing_list_1_has_sidebar')     ||
        ($archiveLayout == 'block_posts_listing_list_2_has_sidebar')     ||
        ($archiveLayout == 'block_posts_listing_grid_alt_1_has_sidebar') ||
        ($archiveLayout == 'block_posts_listing_grid_alt_2_has_sidebar') ||
        ($archiveLayout == 'block_posts_listing_grid_alt_3_has_sidebar') ||
        ($archiveLayout == 'block_posts_listing_grid_alt_4_has_sidebar')
    ) { ?>
    <div class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <div class="container <?php if($sidebar_option == 'disable') echo 'container--narrow';?>">
            <?php if($sidebar_option != 'disable' ) echo '<div class="row">';?>
            <div class="<?php if($sidebar_option != 'disable'): echo 'atbs-keylin-main-col'; else: echo 'container--narrow-inner'; endif;?> <?php if($sidebarPos == 'left' ) echo('has-left-sidebar');?>" role="main">
                <?php echo ATBS_Archive::archive_main_col($archiveLayout);?>
                <?php
                    if (function_exists('atbs_paginate')) {
                        echo ATBS_Core::atbs_get_pagination();
                    }
                ?>
                </div><!-- .atbs-keylin-main-col -->

                <?php if($sidebar_option != 'disable'):?>
                    <div class="atbs-keylin-sub-col atbs-keylin-sub-col--right sidebar <?php if($sidebarSticky != 0) echo 'js-sticky-sidebar';?>" role="complementary">
                        <?php dynamic_sidebar( $sidebar );?>
                    </div> <!-- .atbs-sub-col -->
                <?php endif;?>
            <?php if($sidebar_option != 'disable') echo '</div><!-- .row -->';?>
        </div><!-- .container -->
    </div><!-- .atbs-keylin-block -->

    <?php } elseif (
        ($archiveLayout == 'block_posts_listing_grid_1')    ||
        ($archiveLayout == 'block_posts_listing_grid_2')    ||
        ($archiveLayout == 'block_posts_listing_grid_3')    ||
        ($archiveLayout == 'block_posts_listing_list_1')    ||
        ($archiveLayout == 'block_posts_listing_list_2')
    ) { ?>
    <div class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <?php
            if ( ($archiveLayout == 'block_posts_listing_grid_1') || ($archiveLayout == 'block_posts_listing_grid_2') || ($archiveLayout == 'block_posts_listing_grid_3') ) {
                echo '<div class="container">';
            }else {
                echo '<div class="container container--narrow">';
            }
            echo ATBS_Archive::archive_fullwidth($archiveLayout);
            if (function_exists('atbs_paginate')) {
                echo ATBS_Core::atbs_get_pagination();
            }
            echo '</div><!-- .container -->';
        ?>
    </div><!-- .atbs-keylin-block -->
    <?php } ?>

</div>

<?php get_footer(); ?>