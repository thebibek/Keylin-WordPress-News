<?php
if (!class_exists('ATBS_Posts_Grid_6')) {
    class ATBS_Posts_Grid_6 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_posts_grid_6-');
            $moduleConfigs = array();
            $moduleData = array();
            self::$pageInfo = $page_info;
            //get config
            $moduleConfigs = ATBS_Composer_Global_Options::composer_get_configured_options($page_info);
            $moduleConfigs['limit'] = 9;
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = $moduleConfigs['custom_class'].' ';
            } else {
                $moduleCustomClass = '';
            }
            $the_query = ATBS_Get_Query::atbs_query($moduleConfigs); //get query
            $moduleConfigs['container_width'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_container_width', true );
            if($moduleConfigs['container_width'] == 'wide'):
                $containerW = 'container container-md-fullwidth container--wide-lg';
            else:
                $containerW = 'container container-md-fullwidth';
            endif;
            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-posts-grid-6 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="'.esc_attr($containerW).'">';
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
                'catClass'                     => $cat_Class.'',
                'additionalClass'              => 'post--overlay-grid-small entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xxl',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-20 font-medium margin-bottom-15 line-limit-child line-limit-4',
                'meta'                         => array('author_has_by_has_time_no_avatar'),
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );

            $render_modules = '';
            $currentPost = '';
            $render_modules .= '<div class="posts-list flexbox-wrap flexbox-wrap-3i posts-grid-seperated posts-grid-overlay-background-hover">';
            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $postOverlayAttr['postID'] = get_the_ID();
                $render_modules .= '<div class="list-item" tabindex="0">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;
            $render_modules .= '</div><!-- .posts-list -->';
            return $render_modules;
        }
    }
}