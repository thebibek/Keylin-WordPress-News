<?php
if (!class_exists('ATBS_Get_Query')) {
    class ATBS_Get_Query {
        static function atbs_query($atts, $moduleID = '') {
            $the_query = '';

            if(isset($atts['post_source']) && ($atts['post_source'] != '')) :

                if($atts['post_source'] == 'all') :
                    $the_query = self::query($atts, $moduleID);
                elseif($atts['post_source'] == 'video'):
                    $the_query = self::query_video_posts($atts, $moduleID);
                elseif($atts['post_source'] == 'gallery'):
                    $the_query = self::query_gallery_posts($atts, $moduleID);
                elseif($atts['post_source'] == 'review'):
                    $the_query = self::query_review_posts($atts, $moduleID);
                else:
                    $the_query = self::query($atts, $moduleID);
                endif;

            else :
                $the_query = self::query($atts, $moduleID);
            endif;

            return $the_query;
        }
        static function query($atts, $moduleID = '') {
            $args = array();
            $atts = shortcode_atts(
                array(
                    'orderby'       => 'date',
                    'tags'          => '',
                    'category_id'   => '',
                    'limit'         => '',
                    'feature'       => '',
                    'offset'        => 0,
                    'editor_pick'   => '',
                    'editor_exclude' => '',
                ),$atts);

            if(isset($atts['editor_pick']) && ($atts['editor_pick'] != null)) {
                $editorPickPosts = array_map('intval', explode(',',$atts['editor_pick']));
                $args = array(
        			'post_type'         => 'post',
                    'ignore_sticky_posts' => 1,
        			'posts_per_page'    => $atts['limit'],
                    'post__in'          =>  $editorPickPosts,
                    'orderby'           => 'post__in'
        		);
            }else {
                if ($atts['feature'] == 'yes') {
                    $args = array(
        				'post__in'  => get_option( 'sticky_posts' ),
        				'post_status' => 'publish',
        				'ignore_sticky_posts' => 1,
        				'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
                        'post_type' => 'post',
                    );
                }else {
            		$args = array(
            			'post_type' => 'post',
            			'ignore_sticky_posts' => 1,
                        'post_status' => 'publish',
            			'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
            			// 'meta_key' => '_thumbnail_id', //Only posts that have featured image
            		);
                }
                if ( $atts['category_id'] >= 1 ) {
                    if (strpos($atts['category_id'], ",") > 0) {
                        $bkcategories = explode(',',$atts['category_id'],1000);
                    }else {
                        $bkcategories = $atts['category_id'];
                    }
                    $args[ 'category__in' ] = $bkcategories;
        		}

                if(isset($atts['editor_exclude']) && ($atts['editor_exclude'] != null)) {
                    $editorExcludePosts = array_map('intval', explode(',',$atts['editor_exclude']));
                    $args[ 'post__not_in' ] = $editorExcludePosts;
                }
                //tag in query
                if(isset($atts['tags']) && ($atts['tags'] != null)) {
    				$args['tag__in'] = array_map('intval', explode(',',$atts['tags']));
    			}
                switch ( $atts['orderby'] ) {

    				//Date post
    				case 'date' :
    					$args['orderby'] = 'date';
    					break;

    				//Popular comment
    				case 'comment_count' :
    					$args['orderby'] = 'comment_count';
    					break;

                    //Popular Views
    				case 'view_count' :
                        $args['meta_key'] = 'post_views_count';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
    					break;

    				//Modified
    				case 'modified' :
    					$args['orderby'] = 'modified';
    					break;

                    // Review
    				case 'top_review' :
    					$args['meta_key'] = 'bk_review_score';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
    					break;
                    //Speed Reads
                    case 'speed_reads' :
                        $args['meta_key'] = 'atbs_post_content__word_count';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
                        break;
    				//Random
    				case 'rand':
    					$args['orderby'] = 'rand';
    					break;

    				//Alphabet decs
    				case 'alphabetical_decs':
    					$args['orderby'] = 'title';
    					$args['order']   = 'DECS';
    					break;

    				//Alphabet asc
    				case 'alphabetical_asc':
    					$args['orderby'] = 'title';
    					$args['order']   = 'ASC';
    					break;

                    // Default
                    default:
                        $args['orderby'] = 'date';
    					break;
    			}
            }
            $the_query = new WP_Query( $args );
            if($moduleID != null) {
                ATBS_Core::bk_add_buff('query', $moduleID, 'args', $args);
            }
            unset($args);

            wp_reset_postdata();

            return $the_query;
        }
        static function query_video_posts($atts, $moduleID = '') {
            $args = array();
            $atts = shortcode_atts(
                array(
                    'orderby'       => 'date',
                    'category_id'   => '',
                    'limit'         => '',
                    'feature'       => '',
                    'offset'        => 0,
                    'editor_pick'   => '',
                    'editor_exclude' => '',
                ),$atts);
            if(isset($atts['editor_pick']) && ($atts['editor_pick'] != null)) {
                $editorPickPosts = array_map('intval', explode(',',$atts['editor_pick']));
                $args = array(
        			'post_type'         => 'post',
        			'posts_per_page'    => $atts['limit'],
                    'post__in'          =>  $editorPickPosts,
                    'orderby'           => 'post__in'
        		);
            }else {
                if ($atts['feature'] == 'yes') {
                    $args = array(
        				'post__in'  => get_option( 'sticky_posts' ),
        				'post_status' => 'publish',
        				'ignore_sticky_posts' => 1,
        				'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
                        'post_type' => 'post',
                    );
                }else {
            		$args = array(
            			'post_type' => 'post',
            			'ignore_sticky_posts' => 1,
                        'post_status' => 'publish',
            			'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
            			// 'meta_key' => '_thumbnail_id', //Only posts that have featured image
            		);
                }
                if ( $atts['category_id'] >= 1 ) {
                    if (strpos($atts['category_id'], ",") > 0) {
                        $bkcategories = explode(',',$atts['category_id'],1000);
                    }else {
                        $bkcategories = $atts['category_id'];
                    }
                    $args[ 'category__in' ] = $bkcategories;
        		}
                if(isset($atts['editor_exclude']) && ($atts['editor_exclude'] != null)) {
                    $editorExcludePosts = array_map('intval', explode(',',$atts['editor_exclude']));
                    $args[ 'post__not_in' ] = $editorExcludePosts;
                }
                //tag in query
                if(isset($atts['tags']) && ($atts['tags'] != null)) {
    				$args['tag__in'] = array_map('intval', explode(',',$atts['tags']));
    			}
                switch ( $atts['orderby'] ) {

    				//Date post
    				case 'date' :
    					$args['orderby'] = 'date';
    					break;

    				//Popular comment
    				case 'comment_count' :
    					$args['orderby'] = 'comment_count';
    					break;

    				//Modified
    				case 'modified' :
    					$args['orderby'] = 'modified';
    					break;

                    // Review
    				case 'top_review' :
    					$args['meta_key'] = 'bk_review_score';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
    					break;
                    //Speed Reads
                    case 'speed_reads' :
                        $args['meta_key'] = 'atbs_post_content__word_count';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
                        break;
    				//Random
    				case 'rand':
    					$args['orderby'] = 'rand';
    					break;

    				//Alphabet decs
    				case 'alphabetical_decs':
    					$args['orderby'] = 'title';
    					$args['order']   = 'DECS';
    					break;

    				//Alphabet asc
    				case 'alphabetical_asc':
    					$args['orderby'] = 'title';
    					$args['order']   = 'ASC';
    					break;

                    // Default
                    default:
                        $args['orderby'] = 'date';
    					break;
    			}
            }
            $args['tax_query'] = array(
        		array(
        			'taxonomy' => 'post_format',
        			'field'    => 'slug',
        			'terms' => array('post-format-video' ),
        		),
        	);

            $the_query = new WP_Query( $args );
            if($moduleID != null) {
                ATBS_Core::bk_add_buff('query', $moduleID, 'args', $args);
            }
            unset($args);

            wp_reset_postdata();

            return $the_query;
        }
        static function query_gallery_posts($atts, $moduleID = '') {
            $args = array();
            $atts = shortcode_atts(
                array(
                    'orderby'       => 'date',
                    'category_id'   => '',
                    'limit'         => '',
                    'feature'       => '',
                    'offset'        => 0,
                    'order'         => 'date',
                    'editor_pick'   => '',
                    'editor_exclude' => '',
                ),$atts);
            if(isset($atts['editor_pick']) && ($atts['editor_pick'] != null)) {
                $editorPickPosts = array_map('intval', explode(',',$atts['editor_pick']));
                $args = array(
        			'post_type'         => 'post',
        			'posts_per_page'    => $atts['limit'],
                    'post__in'          =>  $editorPickPosts,
                    'orderby'           => 'post__in'
        		);
            }else {
                if ($atts['feature'] == 'yes') {
                    $args = array(
        				'post__in'  => get_option( 'sticky_posts' ),
        				'post_status' => 'publish',
        				'ignore_sticky_posts' => 1,
        				'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
                        'post_type' => 'post',
                    );
                }else {
            		$args = array(
            			'post_type' => 'post',
            			'ignore_sticky_posts' => 1,
                        'post_status' => 'publish',
            			'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
            			// 'meta_key' => '_thumbnail_id', //Only posts that have featured image
            		);
                }
                if ( $atts['category_id'] >= 1 ) {
                    if (strpos($atts['category_id'], ",") > 0) {
                        $bkcategories = explode(',',$atts['category_id'],1000);
                    }else {
                        $bkcategories = $atts['category_id'];
                    }
                    $args[ 'category__in' ] = $bkcategories;
        		}
                if(isset($atts['editor_exclude']) && ($atts['editor_exclude'] != null)) {
                    $editorExcludePosts = array_map('intval', explode(',',$atts['editor_exclude']));
                    $args[ 'post__not_in' ] = $editorExcludePosts;
                }
                //tag in query
                if(isset($atts['tags']) && ($atts['tags'] != null)) {
    				$args['tag__in'] = array_map('intval', explode(',',$atts['tags']));
    			}
                switch ( $atts['orderby'] ) {

    				//Date post
    				case 'date' :
    					$args['orderby'] = 'date';
    					break;

    				//Popular comment
    				case 'comment_count' :
    					$args['orderby'] = 'comment_count';
    					break;

    				//Modified
    				case 'modified' :
    					$args['orderby'] = 'modified';
    					break;

                    // Review
    				case 'top_review' :
    					$args['meta_key'] = 'bk_review_score';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
    					break;
                    //Speed Reads
                    case 'speed_reads' :
                        $args['meta_key'] = 'atbs_post_content__word_count';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
                        break;
    				//Random
    				case 'rand':
    					$args['orderby'] = 'rand';
    					break;

    				//Alphabet decs
    				case 'alphabetical_decs':
    					$args['orderby'] = 'title';
    					$args['order']   = 'DECS';
    					break;

    				//Alphabet asc
    				case 'alphabetical_asc':
    					$args['orderby'] = 'title';
    					$args['order']   = 'ASC';
    					break;

                    // Default
                    default:
                        $args['orderby'] = 'date';
    					break;
    			}
            }
            $args['tax_query'] = array(
        		array(
        			'taxonomy' => 'post_format',
        			'field'    => 'slug',
        			'terms' => array('post-format-gallery' ),
        		),
        	);

            $the_query = new WP_Query( $args );
            if($moduleID != null) {
                ATBS_Core::bk_add_buff('query', $moduleID, 'args', $args);
            }
            unset($args);

            wp_reset_postdata();

            return $the_query;
        }
        static function query_review_posts($atts, $moduleID = '') {
            $args = array();
            $atts = shortcode_atts(
                array(
                    'orderby'       => 'date',
                    'category_id'   => '',
                    'limit'         => '',
                    'feature'       => '',
                    'offset'        => 0,
                    'order'         => 'date',
                    'editor_pick'   => '',
                    'editor_exclude' => '',
                ),$atts);
            if(isset($atts['editor_pick']) && ($atts['editor_pick'] != null)) {
                $editorPickPosts = array_map('intval', explode(',',$atts['editor_pick']));
                $args = array(
        			'post_type'         => 'post',
        			'posts_per_page'    => $atts['limit'],
                    'post__in'          =>  $editorPickPosts,
                    'orderby'           => 'post__in'
        		);
            }else {
                if ($atts['feature'] == 'yes') {
                    $args = array(
        				'post__in'  => get_option( 'sticky_posts' ),
        				'post_status' => 'publish',
        				'ignore_sticky_posts' => 1,
        				'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
                        'post_type' => 'post',
                    );
                }else {
            		$args = array(
            			'post_type' => 'post',
            			'ignore_sticky_posts' => 1,
                        'post_status' => 'publish',
            			'posts_per_page' => $atts['limit'],
                        'offset' => $atts['offset'],
            			// 'meta_key' => '_thumbnail_id', //Only posts that have featured image
            		);
                }
                if ( $atts['category_id'] >= 1 ) {
                    if (strpos($atts['category_id'], ",") > 0) {
                        $bkcategories = explode(',',$atts['category_id'],1000);
                    }else {
                        $bkcategories = $atts['category_id'];
                    }
                    $args[ 'category__in' ] = $bkcategories;
        		}
                if(isset($atts['editor_exclude']) && ($atts['editor_exclude'] != null)) {
                    $editorExcludePosts = array_map('intval', explode(',',$atts['editor_exclude']));
                    $args[ 'post__not_in' ] = $editorExcludePosts;
                }
                //tag in query
                if(isset($atts['tags']) && ($atts['tags'] != null)) {
    				$args['tag__in'] = array_map('intval', explode(',',$atts['tags']));
    			}
                switch ( $atts['orderby'] ) {

    				//Date post
    				case 'date' :
    					$args['orderby'] = 'date';
    					break;

    				//Popular comment
    				case 'comment_count' :
    					$args['orderby'] = 'comment_count';
    					break;

    				//Modified
    				case 'modified' :
    					$args['orderby'] = 'modified';
    					break;

                    // Review
    				case 'top_review' :
    					$args['meta_key'] = 'bk_review_score';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
    					break;
                    //Speed Reads
                    case 'speed_reads' :
                        $args['meta_key'] = 'atbs_post_content__word_count';
    					$args['orderby']  = 'meta_value_num';
    					$args['order']    = 'DESC';
                        break;
    				//Random
    				case 'rand':
    					$args['orderby'] = 'rand';
    					break;

    				//Alphabet decs
    				case 'alphabetical_decs':
    					$args['orderby'] = 'title';
    					$args['order']   = 'DECS';
    					break;

    				//Alphabet asc
    				case 'alphabetical_asc':
    					$args['orderby'] = 'title';
    					$args['order']   = 'ASC';
    					break;

                    // Default
                    default:
                        $args['orderby'] = 'date';
    					break;
    			}
            }
            $args['meta_query'] = array(
        		array(
        			'key' => 'bk_review_checkbox',
            		'value' => '1',
        		),
        	);

            $the_query = new WP_Query( $args );
            if($moduleID != null) {
                ATBS_Core::bk_add_buff('query', $moduleID, 'args', $args);
            }
            unset($args);

            wp_reset_postdata();

            return $the_query;
        }
    }
}