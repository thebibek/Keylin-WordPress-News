<?php
if (!class_exists('ATBS_Single')) {
    class ATBS_Single {

        static $related_query = '';
        static $samecat_query = '';

        static function bk_entry_media($postID){
            if (function_exists('has_post_format')){
                $postFormat = get_post_format($postID);
            } else {
                $postFormat = 'standard';
            }
            $htmlOutput = '';
            if ($postFormat == 'video'){
                $bkURL = get_post_meta($postID, 'bk_video_media_link', true);
                $htmlOutput .= ATBS_Core::bk_get_video_media($bkURL);
            } elseif ($postFormat == 'gallery'){
                $galleryType = get_post_meta($postID, 'bk_gallery_type', true);
                if ($galleryType == 'gallery-1') {
                    $htmlOutput .= ATBS_Core::bk_get_gallery_1($postID);
                } elseif ($galleryType == 'gallery-2') {
                    $htmlOutput .= ATBS_Core::bk_get_gallery_2($postID);
                } elseif ($galleryType == 'gallery-3') {
                    $htmlOutput .= ATBS_Core::bk_get_gallery_3($postID);
                } elseif ($galleryType == 'gallery-4') {
                    $htmlOutput .= ATBS_Core::bk_get_gallery_4($postID);
                } else {
                    $htmlOutput .= ATBS_Core::bk_get_gallery_1($postID);
                }
            } else {
                $htmlOutput = '';
            }
            return $htmlOutput;
        }
        static function bk_author_box($authorID){
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
                if (($bk_author_email != NULL) || ($bk_author_go != NULL) || ($bk_author_tw != NULL) || ($bk_author_fb != NULL) ||($bk_author_yo != NULL)) {
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
        static function bk_post_navigation($navStyle = ''){
            $next_post = get_next_post();
            $prev_post = get_previous_post();

            $htmlOutput = '';
            if ((!empty($prev_post)) || (!empty($next_post))):
                $htmlOutput .= '<!-- Posts navigation -->';
                $htmlOutput .= '<div class="posts-navigation single-entry-section clearfix">';
                if (!empty($prev_post)):
                    $htmlOutput .= '<div class="posts-navigation__prev clearfix">';
                    $htmlOutput .= '<article class="post">';
                    $htmlOutput .= '<a class="navigation-button" href="'.get_permalink($prev_post->ID).'">';
                    $htmlOutput .= '<i class="mdicon mdicon-navigate_before"></i>'.esc_html__('Previous Article', 'keylin');
                    $htmlOutput .= '</a>';
                    $htmlOutput .= '</article>';
                    $htmlOutput .= '</div>';
                endif;
                if (!empty($next_post)):
                    $htmlOutput .= '<div class="posts-navigation__next clearfix">';
                    $htmlOutput .= '<article class="post">';
                    $htmlOutput .= '<a class="navigation-button" href="'.get_permalink($next_post->ID).'">';
                    $htmlOutput .= '<i class="mdicon mdicon-navigate_next"></i>'.esc_html__('Next Article', 'keylin');
                    $htmlOutput .= '</a>';
                    $htmlOutput .= '</article>';
                    $htmlOutput .= '</div>';
                endif;
                $htmlOutput .= '</div>';
                $htmlOutput .= '<!-- Posts navigation -->';
            endif;
            return $htmlOutput;
        }
    /**
     * ************* Get Post Option *****************
     *---------------------------------------------------
     */
        static function bk_get_post_option($postID, $theoption = '') {
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $output = '';

            if ($theoption != '') :
                $output = get_post_meta($postID, $theoption, true);
                if (($output == 'global_settings') || ($output == '')):
                    if (isset($atbs_option[$theoption])) {
                        $output = $atbs_option[$theoption];
                    } else {
                        $output = '';
                    }
                endif;
            endif;

            return $output;
        }
     /**
     * ************* Get Post Option *****************
     *---------------------------------------------------
     */
        static function bk_get_post_wide_option($postID, $theoption = '') {
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $output = '';

            if ($theoption != '') :
                $output = get_post_meta($postID, $theoption, true);
                if (($output == 'global_settings') || ($output == '')):
                    if (isset($atbs_option[$theoption.'-wide'])) {
                        $output = $atbs_option[$theoption.'-wide'];
                    } else {
                        $output = '';
                    }
                endif;
            endif;

            return $output;
        }
    /**
     * ************* Related Post *****************
     *---------------------------------------------------
     */
        static function bk_related_post($post) {
            $postID = $post->ID;
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

            $excludeid = array();
            $samecat_post_ids = array();

            if (self::$samecat_query != '') {
                $samecat_post_ids = wp_list_pluck( self::$samecat_query->posts, 'ID' );
            }

            array_push($excludeid, $postID);

            if (count($samecat_post_ids) > 0) {
                foreach($samecat_post_ids as $samecat_post_id):
                    array_push($excludeid, $samecat_post_id);
                endforeach;
            }

            $bkSingleLayout = get_post_meta($postID,'bk_post_layout_standard',true);

            if ($bkSingleLayout != 'global_settings') :
                $bkRelatedSource    =  self::bk_get_post_option($postID, 'bk_related_source');
                $bk_number_related  =  self::bk_get_post_option($postID, 'bk_number_related');
                $headingStyle       =  self::bk_get_post_option($postID, 'bk_related_heading_style');
                $postLayout         =  self::bk_get_post_option($postID, 'bk_related_post_layout');
                $postIcon           =  self::bk_get_post_option($postID, 'bk_related_post_icon');
            else:
                $bkRelatedSource    =  $atbs_option['bk_related_source'];
                $bk_number_related  =  $atbs_option['bk_number_related'];
                $headingStyle       =  $atbs_option['bk_related_heading_style'];
                $postLayout         =  $atbs_option['bk_related_post_layout'];
                $postIcon           =  $atbs_option['bk_related_post_icon'];
            endif;

            if (is_attachment() && ($post->post_parent)) { $postID = $post->post_parent; };

            $bk_tags = wp_get_post_tags($postID);
            $tag_length = sizeof($bk_tags);
            $bk_tag_check = $bk_all_cats = array();
            foreach ( $bk_tags as $tag_key => $bk_tag ) { $bk_tag_check[$tag_key] = $bk_tag->term_id; }

            $bk_categories = get_the_category($postID);
            $category_length = sizeof($bk_categories);
            if ($category_length > 0){
                foreach ( $bk_categories as $category_key => $bk_category ) { $bk_all_cats[$category_key] = $bk_category->term_id; }
            }

            if ($bkRelatedSource == 'category_tag') {
                $args = array(
                    'posts_per_page' => intval($bk_number_related),
                    'post__not_in' => $excludeid,
                    'post_status' => 'publish',
                    'post_type' => 'post',
        			'ignore_sticky_posts' => 1,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $bk_all_cats,
                            'include_children' => false,
                        ),
                        array(
                            'taxonomy' => 'post_tag',
                            'field' => 'term_id',
                            'terms' => $bk_tag_check,
                        )
                    )
                );
            } elseif ($bkRelatedSource == 'tag') {
                $args = array(
                    'posts_per_page' => intval($bk_number_related),
                    'tag_in' => $bk_tag_check,
                    'post__not_in' => $excludeid,
                    'post_status' => 'publish',
                    'orderby' => 'rand',
                    'ignore_sticky_posts' => 1,
                );
            } elseif ($bkRelatedSource == 'category') {
                $args = array(
                    'posts_per_page' => intval($bk_number_related),
                    'post__not_in'   => $excludeid,
                    'post_status'    => 'publish',
                    'post_type'      => 'post',
        			'ignore_sticky_posts' => 1,
                    'category__in'        => $bk_all_cats,
                );
            } elseif ($bkRelatedSource == 'author') {
                $args = array(
                    'posts_per_page'    => intval($bk_number_related),
                    'post__not_in'      => $excludeid,
                    'post_status'       => 'publish',
                    'post_type'         => 'post',
        			'ignore_sticky_posts' => 1,
                    'author'              => $post->post_author
                );
            }

            $moduleInfo = array(
                'align'         => '',
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );

            if (isset($headingStyle)) {
                $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle);
            }

            $the_query = new WP_Query( $args );

            if (empty($the_query) || ($the_query->post_count == 0)) {
                return '';
            }

            self::$related_query = $the_query;

            $bk_related_output = '';

            $bk_related_output .= '<div class="related-posts single-entry-section">';
            $bk_related_output .= '<div class="block-heading '.$headingClass.'">';
        	$bk_related_output .= '<h4 class="block-heading__title">'.esc_html__('You may also like', 'keylin').'</h4>';
        	$bk_related_output .= '</div>';

            if ( $the_query != NULL ) {
                $bk_related_output .= self::bk_get_blog_posts($the_query, $moduleInfo, $postLayout);
            }
            $bk_related_output .= '</div> <!-- related-posts -->';

            wp_reset_postdata();
            return $bk_related_output;
        }
    /**
     * ************* Related Post *****************
     *---------------------------------------------------
     */
        static function bk_related_post_wide($post) {
            $postID = $post->ID;
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

            $excludeid = array();
            $samecat_post_ids = array();

            if (self::$samecat_query != '') {
                $samecat_post_ids = wp_list_pluck( self::$samecat_query->posts, 'ID' );
            }

            array_push($excludeid, $postID);

            if (count($samecat_post_ids) > 0) {
                foreach($samecat_post_ids as $samecat_post_id):
                    array_push($excludeid, $samecat_post_id);
                endforeach;
            }

            $bkSingleLayout = get_post_meta($postID,'bk_post_layout_standard',true);

            if ($bkSingleLayout != 'global_settings') :
                $bkRelatedSource    =  self::bk_get_post_option($postID, 'bk_related_source_wide');
                $headingStyle       =  self::bk_get_post_option($postID, 'bk_related_heading_style_wide');
                $postLayout         =  self::bk_get_post_option($postID, 'bk_related_post_layout_wide');
                $postIcon           =  self::bk_get_post_option($postID, 'bk_related_post_icon_wide');
            else:
                $bkRelatedSource    =  $atbs_option['bk_related_source_wide'];
                $headingStyle       =  $atbs_option['bk_related_heading_style_wide'];
                $postLayout         =  $atbs_option['bk_related_post_layout_wide'];
                $postIcon           =  $atbs_option['bk_related_post_icon_wide'];
            endif;

            $postEntries        = 3;
            if (is_attachment() && ($post->post_parent)) { $postID = $post->post_parent; };

            $bk_tags = wp_get_post_tags($postID);
            $tag_length = sizeof($bk_tags);
            $bk_tag_check = $bk_all_cats = array();
            foreach ( $bk_tags as $tag_key => $bk_tag ) { $bk_tag_check[$tag_key] = $bk_tag->term_id; }

            $bk_categories = get_the_category($postID);
            $category_length = sizeof($bk_categories);
            if ($category_length > 0){
                foreach ( $bk_categories as $category_key => $bk_category ) { $bk_all_cats[$category_key] = $bk_category->term_id; }
            }

            switch($postLayout){
                case 'listing_grid_no_sidebar':
                    $postEntries = 6;
                    break;
                case 'listing_grid_b_no_sidebar':
                    $postEntries = 8;
                    break;
                case 'posts_block_j':
                    $postEntries = 6;
                    break;
                case 'listing_grid_3':
                    $postEntries = 4;
                    break;
                case 'posts_block_b':
                    $postEntries = 6;
                    break;
                case 'posts_block_c':
                    $postEntries = 4;
                    break;
                case 'posts_block_d':
                    $postEntries = 4;
                    break;
                case 'posts_block_e':
                    $postEntries = 3;
                    break;
                case 'posts_block_i':
                    $postEntries = 5;
                    break;
                case 'mosaic_a':
                    $postEntries = 5;
                    break;
                case 'mosaic_b':
                    $postEntries = 4;
                    break;
                case 'mosaic_c':
                    $postEntries = 3;
                    break;
                case 'featured_block_c':
                    $postEntries = 5;
                    break;
                case 'featured_block_e':
                    $postEntries = 5;
                    break;
                case 'featured_block_f':
                    $postEntries = 5;
                    break;
                default:
                    $postEntries = 3;
                    break;
            }
            if ($bkRelatedSource == 'category_tag') {
                $args = array(
                    'posts_per_page' => intval($postEntries),
                    'post__not_in' => $excludeid,
                    'post_status' => 'publish',
                    'post_type' => 'post',
        			'ignore_sticky_posts' => 1,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $bk_all_cats,
                            'include_children' => false,
                        ),
                        array(
                            'taxonomy' => 'post_tag',
                            'field' => 'term_id',
                            'terms' => $bk_tag_check,
                        )
                    )
                );
            } elseif ($bkRelatedSource == 'tag') {
                $args = array(
                    'posts_per_page' => intval($postEntries),
                    'tag_in' => $bk_tag_check,
                    'post__not_in' => $excludeid,
                    'post_status' => 'publish',
                    'orderby' => 'rand',
                    'ignore_sticky_posts' => 1,
                );
            } elseif ($bkRelatedSource == 'category') {
                $args = array(
                    'posts_per_page' => intval($postEntries),
                    'post__not_in'   => $excludeid,
                    'post_status'    => 'publish',
                    'post_type'      => 'post',
        			'ignore_sticky_posts' => 1,
                    'category__in'        => $bk_all_cats,
                );
            } elseif ($bkRelatedSource == 'author') {
                $args = array(
                    'posts_per_page'    => intval($postEntries),
                    'post__not_in'      => $excludeid,
                    'post_status'       => 'publish',
                    'post_type'         => 'post',
        			'ignore_sticky_posts' => 1,
                    'author'              => $post->post_author
                );
            }
            $moduleInfo = array(
                'align'         => '',
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
                'iconPosition'  => '',
                'meta'          => '',
                'cat'           => '',
                'excerpt'       => '',
            );

            if (isset($headingStyle)) {
                $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle);
            }

            $the_query = new WP_Query( $args );

            if (empty($the_query) || ($the_query->post_count == 0)) {
                return '';
            }

            self::$related_query = $the_query;

            $bk_related_output = '';
            if (($postLayout == 'listing_list_1') || ( $postLayout =='listing_list_2')):
                $container_narrow = ' container--narrow';
            else:
                $container_narrow = '';
            endif;

            $bk_related_output .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth related-posts single-entry-section">';
            $bk_related_output .= '<div class="container'.$container_narrow.'">';
            $bk_related_output .= '<div class="block-heading '.$headingClass.'">';
        	$bk_related_output .= '<h4 class="block-heading__title">'.esc_html__('You may also like', 'keylin').'</h4>';
            $bk_related_output .= '</div>';

            if ( $the_query != NULL ) {
                $bk_related_output .= self::bk_get_blog_posts($the_query, $moduleInfo, $postLayout);
            }
            $bk_related_output .= '</div><!--.container-->';
            $bk_related_output .= '</div> <!-- related-posts wide -->';

            wp_reset_postdata();
            return $bk_related_output;
        }
        static function bk_same_category_posts($post) {
            $postID = $post->ID;
            $excludeid = array();
            $related_post_ids = array();

            if (self::$related_query != ''):
                $related_post_ids = wp_list_pluck( self::$related_query->posts, 'ID' );
            endif;

            array_push($excludeid, $postID);

            if (count($related_post_ids) > 0) {
                foreach($related_post_ids as $related_post_id):
                    array_push($excludeid, $related_post_id);
                endforeach;
            }

            $catID       = self::bk_get_post_option($postID, 'bk_same_cat_id');
            if ($catID == '') {
                $catID = 'current_cat';
            }
            if ($catID == 'disable') {
                return '';
            }
            if ($catID == 'current_cat') {
                $category = get_the_category($postID);
                if (isset($category[0]) && $category[0]){
                    $catID = $category[0]->term_id;
                }
                else {
                    return '';
                }
            }

            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $bkSingleLayout = get_post_meta($postID,'bk_post_layout_standard',true);

            if ($bkSingleLayout != 'global_settings') :
                $headingStyle       =  self::bk_get_post_option($postID, 'bk_same_cat_heading_style');
                $postLayout         =  self::bk_get_post_option($postID, 'bk_same_cat_post_layout');
                $postEntries        =  self::bk_get_post_option($postID, 'bk_same_cat_number_posts');
                $postIcon           =  self::bk_get_post_option($postID, 'bk_same_cat_post_icon');
                $moreLink           =  self::bk_get_post_option($postID, 'bk_same_cat_more_link');
            else:
                $headingStyle       =  $atbs_option['bk_same_cat_heading_style'];
                $postLayout         =  $atbs_option['bk_same_cat_post_layout'];
                $postEntries        =  $atbs_option['bk_same_cat_number_posts'];
                $postIcon           =  $atbs_option['bk_same_cat_post_icon'];
                $moreLink           =  $atbs_option['bk_same_cat_more_link'];
            endif;

            if (isset($headingStyle)) {
                $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle);
            }

            $bk_all_cats = array();
            $bk_categories = get_the_category($postID);
            $category_length = sizeof($bk_categories);
            if ($category_length > 0){
                foreach ( $bk_categories as $category_key => $bk_category ) { $bk_all_cats[$category_key] = $bk_category->term_id; }
            }

            $moduleInfo = array(
                'align'         => '',
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
            );

            $args = array(
                'posts_per_page' => $postEntries,
                'post__not_in'   => $excludeid,
                'post_status'    => 'publish',
                'post_type'      => 'post',
    			'ignore_sticky_posts' => 1,
                'category__in'        => $catID,
            );

            $the_query = new WP_Query( $args );

            self::$samecat_query = $the_query;

            if (empty($the_query) || ($the_query->post_count == 0)) {
                return '';
            }

            $dataOutput = '';
            $dataOutput .= '<div class="same-category-posts single-entry-section">';
            $dataOutput .= '<div class="block-heading '.$headingClass.'">';
        	$dataOutput .= '<h4 class="block-heading__title">'.esc_html__('More in', 'keylin').' <a href="'.get_category_link($catID).'" class="cat-'.$catID.' cat-theme">'. get_cat_name($catID).'</a></h4>';
        	$dataOutput .= '</div>';

            $dataOutput .= '<div class="posts-list">';
            $dataOutput .= self::bk_get_blog_posts($the_query, $moduleInfo, $postLayout);
            $dataOutput .= '</div> <!-- posts-list-samecat-->';

            if ($moreLink == 1) {
                $dataOutput .= '<nav class="atbs-keylin-pagination text-center">';
            	$dataOutput .= '<a href="'.get_category_link($catID).'" class="btn btn-default">'.esc_html__('View all ', 'keylin'). get_cat_name($catID).'<i class="mdicon mdicon-arrow_forward mdicon--last"></i></a>';
            	$dataOutput .= '</nav>';
            }

            $dataOutput .= '</div>';

            wp_reset_postdata();
            return $dataOutput;
        }
        static function bk_same_category_posts_wide($post) {
            $postID = $post->ID;
            $excludeid = array();

            $related_post_ids = array();

            if (self::$related_query != ''):
                $related_post_ids = wp_list_pluck( self::$related_query->posts, 'ID' );
            endif;

            array_push($excludeid, $postID);

            if (count($related_post_ids) > 0) {
                foreach($related_post_ids as $related_post_id):
                    array_push($excludeid, $related_post_id);
                endforeach;
            }

            $catID              = self::bk_get_post_option($postID, 'bk_same_cat_id_wide');

            if ($catID == '') {
                $catID = 'current_cat';
            }
            if ($catID == 'disable') {
                return '';
            }
            if ($catID == 'current_cat') {
                $category = get_the_category($postID);
                if (isset($category[0]) && $category[0]){
                    $catID = $category[0]->term_id;
                }
                else {
                    return '';
                }
            }

            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $bkSingleLayout = get_post_meta($postID,'bk_post_layout_standard',true);

            if ($bkSingleLayout != 'global_settings') :
                $headingStyle       =  self::bk_get_post_option($postID, 'bk_same_cat_heading_style_wide');
                $postLayout         =  self::bk_get_post_option($postID, 'bk_same_cat_post_layout_wide');
                $postEntries        =  3;
                $postIcon           =  self::bk_get_post_option($postID, 'bk_same_cat_post_icon_wide');
                $moreLink           =  self::bk_get_post_option($postID, 'bk_same_cat_more_link_wide');
            else:
                $headingStyle       =  $atbs_option['bk_same_cat_heading_style_wide'];
                $postLayout         =  $atbs_option['bk_same_cat_post_layout_wide'];
                $postEntries        =  3;
                $postIcon           =  $atbs_option['bk_same_cat_post_icon_wide'];
                $moreLink           =  $atbs_option['bk_same_cat_more_link_wide'];
            endif;

            if (isset($headingStyle)) {
                $headingClass = ATBS_Core::bk_get_block_heading_class($headingStyle);
            }

            $bk_all_cats = array();
            $bk_categories = get_the_category($postID);
            $category_length = sizeof($bk_categories);
            if ($category_length > 0){
                foreach ( $bk_categories as $category_key => $bk_category ) { $bk_all_cats[$category_key] = $bk_category->term_id; }
            }

            $moduleInfo = array(
                'align'         => '',
                'post_source'   => 'all',
                'post_icon'     => $postIcon,
                'iconPosition'  => '',
                'meta'          => '',
                'cat'           => '',
                'excerpt'       => '',
            );

            switch($postLayout){
                case 'listing_grid_no_sidebar':
                    $postEntries = 6;
                    break;
                case 'listing_grid_b_no_sidebar':
                    $postEntries = 6;
                    break;
                case 'listing_grid_3':
                    $postEntries = 4;
                    break;
                case 'posts_block_j':
                    $postEntries = 6;
                    break;
                case 'posts_block_b':
                    $postEntries = 6;
                    break;
                case 'posts_block_c':
                    $postEntries = 4;
                    break;
                case 'posts_block_d':
                    $postEntries = 4;
                    break;
                case 'posts_block_e':
                    $postEntries = 3;
                    break;
                case 'posts_block_i':
                    $postEntries = 5;
                    break;
                case 'mosaic_a':
                    $postEntries = 5;
                    break;
                case 'mosaic_b':
                    $postEntries = 4;
                    break;
                case 'mosaic_c':
                    $postEntries = 3;
                    break;
                case 'featured_block_c':
                    $postEntries = 5;
                    break;
                case 'featured_block_e':
                    $postEntries = 5;
                    break;
                case 'featured_block_f':
                    $postEntries = 5;
                    break;
                default:
                    $postEntries = 3;
                    break;
            }

            $args = array(
                'posts_per_page' => $postEntries,
                'post__not_in'   => $excludeid,
                'post_status'    => 'publish',
                'post_type'      => 'post',
    			'ignore_sticky_posts' => 1,
                'category__in'        => $catID,
            );

            $the_query = new WP_Query( $args );

            self::$samecat_query = $the_query;

            if (empty($the_query) || ($the_query->post_count == 0)) {
                return '';
            }
            if(($postLayout == 'listing_list_1') || ($postLayout == 'listing_list_2')):
                $container_narrow = ' container--narrow';
            else:
                $container_narrow = '';
            endif;

            $containerSW = self::bk_get_post_option($postID, 'bk_same_cat_container_width');
            if ($containerSW == 'global_settings') :
                $containerSW       =  $atbs_option['bk_same_cat_container_width'];
            endif;


            if(($containerSW == 'wide') && (($postLayout == 'mosaic_a') || ($postLayout == 'mosaic_b') || ($postLayout == 'featured_block_e') || ($postLayout == 'featured_block_f')) ):
                $containerClass = 'container container--wide-lg';
            else:
                $containerClass = 'container';
            endif;
            $dataOutput = '';
            $dataOutput .= '<div class="atbs-keylin-block atbs-keylin-block--fullwidth related-posts single-entry-section">';

            if($container_narrow != ''):
                $dataOutput .= '<div class="container'.esc_attr($container_narrow).'">';
            else:
                $dataOutput .= '<div class="'.$containerClass.'">';
            endif;

            $dataOutput .= '<div class="block-heading '.$headingClass.'">';
        	$dataOutput .= '<h4 class="block-heading__title">'.esc_html__('More in', 'keylin').' <a href="'.get_category_link($catID).'" class="cat-'.$catID.' cat-theme">'. get_cat_name($catID).'</a></h4>';
        	$dataOutput .= '</div>';

            $dataOutput .= self::bk_get_blog_posts($the_query, $moduleInfo, $postLayout);

            if ($moreLink == 1) {
                $dataOutput .= '<nav class="atbs-keylin-pagination text-center">';
            	$dataOutput .= '<a href="'.get_category_link($catID).'" class="btn btn-default">'.esc_html__('View all ', 'keylin'). get_cat_name($catID).'<i class="mdicon mdicon-arrow_forward mdicon--last"></i></a>';
            	$dataOutput .= '</nav>';
            }

            $dataOutput .= '</div><!--.container-->';
            $dataOutput .= '</div> <!-- same-cat-posts wide -->';

            wp_reset_postdata();
            return $dataOutput;
        }
        static function bk_entry_interaction_share_svg($postID, $class = '') {
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $share_box = $atbs_option['bk-sharebox-sw'];
            if ($share_box){
                $social_share['fb'] = $atbs_option['bk-fb-sw'];
                $social_share['tw'] = $atbs_option['bk-tw-sw'];
                $social_share['pi'] = $atbs_option['bk-pi-sw'];
                $social_share['li'] = $atbs_option['bk-li-sw'];
            }
            if (($social_share['fb'] == '') && ($social_share['tw'] == '') && ($social_share['pi'] == '') && ($social_share['li'] == '')):
                return '';
            endif;

            $htmlOutput = '';
            $titleget = get_the_title($postID);
            $bk_url = get_permalink($postID);
            $fb_oc = "window.open('//www.facebook.com/sharer.php?u=".urlencode(get_permalink())."','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;";
            $tw_oc = "window.open('//twitter.com/share?url=".urlencode(get_permalink())."&amp;text=".str_replace(" ", "%20", $titleget)."','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;";
            $li_oc = "window.open('//www.linkedin.com/shareArticle?mini=true&amp;url=".urlencode(get_permalink())."','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;";

            $svgFacebook = '<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                              <g>
                                <path d="m21.7 16.7h5v5h-5v11.6h-5v-11.6h-5v-5h5v-2.1c0-2 0.6-4.5 1.8-5.9 1.3-1.3 2.8-2 4.7-2h3.5v5h-3.5c-0.9 0-1.5 0.6-1.5 1.5v3.5z"></path>
                              </g>
                            </svg>';
            $svgTwitter = '<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                              <g>
                                <path d="m31.5 11.7c1.3-0.8 2.2-2 2.7-3.4-1.4 0.7-2.7 1.2-4 1.4-1.1-1.2-2.6-1.9-4.4-1.9-1.7 0-3.2 0.6-4.4 1.8-1.2 1.2-1.8 2.7-1.8 4.4 0 0.5 0.1 0.9 0.2 1.3-5.1-0.1-9.4-2.3-12.7-6.4-0.6 1-0.9 2.1-0.9 3.1 0 2.2 1 3.9 2.8 5.2-1.1-0.1-2-0.4-2.8-0.8 0 1.5 0.5 2.8 1.4 4 0.9 1.1 2.1 1.8 3.5 2.1-0.5 0.1-1 0.2-1.6 0.2-0.5 0-0.9 0-1.1-0.1 0.4 1.2 1.1 2.3 2.1 3 1.1 0.8 2.3 1.2 3.6 1.3-2.2 1.7-4.7 2.6-7.6 2.6-0.7 0-1.2 0-1.5-0.1 2.8 1.9 6 2.8 9.5 2.8 3.5 0 6.7-0.9 9.4-2.7 2.8-1.8 4.8-4.1 6.1-6.7 1.3-2.6 1.9-5.3 1.9-8.1v-0.8c1.3-0.9 2.3-2 3.1-3.2-1.1 0.5-2.3 0.8-3.5 1z"></path>
                              </g>
                            </svg>';
            $svgPi = '<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                          <g>
                            <path d="m37.3 20q0 4.7-2.3 8.6t-6.3 6.2-8.6 2.3q-2.4 0-4.8-0.7 1.3-2 1.7-3.6 0.2-0.8 1.2-4.7 0.5 0.8 1.7 1.5t2.5 0.6q2.7 0 4.8-1.5t3.3-4.2 1.2-6.1q0-2.5-1.4-4.7t-3.8-3.7-5.7-1.4q-2.4 0-4.4 0.7t-3.4 1.7-2.5 2.4-1.5 2.9-0.4 3q0 2.4 0.8 4.1t2.7 2.5q0.6 0.3 0.8-0.5 0.1-0.1 0.2-0.6t0.2-0.7q0.1-0.5-0.3-1-1.1-1.3-1.1-3.3 0-3.4 2.3-5.8t6.1-2.5q3.4 0 5.3 1.9t1.9 4.7q0 3.8-1.6 6.5t-3.9 2.6q-1.3 0-2.2-0.9t-0.5-2.4q0.2-0.8 0.6-2.1t0.7-2.3 0.2-1.6q0-1.2-0.6-1.9t-1.7-0.7q-1.4 0-2.3 1.2t-1 3.2q0 1.6 0.6 2.7l-2.2 9.4q-0.4 1.5-0.3 3.9-4.6-2-7.5-6.3t-2.8-9.4q0-4.7 2.3-8.6t6.2-6.2 8.6-2.3 8.6 2.3 6.3 6.2 2.3 8.6z"></path>
                          </g>
                        </svg>';
            $svgLi = '<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                          <g>
                            <path d="m13.3 31.7h-5v-16.7h5v16.7z m18.4 0h-5v-8.9c0-2.4-0.9-3.5-2.5-3.5-1.3 0-2.1 0.6-2.5 1.9v10.5h-5s0-15 0-16.7h3.9l0.3 3.3h0.1c1-1.6 2.7-2.8 4.9-2.8 1.7 0 3.1 0.5 4.2 1.7 1 1.2 1.6 2.8 1.6 5.1v9.4z m-18.3-20.9c0 1.4-1.1 2.5-2.6 2.5s-2.5-1.1-2.5-2.5 1.1-2.5 2.5-2.5 2.6 1.2 2.6 2.5z"></path>
                          </g>
                        </svg>';

            $htmlOutput .= '<div class="single-content-left '.esc_attr($class).'">';
            $htmlOutput .= '<div class="social-share social-share-single text-center">';
            $htmlOutput .= '<span class="social-share-label">Share</span>';
            $htmlOutput .= '<ul class="social-list">';

            if ($social_share['fb']):
                $htmlOutput .= '<li class="facebook-share" ><a class="sharing-btn sharing-btn-primary facebook-btn" data-placement="top" title="'.esc_attr__('Share on Facebook', 'keylin').'" onClick="'.$fb_oc.'" href="//www.facebook.com/sharer.php?u='.urlencode($bk_url).'"><div class="share-item__icon">'.$svgFacebook.'</div></a></li>';
            endif;
            if ($social_share['tw']):
                $htmlOutput .= '<li class="twitter-share" ><a class="sharing-btn sharing-btn-primary twitter-btn" data-placement="top" title="'.esc_attr__('Share on Twitter', 'keylin').'" onClick="'.$tw_oc.'" href="//twitter.com/share?url='.urlencode(get_permalink()).'&amp;text='.str_replace(" ", "%20", $titleget).'"><div class="share-item__icon">'.$svgTwitter.'</div></a></li>';
            endif;
            if ($social_share['pi']):
                $htmlOutput .= '<li class="pinterest-share" ><a class="sharing-btn pinterest-btn" data-placement="top" title="'.esc_attr__('Share on Pinterest', 'keylin').'" href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;//assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"><div class="share-item__icon">'.$svgPi.'</div></a></li>';
            endif;
            if ($social_share['li']):
                $htmlOutput .= '<li class="linkedin-share" ><a class="sharing-btn linkedin-btn" data-placement="top" title="'.esc_attr__('Share on Linkedin', 'keylin').'" onClick="'.$li_oc.'" href="//www.linkedin.com/shareArticle?mini=true&amp;url='.urlencode($bk_url).'"><div class="share-item__icon">'.$svgLi.'</div></a></li>';
            endif;

            $htmlOutput .= '</ul>';
            $htmlOutput .= '</div>';
            $htmlOutput .= '</div>';

            return $htmlOutput;
        }

        /**
         * ************* Post Share *****************
         *---------------------------------------------------
         */
        static function bk_entry_interaction_share($postID) {
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $share_box = $atbs_option['bk-sharebox-sw'];
            $htmlOutput = '';
            if ($share_box){
                $social_share['fb'] = isset($atbs_option['bk-fb-sw']) ? $atbs_option['bk-fb-sw'] : '';
                $social_share['tw'] = isset($atbs_option['bk-tw-sw']) ? $atbs_option['bk-tw-sw'] : '';
                $social_share['pi'] = isset($atbs_option['bk-pi-sw']) ? $atbs_option['bk-pi-sw'] : '';
                $social_share['li'] = isset($atbs_option['bk-li-sw']) ? $atbs_option['bk-li-sw'] : '';

            if (($social_share['fb'] == '') && ($social_share['tw'] == '') && ($social_share['pi'] == '') && ($social_share['li'] == '')):
                return '';
            endif;


            $titleget = get_the_title($postID);
            $bk_url = get_permalink($postID);
            $fb_oc = "window.open('//www.facebook.com/sharer.php?u=".urlencode(get_permalink())."','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;";
            $tw_oc = "window.open('//twitter.com/share?url=".urlencode(get_permalink())."&amp;text=".str_replace(" ", "%20", $titleget)."','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;";
            $li_oc = "window.open('//www.linkedin.com/shareArticle?mini=true&amp;url=".urlencode(get_permalink())."','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;";

            $svgFacebook = '<svg fill="#666" preserveAspectRatio="xMidYMid meet" height="1.25em" width="1.25em" viewBox="0 0 40 40">
                              <g>
                                <path d="m21.7 16.7h5v5h-5v11.6h-5v-11.6h-5v-5h5v-2.1c0-2 0.6-4.5 1.8-5.9 1.3-1.3 2.8-2 4.7-2h3.5v5h-3.5c-0.9 0-1.5 0.6-1.5 1.5v3.5z"></path>
                              </g>
                            </svg>';
            $svgTwitter = '<svg fill="#666" preserveAspectRatio="xMidYMid meet" height="1.25em" width="1.25em" viewBox="0 0 40 40">
                              <g>
                                <path d="m31.5 11.7c1.3-0.8 2.2-2 2.7-3.4-1.4 0.7-2.7 1.2-4 1.4-1.1-1.2-2.6-1.9-4.4-1.9-1.7 0-3.2 0.6-4.4 1.8-1.2 1.2-1.8 2.7-1.8 4.4 0 0.5 0.1 0.9 0.2 1.3-5.1-0.1-9.4-2.3-12.7-6.4-0.6 1-0.9 2.1-0.9 3.1 0 2.2 1 3.9 2.8 5.2-1.1-0.1-2-0.4-2.8-0.8 0 1.5 0.5 2.8 1.4 4 0.9 1.1 2.1 1.8 3.5 2.1-0.5 0.1-1 0.2-1.6 0.2-0.5 0-0.9 0-1.1-0.1 0.4 1.2 1.1 2.3 2.1 3 1.1 0.8 2.3 1.2 3.6 1.3-2.2 1.7-4.7 2.6-7.6 2.6-0.7 0-1.2 0-1.5-0.1 2.8 1.9 6 2.8 9.5 2.8 3.5 0 6.7-0.9 9.4-2.7 2.8-1.8 4.8-4.1 6.1-6.7 1.3-2.6 1.9-5.3 1.9-8.1v-0.8c1.3-0.9 2.3-2 3.1-3.2-1.1 0.5-2.3 0.8-3.5 1z"></path>
                              </g>
                            </svg>';
            $svgPi = '<svg fill="#666" preserveAspectRatio="xMidYMid meet" height="1.25em" width="1.25em" viewBox="0 0 40 40">
                          <g>
                            <path d="m37.3 20q0 4.7-2.3 8.6t-6.3 6.2-8.6 2.3q-2.4 0-4.8-0.7 1.3-2 1.7-3.6 0.2-0.8 1.2-4.7 0.5 0.8 1.7 1.5t2.5 0.6q2.7 0 4.8-1.5t3.3-4.2 1.2-6.1q0-2.5-1.4-4.7t-3.8-3.7-5.7-1.4q-2.4 0-4.4 0.7t-3.4 1.7-2.5 2.4-1.5 2.9-0.4 3q0 2.4 0.8 4.1t2.7 2.5q0.6 0.3 0.8-0.5 0.1-0.1 0.2-0.6t0.2-0.7q0.1-0.5-0.3-1-1.1-1.3-1.1-3.3 0-3.4 2.3-5.8t6.1-2.5q3.4 0 5.3 1.9t1.9 4.7q0 3.8-1.6 6.5t-3.9 2.6q-1.3 0-2.2-0.9t-0.5-2.4q0.2-0.8 0.6-2.1t0.7-2.3 0.2-1.6q0-1.2-0.6-1.9t-1.7-0.7q-1.4 0-2.3 1.2t-1 3.2q0 1.6 0.6 2.7l-2.2 9.4q-0.4 1.5-0.3 3.9-4.6-2-7.5-6.3t-2.8-9.4q0-4.7 2.3-8.6t6.2-6.2 8.6-2.3 8.6 2.3 6.3 6.2 2.3 8.6z"></path>
                          </g>
                        </svg>';
            $svgLi = '<svg fill="#666" preserveAspectRatio="xMidYMid meet" height="1.25em" width="1.25em" viewBox="0 0 40 40">
                          <g>
                            <path d="m13.3 31.7h-5v-16.7h5v16.7z m18.4 0h-5v-8.9c0-2.4-0.9-3.5-2.5-3.5-1.3 0-2.1 0.6-2.5 1.9v10.5h-5s0-15 0-16.7h3.9l0.3 3.3h0.1c1-1.6 2.7-2.8 4.9-2.8 1.7 0 3.1 0.5 4.2 1.7 1 1.2 1.6 2.8 1.6 5.1v9.4z m-18.3-20.9c0 1.4-1.1 2.5-2.6 2.5s-2.5-1.1-2.5-2.5 1.1-2.5 2.5-2.5 2.6 1.2 2.6 2.5z"></path>
                          </g>
                        </svg>';

            if ($social_share['fb']):
                $htmlOutput .= '<li class="facebook-share" ><a class="sharing-btn sharing-btn-primary facebook-btn" data-placement="top" title="'.esc_attr__('Share on Facebook', 'keylin').'" onClick="'.$fb_oc.'" href="//www.facebook.com/sharer.php?u='.urlencode($bk_url).'"><div class="share-item__icon">'.$svgFacebook.'</div></a></li>';
            endif;
            if ($social_share['tw']):
                $htmlOutput .= '<li class="twitter-share" ><a class="sharing-btn sharing-btn-primary twitter-btn" data-placement="top" title="'.esc_attr__('Share on Twitter', 'keylin').'" onClick="'.$tw_oc.'" href="//twitter.com/share?url='.urlencode(get_permalink()).'&amp;text='.str_replace(" ", "%20", $titleget).'"><div class="share-item__icon">'.$svgTwitter.'</div></a></li>';
            endif;
            if ($social_share['pi']):
                $htmlOutput .= '<li class="pinterest-share" ><a class="sharing-btn pinterest-btn" data-placement="top" title="'.esc_attr__('Share on Pinterest', 'keylin').'" href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;//assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"><div class="share-item__icon">'.$svgPi.'</div></a></li>';
            endif;
            if ($social_share['li']):
                $htmlOutput .= '<li class="linkedin-share" ><a class="sharing-btn linkedin-btn" data-placement="top" title="'.esc_attr__('Share on Linkedin', 'keylin').'" onClick="'.$li_oc.'" href="//www.linkedin.com/shareArticle?mini=true&amp;url='.urlencode($bk_url).'"><div class="share-item__icon">'.$svgLi.'</div></a></li>';
            endif;
            }

            return $htmlOutput;
        }
        /**
         * ************* Post Share *****************
         *---------------------------------------------------
         */
        static function bk_entry_interaction_comments($postID) {
            $htmlOutput = '<a href="#comments" class="comments-count entry-action-btn" data-toggle="tooltip" data-placement="top" title="'.get_comments_number($postID).' '.esc_attr__('Comments', 'keylin').'"><i class="mdicon mdicon-chat_bubble"></i><span>'.get_comments_number($postID).'</span></a>';
            return $htmlOutput;
        }
        static function bk_get_blog_posts($the_query, $moduleInfo, $postLayout = 'listing_list_1_has_sidebar') {
            $dataOutput = '';
            if ( $the_query->have_posts() ) :
                switch($postLayout){
                    case 'listing_list_1_has_sidebar':
                        $sectionHTML = new ATBS_Block_Posts_Listing_List_1_Has_Sidebar;
                        $dataOutput .= '<div class="atbs-keylin-listing--list-1 atbs-keylin-listing--list-1-has-slide-bar">';
                        $dataOutput .= '<div class="posts-list list-space-xl posts-list-style-1 posts-list-has-sidebar">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_list_2_has_sidebar':
                        $sectionHTML = new ATBS_Block_Posts_Listing_List_2_Has_Sidebar;
                        $dataOutput .= '<div class="atbs-keylin-listing--list-2 atbs-keylin-listing--list-2-has-sidebar">';
                        $dataOutput .= '<div class="posts-list list-space-xl posts-list-style-2 posts-list-has-sidebar">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_grid_1_has_sidebar':
                        $sectionHTML = new ATBS_Block_Posts_Listing_Grid_1_Has_Sidebar;
                        $dataOutput .= '<div class="atbs-keylin-listing--grid-1 atbs-keylin-listing--grid-1-has-slidebar">';
                        $dataOutput .= '<div class="posts-list posts-grid-style-2 posts-grid-has-sidebar flexbox-wrap flexbox-wrap-2i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_grid_2_has_sidebar':
                        $sectionHTML = new ATBS_Block_Posts_Listing_Grid_2_Has_Sidebar;
                        $dataOutput .= '<div class="atbs-keylin-listing--grid-2 atbs-keylin-listing--grid-2-has-slidebar">';
                        $dataOutput .= '<div class="posts-list posts-grid-style-5 posts-grid-has-sidebar flexbox-wrap flexbox-wrap-2i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_grid_3_has_sidebar':
                        $sectionHTML = new ATBS_Block_Posts_Listing_Grid_3_Has_Sidebar;
                        $dataOutput .= '<div class="atbs-keylin-listing--grid-3 atbs-keylin-listing--grid-3-has-slidebar">';
                        $dataOutput .= '<div class="posts-list posts-grid-style-4 posts-grid-has-sidebar flexbox-wrap flexbox-wrap-3i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_list_1':
                        $sectionHTML = new ATBS_Block_Posts_Listing_List_1;
                        $dataOutput .= '<div class="atbs-keylin-listing--list-1">';
                        $dataOutput .= '<div class="posts-list list-space-xl posts-list-style-1">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_list_2':
                        $sectionHTML = new ATBS_Block_Posts_Listing_List_2;
                        $dataOutput .= '<div class="posts-list list-space-xl posts-list-style-2">';
                        $dataOutput .= '<div class="posts-list flexbox-wrap flexbox-wrap-1i flex-space-50">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_grid_1':
                        $sectionHTML = new ATBS_Block_Posts_Listing_Grid_1;
                        $dataOutput .= '<div class="atbs-keylin-listing--grid-1">';
                        $dataOutput .= '<div class="posts-list posts-grid-style-2 flexbox-wrap flexbox-wrap-3i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_grid_2':
                        $sectionHTML = new ATBS_Block_Posts_Listing_Grid_2;
                        $dataOutput .= '<div class="atbs-keylin-listing--grid-2">';
                        $dataOutput .= '<div class="posts-list posts-grid-style-5 flexbox-wrap flexbox-wrap-3i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'listing_grid_3':
                        $sectionHTML = new ATBS_Block_Posts_Listing_Grid_3;
                        $dataOutput .= '<div class="atbs-keylin-listing--grid-3">';
                        $dataOutput .= '<div class="posts-list posts-grid-style-4 flexbox-wrap flexbox-wrap-4i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'mosaic_a':
                        $sectionHTML = new ATBS_Featured_Module_3;
                        $dataOutput .= '<div class="atbs-keylin-featured-module-3">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-10">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'mosaic_b':
                        $sectionHTML = new ATBS_Featured_Module_4;
                        $dataOutput .= '<div class="atbs-keylin-featured-module-4">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-10">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'mosaic_c':
                        $sectionHTML = new ATBS_Featured_Module_5;
                        $dataOutput .= '<div class="atbs-keylin-featured-module-5">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flex-space-10">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'featured_block_e':
                        $sectionHTML = new ATBS_Featured_Module_6;
                        $dataOutput .= '<div class="atbs-keylin-featured-module-6">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'featured_block_f':
                        $sectionHTML = new ATBS_Featured_Module_7;
                        $dataOutput .= '<div class="atbs-keylin-featured-module-7">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-30">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'posts_block_b':
                        $sectionHTML = new ATBS_Posts_Grid_3;
                        $dataOutput .= '<div class="atbs-keylin-posts-grid-3">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'posts_block_e':
                        $sectionHTML = new ATBS_Featured_Module_8;
                        $dataOutput .= '<div class="atbs-keylin-featured-module-8">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner flexbox-wrap flexbox-wrap-2i flex-space-10">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    case 'posts_block_i':
                        $sectionHTML = new ATBS_Posts_Grid_4;
                        $dataOutput .= '<div class="atbs-keylin-posts-grid-4">';
                        $dataOutput .= '<div class="atbs-keylin-block__inner">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                    default:
                        $sectionHTML = new ATBS_Block_Posts_Listing_List_1_Has_Sidebar;
                        $dataOutput .= '<div class="atbs-keylin-listing--list-1 atbs-keylin-listing--list-1-has-slide-bar">';
                        $dataOutput .= '<div class="posts-list list-space-xl posts-list-style-1 posts-list-has-sidebar">';
                        $dataOutput .= $sectionHTML->render_modules($the_query, $moduleInfo);            //render modules
                        $dataOutput .= '</div>';
                        $dataOutput .= '</div>';
                        break;
                }
            endif;

            return $dataOutput;
        }
        static function bk_post_pagination(){
            global $page, $pages;
            if (count($pages) > 1):
            ?>
            <nav class="atbs-keylin-pagination atbs-keylin-pagination--next-n-prev">
				<div class="atbs-keylin-pagination__inner">
					<div class="atbs-keylin-pagination__label"><?php esc_html_e('Page ', 'keylin'); echo '<span>'.( esc_html($page).'</span>'.' of '.count($pages) );?></div>
					<div class="atbs-keylin-pagination__links <?php if ($page == count($pages)){echo ('atbs-keylin-pagination-last-page-link');}?>">
                        <?php
                            wp_link_pages( array(
                                'before' => '',
                                'after' => '',
                                'previouspagelink' => esc_html__('Previous', 'keylin'),
                                'nextpagelink' => esc_html__('Next', 'keylin'),
                                'next_or_number' => 'next',
                                'link_before' => '<span class="atbs-keylin-pagination__item">',
	                            'link_after' => '</span>',
                            ) );
                        ?>
					</div>
				</div>
			</nav>
            <?php
            endif;
        }

    /**
     * ************* Review Box *****************
     *---------------------------------------------------
     */
        static function bk_post_review_box_default($postID){
            $reviewCheck   = get_post_meta($postID,'bk_review_checkbox',true);
            if ( $reviewCheck != 1 ) {
                return '';
            }
            $the_pros_cons = get_post_meta($postID,'bk_pros_cons',true);

            $dataOutput = '';
            $productMediaLeft = '';
            $productMediaBody = '';

            $dataOutput .= '<div class="atbs-keylin-review">';
            $dataOutput .= '<div class="atbs-keylin-review__inner">';

            $dataOutput .= '<div class="atbs-keylin-review__top">';
            $dataOutput .= self::bk_post_review_media($postID);
            $dataOutput .= self::bk_post_review_overall_score($postID);
            $dataOutput .= '</div><!--atbs-keylin-review__top-->';

            $dataOutput .= self::bk_post_review_summary($postID);

            if ($the_pros_cons == 1) :
                $dataOutput .= self::bk_post_review_pros_cons($postID);
            endif;

            $dataOutput .= '</div><!--atbs-keylin-review__inner-->';
            $dataOutput .= '</div>';

            return $dataOutput;
        }

        static function bk_get_user_review_on_article($postID, $userID){

            $performanceReview  = get_post_meta($postID,'bk_performance_review_checkbox',true);
            if ($performanceReview != 1) :
                return '';
            endif;

            ob_start();

            $userReviewData = get_post_meta( $postID, 'atbs_reader_review_DATA-'.$userID, true );
            $userAvatarURL = get_avatar_url($userID, ['size' => '150']);
            $user_info = get_userdata($userID);
            $userStars = round($userReviewData['user_star_rating'], 1);
            ?>
            <div class="list-item">
                <div class="user-review-item">
                    <div class="user__info">
                        <div class="user__info-avatar">
                            <img src="<?php echo esc_url($userAvatarURL);?>" alt="File not found">
                        </div>
                        <div class="user__info-context">
                            <div class="user__info-name">
                                <span><?php echo esc_html($user_info->display_name);?></span>
                            </div>
                            <div class="user__info-meta">
                                <time class="time"><?php echo esc_html($userReviewData['reviewTime']);?></time>
                            </div>
                        </div>
                    </div>
                    <div class="user__description">
                        <div class="user__description-title">
                            <h3><?php echo esc_html($userReviewData['user_review_title']);?></h3>
                        </div>
                        <div class="user__description-star">
                            <span class="stars-list star-score-background">
                                <?php
                                    $starCounting = 1;
                                    for($starCounting = 1; $starCounting <= 5; $starCounting++) {
                                        if ($starCounting <= $userStars) {
                                            echo '<span class="star-item star-full"><i class="mdicon mdicon-star"></i></span>';
                                        } else {
                                            $deltaStar =  $userStars - (int) $userStars;  // .7
                                            if (($deltaStar > 0) && ($deltaStar < 1)) {
                                                echo '<span class="star-item star-half"><i class="mdicon mdicon-star"></i></span>';
                                                $userStars = 0;
                                            } else {
                                                 echo '<span class="star-item"><i class="mdicon mdicon-star"></i></span>';
                                            }
                                        }
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="user__description-excerpt-wrap atbs-user-review-content review-content-loading">
                            <div class="user__description-excerpt">
                                <p><?php echo esc_html($userReviewData['user_review_content']);?></p>
                                <div class="user__description-btn-more">
                                    <span class="review-text-fadeout"></span>
                                </div>
                            </div>
                            <div class="review-readmore"><?php esc_html_e('More', 'keylin');?></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            return ob_get_clean();
        }
        static function bk_performance_post_review($postID){
            global $page, $pages;

            if ($page > 1) {
                return '';
            }
            get_template_part( 'library/templates/review/atbs-user-review');
        }
        static function bk_post_review_summary($postID){
            $summaryText = get_post_meta($postID,'bk_review_summary',true);

            $reviewSummary = '';
            $reviewSummary .= '<div class="atbs-keylin-review__summary">';
            $reviewSummary .= '<p>';
            $reviewSummary .= $summaryText;
            $reviewSummary .= '</p>';
            $reviewSummary .= '</div><!--atbs-keylin-review__summary-->';

            return $reviewSummary;
        }
        static function bk_post_review_media($postID, $position = 'default'){
            $boxTitle = get_post_meta($postID,'bk_review_box_title',true);
            $boxSubTitle = get_post_meta($postID,'bk_review_box_sub_title',true);

            $productMedia = '';
            $productMedia .= '<div class="atbs-keylin-review__product media">';
            $imageID = get_post_meta( $postID, 'bk_review_product_img', false );
            if ((ATBS_Core::bk_check_array($imageID)) && ($imageID[0] != '')) {
                $productIMGURL = wp_get_attachment_image_src( $imageID[0], 'atbs-xs-1_1' );
            } else {
                $productIMGURL = '';
            }
            $productMedia .= '<div class="media-left media-middle">';

            if (!empty($productIMGURL) && ($productIMGURL[0] != NULL)) {
                $productMedia .= '<div class="atbs-keylin-review__product-image">';
                $productMedia .= '<img src="'.$productIMGURL[0].'" alt="'.esc_attr__('product-image', 'keylin').'">';
            }
            else {
                $productMedia .= '<div class="atbs-keylin-review__product-image not-exist-img">';
            }

            $productMedia .= '</div></div>';

            if ($position == 'default') {
                $titleTypeScale = 'typescale-2';
            } else {
                $titleTypeScale = 'typescale-1';
            }
            $productMedia .= '<div class="media-body media-middle">';
            $productMedia .= '<h3 class="atbs-keylin-review__product-name '.$titleTypeScale.'">'.$boxTitle.'</h3>';
            $productMedia .= '<span class="atbs-keylin-review__product-byline">'.$boxSubTitle.'</span>';
            $productMedia .= '</div>';
            $productMedia .= '</div><!--atbs-keylin-review__product media-->';

            return $productMedia;
        }
        static function bk_post_review_overall_score($postID){
            $reviewScore = get_post_meta($postID,'bk_review_score',true);

            $scoreBox = '';
            $scoreBox .= '<div class="atbs-keylin-review__overall-score">';
            $scoreBox .= '<div class="post-score-hexagon post-score-hexagon--l">';
            $scoreBox .= '<svg class="hexagon-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-5 -5 184 210">
                    <path fill="#FC3C2D" stroke="#fff" stroke-width="10px" d="M81.40638795573723 2.9999999999999996Q86.60254037844386 0 91.7986928011505 2.9999999999999996L168.0089283341811 47Q173.20508075688772 50 173.20508075688772 56L173.20508075688772 144Q173.20508075688772 150 168.0089283341811 153L91.7986928011505 197Q86.60254037844386 200 81.40638795573723 197L5.196152422706632 153Q0 150 0 144L0 56Q0 50 5.196152422706632 47Z">
                    </path>
                    </svg>';
            $scoreBox .= '<span class="post-score-value">'.$reviewScore.'</span>';
            $scoreBox .= '</div>';
            $scoreBox .= '</div> <!--atbs-keylin-review__overall-score-->';

            return $scoreBox;
        }
        static function bk_post_review_pros_cons_aside($postID){

            $prosTitle   = get_post_meta($postID,'bk_review_pros_title',true);
            $consTitle   = get_post_meta($postID,'bk_review_cons_title',true);
            $the_pros    = get_post_meta($postID,'bk_review_pros',true);
            $the_cons    = get_post_meta($postID,'bk_review_cons',true);

            $pros_cons = '';

            $pros_cons .= '<div class="atbs-keylin-review__pros-and-cons">';
            $pros_cons .= '<div class="row row--space-between grid-gutter-20">';

            $pros_cons .= '<div class="col-xs-12">';
            $pros_cons .= '<div class="atbs-keylin-review__pros">';
            $pros_cons .= '<h5 class="atbs-keylin-review__list-title">'.$prosTitle.'</h5>';
            $pros_cons .= '<ul>';
            if (count($the_pros) > 0) {
                foreach($the_pros as $val) :
                    $pros_cons .= '<li><i class="mdicon mdicon-add_circle"></i><span>'.$val.'</span></li>';
                endforeach;
            }
            $pros_cons .= '</ul>';
            $pros_cons .= '</div>';
            $pros_cons .= '</div>';

            $pros_cons .= '<div class="col-xs-12">';
            $pros_cons .= '<div class="atbs-keylin-review__cons">';
            $pros_cons .= '<h5 class="atbs-keylin-review__list-title">'.$consTitle.'</h5>';
            $pros_cons .= '<ul>';
            if (count($the_cons) > 0) {
                foreach($the_cons as $val) :
                    $pros_cons .= '<li><i class="mdicon mdicon-remove_circle"></i><span>'.$val.'</span></li>';
                endforeach;
            }
            $pros_cons .= '</ul>';
            $pros_cons .= '</div>';
            $pros_cons .= '</div>';

            $pros_cons .= '</div>';
            $pros_cons .= '</div><!--atbs-keylin-review__pros-and-cons-->';

            return $pros_cons;
        }
        static function bk_post_review_pros_cons($postID){

            $prosTitle   = get_post_meta($postID,'bk_review_pros_title',true);
            $consTitle   = get_post_meta($postID,'bk_review_cons_title',true);
            $the_pros    = get_post_meta($postID,'bk_review_pros',true);
            $the_cons    = get_post_meta($postID,'bk_review_cons',true);

            $pros_cons = '';

            if ( (($the_pros == '') || ($the_pros == null)) && (($the_cons == '') || ($the_cons == null)) ) {
                return $pros_cons;
            }

            $pros_cons .= '<div class="atbs-keylin-review__pros-and-cons">';
            $pros_cons .= '<div class="row row--space-between grid-gutter-20">';

            if ( ($the_pros != '') || ($the_pros != null) ) {
                if (count($the_cons) > 0) {
                    $pros_cons .= '<div class="col-xs-12 col-sm-6">';
                    $pros_cons .= '<div class="atbs-keylin-review__pros">';
                    $pros_cons .= '<h5 class="atbs-keylin-review__list-title">'.$prosTitle.'</h5>';
                    $pros_cons .= '<ul>';
                    foreach($the_pros as $val) :
                        $pros_cons .= '<li><i class="mdicon mdicon-add_circle"></i><span>'.$val.'</span></li>';
                    endforeach;
                    $pros_cons .= '</ul>';
                    $pros_cons .= '</div>';
                    $pros_cons .= '</div>';
                }
            }

            if ( ($the_cons != '') || ($the_cons != null) ) {
                if (count($the_cons) > 0) {
                    $pros_cons .= '<div class="col-xs-12 col-sm-6">';
                    $pros_cons .= '<div class="atbs-keylin-review__cons">';
                    $pros_cons .= '<h5 class="atbs-keylin-review__list-title">'.$consTitle.'</h5>';
                    $pros_cons .= '<ul>';
                    foreach($the_cons as $val) :
                        $pros_cons .= '<li><i class="mdicon mdicon-remove_circle"></i><span>'.$val.'</span></li>';
                    endforeach;
                    $pros_cons .= '</ul>';
                    $pros_cons .= '</div>';
                    $pros_cons .= '</div>';
                }
            }

            $pros_cons .= '</div>';
            $pros_cons .= '</div><!--atbs-keylin-review__pros-and-cons-->';

            return $pros_cons;
        }
    } // Close ATBS_Single

}
