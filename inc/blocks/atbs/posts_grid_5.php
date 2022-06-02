<?php
if (!class_exists('ATBS_Posts_Grid_5')) {
    class ATBS_Posts_Grid_5 {

        static $pageInfo = 0;

        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_posts_grid_5-');

            $moduleConfigs_1 = array();
            $moduleConfigs_2 = array();
            $moduleConfigs_3 = array();

            self::$pageInfo = $page_info;

            // get config

            $moduleConfigs_1['title']   = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_title_1', true );
            $moduleConfigs_1['orderby'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_orderby_1', true );
            $moduleConfigs_1['tags']    = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_tags_1', true );
            $moduleConfigs_1['limit']   = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit_1', true );
            $moduleConfigs_1['offset']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_offset_1', true );
            $moduleConfigs_1['feature'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_feature_1', true );
            $moduleConfigs_1['category_id'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_category_1', true );
            $moduleConfigs_1['editor_exclude'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_editor_exclude_1', true );
            $moduleConfigs_1['load_more'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_load_more_1', true );

            $moduleConfigs_1['heading_inverse'] = 'no';
            $moduleConfigs_1['viewmore'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_viewmore_1', true );

            $viewallButton_1 = array();
            if ($moduleConfigs_1['load_more'] == 'viewall') :
                $viewallButton_1['view_all_link'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_link_1', true );
                $viewallButton_1['view_all_text'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_text_1', true );
                $viewallButton_1['view_all_target'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_target_1', true );
            endif;

            if (isset($moduleConfigs_1['heading_style'])) {
                $headingClass_1 = ATBS_Core::bk_get_block_heading_class('', $moduleConfigs_1['heading_inverse']);
            } else {
                $headingClass_1 = '';
            }

            $moduleConfigs_2['title']   = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_title_2', true );
            $moduleConfigs_2['orderby'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_orderby_2', true );
            $moduleConfigs_2['tags']    = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_tags_2', true );
            $moduleConfigs_2['limit']   = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit_2', true );
            $moduleConfigs_2['offset']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_offset_2', true );
            $moduleConfigs_2['feature'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_feature_2', true );
            $moduleConfigs_2['category_id'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_category_2', true );
            $moduleConfigs_2['editor_exclude'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_editor_exclude_2', true );
            $moduleConfigs_2['load_more'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_load_more_2', true );

            $moduleConfigs_2['heading_inverse'] = 'no';
            $moduleConfigs_2['viewmore'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_viewmore_2', true );

            $viewallButton_2 = array();
            if ($moduleConfigs_2['load_more'] == 'viewall') :
                $viewallButton_2['view_all_link'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_link_2', true );
                $viewallButton_2['view_all_text'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_text_2', true );
                $viewallButton_2['view_all_target'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_target_2', true );
            endif;

            if (isset($moduleConfigs_2['heading_style'])) {
                $headingClass_2 = ATBS_Core::bk_get_block_heading_class('', $moduleConfigs_2['heading_inverse']);
            } else {
                $headingClass_2 = '';
            }

            $moduleConfigs_3['title']   = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_title_3', true );
            $moduleConfigs_3['orderby'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_orderby_3', true );
            $moduleConfigs_3['tags']    = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_tags_3', true );
            $moduleConfigs_3['limit']   = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit_3', true );
            $moduleConfigs_3['offset']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_offset_3', true );
            $moduleConfigs_3['feature'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_feature_3', true );
            $moduleConfigs_3['category_id'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_category_3', true );
            $moduleConfigs_3['editor_exclude'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_editor_exclude_3', true );
            $moduleConfigs_3['load_more'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_load_more_3', true );
            $moduleConfigs_3['heading_inverse'] = 'no';
            $moduleConfigs_3['viewmore'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_viewmore_3', true );

            $viewallButton_3 = array();
            if ($moduleConfigs_3['load_more'] == 'viewall') :
                $viewallButton_3['view_all_link'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_link_3', true );
                $viewallButton_3['view_all_text'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_text_3', true );
                $viewallButton_3['view_all_target'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_all_target_3', true );
            endif;

            if (isset($moduleConfigs_3['heading_style'])) {
                $headingClass_3 = ATBS_Core::bk_get_block_heading_class('', $moduleConfigs_3['heading_inverse']);
            } else {
                $headingClass_3 = '';
            }

            $moduleConfigs['custom_class']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_custom_class', true );
            if ($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = ' '.$moduleConfigs['custom_class'];
            } else {
                $moduleCustomClass = '';
            }

            //get query
            $the_query_1 = ATBS_Get_Query::query($moduleConfigs_1);
            $the_query_2 = ATBS_Get_Query::query($moduleConfigs_2);
            $the_query_3 = ATBS_Get_Query::query($moduleConfigs_3);

            if (( $the_query_1->have_posts() ) || ( $the_query_2->have_posts() ) || ( $the_query_3->have_posts() )) :
            $block_str .= '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-posts-grid-5'.$moduleCustomClass.'">';
            $block_str .= '<div class="container">';
            $block_str .= '<div class="row row--space-between">';

            // Column 1
            $block_str .= '<div class="col-xs-12 col-md-4">';
            $block_str .= ATBS_Core::bk_get_block_3_col_heading($moduleConfigs_1['title'], $headingClass_1, '');
            if ( $the_query_1->have_posts() ) :
                $block_str .= $this->render_modules($the_query_1);            // render modules
            endif;

            if($moduleConfigs_1['viewmore'] == 'yes') {
                $vmArray = array(
                    'class' => 'text-center margin-top-25',
                    'button_class' => 'btn btn-default btn-sm',
                    'text'   => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_text_1', true ),
                    'link'   => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_link_1', true ),
                    'target' => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_target_1', true ),
                );
                $block_str .= ATBS_Ajax_Function::get_viewmore_button($vmArray);
            }
            $block_str .= '</div><!-- end column 1 -->';

            // Column 2
            $block_str .= '<div class="col-xs-12 col-md-4">';
            $block_str .= ATBS_Core::bk_get_block_3_col_heading($moduleConfigs_2['title'], $headingClass_2, '');
            if ( $the_query_2->have_posts() ) :
                $block_str .= $this->render_modules($the_query_2);            //render modules
            endif;
            if($moduleConfigs_2['viewmore'] == 'yes') {
                $vmArray = array(
                    'class' => 'text-center margin-top-25',
                    'button_class' => 'btn btn-default btn-sm',
                    'text'   => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_text_2', true ),
                    'link'   => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_link_2', true ),
                    'target' => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_target_2', true ),
                );
                $block_str .= ATBS_Ajax_Function::get_viewmore_button($vmArray);
            }
            $block_str .= '</div><!-- end Column 2 -->';

            //Column 3
            $block_str .= '<div class="col-xs-12 col-md-4">';
            $block_str .= ATBS_Core::bk_get_block_3_col_heading($moduleConfigs_3['title'], $headingClass_3, '');
            if ( $the_query_3->have_posts() ) :
                $block_str .= $this->render_modules($the_query_3);            //render modules
            endif;
            if ($moduleConfigs_3['viewmore'] == 'yes') {
                $vmArray = array(
                    'class' => 'text-center margin-top-25',
                    'button_class' => 'btn btn-default btn-sm',
                    'text'   => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_text_3', true ),
                    'link'   => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_link_3', true ),
                    'target' => get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_view_more_target_3', true ),
                );
                $block_str .= ATBS_Ajax_Function::get_viewmore_button($vmArray);
            }

            $block_str .= '</div><!-- end column 3 -->';

            $block_str .= '</div>';
            $block_str .= '</div><!-- container -->';
            $block_str .= '</div><!-- .atbs-keylin-block -->';

            endif;

            unset($moduleConfigs); unset($the_query);     //free
            wp_reset_postdata();
            return $block_str;
        }
        public function render_modules($the_query) {
            $render_modules = '';
            $postSource = get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_post_source', true );
            $postIcon = get_post_meta( self::$pageInfo['page_id'], self::$pageInfo['block_prefix'].'_post_icon', true );
            $postIconAttr = array();
            $iconPosition = 'top-right';
            $postIconDetach = 0;
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            if ($postIcon == 'disable') {
                $postIconDetach = 1;
            } else {
                $postIconDetach = 0;
            }

            if ( $the_query->have_posts() ) : $the_query->the_post();
                $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
                $catStyle = 3;
                $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
                $postOverlayAttr = array (
                    'cat'                          => $catStyle,
                    'catClass'                     => $cat_Class.' cat-line-after',
                    'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-400 post--overlay-medium post--overlay-medium-style-2',
                    'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                    'thumbSize'                    => 'atbs-l-4_3',
                    'additionalTextClass'          => 'inverse-text',
                    'typescale'                    => 'typescale-2 custom-typescale-2 margin-bottom-0 line-limit-child line-limit-3',
                    'postIcon'                     => $postIconAttr
                );

                $postOverlayAttr['postID'] = get_the_ID();
                if ($postIconDetach != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if ($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    } else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                    $postOverlayAttr['postIcon']   = $postIconAttr;
                }
                $render_modules .= '<div class="main-post-overlay">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div> <!-- .main-post-overlay -->';
            endif;
            if ( $the_query->have_posts() ) :
                $postHorizontalHTML = new ATBS_Module_Post_Horizontal_1;
                $render_modules .= '<ul class="posts-list posts-list-style-7 list-space-md list-unstyled">';
                while ( $the_query->have_posts() ): $the_query->the_post();
                    $postHorizontalAttr = array (
                        'additionalClass'       =>  'post--horizontal-tiny post--horizontal-tiny-style-1',
                        'thumbSize'             =>  'atbs-xxs-1_1',
                        'additionalThumbClass'  => 'atbs-thumb-object-fit',
                        'meta'                  =>  array('date_without_icon'),
                        'typescale'             =>  'typescale-1 font-semibold line-limit-child line-limit-3',
                        'DarkMode'                     => 1,
                    );
                    $postHorizontalAttr['postID'] = get_the_ID();
                    $render_modules .= '<li>';
                    $render_modules .= $postHorizontalHTML->render($postHorizontalAttr);
                    $render_modules .= '</li>';

                endwhile;
                $render_modules .= '</ul> <!-- .posts-list -->';
            endif;
            return $render_modules;
        }
    }
}