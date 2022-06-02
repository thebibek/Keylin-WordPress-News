<?php
if (!class_exists('ATBS_Featured_Module_13')) {
    class ATBS_Featured_Module_13 {
        static $pageInfo = 0;
        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_featured_module_13-');
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
                $containerW = 'container container--wide-lg';
            else:
                $containerW = 'container';
            endif;

            // Margin
            $blockMarginTopClass = ATBS_Core::bk_get_module_custom_spacing($page_info);
            if ( $the_query->have_posts() ) :
                $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block-custom-margin atbs-keylin-featured-module-13 '.$moduleCustomClass.' '.$blockMarginTopClass.'">';
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);// ,'sidebar'
                $block_str .= '<div class="'.esc_attr($containerW).'">';
                $block_str .= '<div class="atbs-keylin-block__inner flexbox-wrap flex-space-30">';
                $block_str .= $this->render_modules($the_query);              //render modules
                $block_str .= '</div><!-- .atbs-keylin-block__inner -->';
                $block_str .= '</div><!-- .container -->';
                $block_str .= '</div><!-- .atbs-keylin-block -->';
            endif;
            unset($moduleConfigs); unset($the_query);   // free
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

            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr_1 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post post--vertical post--vertical-huge post--vertical-huge-style-1 has-readmore ',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-4_3',
                'typescale'                    => 'f-28 font-bold margin-bottom-18 line-limit-child line-limit-3',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'meta'                         => array('date_without_icon'),
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );
            $postVerticalHTML_2 = new ATBS_Module_Post_Vertical_3;
            $postVerticalAttr_2 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-small post--vertical-small-style-4',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-xs-4_3',
                'typescale'                    => 'f-20 font-semibold line-limit-child line-limit-3',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );

            $postHorizontalHTML = new ATBS_Module_Post_Horizontal_1;
            $postHorizontalAttr_2 = array (
                'additionalClass'       =>  'post--horizontal-tiny post--horizontal-tiny-style-2 post--horizontal-middle post--horizontal-xs',
                'thumbSize'             =>  'atbs-xxs-1_1',
                'additionalThumbClass'  => 'atbs-thumb-object-fit post__thumb--circle',
                'DarkMode'              => 1,
                'typescale'             =>  'f-16 font-semibold line-limit-child line-limit-3',
//                'meta'                  =>  array('date_without_icon'),
            );

            $render_modules = '';
            $currentPost = '';

            while ( $the_query->have_posts() ): $the_query->the_post();
                $currentPost = $the_query->current_post;
                $maxPost = $the_query->post_count;

                if ( $currentPost == 0 ):
                    $render_modules .= '<div class="col-1">';
                    $render_modules .= '<div class="posts-list list-seperated list-space-xl posts-list-style-10">';

                    $postVerticalAttr_1['postID'] = get_the_ID();
                    if ( $postIconDetach != 1 ) {
                        $addClass = ''; // overlay-item--sm-p
                        if ( $postSource != 'all' ) {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postVerticalAttr_1['postIcon']   = $postIconAttr;
                    }

                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postVerticalHTML->render($postVerticalAttr_1);
                    $render_modules .= '</div> <!-- .list-item -->';

                elseif ( ($currentPost > 0) && ($currentPost < 3) ):
                    if ( $currentPost == 1 ):
                        $render_modules .= '</div> <!-- .posts-list -->';
                        $render_modules .= '</div> <!-- .col-1 -->';
                        $render_modules .= '<div class="col-2">';
                        $render_modules .= '<div class="posts-list list-space-lg posts-list-style-11">';
                    endif;

                    $postVerticalAttr_2['postID'] = get_the_ID();
                    if ( $postIconDetach != 1 ) {
                        $addClass = 'overlay-item--sm-p';
                        if ( $postSource != 'all' ) {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', $iconPosition, $addClass);
                        $postVerticalAttr_2['postIcon']   = $postIconAttr;
                    }

                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postVerticalHTML_2->render($postVerticalAttr_2);
                    $render_modules .= '</div> <!-- .list-item -->';
                else:
                    if ( $currentPost == 3 ):
                        $render_modules .= '</div> <!-- .posts-list -->';
                        $render_modules .= '</div> <!-- .col-2 -->';
                        $render_modules .= '<div class="col-3">';
                        $render_modules .= '<div class="posts-list list-seperated list-space-md posts-list-style-7">';
                    endif;

                    $postHorizontalAttr_2['postID'] = get_the_ID();
                    $render_modules .= '<div class="list-item">';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr_2);
                    $render_modules .= '</div> <!-- .list-item -->';
                endif;
            endwhile;

            if ( $currentPost >= 0 ):
                if ( $currentPost < 1 ):
                    $render_modules .= '</div> <!-- .posts-list -->';
                    $render_modules .= '</div> <!-- .col-1 -->';
                elseif ( $currentPost < 3 ):
                    $render_modules .= '</div> <!-- .posts-list -->';
                    $render_modules .= '</div> <!-- .col-2 -->';
                else:
                    $render_modules .= '</div> <!-- .posts-list -->';
                    $render_modules .= '</div> <!-- .col-3 -->';
                endif;
            endif;
            return $render_modules;
        }
    }
}