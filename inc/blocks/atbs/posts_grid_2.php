<?php
if (!class_exists('ATBS_Posts_Grid_2')) {
    class ATBS_Posts_Grid_2 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_posts_grid_2-');
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
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs);              //get query
            //Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-posts-grid-2 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="container">';
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
            $mailchimp_shortcode  = get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_mailchimp_shortcode', true );
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
            $postVerticalHTML = new ATBS_Module_Post_Vertical_3;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-small',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xs-4_3',
                'typescale'                    => 'f-20 font-semibold',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );
            $render_modules = '';
            if (isset($mailchimp_shortcode) && ($mailchimp_shortcode != '')) :
                $render_modules .= '<div class="col-left">';
                $render_modules .= '<div class="atbs-keylin-block-subscribe">';
                $render_modules .= '<div class="atbs-keylin-block-subscribe__inner">';
                $render_modules .= do_shortcode($mailchimp_shortcode);
                $render_modules .= '</div><!-- .atbs-keylin-block-subscribe__inner -->';
                $render_modules .= '</div><!-- .atbs-keylin-block-subscribe -->';
                $render_modules .= '</div><!-- .col-left -->';
            endif;
            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $maxPost = $the_query->post_count;
                if ($currentPost == 0):
                    $render_modules .= '<div class="col-right">';
                    $render_modules .= '<div class="posts-list posts-grid-style-4 flexbox-wrap flexbox-wrap-3i flex-space-30">';
                endif;
                $postVerticalAttr['postID'] = get_the_ID();
                if ($postIconDetach != 1) {
                    $addClass = 'overlay-item--sm-p';
                    if ($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    } else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', $iconPosition, $addClass);
                    $postVerticalAttr['postIcon'] = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;
                $render_modules .= '</div><!-- .posts-list -->';
                $render_modules .= '</div><!-- .col-right -->';
            return $render_modules;
        }
    }
}
