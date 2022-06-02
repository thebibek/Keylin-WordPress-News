<?php
if (!class_exists('ATBS_Ajax_Function')) {
    class ATBS_Ajax_Function {
        static function ajax_pagination($max_num_pages){
            $ajax_button = '';
            $i = 0;
            $ajax_button .= '<nav class="atbs-keylin-pagination atbs-keylin-module-pagination">';
            $ajax_button .= '<h4 class="atbs-keylin-pagination__title sr-only">Posts navigation</h4>';
            $ajax_button .= '<div class="atbs-keylin-pagination__links text-center">';
            $ajax_button .= '<a class="atbs-keylin-pagination__item atbs-keylin-pagination__item-prev disable-click" href="#"><i class="mdicon mdicon-arrow_back"></i></a>';
            for ($i = 1; $i<=$max_num_pages; $i++) {
                if($i == 1) :
                    $ajax_button .= '<a class="atbs-keylin-pagination__item atbs-keylin-pagination__item-current" href="#">'.$i.'</a>';
                elseif($i == $max_num_pages) :
                    $ajax_button .= '<a class="atbs-keylin-pagination__item" href="#">'.$i.'</a>';
                elseif($i == 5) :
                    $ajax_button .= '<span class="atbs-keylin-pagination__item atbs-keylin-pagination__dots atbs-keylin-pagination__dots-next">&hellip;</span>';
                elseif($i < 5) :
                    $ajax_button .= '<a class="atbs-keylin-pagination__item" href="#">'.$i.'</a>';
                endif;
            }
            $ajax_button .= '<a class="atbs-keylin-pagination__item atbs-keylin-pagination__item-next" href="#"><i class="mdicon mdicon-arrow_forward"></i></a>';
            $ajax_button .= '</div>';
            $ajax_button .= '</nav>';

            return $ajax_button;
        }
        static function ajax_load_more(){
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            if(isset($atbs_option['bk-load-more-text'])) {
                $load_more_text = esc_attr($atbs_option['bk-load-more-text']);
            }else {
                $load_more_text = esc_html__('Load more news', 'keylin');
            }
            if(isset($atbs_option['bk-no-more-text'])) {
                $no_more_text = esc_attr($atbs_option['bk-no-more-text']);
            }else {
                $no_more_text = esc_html__('No more news', 'keylin');
            }

            $ajax_button = '';
            $ajax_button .= '<nav class="atbs-keylin-pagination text-center">';
            $ajax_button .= '<button class="btn btn-default js-ajax-load-post-trigger">'.$load_more_text.'<i class="mdicon mdicon--last mdicon-spinner2"></i></button>';
            $ajax_button .= '<button class="btn btn-default atbs-no-more-button hidden">'.$no_more_text.'</button>';
			$ajax_button .= '</nav>';

            return $ajax_button;
        }
        static function view_all_button($viewallArray){
            $viewAll = '';
            $viewAll .= '<nav class="atbs-keylin-pagination text-center">';
			$viewAll .= '<a href="'.esc_url($viewallArray['link']).'" target="'.esc_attr($viewallArray['target']).'" class="btn btn-default btn-sm">'.$viewallArray['text'].'<i class="mdicon mdicon-arrow_forward mdicon--last"></i></a>';
			$viewAll .= '</nav>';

            return $viewAll;
        }
        static function get_viewmore_button($vmArray) {
            $viewMore = '';
            if($vmArray != '') {
                $viewMore .= '<div class="'.$vmArray['class'].'">';
                    if(isset($vmArray['text']) && ($vmArray['text'] != '')) {
                        $vmText = $vmArray['text'];
                    }else {
                        $vmText = esc_html__('View more','keylin');
                    }
                    if(isset($vmArray['link']) && ($vmArray['link'] != '')) {
                        $vmLink = $vmArray['link'];
                    }else {
                        $vmLink = '#';
                    }
                    if(isset($vmArray['target']) && ($vmArray['target'] != '')) {
                        $vmTarget = $vmArray['target'];
                    }else {
                        $vmTarget = '_blank';
                    }

                    $viewMore .= '<a href="'.esc_url($vmLink).'" target="'.esc_attr($vmTarget).'" class="'.$vmArray['button_class'].'">';
                    $viewMore .= $vmText;
                    $viewMore .= '<i class="mdicon mdicon-arrow_forward mdicon--last"></i>';
                    $viewMore .= '</a>';

                $viewMore .= '</div>';
            }

            return $viewMore;
        }
        static function get_viewmore_link($vmArray) {
            $viewMore = '';
            if($vmArray != '') {
                $viewMore .= '<div class="'.$vmArray['class'].'">';
                    if(isset($vmArray['text']) && ($vmArray['text'] != '')) {
                        $vmText = $vmArray['text'];
                    }else {
                        $vmText = esc_html__('View more','keylin');
                    }
                    if(isset($vmArray['link']) && ($vmArray['link'] != '')) {
                        $vmLink = $vmArray['link'];
                    }else {
                        $vmLink = '#';
                    }
                    if(isset($vmArray['target']) && ($vmArray['target'] != '')) {
                        $vmTarget = $vmArray['target'];
                    }else {
                        $vmTarget = '_blank';
                    }

                    $viewMore .= '<a href="'.esc_url($vmLink).'" target="'.esc_attr($vmTarget).'" class="link meta-font has-mdicon">';
                    $viewMore .= '<span class="text-underline">'.$vmText.'</span>';
                    $viewMore .= '<i class="mdicon mdicon-arrow_forward mdicon--last"></i>';
                    $viewMore .= '</a>';

                $viewMore .= '</div>';
            }

            return $viewMore;
        }
        static function max_num_pages_cal($the_query, $postOffset, $postEntries) {
            $queryMaxPages = $the_query->max_num_pages;
            $posts_in_lastPage = $the_query->found_posts - (($queryMaxPages - 1) * $postEntries);
            if($posts_in_lastPage > $postOffset) {
                $maxPagesCal = $queryMaxPages - intval($postOffset/$postEntries);
            }else {
                $maxPagesCal = $queryMaxPages - intval($postOffset/$postEntries) - 1;
            }

            if($maxPagesCal > 0) {
                return $maxPagesCal;
            }else {
                return $queryMaxPages;
            }
        }
        static function ajax_load_buttons($ajaxType, $max_num_pages, $viewallButton = ''){
            if($ajaxType == 'disable') :
                return '';
            elseif ($ajaxType == 'pagination') :
                if($max_num_pages > 1) {
                    return self::ajax_pagination($max_num_pages);
                }else {
                    return '';
                }
            elseif (($ajaxType == 'loadmore' ) || ($ajaxType == 'infinity')) :
                return self::ajax_load_more();
            elseif ($ajaxType == 'viewall') :
                if(isset($viewallButton['view_all_text']) && ($viewallButton['view_all_text'] != '')) {
                    $viewAllText = $viewallButton['view_all_text'];
                }else {
                    $viewAllText = esc_html__('View all','keylin');
                }
                if(isset($viewallButton['view_all_link']) && ($viewallButton['view_all_link'] != '')) {
                    $viewAllLink = $viewallButton['view_all_link'];
                }else {
                    $viewAllLink = '#';
                }
                if(isset($viewallButton['view_all_target']) && ($viewallButton['view_all_target'] != '')) {
                    $viewAllTarget = $viewallButton['view_all_target'];
                }else {
                    $viewAllTarget = '_blank';
                }
                $viewallArray = array(
                    'class'  => 'text-center',
                    'link'   => $viewAllLink,
                    'text'   => $viewAllText,
                    'target' => $viewAllTarget,
                );
                return self::view_all_button($viewallArray);
            endif;
        }
    }
}