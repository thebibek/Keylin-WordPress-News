<?php
if (!class_exists('ATBS_Archive')) {
    class ATBS_Archive {
        static function the_query__sticky($catID, $posts_per_page){
            $feat_tag = '';
            $feat_area_option  = ATBS_Archive::bk_get_archive_option($catID, 'bk_category_feature_area__post_option');

            $args = array(
                'cat' => $catID,
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'posts_per_page' => $posts_per_page,
            );

            if($feat_area_option !== 'latest') {
                $args['post__in'] = get_option( 'sticky_posts' );
            }

            $the_query = new WP_Query( $args );
            wp_reset_postdata();
            return $the_query;
        }
    /**
     * ************* Get Option *****************
     *---------------------------------------------------
     */
        static function bk_get_archive_option($termID, $theoption = '') {
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $output = '';

            if($theoption != '') :
                $output  = ATBS_Core::atbs_rwmb_meta( $theoption, array( 'object_type' => 'term' ), $termID );
                if (isset($output) && (($output == 'global_settings') || ($output == ''))):
                    $output = $atbs_option[$theoption];
                endif;
            endif;

            return $output;
        }
        static function bk_pagination_render($pagination){
            global $wp_query;
            $max_page = $wp_query->max_num_pages;
            $render = '';
            if ($max_page <= 1) {
                return '';
            }
            if ($pagination == 'default') {
                $render = ATBS_Core::atbs_get_pagination();
            } elseif ($pagination == 'ajax-pagination') {
                $render = ATBS_Ajax_Function::ajax_load_buttons('pagination', $max_page);
            } elseif ( ($pagination == 'ajax-loadmore') || ($pagination == 'infinity') ) {
                $render = ATBS_Ajax_Function::ajax_load_buttons('loadmore', $max_page);
            }
            return $render;
        }
        static function bk_author_pagination_render($pagination, $userMaxPages){
            $render = '';
            if ($pagination == 'ajax-pagination') {
                $render = ATBS_Ajax_Function::ajax_load_buttons('pagination', $userMaxPages);
            } elseif ( ($pagination == 'ajax-loadmore') || ($pagination == 'infinity') ) {
                $render .= '<nav class="atbs-keylin-pagination text-center">';
                $render .= '<button class="btn btn-default js-ajax-load-post-trigger">'.esc_html__('Load more authors', 'keylin').'<i class="mdicon mdicon-cached mdicon--last"></i></button>';
                $render .= '</nav>';
            }
            return $render;
        }
        static function bk_archive_pages_post_icon(){
            global $post;
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $postIcon = '';

            if(is_category()) {
                $postIcon = isset($atbs_option['bk_category_post_icon']) ? $atbs_option['bk_category_post_icon'] : 'disable';
            }elseif(is_author()) {
                $postIcon = isset($atbs_option['bk_author_post_icon']) ? $atbs_option['bk_author_post_icon'] : 'disable';
            }elseif(is_search()) {
                $postIcon = isset($atbs_option['bk_search_post_icon']) ? $atbs_option['bk_search_post_icon'] : 'disable';
            }elseif(is_archive()){
                $postIcon = isset($atbs_option['bk_archive_post_icon']) ? $atbs_option['bk_archive_post_icon'] : 'disable';
            }else {
                $pageTemplate =  get_post_meta($post->ID,'_wp_page_template',true);
                if($pageTemplate == 'blog.php') {
                    $postIcon = isset($atbs_option['bk_blog_post_icon']) ? $atbs_option['bk_blog_post_icon'] : 'disable';
                }
            }
            return $postIcon;
        }
        static function bk_render_authors($users_found) {
            $render = '';
            if(count($users_found) > 0):
                $render .= '<ul class="authors-list list-unstyled list-space-lg">';
                foreach($users_found as $user) :
                    $render .= '<li>';
                    $render .= ATBS_Archive::author_box($user->data->ID);
                    $render .= '</li>';
                endforeach;
                $render .= '</ul> <!-- End Author Results -->';
            endif;
            return $render;
        }
        static function get_sticky_ids__category_feature_area($catID, $featLayout){
            $featAreaOption  = self::bk_get_archive_option($catID, 'bk_category_feature_area__post_option');
            $excludeIDs = array();
            $posts_per_page = 0;
            $sticky = get_option('sticky_posts') ;
            rsort( $sticky );

            $args = array (
                'post_type'     => 'post',
                'cat'           => $catID, // Get current category only
                'order'         => 'DESC',
            );

            switch($featLayout){
                case 'posts_block_b' :
                    $posts_per_page = 6;
                    break;
                case 'mosaic_a' :
                case 'featured_block_e' :
                case 'featured_block_f' :
                case 'posts_block_i' :
                    $posts_per_page = 5;
                    break;
                case 'mosaic_b' :
                case 'posts_block_c' :
                    $posts_per_page = 4;
                    break;
                case 'mosaic_c' :
                case 'posts_block_e' :
                case 'posts_block_e_bg' :
                    $posts_per_page = 3;
                    break;
                default:
                    $posts_per_page = 0;
                    break;
            }
            if($posts_per_page == 0) :
                wp_reset_postdata();
                return '';
            endif;
            $args['posts_per_page'] = $posts_per_page;
            if($featAreaOption == 'featured') {
                $args['post__in'] = $sticky; // Get stickied posts
            }
            $sticky_query = new WP_Query( $args );
            while ( $sticky_query->have_posts() ): $sticky_query->the_post();
                $excludeIDs[] = get_the_ID();
            endwhile;
            wp_reset_postdata();
            return $excludeIDs;
        }
        static function archive_feature_area($term_id, $featLayout){
            $featArea = '';
            switch( $featLayout ) {
                default:
                    break;
                case 'mosaic_a':
                    $featArea .= self::mosaic_a__render($term_id);
                    break;
                case 'mosaic_b':
                    $featArea .= self::mosaic_b__render($term_id);
                    break;
                case 'mosaic_c':
                    $featArea .= self::mosaic_c__render($term_id);
                    break;
                case 'featured_block_e':
                    $featArea .= self::featured_block_e__render($term_id);
                    break;
                case 'featured_block_f':
                    $featArea .= self::featured_block_f__render($term_id);
                    break;
                case 'posts_block_b':
                    $featArea .= self::posts_block_b__render($term_id);
                    break;
                case 'posts_block_e':
                    $featArea .= self::posts_block_e__render($term_id);
                    break;
                case 'posts_block_i':
                    $featArea .= self::posts_block_i__render($term_id);
                    break;
            }
            return $featArea;
        }
        static function atbs_archive_header($term_id, $containerNarrow = ''){
            $archiveHeader = '';
            if(is_category()) :
                $headingStyle = ATBS_Archive::bk_get_archive_option($term_id, 'bk_category_header_style');
            else :
                $headingStyle = ATBS_Archive::bk_get_archive_option($term_id, 'bk_archive_header_style');
            endif;
            $headingInverse = 'no';

            $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle, $headingInverse);

            $archiveHeader .= '<div class="container atbs-keylin-block-custom-margin '.$containerNarrow.'">';

            if(is_category()) :
                $archiveHeader .= '<div class="block-heading '.$headingClass.'">';
                $archiveHeader .= '<h2 class="page-heading__title block-heading__title">'.get_cat_name($term_id).'</h2>';
                if ( category_description($term_id) ) :
                    $archiveHeader .= '<div class="page-heading__subtitle">'.category_description($term_id).'</div>';
                endif;
                $archiveHeader .= '</div><!-- block-heading -->';
            elseif(is_tag()) :
                $tag = get_tag($term_id);
                $archiveHeader .= '<div class="block-heading '.$headingClass.'">';
                $archiveHeader .= '<h2 class="page-heading__title block-heading__title">'.esc_html__('Tag: ', 'keylin'). $tag->name.'</h2>';
                if ( $tag->description ) :
                    $archiveHeader .= '<div class="page-heading__subtitle"><p>'.$tag->description.'</p></div>';
                endif;
                $archiveHeader .= '</div><!-- block-heading -->';
            endif;

            $archiveHeader .= '</div><!-- container -->';
            return $archiveHeader;
        }

        static function render_page_heading($pageID, $headingStyle, $headingColor = '') {
            $headingInverse = 'no';
            $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle, $headingInverse);
            $styleInline = '';
            if($headingColor != '') :
                $styleInline = 'style="color:'.$headingColor.';"';
            endif;
            $page_description  = get_post_meta($pageID,'bk_page_description',true);
            $archiveHeader = '';
            $archiveHeader .= '<div class="container"><div class="block-heading '.$headingClass.'">';
            $archiveHeader .= '<h1 class="page-heading__title block-heading__title" '.$styleInline.'>'. get_the_title($pageID) .'</h1>';
            if ( $page_description != '' ) :
                $archiveHeader .= '<div class="page-heading__subtitle">'.esc_html($page_description).'</div>';
            endif;
            $archiveHeader .= '</div></div><!-- block-heading -->';
            return $archiveHeader;
        }

        static function mosaic_a__render($term_id){
            $dataOutput = '';
            $mosaicHTML = new ATBS_Featured_Module_3;
            $postIcon = self::bk_archive_pages_post_icon();
            $posts_per_page = 5;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);
            $dataOutput .= self::atbs_archive_header($term_id);

            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $containerSW = ATBS_Archive::bk_get_archive_option($term_id, 'bk_container_width');
            if($containerSW == 'global_settings'):
                $containerClass = $atbs_option['bk_container_width'];
            endif;

            if($containerSW == 'wide'):
                $containerClass = 'container container--wide-lg';
            else:
                $containerClass = 'container';
            endif;

            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-featured-module-3">';
            $dataOutput .= '<div class="'.esc_attr($containerClass).'">';
            $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-10">';
            $dataOutput .= $mosaicHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function mosaic_b__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $mosaicHTML = new ATBS_Featured_Module_4;
            $posts_per_page = 4;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);
            $dataOutput .= self::atbs_archive_header($term_id);
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $containerSW = ATBS_Archive::bk_get_archive_option($term_id, 'bk_container_width');
            if($containerSW == 'global_settings'):
                $containerClass = $atbs_option['bk_container_width'];
            endif;
            if($containerSW == 'wide'):
                $containerClass = 'container container--wide-lg';
            else:
                $containerClass = 'container';
            endif;
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-featured-module-4">';
            $dataOutput .= '<div class="'.esc_attr($containerClass).'">';
            $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-10">';
            $dataOutput .= $mosaicHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function mosaic_c__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $mosaicHTML = new ATBS_Featured_Module_5;

            $posts_per_page = 3;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);

            $dataOutput .= self::atbs_archive_header($term_id);

            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-featured-module-5">';
            $dataOutput .= '<div class="container">';
            $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flex-space-10">';
            $dataOutput .= $mosaicHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function featured_block_e__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $moduleHTML = new ATBS_Featured_Module_6;
            $posts_per_page = 5;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);
            $dataOutput .= self::atbs_archive_header($term_id);
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $containerSW = ATBS_Archive::bk_get_archive_option($term_id, 'bk_container_width');
            if($containerSW == 'global_settings'):
                $containerClass = $atbs_option['bk_container_width'];
            endif;
            if($containerSW == 'wide'):
                $containerClass = 'container container--wide-lg';
            else:
                $containerClass = 'container';
            endif;
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-featured-module-6">';
            $dataOutput .= '<div class="'.esc_attr($containerClass).'">';
            $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flex-space-30">';
            $dataOutput .= $moduleHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function featured_block_f__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $moduleHTML = new ATBS_Featured_Module_7;
            $posts_per_page = 5;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);
            $dataOutput .= self::atbs_archive_header($term_id);
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $containerSW = ATBS_Archive::bk_get_archive_option($term_id, 'bk_container_width');
            if($containerSW == 'global_settings'):
                $containerClass = $atbs_option['bk_container_width'];
            endif;
            if($containerSW == 'wide'):
                $containerClass = 'container container--wide-lg';
            else:
                $containerClass = 'container';
            endif;
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-featured-module-7">';
            $dataOutput .= '<div class="'.esc_attr($containerClass).'">';
            $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-30">';
            $dataOutput .= $moduleHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function posts_block_b__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $moduleHTML = new ATBS_Posts_Grid_3;
            $posts_per_page = 6;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);
            $dataOutput .= self::atbs_archive_header($term_id);
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $containerSW = ATBS_Archive::bk_get_archive_option($term_id, 'bk_container_width');
            if($containerSW == 'global_settings'):
                $containerClass = $atbs_option['bk_container_width'];
            endif;
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-posts-grid-3">';
            $dataOutput .= '<div class="container">';
            $dataOutput .= '<div class="atbs-keylin-block__inner">';
            $dataOutput .= $moduleHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function posts_block_e__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $moduleHTML = new ATBS_Featured_Module_8;

            $posts_per_page = 3;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);

            $dataOutput .= self::atbs_archive_header($term_id);
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $containerSW = ATBS_Archive::bk_get_archive_option($term_id, 'bk_container_width');
            if($containerSW == 'global_settings'):
                $containerClass = $atbs_option['bk_container_width'];
            endif;
            if($containerSW == 'wide'):
                $containerClass = 'container container--wide-lg';
            else:
                $containerClass = 'container';
            endif;
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-featured-module-8">';
            $dataOutput .= '<div class="'.esc_attr($containerClass).'">';
            $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-10">';
            $dataOutput .= $moduleHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }
        static function posts_block_i__render($term_id){
            $dataOutput = '';
            $postIcon = self::bk_archive_pages_post_icon();
            $moduleHTML = new ATBS_Posts_Grid_4;

            $posts_per_page = 5;
            $the_query = self::the_query__sticky($term_id, $posts_per_page);

            $dataOutput .= self::atbs_archive_header($term_id);
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-posts-grid-4">';
            $dataOutput .= '<div class="container">';
            $dataOutput .= '<div class="atbs-keylin-block__inner">';
            $dataOutput .= $moduleHTML->render_modules($the_query);            //render modules
            $dataOutput .= '</div><!-- .atbs-keylin-block__inner -->';
            $dataOutput .= '</div><!-- .container -->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }

        static function archive_fullwidth($archiveLayout, $moduleID = '', $pagination = ''){

            $dataOutput = '';
            switch($archiveLayout) {
                case 'block_posts_listing_grid_1':
                    $dataOutput .= self::block_posts_listing_grid_1($moduleID);
                    break;

                case 'block_posts_listing_grid_2':
                    $dataOutput .= self::block_posts_listing_grid_2($moduleID);
                    break;

                case 'block_posts_listing_grid_3':
                    $dataOutput .= self::block_posts_listing_grid_3($moduleID);
                    break;

                case 'block_posts_listing_list_1':
                    $dataOutput .= self::block_posts_listing_list_1($moduleID);
                    break;

                case 'block_posts_listing_list_2':
                    $dataOutput .= self::block_posts_listing_list_2($moduleID);
                    break;

                default:
                    $dataOutput .= self::block_posts_listing_grid_1($moduleID);
                    break;
            }
            return $dataOutput;
        }

        static function archive_main_col($archiveLayout, $moduleID = '', $pagination = ''){

            $dataOutput = '';
            switch($archiveLayout) {
                case 'block_posts_listing_grid_1_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_1_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_grid_2_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_2_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_grid_3_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_3_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_list_1_has_sidebar':
                    $dataOutput .= self::block_posts_listing_list_1_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_list_2_has_sidebar':
                    $dataOutput .= self::block_posts_listing_list_2_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_grid_alt_1_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_alt_1_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_grid_alt_2_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_alt_2_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_grid_alt_3_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_alt_3_has_sidebar($moduleID);
                    break;
                case 'block_posts_listing_grid_alt_4_has_sidebar':
                    $dataOutput .= self::block_posts_listing_grid_alt_4_has_sidebar($moduleID);
                    break;
                default:
                    $dataOutput .= self::block_posts_listing_grid_1_has_sidebar($moduleID);
                    break;
            }
            return $dataOutput;
        }

/** Full Width Modules ( No sidebar)**/

        // Keylin
        static function block_posts_listing_grid_1($moduleID) {
            global $wp_query;
            $render_modules = '';
            $currentPost = 0;

            $postIcon = self::bk_archive_pages_post_icon();
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);

            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-400 post--overlay-medium',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-20 font-semibold margin-bottom-0 line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr
            );

            $render_modules .= '<div class="atbs-keylin-listing--grid-1">';
            $render_modules .= '<div class="posts-list posts-grid-style-2 flexbox-wrap flexbox-wrap-3i flex-space-30">';

            while (have_posts()): the_post();
                $currentPost = $wp_query->current_post;
                $postOverlayAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', 'top-right', $addClass);
                    $postOverlayAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;
            $render_modules .= '</div><!-- .posts-list -->';
            $render_modules .= '</div><!-- .atbs-keylin-listing--grid-1 -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_2($moduleID) {
            global $wp_query;
            $render_modules = '';
            $currentPost = 0;

            $postIcon = self::bk_archive_pages_post_icon();
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);

            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-medium post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-22 font-semibold margin-bottom-0',
                'meta'                         => array('date_without_icon'),
