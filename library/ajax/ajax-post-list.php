<?php
if (!class_exists('ATBS_Ajax_Post_List')) {
    class ATBS_Ajax_Post_List {
        //Search Query
        static function atbs_query($args) {
            $the_query = new WP_Query($args);
            unset($args);
            wp_reset_postdata();
            return $the_query;
        }
    }
}
add_action('wp_ajax_nopriv_atbs_ajax_reaction', 'atbs_ajax_reaction');
add_action('wp_ajax_atbs_ajax_reaction', 'atbs_ajax_reaction');
if (!function_exists('atbs_ajax_reaction')) {
    function atbs_ajax_reaction()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $postID      = isset( $_POST['postID'] ) ? $_POST['postID'] : null;
        $reactionType = isset( $_POST['reactionType'] ) ? $_POST['reactionType'] : null;
        $reactionStatus = isset( $_POST['reactionStatus'] ) ? $_POST['reactionStatus'] : null;
        $dataKey = 'post-'.$postID.'-'.$reactionType;
        $dataVal = get_post_meta($postID, $dataKey, true);
        if(($reactionStatus == 'active') || ($reactionStatus == 'active-minus')):
            $dataVal -= 1;
        else:
            $dataVal += 1;
        endif;
        update_post_meta( $postID, $dataKey, $dataVal );
        die(json_encode($dataVal));
    }
}

