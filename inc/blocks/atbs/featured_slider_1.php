<?php
if (!class_exists('ATBS_Featured_Slider_1')) {
    class ATBS_Featured_Slider_1 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_featured_slider_1-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            // get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit', true );
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs); // get query

            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-featured-slider-1 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
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
        public function render_modules ($the_query){
            $sliderID = uniqid('slider-');
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
            $postOverlayHTML = new ATBS_Module_Post_Overlay_1;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-middle post--overlay-center post--overlay-height-700 post--overlay-fullwidth',
                'additionalThumbClass'         => 'post__thumb--overlay thumb-darkened atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xxl',
                'additionalTextClass'          => 'inverse-text text-center',
                'meta'                         => array('date_without_icon'),
                'meta_2'                       => array('author_avatar'),
                'additionalMetaClass_2'        => 'entry-author-horizontal-middle',
                'typescale'                    => 'f-40 font-bold margin-bottom-0 line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr
            );

            $render_modules = '';
            $currentPost = '';
            $maxPost = $the_query->post_count;
            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                if ($currentPost == 0):
                    if ($maxPost < 2):
                        $render_modules .= '<div id="'.$sliderID.'" class="atbs-keylin-carousel slider-content-visible owl-carousel-no-slide">';
                    else:
                        $render_modules .= '<div id="'.$sliderID.'" class="atbs-keylin-carousel owl-carousel js-carousel-1i nav-hidden dots-circle dots-inverse dots-vertical" data-carousel-loop="true">';
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
            return $render_modules;
        }
    }
}