//                'except_length'                => 16,
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'postIcon'                     => $postIconAttr,
                'DarkMode'                     => 1,
            );

            $render_modules .= '<div class="atbs-keylin-listing--grid-2">';
            $render_modules .= '<div class="posts-list posts-grid-style-5 flexbox-wrap flexbox-wrap-3i flex-space-30">';

            while (have_posts()): the_post();
                $currentPost = $wp_query->current_post;
                $postVerticalAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', 'top-right', $addClass);
                    $postVerticalAttr['postIcon']    = $postIconAttr;
                }
                if( is_sticky($postVerticalAttr['postID']) && is_home() && is_front_page() ):
                    $postVerticalAttr['additionalClass'] .= ' sticky-atbs-post';
                else:
                    $postVerticalAttr['additionalClass'] = str_replace(' sticky-atbs-post', '', $postVerticalAttr['additionalClass']);
                endif;
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;
            $render_modules .= '</div><!-- .posts-list -->';
            $render_modules .= '</div><!-- .atbs-keylin-listing--grid-2 -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_3($moduleID) {
            global $wp_query;
            $render_modules = '';
            $currentPost = 0;

            $postIcon = self::bk_archive_pages_post_icon();
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);

            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-small post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-20 font-semibold',
                'postIcon'                     => $postIconAttr,
                'DarkMode'                     => 1,
            );
            $render_modules .= '<div class="atbs-keylin-listing--grid-3">';
            $render_modules .= '<div class="posts-list posts-grid-style-4 flexbox-wrap flexbox-wrap-4i flex-space-30">';

            while (have_posts()): the_post();
                $currentPost = $wp_query->current_post;
                $postVerticalAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', 'top-right', $addClass);
                    $postVerticalAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;
            $render_modules .= '</div><!-- .posts-list -->';
            $render_modules .= '</div><!-- .atbs-keylin-listing--grid-3 -->';

            return $render_modules;
        }

        static function block_posts_listing_list_1($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-560 post--overlay-huge entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-l-16_9',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-28 font-bold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list list-space-xl posts-list-style-1">';

            while (have_posts()): the_post();
                $postOverlayAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', 'top-right', $addClass);
                    $postOverlayAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_list_2($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-huge post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-16_9',
                'typescale'                    => 'f-32 font-bold margin-bottom-10',
                'except_length'                => 20,
                'additionalExcerptClass'       => 'line-limit line-limit-3 margin-bottom-25',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'meta'                         => array('date_without_icon'),
                'additionalMetaHeadGroupClass' => 'margin-bottom-10',
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list list-space-xl posts-list-style-2">';

            while (have_posts()): the_post();
                $postVerticalAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', 'top-right', $addClass);
                    $postVerticalAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }
        // End Keylin

/** Main Col Modules **/

        // Keylin
        static function block_posts_listing_grid_1_has_sidebar($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-400 post--overlay-medium',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-22 font-semibold margin-bottom-0 line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-2 posts-grid-has-sidebar flexbox-wrap flexbox-wrap-2i flex-space-30">';

            while (have_posts()): the_post();
                $postOverlayAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', 'top-right', $addClass);
                    $postOverlayAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_2_has_sidebar($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];

            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-medium post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-22 font-semibold margin-bottom-10',
                'meta'                         => array('date_without_icon'),
                'except_length'                => 16,
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-5 posts-grid-has-sidebar flexbox-wrap flexbox-wrap-2i flex-space-30">';

            while (have_posts()): the_post();
                $postVerticalAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', 'top-right', $addClass);
                    $postVerticalAttr['postIcon']    = $postIconAttr;
                }
                if( is_sticky($postVerticalAttr['postID']) && is_home() && is_front_page() ):
                    $postVerticalAttr['additionalClass'] .= ' sticky-atbs-post';
                else:
                    $postVerticalAttr['additionalClass'] = str_replace(' sticky-atbs-post', '', $postVerticalAttr['additionalClass']);
                endif;
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_3_has_sidebar($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-small post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-20 font-semibold',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr,
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-4 posts-grid-has-sidebar flexbox-wrap flexbox-wrap-3i flex-space-30">';
            while (have_posts()): the_post();
                $postVerticalAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = 'overlay-item--sm-p';
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'small', 'top-right', $addClass);
                    $postVerticalAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_list_1_has_sidebar($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-450 post--overlay-huge entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-l-16_9',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-28 font-bold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list list-space-xl posts-list-style-1 posts-list-has-sidebar">';

            while (have_posts()): the_post();
                $postOverlayAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', 'top-right', $addClass);
                    $postOverlayAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_list_2_has_sidebar($moduleID) {
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-huge post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-16_9',
                'typescale'                    => 'f-30 font-bold margin-bottom-10',
                'meta'                         => array('date_without_icon'),
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'except_length'                => 20,
                'additionalExcerptClass'       => 'line-limit line-limit-3 margin-bottom-25',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );


            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list list-space-xl posts-list-style-2 posts-list-has-sidebar">';

            while (have_posts()): the_post();
                $postVerticalAttr['postID'] = get_the_ID();
                if($postIcon != 1) {
                    $addClass = ''; // overlay-item--sm-p
                    if($postSource != 'all') {
                        $postIconAttr['iconType'] = $postSource;
                    }else {
                        $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                    }
                    $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', 'top-right', $addClass);
                    $postVerticalAttr['postIcon']    = $postIconAttr;
                }
                $render_modules .= '<div class="list-item">';
                $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                $render_modules .= '</div><!-- .list-item -->';
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_alt_1_has_sidebar($moduleID) {
            global $wp_query;
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();
            $iconPosition = 'top-right';
            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-450 post--overlay-huge entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-l-16_9',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-28 font-bold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-medium post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-22 font-semibold margin-bottom-10',
                'meta'                         => array('date_without_icon'),
                'except_length'                => 16,
                'DarkMode'                     => 1,
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'postIcon'                     => $postIconAttr
            );

            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-3 posts-grid-has-sidebar flexbox-wrap flex-space-30">';
            $currentPost = 0;
            while (have_posts() ): the_post();
                $currentPost = $wp_query->current_post;
                if ($currentPost == 0):
                    $postOverlayAttr['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postOverlayAttr['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-100">';
                    $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                    $render_modules .= '</div><!-- .list-item -->';
                else:
                    $postVerticalAttr['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postVerticalAttr['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-50">';
                    $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                    $render_modules .= '</div><!-- .list-item -->';
                endif;
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_alt_2_has_sidebar($moduleID) {
            global $wp_query;
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';

            $postIcon = self::bk_archive_pages_post_icon();
            $iconPosition = 'top-right';
            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-huge post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-16_9',
                'typescale'                    => 'f-30 font-bold margin-bottom-10',
                'meta'                         => array('date_without_icon'),
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'except_length'                => 20,
                'additionalExcerptClass'       => 'line-limit line-limit-3 margin-bottom-25',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );

            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAttr = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-400 post--overlay-medium',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-22 font-semibold margin-bottom-0 line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr
            );


            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-6 posts-grid-has-sidebar flexbox-wrap flex-space-30">';
            $currentPost = 0;
            while (have_posts() ): the_post();
                $currentPost = $wp_query->current_post;
                if ($currentPost == 0):
                    $postVerticalAttr['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postVerticalAttr['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-100">';
                    $render_modules .= $postVerticalHTML->render($postVerticalAttr);
                    $render_modules .= '</div><!-- .list-item -->';
                else:
                    $postOverlayAttr['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postOverlayAttr['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-50">';
                    $render_modules .= $postOverlayHTML->render($postOverlayAttr);
                    $render_modules .= '</div><!-- .list-item -->';
                endif;
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_alt_3_has_sidebar($moduleID) {
            global $wp_query;
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';
            $iconPosition = 'top-right';
            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postOverlayHTML = new ATBS_Module_Post_Overlay_2;
            $postOverlayAtrr_1 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-450 post--overlay-huge entry-author-horizontal-middle',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-l-16_9',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-28 font-bold margin-bottom-15 line-limit-child line-limit-3',
                'meta'                         => array('author_has_time'),
                'postIcon'                     => $postIconAttr
            );

            $postOverlayAttr_2 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-line-after',
                'additionalClass'              => 'post--overlay-bottom post--overlay-floorfade post--overlay-height-400 post--overlay-medium',
                'additionalThumbClass'         => 'post__thumb--overlay atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'additionalTextClass'          => 'inverse-text',
                'typescale'                    => 'f-22 font-semibold margin-bottom-0 line-limit-child line-limit-3',
                'postIcon'                     => $postIconAttr
            );


            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-7 posts-grid-has-sidebar flexbox-wrap flex-space-30">';
            $currentPost = 0;
            while (have_posts() ): the_post();
                $currentPost = $wp_query->current_post;
                if ($currentPost == 0):
                    $postOverlayAtrr_1['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postOverlayAtrr_1['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-100">';
                    $render_modules .= $postOverlayHTML->render($postOverlayAtrr_1);
                    $render_modules .= '</div><!-- .list-item -->';
                else:
                    $postOverlayAttr_2['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postOverlayAttr_2['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-50">';
                    $render_modules .= $postOverlayHTML->render($postOverlayAttr_2);
                    $render_modules .= '</div><!-- .list-item -->';
                endif;
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        static function block_posts_listing_grid_alt_4_has_sidebar($moduleID) {
            global $wp_query;
            $render_modules = '';
            $postIconAttr = array();
            $postIconAttr['postIconClass'] = '';
            $postIconAttr['iconType'] = '';
            $iconPosition = 'top-right';
            $postIcon = self::bk_archive_pages_post_icon();

            $catStyle = 3;
            $cat_Class = ATBS_Core::bk_get_cat_class($catStyle);
            $moduleInfo = array(
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );
            $postSource = $moduleInfo['post_source'];
            $postVerticalHTML = new ATBS_Module_Post_Vertical_2;
            $postVerticalAttr_1 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-huge post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-m-16_9',
                'typescale'                    => 'f-30 font-bold margin-bottom-10',
                'meta'                         => array('date_without_icon'),
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'except_length'                => 20,
                'additionalExcerptClass'       => 'line-limit line-limit-3 margin-bottom-25',
                'readmore'                     => 1,
                'readmoreIcon'                 => 1,
                'additionalReadmoreClass'      => 'post__readmore--style-2',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );

            $postVerticalAttr_2 = array (
                'cat'                          => $catStyle,
                'catClass'                     => $cat_Class.' cat-color-gray cat-line-after',
                'additionalClass'              => 'post--vertical-medium post-not-exist-thumb-disable',
                'additionalThumbClass'         => 'atbs-thumb-object-fit',
                'thumbSize'                    => 'atbs-s-4_3',
                'typescale'                    => 'f-22 font-semibold margin-bottom-10',
                'meta'                         => array('date_without_icon'),
                'except_length'                => 16,
                'additionalExcerptClass'       => 'line-limit line-limit-3',
                'DarkMode'                     => 1,
                'postIcon'                     => $postIconAttr
            );


            ATBS_Core::bk_add_buff('query', $moduleID, 'moduleInfo', $moduleInfo);
            $render_modules .= '<div class="posts-list posts-grid-style-7 posts-grid-has-sidebar flexbox-wrap flex-space-30">';
            $currentPost = 0;
            while (have_posts() ): the_post();
                $currentPost = $wp_query->current_post;
                if ($currentPost == 0):
                    $postVerticalAttr_1['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], 'medium', $iconPosition, $addClass);
                        $postVerticalAttr_1['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-100">';
                    $render_modules .= $postVerticalHTML->render($postVerticalAttr_1);
                    $render_modules .= '</div><!-- .list-item -->';
                else:
                    $postVerticalAttr_2['postID'] = get_the_ID();
                    if ($postIcon != 1) {
                        $addClass = ''; // overlay-item--sm-p
                        if ($postSource != 'all') {
                            $postIconAttr['iconType'] = $postSource;
                        } else {
                            $postIconAttr['iconType']   = ATBS_Core::bk_post_format_detect(get_the_ID());
                        }
                        $postIconAttr['postIconClass']  = ATBS_Core::get_post_icon_class($postIconAttr['iconType'], '', $iconPosition, $addClass);
                        $postVerticalAttr_2['postIcon']    = $postIconAttr;
                    }
                    $render_modules .= '<div class="list-item flexbox-item-50">';
                    $render_modules .= $postVerticalHTML->render($postVerticalAttr_2);
                    $render_modules .= '</div><!-- .list-item -->';
                endif;
            endwhile;

            $render_modules .= '</div><!-- .posts-list -->';

            return $render_modules;
        }

        //end Keylin
        
        static function author_box($authorID){
            $bk_author_email = get_the_author_meta('publicemail', $authorID);
            $bk_author_name = get_the_author_meta('display_name', $authorID);
            $bk_author_tw = get_the_author_meta('twitter', $authorID);
            $bk_author_go = get_the_author_meta('googleplus', $authorID);
            $bk_author_fb = get_the_author_meta('facebook', $authorID);
            $bk_author_yo = get_the_author_meta('youtube', $authorID);
            $bk_author_www = get_the_author_meta('url', $authorID);
            $bk_author_desc = get_the_author_meta('description', $authorID);
            $bk_author_posts = count_user_posts( $authorID );

            $authorImgALT = $bk_author_name;
            $authorArgs = array(
                'class' => 'avatar photo',
            );

            $htmlOutput = '';
            if (($bk_author_desc != NULL) || ($bk_author_email != NULL) || ($bk_author_tw != NULL) || ($bk_author_go != NULL) || ($bk_author_fb != NULL) ||($bk_author_yo != NULL)) :

                $htmlOutput .= '<!-- Author Box -->';
                $htmlOutput .= '<div class="author-box author-box-single single-entry-section">';
                $htmlOutput .= '<div class="author-box__image">';
                $htmlOutput .= '<div class="author-avatar">';
                $htmlOutput .= get_avatar($authorID, '180', '', esc_attr($authorImgALT), $authorArgs);
                $htmlOutput .= '</div><!-- author-avatar -->';
                $htmlOutput .= '</div><!-- author-box__image -->';
                $htmlOutput .= '<div class="author-box__text">';
                $htmlOutput .= '<div class="author-box__group">';
                $htmlOutput .= '<div class="author-name">';
                $htmlOutput .= '<a class="entry-author__name" href="'.get_author_posts_url($authorID).'" title="Posts by '.esc_attr($bk_author_name).'" rel="author">'.esc_attr($bk_author_name).'</a>';
                $htmlOutput .= '</div><!-- .author-name -->';
                $htmlOutput .= '<div class="author-bio">';
                $htmlOutput .= $bk_author_desc;
                $htmlOutput .= '</div><!-- .author-bio -->';
                $htmlOutput .= '<div class="author-info">';
                $htmlOutput .= '<div class="author-socials">';
                $htmlOutput .= '<ul class="social-list social-list--xs list-horizontal">';
                if (($bk_author_email != NULL) || ($bk_author_www != NULL) || ($bk_author_go != NULL) || ($bk_author_tw != NULL) || ($bk_author_fb != NULL) ||($bk_author_yo != NULL)) {
                    if ($bk_author_email != NULL) { $htmlOutput .= '<li><a href="mailto:'. esc_attr($bk_author_email) .'"><i class="mdicon mdicon-mail_outline"></i><span class="sr-only">e-mail</span></a></li>'; }
                    if ($bk_author_www != NULL) { $htmlOutput .= ' <li><a href="'. esc_url($bk_author_www) .'" target="_blank"><i class="mdicon mdicon-public"></i><span class="sr-only">Website</span></a></li>'; }
                    if ($bk_author_tw != NULL) { $htmlOutput .= ' <li><a href="'. esc_url($bk_author_tw).'" target="_blank" ><i class="mdicon mdicon-twitter"></i><span class="sr-only">Twitter</span></a></li>'; }
                    if ($bk_author_go != NULL) { $htmlOutput .= ' <li><a href="'. esc_url($bk_author_go) .'" rel="publisher" target="_blank"><i class="mdicon mdicon-google-plus"></i><span class="sr-only">Google+</span></a></li>'; }
                    if ($bk_author_fb != NULL) { $htmlOutput .= ' <li><a href="'. esc_url($bk_author_fb) . '" target="_blank" ><i class="mdicon mdicon-facebook"></i><span class="sr-only">Facebook</span></a></li>'; }
                    if ($bk_author_yo != NULL) { $htmlOutput .= ' <li><a href="'. esc_url($bk_author_yo) . '" target="_blank" ><i class="mdicon mdicon-youtube"></i><span class="sr-only">Youtube</span></a></li>'; }
                }
                $htmlOutput .= '</ul><!-- .social-list -->';
                $htmlOutput .= '</div><!-- .author-socials -->';
                $htmlOutput .= '</div><!-- .author-info -->';
                $htmlOutput .= '</div><!-- .author-box__group -->';
                $htmlOutput .= '</div><!-- .author-box__text -->';

                $htmlOutput .= '</div><!-- .author-box -->';

            endif;

            return $htmlOutput;
        }
    } // Close atbs_archive class

}
