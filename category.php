<?php
/**
 * The template for displaying Category archive pages
 *
 */
 ?>
<?php
    get_header('category');
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

    $paged = intval(get_query_var('paged'));
    if (empty($paged) || $paged == 0) {
        $paged = 1;
    }

    if (function_exists('get_queried_object_id')) {
        $catID      = get_queried_object_id();
    }
    else {
        $catID      = $wp_query->get_queried_object_id();
    }

    $categoryLayout = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_content_layout');
    $pagination     = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_pagination');
    $featLayout     = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_feature_area');
    $featAreaShowHide  = ATBS_Archive::bk_get_archive_option($catID, 'bk_feature_area__show_hide');
    $sidebar        = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_sidebar_select');
    $sidebarPos     = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_sidebar_position');
    $sidebarSticky  = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_sidebar_sticky');
    $featAreaOption = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_feature_area__post_option');

    $moduleID = uniqid('atbs_'.$categoryLayout.'-');
    $posts_per_page = intval(get_query_var('posts_per_page'));
    if (function_exists('rwmb_meta')) {
        $is_exclude = rwmb_meta( 'bk_category_exclude_posts', array( 'object_type' => 'term' ), $catID );
    } else {
        $is_exclude = '';
    }

    if (isset($is_exclude) && ($is_exclude == 'global_settings')) {
        $is_exclude = $atbs_option['bk_category_exclude_posts'];
    }

    if (($is_exclude == 1) || ($featAreaOption == 'latest')) {
        $excludeID = ATBS_Archive::get_sticky_ids__category_feature_area($catID, $featLayout);
    } else {
        $excludeID = '';
    }
    $customArgs = array(
        'cat'               => $catID,
        'post__not_in'      => $excludeID,
		'post_type'         => array( 'post' ),
		'posts_per_page'    => $posts_per_page,
        'post_status'       => 'publish',
        'offset'            => 0,
        'orderby'           => 'date',
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
<div class="site-content category_page">
    <?php
        if (($featLayout == 'disable') || ($featLayout == '')) {
            echo ATBS_Archive::atbs_archive_header($catID, $containerNarrow);
        } else {
            if ($featAreaShowHide != 1) {
                echo ATBS_Archive::archive_feature_area($catID, $featLayout);
            } else {
                if ($paged == 1) {
                    echo ATBS_Archive::archive_feature_area($catID, $featLayout);
                } else {
                    echo ATBS_Archive::atbs_archive_header($catID, $containerNarrow);
                }
            }
        }
    ?>
    <?php if (
        ($categoryLayout == 'block_posts_listing_grid_1_has_sidebar')     ||
        ($categoryLayout == 'block_posts_listing_grid_2_has_sidebar')     ||
        ($categoryLayout == 'block_posts_listing_grid_3_has_sidebar')     ||
        ($categoryLayout == 'block_posts_listing_list_1_has_sidebar')     ||
        ($categoryLayout == 'block_posts_listing_list_2_has_sidebar')     ||
        ($categoryLayout == 'block_posts_listing_grid_alt_1_has_sidebar') ||
        ($categoryLayout == 'block_posts_listing_grid_alt_2_has_sidebar') ||
        ($categoryLayout == 'block_posts_listing_grid_alt_3_has_sidebar') ||
        ($categoryLayout == 'block_posts_listing_grid_alt_4_has_sidebar')
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

                        echo ATBS_Archive::archive_main_col($categoryLayout, $moduleID, $pagination);
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
        ($categoryLayout == 'block_posts_listing_grid_1')    ||
        ($categoryLayout == 'block_posts_listing_grid_2')    ||
        ($categoryLayout == 'block_posts_listing_grid_3')    ||
        ($categoryLayout == 'block_posts_listing_list_1')    ||
        ($categoryLayout == 'block_posts_listing_list_2')
    ) { ?>
    <div id="<?php echo esc_attr($moduleID);?>" class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <?php
        if ( ($categoryLayout == 'block_posts_listing_grid_1') || ($categoryLayout == 'block_posts_listing_grid_2') || ($categoryLayout == 'block_posts_listing_grid_3')) {
            echo '<div class="container">';
        } else {
            echo '<div class="container container--narrow">';
        }

        if ($pagination == 'ajax-loadmore') {
            echo '<div class="js-ajax-load-post">';
        } elseif ($pagination == 'infinity') {
            echo '<div class="js-ajax-load-post infinity-ajax-load-post">';
        }

        echo ATBS_Archive::archive_fullwidth($categoryLayout, $moduleID, $pagination);
        echo ATBS_Archive::bk_pagination_render($pagination);

        if ( ($pagination == 'ajax-loadmore') || ($pagination == 'infinity') ) {
            echo '</div>';
        }

        echo '</div><!-- .container -->';
        ?>
    </div><!-- .atbs-keylin-block -->
    <?php } else { ?>
    <div class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <div class="container <?php if($sidebar_option == 'disable') echo 'container--narrow';?>">
            <?php if($sidebar_option != 'disable' ) echo '<div class="row">';?>
            <div class="<?php if($sidebar_option != 'disable'): echo 'atbs-keylin-main-col'; else: echo 'container--narrow-inner'; endif;?> <?php if($sidebarPos == 'left' ) echo('has-left-sidebar');?>" role="main">
                    <div id="<?php echo esc_attr($moduleID);?>" class="atbs-keylin-block">
                        <?php echo ATBS_Archive::archive_main_col('block_posts_listing_grid_1_has_sidebar', $moduleID, 'default');?>
                        <?php echo ATBS_Archive::bk_pagination_render('default');?>
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
    <?php } ?>
</div>

<?php get_footer(); ?>