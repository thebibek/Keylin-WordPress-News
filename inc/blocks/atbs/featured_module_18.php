<?php
if (!class_exists('ATBS_Featured_Module_18')) {
    class ATBS_Featured_Module_18 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_featured_module_18-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            //get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = 11;
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = ' '.$moduleConfigs['custom_class'];
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs); //get query
            $moduleConfigs['container_width'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_container_width', true );
            if($moduleConfigs['container_width'] == 'wide'):
                $containerW = 'container container--wide-lg';
            else:
                $containerW = 'container';
            endif;
            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-featured-module-18'.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info, '');// ,'sidebar'
                $block_str .= '<div class="'.esc_attr($containerW).'">';
                $block_str .= '<div class="atbs-keylin-block__inner flexbox-wrap flex-space-30">';
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

            $postOverlayHTML_1 = new ATBS_Module_Post_Overlay_2;
            $postOverlayHTML_2 = new ATBS_Module_Post_Overlay_2;
            $postHorizontalHTML = new ATBS_Module_Post_Horizontal_1;

            $postOverlayAttr_1 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-480 post--overlay-huge post--overlay-huge-style-8 entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-26 font-bold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            $postOverlayAttr_2 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-480 post--overlay-medium post--overlay-medium-style-4',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-20 font-semibold margin-bottom-0 line-limit-child line-limit-4',
                'postIcon'                     => $postIconAttr
            );
            $postOverlayAttr_3 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-280 post--overlay-tiny',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xs-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-20 font-semibold margin-bottom-0 line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr
            );

            $postHorizontalAttr = array (
                'additionalClass'       =>  'post--horizontal-tiny post--horizontal-tiny-style-2 post--horizontal-reverse post--horizontal-middle post--horizontal-xs',
                'thumbSize'             =>  'atbs-xxs-1_1',
                'additionalThumbClass'  => 'atbs-thumb-object-fit post__thumb--circle',
//                'meta'                  =>  array('date_without_icon'),
                'typescale'             =>  'f-16 font-semibold line-limit-child line-limit-3',
                'DarkMode'              => 1,
            );

            $render_modules = '';
            $currentPost = '';

            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                if ($currentPost == 0):
                    $postOverlayAttr_1['postID'] = get_the_ID();
                    if ($postIconDetach != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postOverlayAttr_1['postIcon']   = $postIconAttr;
                    }
                    $render_modules .= '<div class="col-left">';
                    $render_modules .= '<div class="section-1 flexbox-wrap flex-space-20">';
                    $render_modules .= '<div class="col-left">';
                    $render_modules .= $postOverlayHTML_1->render($postOverlayAttr_1);
                    $render_modules .= '</div><!-- .col-left -->';
                elseif ($currentPost == 1):
                    $postOverlayAttr_2['postID'] = get_the_ID();
                    if ($postIconDetach != 1) {
                        $addClass = '';
                        if ($postSource != 'all') {
                            $postIconAttr['iconType']   = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postOverlayAttr_2['postIcon']  = $postIconAttr;
                    }
                    $render_modules .= '<div class="col-right">';
                    $render_modules .= $postOverlayHTML_2->render($postOverlayAttr_2);
                    $render_modules .= '</div><!-- .col-right -->';
                    $render_modules .= '</div><!-- .section-1 -->';
                elseif ($currentPost < 5):
                    if ($currentPost == 2):
                        $render_modules .= '<div class="section-2">';
                        $render_modules .= '<div class="posts-list flexbox-wrap flexbox-wrap-3i flex-space-20 posts-grid-style-15">';
                    endif;
                    $postOverlayAttr_3['postID'] = get_the_ID();
                    if ($postIconDetach != 1) {
                        $addClass = 'overlay-item--sm-p';
                        if ($postSource != 'all') {
                            $postIconAttr['iconType']   = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', $iconPosition, $addClass);
                        $postOverlayAttr_3['postIcon']  = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postOverlayHTML_2->render($postOverlayAttr_3);
                    $render_modules .= '</div><!-- .list-item -->';
                else:
                     if ($currentPost == 5):
                        $render_modules .= '</div><!-- .posts-list -->';
                        $render_modules .= '</div><!-- .section-2 -->';
                        $render_modules .= '</div><!-- .col-left -->';
                        $render_modules .= '<div class="col-right">';
                        $render_modules .= '<div class="posts-list list-seperated list-space-md posts-list-style-7">';
                    endif;
                    $postHorizontalAttr['postID'] = get_the_ID();
                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr);
                    $render_modules .= '</div><!-- .list-item -->';
                endif;
            endwhile;
            if ($currentPost < 5):
                if ($currentPost < 1):
                    $render_modules .= '</div><!-- .section-1 -->';
                elseif ($currentPost > 1):
                    $render_modules .= '</div><!-- .posts-list -->';
                    $render_modules .= '</div><!-- .section-2 -->';
                endif;
                $render_modules .= '</div><!-- .col-left-->';
            else:
                $render_modules .= '</div><!-- .posts-list -->';
                $render_modules .= '</div><!-- .col-right -->';
            endif;
            return $render_modules;
        }
    }
}
