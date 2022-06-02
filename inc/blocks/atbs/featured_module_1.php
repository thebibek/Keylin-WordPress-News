<?php
if (!class_exists('ATBS_Featured_Module_1')) {
    class ATBS_Featured_Module_1 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_featured_module_1-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            //get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = 2;
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }

            $moduleConfigs['container_width'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_container_width', true );
            if($moduleConfigs['container_width'] == 'wide'):
                $containerW = 'container container--wide-lg';
            else:
                $containerW = 'container';
            endif;

            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs);              //get query
            //Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-featured-module-1 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="'.esc_attr($containerW).'">';
                $block_str .= '<div class="atbs-keylin-block__inner flexbox-wrap">';
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
                'catClass'                     => $cat_Class.' cat-lg cat-line-after',
                'additionalClass'              => 'post--horizontal-middle post--horizontal-reverse post--horizontal-massive',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-1_1',
                'typescale'                    => 'font-bold f-48 text-uppercase line-limit-child line-limit-6',
                'postIcon'                     => $postIconAttr,
                'DarkMode'                     => 1,
            );
            $postVerticalHTML = new ATBS_Module_Post_Vertical_1;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--vertical-reverse post--vertical-large-bg',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xs-1_1',
                'additionalTextClass'          => 'bg-dark inverse-text',
                'meta'                         => array('date_without_icon'),
                'typescale'                    => 'f-30 font-semibold text-uppercase line-limit-child line-limit-4',
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
                        $postHorizontalAttr['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="col-left">';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr);
                    $render_modules .= '</div><!-- .col-left -->';
                else:
                    $postVerticalAttr['postID'] = get_the_ID();
                        if ($postIconDetach != 1) {
                        $addClass = '';  // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postVerticalAttr['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="col-right">';
                    $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                    $render_modules .= '</div><!-- .col-right -->';
                endif;
            endwhile;
            return $render_modules;
        }
    }
}
