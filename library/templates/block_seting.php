<?php
// Style Heading
            echo 'aaaaaaaaaa';

            $moduleConfigs['color_heading_title'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_color_heading_title', true );
            $moduleConfigs['sub_color_heading_title'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_sub_color_heading_title', true );
            $moduleConfigs['heading_size'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_heading_size', true );
            $moduleConfigs['sub_heading_size'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_sub_heading_size', true );
            $subTitle = '';
            $moduleConfigs['sub_title'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_sub_title', true );
            $subTitle = $moduleConfigs['sub_title'];
            $moduleConfigs['atbs_style_heading'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_atbs_style_heading', true );

            $classCustomHeading = $moduleConfigs['atbs_style_heading'];
            if($classCustomHeading == 'style-1'){
                $classCustomHeading = ' heading-style-1';
            }
            elseif($classCustomHeading == 'style-2-center'){
                $classCustomHeading = ' heading-style-2 text-center';
            }
            elseif($classCustomHeading == 'style-2'){
                $classCustomHeading = ' heading-style-2';
            }
            elseif($classCustomHeading == 'style-3'){
                $classCustomHeading = ' heading-style-3';
            }
            else{
                $classCustomHeading = ' heading-style-3 text-center';
            }
            // end Style Heading

            //Check Margin
            $moduleConfigs['module_custom_spacing_option'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_module_custom_spacing_option', true );
            if($moduleConfigs['module_custom_spacing_option'] == 'disable'){
                $blockMarginTopClass = '';
                $headingClass .= $classCustomHeading;
            }else{
                //Spacing Between Elements
                $moduleConfigs['module_margin_top'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_module_margin_top', true );
                $moduleConfigs['heading_margin_bottom'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_heading_margin_bottom', true );

                if($moduleConfigs['module_margin_top'] < 0) :
                    $blockMarginTopClass = 'atbs-custom-margin-top-minus-'.abs($moduleConfigs['module_margin_top']);
                elseif(($moduleConfigs['module_margin_top'] > 0)) :
                    $blockMarginTopClass = 'atbs-custom-margin-top-'.abs($moduleConfigs['module_margin_top']);
                else:
                    $blockMarginTopClass = '';
                endif;

                if($moduleConfigs['heading_margin_bottom'] != '') {
                    $headingClass .= $classCustomHeading.' atbs-custom-margin-bottom-'.abs($moduleConfigs['heading_margin_bottom']);
                }
            }
            $colorTitle = '';
            $colorTitle = $moduleConfigs['color_heading_title'];
            if($colorTitle != ''){
                $colorTitle = $colorTitle;
            }
            $colorSubTitle = '';
            $colorSubTitle = $moduleConfigs['sub_color_heading_title'];
            if($colorSubTitle != ''){
                $colorSubTitle = $colorSubTitle;
            }

            // headding Size
            $headingSize = $moduleConfigs['heading_size'];
            if($headingSize == ''){
                $headingSizeMobile = '';
            }
            elseif($headingSize > 24){
                $headingSizeMobile = ' atbs-heading__title-md';
            }else{
                $headingSizeMobile = ' atbs-heading__title-sm';
            }

            $subHeadingSize = $moduleConfigs['sub_heading_size'];
            if($subHeadingSize == ''){
                $subHeadingSizeMobile = '';
            }
            elseif($subHeadingSize > 16){
                $subHeadingSizeMobile = ' atbs-sub-heading__title-md';
            }else{
                $subHeadingSizeMobile = ' atbs-sub-heading__title-sm';
            }
            // end headding Size

?>