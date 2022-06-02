<?php
if (!class_exists('ATBS_Posts_Grid_1')) {
    class ATBS_Posts_Grid_1 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_posts_grid_1-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            //get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = 5;
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs);              //get query
            //Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-posts-grid-1 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="container">';
                $block_str .= '<div class="atbs-keylin-block__inner">';
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
            $currentPost = null;
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
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--horizontal-big',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-l-4_3',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'typescale'                    => 'f-34 font-bold line-limit-child line-limit-3',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-large',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-16_9',
                'additionalTextClass'          => 'inverse-text',
                'additionalTextInnerClass'     => 'bg-dark',
                'typescale'                    => 'f-22 font-semibold line-limit-child line-limit-4',
                'postIcon'                     => $postIconAttr,
            );
            $postNoThumbHTML = new ATBS_Module_Post_No_Thumb_1;
            $postNoThumbAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--no-thumb-huge',
                'thumb'                        => 1,
                'additionalThumbClass'         => 'atbs-thumb-object-fit hidden-lg hidden-md',
                'thumbSize'                    => 'atbs-xs-4_3',
                'typescale'                    => 'f-30 font-bold line-limit-child line-limit-4',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );
            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-medium post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xs-4_3',
                'typescale'                    => 'f-22 font-semibold line-limit-child line-limit-3',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );
            $render_modules = '';
            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $maxPost = $the_query->post_count;
                if ($currentPost == 0):
                    $postHorizontalAttr['postID'] = get_the_ID();
                    if ($postIconDetach != 1) {
                        $addClass = '';  // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postHorizontalAttr['postIcon'] = $postIconAttr;
                    }
                    $render_modules .= '<div class="section-1 position-relative margin-bottom-70">';
                    $render_modules .= '<div class="col-left">';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr);
                    $render_modules .= '</div><!-- .col-left -->';
                elseif ($currentPost == 1):
                    $postOverlayAttr['postID'] = get_the_ID();
                    if ($postIconDetach != 1) {
                        $addClass = '';  // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postOverlayAttr['postIcon'] = $postIconAttr;
                    }
                    $render_modules .= '<div class="col-right position-bottom-right">';
                    $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                    $render_modules .= '</div><!-- .col-right -->';
                    $render_modules .= '</div><!-- .section-1 -->';
                else:
                    if ($currentPost == 2):
                        $postNoThumbAttr['postID'] = get_the_ID();
                        $render_modules .= '<div class="section-2">';
                        $render_modules .= '<div class="posts-list flexbox-wrap flexbox-wrap-3i flex-space-30 posts-grid-style-1">';
                        $render_modules .= '<div class="list-item">';
                        $render_modules .= $postNoThumbHTML->render($postNoThumbAttr);
                        $render_modules .= '</div><!-- .list-item -->';
                    else:
                        $postVerticalAttr['postID'] = get_the_ID();
                        if ($postIconDetach != 1) {
                            $addClass = ''; // overlay-item--sm-p
                            if ($postSource != 'all') {
                                $postIconAttr['iconType'] = $postSource;
                            } else {
                                $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                            }
                            $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                            $postVerticalAttr['postIcon'] = $postIconAttr;
                        }
                        $render_modules .= '<div class="list-item">';
                        $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                        $render_modules .= '</div><!-- .list-item -->';
                    endif;
                endif;
            endwhile;
            if ($currentPost == 0):
                $render_modules .= '</div><!-- .section-1 -->';
            elseif ($currentPost > 1):
                $render_modules .= '</div><!-- .posts-list -->';
                $render_modules .= '</div><!-- .section-2 -->';
            endif;
            return $render_modules;
        }
    }
}
