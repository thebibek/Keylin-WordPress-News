<?php
if (!class_exists('ATBS_Ajax_Search')) {
    class ATBS_Ajax_Search {
        //Search Query
        static function atbs_query($searchTerm) {
            $args = array(
                's' => esc_sql($searchTerm),
                'post_type' => array('post'),
                'post_status' => 'publish',
                'posts_per_page' => 8,
            );

            $the_query = new WP_Query($args);
            return $the_query;
        }
        static function atbs_ajax_content( $the_query, $users_found ) {
            $searchTerm      = isset( $_POST['searchTerm'] ) ? $_POST['searchTerm'] : null;

            // Post Icon
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            // Category
            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);

            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-small',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-18 font-bold line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr,
                'DarkMode'                     => 1,
            );

            $search_data = '';
            $search_data .= '<div class="posts-list posts-grid-style-4 flexbox-wrap flexbox-wrap-4i flex-space-30">';

            $currentPost = 0;

            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post + 1;
                $postVerticalAttr['postID'] = get_the_ID();

                $addClass = 'overlay-item--sm-p';
                $postIconAttr['iconType']       = ATBS_Core::bk_post_format_detect(get_the_ID());
                $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', 'top-right', $addClass);
                $postVerticalAttr['postIcon']   = $postIconAttr;

                $search_data .= '<div class="list-item" style="--time-delay:'.$currentPost.' ">';
                $search_data .= $postVerticalHTML->render($postVerticalAttr);
                $search_data .= '</div> <!-- list-item -->';
            endwhile;

            $search_data .= '</div> <!-- .posts-list -->';

            if($currentPost > 0) :
                $search_data .= '<nav class="atbs-keylin-pagination text-center">';
                $search_data .= '<button class="btn btn-default js-ajax-load-post-trigger"><a href="' . get_search_link($searchTerm) . '">' .esc_html__('Show all results', 'keylin'). '</a></button>';
                $search_data .= '</nav>';
            endif;

            return $search_data;
        }
    }
}
add_action('wp_ajax_nopriv_atbs_ajax_search', 'atbs_ajax_search');
add_action('wp_ajax_atbs_ajax_search', 'atbs_ajax_search');
if (!function_exists('atbs_ajax_search')) {
    function atbs_ajax_search()
    {
        check_ajax_referer( 'atbs_ajax_security', 'securityCheck' );

        $searchTerm      = isset( $_POST['searchTerm'] ) ? $_POST['searchTerm'] : null;

        $dataReturn = '<div class="atbs-ajax-no-result">' . esc_html__('No results', 'keylin') . '</div>';

        $the_query = ATBS_Ajax_Search::atbs_query($searchTerm);

        $users = new WP_User_Query( array(
            'search'         => '*'.esc_attr( $searchTerm ).'*',
            'search_columns' => array(
                'user_login',
                'user_nicename',
                'user_email',
                'user_url',
            ),
        ) );

        $users_found = $users->get_results();

        if (( $the_query->have_posts() ) || count($users_found)) {
            $dataReturn = ATBS_Ajax_Search::atbs_ajax_content($the_query, $users_found);
        }else {
            $dataReturn = '<div class="atbs-ajax-no-result">' . esc_html__('No results', 'keylin') . '</div>';
        }
        die(json_encode($dataReturn));
    }
}