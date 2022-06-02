<?php
/**
 * The template for displaying Category archive pages
 *
 */
 ?>
<?php
    get_header();
    $tagID          = $wp_query->get_queried_object_id();

    $tagLayout  = ATBS_Archive::bk_get_archive_option($tagID, 'bk_archive_content_layout');
    $pagination     = ATBS_Archive::bk_get_archive_option($tagID, 'bk_archive_pagination');
    $sidebar        = ATBS_Archive::bk_get_archive_option($tagID, 'bk_archive_sidebar_select');
    $sidebarPos     = ATBS_Archive::bk_get_archive_option($tagID, 'bk_archive_sidebar_position');
    $sidebarSticky  = ATBS_Archive::bk_get_archive_option($tagID, 'bk_archive_sidebar_sticky');

    $moduleID = uniqid('atbs_'.$tagLayout.'-');
    $posts_per_page = intval(get_query_var('posts_per_page'));
    $customArgs = array(
        'tag_id'            => $tagID,
		'post_type'         => array( 'post' ),
		'posts_per_page'    => $posts_per_page,
        'post_status'       => 'publish',
        'offset'            => 0,
	);
    ATBS_Core::bk_add_buff('query', $moduleID, 'args', $customArgs);
    $sidebar_option = '';
    if(!is_active_sidebar($sidebar)) {
        $sidebar_option = 'disable';
    }
    if($sidebar_option == 'disable') :
        $containerNarrow = 'container--narrow';
    else:
        $containerNarrow = '';
    endif;
?>
<div class="site-content tag_page">
    <?php echo ATBS_Archive::atbs_archive_header($tagID, $containerNarrow);?>
    <?php if (
        ($tagLayout == 'block_posts_listing_grid_1_has_sidebar')     ||
        ($tagLayout == 'block_posts_listing_grid_2_has_sidebar')     ||
        ($tagLayout == 'block_posts_listing_grid_3_has_sidebar')     ||
        ($tagLayout == 'block_posts_listing_list_1_has_sidebar')     ||
        ($tagLayout == 'block_posts_listing_list_2_has_sidebar')     ||
        ($tagLayout == 'block_posts_listing_grid_alt_1_has_sidebar') ||
        ($tagLayout == 'block_posts_listing_grid_alt_2_has_sidebar') ||
        ($tagLayout == 'block_posts_listing_grid_alt_3_has_sidebar') ||
        ($tagLayout == 'block_posts_listing_grid_alt_4_has_sidebar')
    ) {?>
    <div class="atbs-keylin-block atbs-keylin-block--fullwidth">
		<div class="container <?php if($sidebar_option == 'disable') echo 'container--narrow';?>">
            <?php if($sidebar_option != 'disable' ) echo '<div class="row">';?>
            <div class="<?php if($sidebar_option != 'disable'): echo 'atbs-keylin-main-col'; else: echo 'container--narrow-inner'; endif;?> <?php if($sidebarPos == 'left' ) echo('has-left-sidebar');?>" role="main">
                    <div id="<?php echo esc_attr($moduleID);?>" class="atbs-keylin-block">
                        <?php

                        if ($pagination == 'ajax-loadmore') {
                            echo '<div class="js-ajax-load-post">';
                        } elseif ($pagination == 'infinity') {
                            echo '<div class="js-ajax-load-post infinity-ajax-load-post">';
                        }

                        echo ATBS_Archive::archive_main_col($tagLayout, $moduleID, $pagination);
                        echo ATBS_Archive::bk_pagination_render($pagination);

                        if ( ($pagination == 'ajax-loadmore') || ($pagination == 'infinity') ) {
                            echo '</div>';
                        }
                        ?>
                    </div><!-- .atbs-keylin-block -->
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
        ($tagLayout == 'block_posts_listing_grid_1')    ||
        ($tagLayout == 'block_posts_listing_grid_2')    ||
        ($tagLayout == 'block_posts_listing_grid_3')    ||
        ($tagLayout == 'block_posts_listing_list_1')    ||
        ($tagLayout == 'block_posts_listing_list_2')
    ) { ?>
    <div id="<?php echo esc_attr($moduleID);?>" class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <?php
        if ( ($tagLayout == 'block_posts_listing_grid_1') || ($tagLayout == 'block_posts_listing_grid_2') || ($tagLayout == 'block_posts_listing_grid_3') ) {
            echo '<div class="container">';
        } else {
            echo '<div class="container container--narrow">';
        }

        if ($pagination == 'ajax-loadmore') {
            echo '<div class="js-ajax-load-post">';
        } elseif ($pagination == 'infinity') {
            echo '<div class="js-ajax-load-post infinity-ajax-load-post">';
        }

        echo ATBS_Archive::archive_fullwidth($tagLayout, $moduleID, $pagination);
        echo ATBS_Archive::bk_pagination_render($pagination);

        if ( ($pagination == 'ajax-loadmore') || ($pagination == 'infinity') ) {
            echo '</div>';
        }
        echo '</div><!-- .container -->';
        ?>
    </div><!-- .atbs-keylin-block -->
    <?php }?>
</div>

<?php get_footer(); ?>