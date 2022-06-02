<?php
if (!class_exists('ATBS_Block_Posts_Listing_List_3')) {
    class ATBS_Block_Posts_Listing_List_3 {

        static $pageInfo = 0;

        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_block_posts_listing_list_3-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit', true );
            $moduleConfigs['custom_class']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_custom_class', true );
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $moduleConfigs['ajax_load_more'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_ajax_load_more', true );
            $viewallButton = array();
            if ($moduleConfigs['ajax_load_more'] == 'viewall') :
                $viewallButton['view_all_link'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_link', true );
                $viewallButton['view_all_text'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_text', true );
                $viewallButton['view_all_target'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_target', true );
            endif;
            $moduleInfo = array(
                'post_source'   => $moduleConfigs['post_source'],
                'post_icon'     => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_post_icon', true ),
            );
            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs, $moduleID);              //get query
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-listing--list-3 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
            $block_str .= ATBS_Core::bk_render_block_heading($page_info, 'container--narrow');
            $block_str .= '<div class="container container--narrow">';
            $block_str .= '<div class="atbs-keylin-block__inner">';
            if ($moduleConfigs['ajax_load_more'] == 'loadmore') {
                $block_str .= '<div class="js-ajax-load-post" data-posts-to-load="'.$moduleConfigs['limit'].'">';
            } elseif ($moduleConfigs['ajax_load_more'] == 'infinity') {
                $block_str .= '<div class="js-ajax-load-post infinity-ajax-load-post" data-posts-to-load="'.$moduleConfigs['limit'].'">';
            }
            $block_str .= '<div class="posts-list list-space-xl posts-list-style-5">';
            if ( $the_query->have_posts() ) :
                $block_str .= $this->render_modules($the_query, $moduleInfo);            //render modules
            endif;
            $block_str .= '</div>';
            $atbsMaxPages = ATBS_Ajax_Function::max_num_pages_cal($the_query, $moduleConfigs['offset'], $moduleConfigs['limit']);
            $block_str .= ATBS_Ajax_Function::ajax_load_buttons($moduleConfigs['ajax_load_more'], $atbsMaxPages, $viewallButton);
            if (($moduleConfigs['ajax_load_more'] == 'loadmore') || ($moduleConfigs['ajax_load_more'] == 'infinity')) {
                $block_str .= '</div><!-- .js-ajax-load-post-->';
            }
            $block_str .= '</div><!-- .atbs-keylin-block__inner -->';
            $block_str .= '</div><!-- .container -->';
            $block_str .= '</div><!-- .atbs-keylin-block -->';
            unset($moduleConfigs); unset($the_query);     //free
            wp_reset_postdata();
            return $block_str;
        }
        public function render_modules ($the_query, $moduleInfo = ""){
            $iconPosition = 'top-right';
            $currentPost = 0;
            $postSource = $moduleInfo['post_source'];
            $postIcon = $moduleInfo['post_icon'];
            $postIconDetach = 0;
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            if ($postIcon == 'disable') {
                $postIconDetach = 1;
            } else {
                $postIconDetach = 0;
            }

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);

            $postHorizontalHTML = new ATBS_Module_Post_Horizontal_1;
            $postHorizontalAttr = array (
                'additionalClass'              => 'post--horizontal-middle post--horizontal-large post-thumb-height-340  post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-sm-1_1',
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'typescale'                    => 'f-26 font-bold',
                'except_length'                => 15,
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );

            $render_modules = '';
            $currentPost = '';

            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $postHorizontalAttr['postID'] = get_the_ID();
                if ($postIconDetach != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if ($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    } else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                    $postHorizontalAttr['postIcon'] = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postHorizontalHTML->render($postHorizontalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            return $render_modules;
        }
    }
}