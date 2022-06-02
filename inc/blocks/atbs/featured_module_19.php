<?php
if (!class_exists('ATBS_Featured_Module_19')) {
    class ATBS_Featured_Module_19 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_featured_module_19-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            //get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = 4;
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs); //get query

            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            $headingTitle = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_title', true );
            $headingClass = 'block-heading--has-bg text-center';
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-featured-module-19 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= '<div class="atbs-keylin-block__inner">';
                if(!empty($headingTitle)):
                $block_str .= '<div class="block-heading '.$headingClass.'">';
                $block_str .= '<h4 data-title="'.esc_attr($headingTitle).'" class="block-heading__title"><span>'.esc_html($headingTitle).'</span></h4>';
                $block_str .= '</div>';
                endif;
                $block_str .= '<div class="posts-list posts-grid-no-thumb-fw">';
                $block_str .= $this->render_modules($the_query);              //render modules
                $block_str .= '</div><!-- .posts-list -->';
                $block_str .= '</div><!-- .atbs-keylin-block__inner -->';
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
            $render_modules = '';

            if ($postIcon == 'disable') {
                $postIconDetach = 1;
            } else {
                $postIconDetach = 0;
            }

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $postNoThumbHTML = new ATBS_Module_Post_No_Thumb_1;

            $postNoThumbAttr = array (
                'additionalClass'              => 'post--no-thumb-lg post--no-thumb-lg-style-1 entry-author-horizontal-middle position-initial',
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalTextClass'          => 'inverse-text position-initial',
                'typescale'                    => 'typescale-5 font-semibold margin-bottom-20 line-limit-child line-limit-4',
                'meta'                         => array('author_has_by_has_time_no_avatar'),
            );

            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $postNoThumbAttr['postID'] = get_the_ID();
                $render_modules .= '<div class="list-item position-relative">';
                $render_modules .= $postNoThumbHTML->render($postNoThumbAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            return $render_modules;
        }
    }
}