add_action('wp_ajax_nopriv_atbs_author_results', 'atbs_author_results');
add_action('wp_ajax_atbs_author_results', 'atbs_author_results');
if (!function_exists('atbs_author_results')) {
    function atbs_author_results()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args      = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $args['offset'] = $postOffset;
        $dataReturn = 'no-result';

        $users = new WP_User_Query( $args );
        $users_found = $users->get_results();
        $user_count = count($users_found);

        if ( $user_count > 0 ) :
            $dataReturn = ATBS_Archive::bk_render_authors($users_found);
        else :
            $dataReturn = 'no-result';
        endif;

        die(json_encode($dataReturn));
    }
}
//
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_1', 'atbs_block_posts_listing_grid_1');
add_action('wp_ajax_atbs_block_posts_listing_grid_1', 'atbs_block_posts_listing_grid_1');
if (!function_exists('atbs_block_posts_listing_grid_1')) {
    function atbs_block_posts_listing_grid_1()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_1;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_2', 'atbs_block_posts_listing_grid_2');
add_action('wp_ajax_atbs_block_posts_listing_grid_2', 'atbs_block_posts_listing_grid_2');
if (!function_exists('atbs_block_posts_listing_grid_2')) {
    function atbs_block_posts_listing_grid_2()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_2;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_3', 'atbs_block_posts_listing_grid_3');
add_action('wp_ajax_atbs_block_posts_listing_grid_3', 'atbs_block_posts_listing_grid_3');
if (!function_exists('atbs_block_posts_listing_grid_3')) {
    function atbs_block_posts_listing_grid_3()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_3;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_4', 'atbs_block_posts_listing_grid_4');
add_action('wp_ajax_atbs_block_posts_listing_grid_4', 'atbs_block_posts_listing_grid_4');
if (!function_exists('atbs_block_posts_listing_grid_4')) {
    function atbs_block_posts_listing_grid_4()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_4;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_5', 'atbs_block_posts_listing_grid_5');
add_action('wp_ajax_atbs_block_posts_listing_grid_5', 'atbs_block_posts_listing_grid_5');
if (!function_exists('atbs_block_posts_listing_grid_5')) {
    function atbs_block_posts_listing_grid_5()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_5;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_6', 'atbs_block_posts_listing_grid_6');
add_action('wp_ajax_atbs_block_posts_listing_grid_6', 'atbs_block_posts_listing_grid_6');
if (!function_exists('atbs_block_posts_listing_grid_6')) {
    function atbs_block_posts_listing_grid_6()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_6;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_7', 'atbs_block_posts_listing_grid_7');
add_action('wp_ajax_atbs_block_posts_listing_grid_7', 'atbs_block_posts_listing_grid_7');
if (!function_exists('atbs_block_posts_listing_grid_7')) {
    function atbs_block_posts_listing_grid_7()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_7;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_8', 'atbs_block_posts_listing_grid_8');
add_action('wp_ajax_atbs_block_posts_listing_grid_8', 'atbs_block_posts_listing_grid_8');
if (!function_exists('atbs_block_posts_listing_grid_8')) {
    function atbs_block_posts_listing_grid_8()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_8;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_overlay_aside_1', 'atbs_block_posts_listing_grid_overlay_aside_1');
add_action('wp_ajax_atbs_block_posts_listing_grid_overlay_aside_1', 'atbs_block_posts_listing_grid_overlay_aside_1');
if (!function_exists('atbs_block_posts_listing_grid_overlay_aside_1')) {
    function atbs_block_posts_listing_grid_overlay_aside_1()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Overlay_Aside_1;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_overlay_aside_2', 'atbs_block_posts_listing_grid_overlay_aside_2');
add_action('wp_ajax_atbs_block_posts_listing_grid_overlay_aside_2', 'atbs_block_posts_listing_grid_overlay_aside_2');
if (!function_exists('atbs_block_posts_listing_grid_overlay_aside_2')) {
    function atbs_block_posts_listing_grid_overlay_aside_2()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Overlay_Aside_2;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_overlay_aside_3', 'atbs_block_posts_listing_grid_overlay_aside_3');
add_action('wp_ajax_atbs_block_posts_listing_grid_overlay_aside_3', 'atbs_block_posts_listing_grid_overlay_aside_3');
if (!function_exists('atbs_block_posts_listing_grid_overlay_aside_3')) {
    function atbs_block_posts_listing_grid_overlay_aside_3()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Overlay_Aside_3;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_1', 'atbs_block_posts_listing_list_1');
add_action('wp_ajax_atbs_block_posts_listing_list_1', 'atbs_block_posts_listing_list_1');
if (!function_exists('atbs_block_posts_listing_list_1')) {
    function atbs_block_posts_listing_list_1()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_1;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_2', 'atbs_block_posts_listing_list_2');
add_action('wp_ajax_atbs_block_posts_listing_list_2', 'atbs_block_posts_listing_list_2');
if (!function_exists('atbs_block_posts_listing_list_2')) {
    function atbs_block_posts_listing_list_2()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_2;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_3', 'atbs_block_posts_listing_list_3');
add_action('wp_ajax_atbs_block_posts_listing_list_3', 'atbs_block_posts_listing_list_3');
if (!function_exists('atbs_block_posts_listing_list_3')) {
    function atbs_block_posts_listing_list_3()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_3;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_4', 'atbs_block_posts_listing_list_4');
add_action('wp_ajax_atbs_block_posts_listing_list_4', 'atbs_block_posts_listing_list_4');
if (!function_exists('atbs_block_posts_listing_list_4')) {
    function atbs_block_posts_listing_list_4()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_4;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_5', 'atbs_block_posts_listing_list_5');
add_action('wp_ajax_atbs_block_posts_listing_list_5', 'atbs_block_posts_listing_list_5');
if (!function_exists('atbs_block_posts_listing_list_5')) {
    function atbs_block_posts_listing_list_5()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_5;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_6', 'atbs_block_posts_listing_list_6');
add_action('wp_ajax_atbs_block_posts_listing_list_6', 'atbs_block_posts_listing_list_6');
if (!function_exists('atbs_block_posts_listing_list_6')) {
    function atbs_block_posts_listing_list_6()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_6;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_7', 'atbs_block_posts_listing_list_7');
add_action('wp_ajax_atbs_block_posts_listing_list_7', 'atbs_block_posts_listing_list_7');
if (!function_exists('atbs_block_posts_listing_list_7')) {
    function atbs_block_posts_listing_list_7()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_7;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}

add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_1_has_sidebar', 'atbs_block_posts_listing_grid_1_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_1_has_sidebar', 'atbs_block_posts_listing_grid_1_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_1_has_sidebar')) {
    function atbs_block_posts_listing_grid_1_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_1_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_2_has_sidebar', 'atbs_block_posts_listing_grid_2_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_2_has_sidebar', 'atbs_block_posts_listing_grid_2_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_2_has_sidebar')) {
    function atbs_block_posts_listing_grid_2_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_2_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_3_has_sidebar', 'atbs_block_posts_listing_grid_3_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_3_has_sidebar', 'atbs_block_posts_listing_grid_3_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_3_has_sidebar')) {
    function atbs_block_posts_listing_grid_3_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_3_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_4_has_sidebar', 'atbs_block_posts_listing_grid_4_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_4_has_sidebar', 'atbs_block_posts_listing_grid_4_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_4_has_sidebar')) {
    function atbs_block_posts_listing_grid_4_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_4_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_1_has_sidebar', 'atbs_block_posts_listing_list_1_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_1_has_sidebar', 'atbs_block_posts_listing_list_1_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_1_has_sidebar')) {
    function atbs_block_posts_listing_list_1_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_1_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_2_has_sidebar', 'atbs_block_posts_listing_list_2_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_2_has_sidebar', 'atbs_block_posts_listing_list_2_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_2_has_sidebar')) {
    function atbs_block_posts_listing_list_2_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_2_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_3_has_sidebar', 'atbs_block_posts_listing_list_3_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_3_has_sidebar', 'atbs_block_posts_listing_list_3_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_3_has_sidebar')) {
    function atbs_block_posts_listing_list_3_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_3_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_4_has_sidebar', 'atbs_block_posts_listing_list_4_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_4_has_sidebar', 'atbs_block_posts_listing_list_4_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_4_has_sidebar')) {
    function atbs_block_posts_listing_list_4_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_4_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_5_has_sidebar', 'atbs_block_posts_listing_list_5_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_5_has_sidebar', 'atbs_block_posts_listing_list_5_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_5_has_sidebar')) {
    function atbs_block_posts_listing_list_5_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_5_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_6_has_sidebar', 'atbs_block_posts_listing_list_6_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_6_has_sidebar', 'atbs_block_posts_listing_list_6_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_6_has_sidebar')) {
    function atbs_block_posts_listing_list_6_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_6_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_list_7_has_sidebar', 'atbs_block_posts_listing_list_7_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_list_7_has_sidebar', 'atbs_block_posts_listing_list_7_has_sidebar');
if (!function_exists('atbs_block_posts_listing_list_7_has_sidebar')) {
    function atbs_block_posts_listing_list_7_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_List_7_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_alt_1_has_sidebar', 'atbs_block_posts_listing_grid_alt_1_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_alt_1_has_sidebar', 'atbs_block_posts_listing_grid_alt_1_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_alt_1_has_sidebar')) {
    function atbs_block_posts_listing_grid_alt_1_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Alt_1_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_alt_2_has_sidebar', 'atbs_block_posts_listing_grid_alt_2_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_alt_2_has_sidebar', 'atbs_block_posts_listing_grid_alt_2_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_alt_2_has_sidebar')) {
    function atbs_block_posts_listing_grid_alt_2_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Alt_2_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_alt_3_has_sidebar', 'atbs_block_posts_listing_grid_alt_3_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_alt_3_has_sidebar', 'atbs_block_posts_listing_grid_alt_3_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_alt_3_has_sidebar')) {
    function atbs_block_posts_listing_grid_alt_3_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Alt_3_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}
add_action('wp_ajax_nopriv_atbs_block_posts_listing_grid_alt_4_has_sidebar', 'atbs_block_posts_listing_grid_alt_4_has_sidebar');
add_action('wp_ajax_atbs_block_posts_listing_grid_alt_4_has_sidebar', 'atbs_block_posts_listing_grid_alt_4_has_sidebar');
if (!function_exists('atbs_block_posts_listing_grid_alt_4_has_sidebar')) {
    function atbs_block_posts_listing_grid_alt_4_has_sidebar()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $args       = isset( $_POST['args'] ) ? $_POST['args'] : null;
        $postOffset = isset( $_POST['postOffset'] ) ? $_POST['postOffset'] : null;
        $type       = isset( $_POST['type'] ) ? $_POST['type'] : null;
        $moduleInfo = isset( $_POST['moduleInfo'] ) ? $_POST['moduleInfo'] : null;

        $dataReturn = 'no-result';

        $args['offset'] = $postOffset;

        $the_query = ATBS_Ajax_Post_List::atbs_query($args);

        if ( $the_query->have_posts()) {
            $thismodule = new ATBS_Block_Posts_Listing_Grid_Alt_4_Has_Sidebar;
            $dataReturn = $thismodule->render_modules($the_query, $moduleInfo);

        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}