<?php
if (!class_exists('ATBS_Shortcode')) {
    class ATBS_Shortcode {

        public function render( $page_info ) {
            $block_str = '';
            $moduleID = uniqid('atbs_custom_html-');
            $i=0;

            $moduleConfigs['title']             = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_title', true );
            $moduleConfigs['shortcode']         = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_shortcode', true );
            $shortcodes = explode("[shortcode_separator]",$moduleConfigs['shortcode']);
            $blockOpen = '';
            if (substr( $page_info['block_prefix'], 0, 10 ) == 'bk_has_rsb') {
                $blockOpen  = '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-shortcode-module">';
                $blockClose = '</div><!-- .atbs-keylin-block -->';
            }else {
                $blockOpen  = '<div id="'.$moduleID.'" class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-shortcode-module"><div class="container">';
                $blockClose = '</div><!-- .container --></div><!-- .atbs-keylin-block -->';
            }

            $block_str .= $blockOpen;
            if (substr( $page_info['block_prefix'], 0, 10 ) == 'bk_has_rsb') {
                $block_str .= ATBS_Core::bk_render_block_heading($page_info,'sidebar');
            }
            else{
                $block_str .= ATBS_Core::bk_render_block_heading($page_info);
            }
            for ($i=0; $i< count($shortcodes); $i++) {
                $block_str .= do_shortcode($shortcodes[$i]);
            }
            $block_str .= $blockClose;

            return $block_str;
    	}

    }
}