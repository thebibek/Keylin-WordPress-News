<?php
if (!class_exists('ATBS_Ajax_Megamenu')) {
    class ATBS_Ajax_Megamenu {
        //Search Query
        static function atbs_query($CatID, $megaMenuStyle = 1) {
            $args = array(
                'cat' => $CatID,
                'post_type' => 'post',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'posts_per_page' => 4
            );
            if($megaMenuStyle == 3) {
                $args['posts_per_page'] = 8;
            }
            $the_query = new WP_Query($args);
            return $the_query;
        }
        static function atbs_ajax_content( $the_query, $megaMenuStyle ) {
            $contentReturn = '';
            if($megaMenuStyle == 2) {
                $contentReturn .= ATBS_Header::bk_get_megamenu_1stlarge_posts($the_query);
            } elseif ($megaMenuStyle == 3) {
                $contentReturn .= ATBS_Header::bk_get_megamenu_4thlarge_posts($the_query);
            } else {
                $contentReturn .= ATBS_Header::bk_get_megamenu_posts($the_query);
            }
            return $contentReturn;
        }
    }
}
add_action('wp_ajax_nopriv_atbs_ajax_megamenu', 'atbs_ajax_megamenu');
add_action('wp_ajax_atbs_ajax_megamenu', 'atbs_ajax_megamenu');
if (!function_exists('atbs_ajax_megamenu')) {
    function atbs_ajax_megamenu() {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );
        $CatID      = isset( $_POST['thisCatID'] ) ? $_POST['thisCatID'] : null;
        $megaMenuStyle = isset( $_POST['megaMenuStyle'] ) ? $_POST['megaMenuStyle'] : null;
        $dataReturn = 'no-result';
        $the_query = ATBS_Ajax_Megamenu::atbs_query($CatID, $megaMenuStyle);
        if ( $the_query->have_posts() ) {
            $dataReturn = ATBS_Ajax_Megamenu::atbs_ajax_content($the_query, intval($megaMenuStyle));
        } else {
            $dataReturn = 'no-result';
        }
        die(json_encode($dataReturn));
    }
}