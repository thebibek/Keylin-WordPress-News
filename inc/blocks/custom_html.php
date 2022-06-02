<?php
if (!class_exists('ATBS_Custom_Html')) {
    class ATBS_Custom_Html {

        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_custom_html-');
            $moduleConfigs['title']             = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_title', true );
            $moduleConfigs['customHTML']        = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_custom_html', true );
            $moduleConfigs['custom_class']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_custom_class', true );
            if($moduleConfigs['custom_class'] != '') {
                $moduleCustomClass = ' '.$moduleConfigs['custom_class'];
            }else {
                $moduleCustomClass = '';
            }
            if (substr( $page_info['block_prefix'], 0, 10 ) == 'bk_has_rsb') {
                $blockOpen  = '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-custom-html'.$moduleCustomClass.'">';
                $blockClose = '</div><!-- .atbs-keylin-block -->';
            }else {
                $blockOpen  = '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-custom-html"><div class="container">';
                $blockClose = '</div><!-- .container --></div><!-- .atbs-keylin-block -->';
            }
            $block_str .= $blockOpen;
            if (substr( $page_info['block_prefix'], 0, 10 ) == 'bk_has_rsb') {
                $block_str .= ATBS_Core::bk_render_block_heading($page_info,'sidebar');
            }
            else{
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);
            }
            $block_str .= $moduleConfigs['customHTML'];
            $block_str .= $blockClose;

            return $block_str;
    	}

    }
}