<?php
/**
 * The template for displaying Search Results pages.
 *
 */
 ?>
<?php
    get_header('search');
    $headingStyle    = ATBS_Core::bk_get_theme_option('bk_search_header_style');
    $searchLayout   = ATBS_Core::bk_get_theme_option('bk_search_content_layout');
    $pagination     = ATBS_Core::bk_get_theme_option('bk_search_pagination');
    $sidebar        = ATBS_Core::bk_get_theme_option('bk_search_sidebar_select');
    $sidebarPos     = ATBS_Core::bk_get_theme_option('bk_search_sidebar_position');
    $sidebarSticky  = ATBS_Core::bk_get_theme_option('bk_search_sidebar_sticky');
    $authorResults  = ATBS_Core::bk_get_theme_option('bk_author_results_active');

    $headingInverse = 'no';
    $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle, $headingInverse);

    $moduleID = uniqid('atbs_'.$searchLayout.'-');

    /* Search Count */
    $allsearch = new WP_Query("s=$s&showposts=0");
    $searchCount = $allsearch->found_posts;
    $authorPagination = '';
    $userMaxPages = '';
    if ($authorResults != 0) {
        $authorEntries        = ATBS_Core::bk_get_theme_option('bk_author_results_entries');
        $authorPagination     = ATBS_Core::bk_get_theme_option('bk_author_results_pagination');
        $authorResultID       = uniqid('atbs_author_results-');

        $userArgs = array(
            'search'          => '*'.esc_attr( $s ).'*',
            'search_columns'  => array(
                'user_login',
                'user_nicename',
                'user_email',
                'user_url',
            ),
            'number'          => $authorEntries,
            'offset'          => 0,
        );
        $users = new WP_User_Query( $userArgs );

        ATBS_Core::bk_add_buff('query', $authorResultID, 'args', $userArgs);

        $users_found = $users->get_results();
        $user_count = count($users_found);
        $totalUsers = $users->get_total();
        $userMaxPages = 0;

        if ($user_count != 0) {
            $userMaxPages = intval($totalUsers / $user_count);
            if ($totalUsers % $user_count > 0) {
                $userMaxPages = $userMaxPages + 1;
            }
        }

        $searchCount = $searchCount + $totalUsers;

        wp_reset_postdata();
    }

    $posts_per_page = intval(get_query_var('posts_per_page'));

    $customArgs = array(
        's'                 => esc_attr($s),
		'post_type'         => array( 'post', 'page' ),
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
?>
<div class="site-content search_page">
	<div class="container <?php if($sidebar_option == 'disable') echo 'container--narrow';?>">
        <div class="block-heading <?php echo esc_html($headingClass);?>">
			<h2 class="block-heading__title page-heading__title"><?php printf( esc_html__( 'Search for: %s','keylin'), get_search_query() ); ?></h2>
			<div class="page-heading__subtitle"><?php echo (esc_html__('There are', 'keylin') . ' ' . esc_attr($searchCount) . ' ' . esc_html__('results', 'keylin'));?></div>
        </div>
	</div>
    <?php if (
        ($searchLayout == 'block_posts_listing_grid_1_has_sidebar')     ||
        ($searchLayout == 'block_posts_listing_grid_2_has_sidebar')     ||
        ($searchLayout == 'block_posts_listing_grid_3_has_sidebar')     ||
        ($searchLayout == 'block_posts_listing_list_1_has_sidebar')     ||
        ($searchLayout == 'block_posts_listing_list_2_has_sidebar')     ||
        ($searchLayout == 'block_posts_listing_grid_alt_1_has_sidebar') ||
        ($searchLayout == 'block_posts_listing_grid_alt_2_has_sidebar') ||
        ($searchLayout == 'block_posts_listing_grid_alt_3_has_sidebar') ||
        ($searchLayout == 'block_posts_listing_grid_alt_4_has_sidebar')
    ) { ?>
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

                        echo ATBS_Archive::archive_main_col($searchLayout, $moduleID, $pagination);
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
        ($searchLayout == 'block_posts_listing_grid_1')    ||
        ($searchLayout == 'block_posts_listing_grid_2')    ||
        ($searchLayout == 'block_posts_listing_grid_3')    ||
        ($searchLayout == 'block_posts_listing_list_1')    ||
        ($searchLayout == 'block_posts_listing_list_2')
    ) { ?>
    <div id="<?php echo esc_attr($moduleID);?>" class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <?php
        if ( ($searchLayout == 'block_posts_listing_grid_1') || ($searchLayout == 'block_posts_listing_grid_2') || ($searchLayout == 'block_posts_listing_grid_3') ) {
            echo '<div class="container">';
        } else {
            echo '<div class="container container--narrow">';
        }

        if ($pagination == 'ajax-loadmore') {
            echo '<div class="js-ajax-load-post">';
        } elseif ($pagination == 'infinity') {
            echo '<div class="js-ajax-load-post infinity-ajax-load-post">';
        }

        echo ATBS_Archive::archive_fullwidth($searchLayout, $moduleID, $pagination);
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