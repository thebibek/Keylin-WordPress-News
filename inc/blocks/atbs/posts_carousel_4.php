<?php
if (!class_exists('ATBS_Posts_Carousel_4')) {
    class ATBS_Posts_Carousel_4 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_posts_carousel_4-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;

            // Get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit', true );
            $moduleConfigs['custom_class']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_custom_class', true );
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs); //get query

            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-posts-carousel-4 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="atbs-keylin-block__inner">';
                $block_str .= $this->render_modules($the_query);              //render modules
                $block_str .= '</div><!-- .atbs-keylin-block__inner -->';
                $block_str .= '</div><!-- .atbs-keylin-block -->';
            endif;
            unset($moduleConfigs); unset($the_query);     //free
            wp_reset_postdata();
            return $block_str;
    	}
        public function render_modules ($the_query) {
            $postSource = get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_post_source', true );
            $postIcon = get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_post_icon', true );
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
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-580 post--overlay-huge post--overlay-huge-style-4 entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-1_1',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-22 font-semibold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            $render_modules = '';
            $currentPost = '';
            $maxPost = $the_query->post_count;
            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                if ($currentPost == 0):
                    if ($maxPost == 4):
                        $render_modules .= '<div class="container">';
                        $render_modules .= '<div class="atbs-keylin-carousel owl-carousel js-carousel-3i4m nav-visible-on-hover nav-hidden-xs dots-circle dots-visible-xs" data-carousel-loop="true">';
                    elseif ($maxPost < 4):
                        $render_modules .= '<div class="container">';
                        $render_modules .= '<div class="atbs-keylin-carousel slider-content-visible owl-carousel-no-slide">';
                    else:
                        $render_modules .= '<div class="atbs-keylin-carousel owl-carousel js-carousel-4i4m nav-visible-on-hover nav-hidden-xs dots-circle dots-visible-xs" data-carousel-loop="true">';
                    endif;
                endif;
                $postOverlayAttr['postID'] = get_the_ID();
                if ($postIconDetach != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if ($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    } else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                    $postOverlayAttr['postIcon']   = $postIconAttr;
                }
                $render_modules .= '<div class="slide-content">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div>';
            endwhile;
            $render_modules .= '</div><!-- .atbs-keylin-carousel -->';
            if ($maxPost <= 4):
                $render_modules .= '</div><!-- .container -->';
            endif;

            return $render_modules;
        }
    }
}