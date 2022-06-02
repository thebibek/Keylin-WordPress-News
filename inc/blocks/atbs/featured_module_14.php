<?php
if (!class_exists('ATBS_Featured_Module_14')) {
    class ATBS_Featured_Module_14 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_featured_module_14-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            //get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = 3;
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs); //get query

            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-featured-module-14 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="container">';
                $block_str .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-30">';
                $block_str .= $this->render_modules($the_query);              //render modules
                $block_str .= '</div><!-- .atbs-keylin-block__inner -->';
                $block_str .= '</div><!-- .container -->';
                $block_str .= '</div><!-- .atbs-keylin-block -->';
            endif;
            unset($moduleConfigs); unset($the_query);     //free
            wp_reset_postdata();
            return $block_str;
    	}
        public function render_modules ($the_query){
            $postSource = self::$pageInfo ? get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_post_source', true ) : 'all';
            $postIcon = self::$pageInfo ? get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_post_icon', true ) : 'enable';
            $iconPosition = 'top-right';
            $currentPost = 0;
            $page_info = self::$pageInfo;
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
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-620 post--overlay-huge post--overlay-huge-style-1 entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-l-16_9',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-26 font-bold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            $postHorizontalHTML = new ATBS_Module_Post_Horizontal_1;
            $postHorizontalAttr_1 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--horizontal-reverse post--horizontal-middle post--horizontal-small post--horizontal-small-style-3 post-thumb-height-285 entry-author-horizontal-middle',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xs-1_1',
                'typescale'                    => 'f-22 font-semibold line-limit-child line-limit-3',
                'meta'                         => array('author_has_by'),
                'additionalMetaClass'          => 'margin-top-15',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );

            $postHorizontalAttr_2 = $postHorizontalAttr_1;
            $postHorizontalAttr_2['additionalClass']  = 'post--horizontal-middle post--horizontal-small post--horizontal-small-style-3 post-thumb-height-285 entry-author-horizontal-middle';

            $render_modules = '';
            $currentPost = '';

            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $maxPost = $the_query->post_count;
                if ($currentPost == 0):
                    $postOverlayAttr['postID'] = get_the_ID();
                    if ($postIconDetach != 1) {
                        $addClass = '';  // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postOverlayAttr['postIcon']   = $postIconAttr;
                    }
                    $render_modules .= '<div class="col-left">';
                    $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                    $render_modules .= '</div><!-- .col-left -->';
                elseif ($currentPost == 1):
                    $render_modules .= '<div class="col-right">';
                    $render_modules .= '<div class="posts-list list-space-xxl posts-list-style-13">';
                    if ($postIconDetach != 1) {
                        $addClass = 'overlay-item--sm-p';
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', $iconPosition, $addClass);
                        $postHorizontalAttr_1['postIcon']   = $postIconAttr;
                    }
                    $postHorizontalAttr_1['postID'] = get_the_ID();
                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr_1);
                    $render_modules .= '</div><!-- .list-item -->';
                else:
                    if ($postIconDetach != 1) {
                        $addClass = 'overlay-item--sm-p';
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', $iconPosition, $addClass);
                        $postHorizontalAttr_2['postIcon']   = $postIconAttr;
                    }
                    $postHorizontalAttr_2['postID'] = get_the_ID();
                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr_2);
                    $render_modules .= '</div><!-- .list-item -->';
                endif;
            endwhile;

            if ($currentPost > 0):
                $render_modules .= '</div><!-- .posts-list -->';
                $render_modules .= '</div><!-- .col-right -->';
            endif;
            return $render_modules;
        }
    }
}