<?php
if (!class_exists('ATBS_Get_Cfg')) {
    class ATBS_Get_Cfg {
        static function configs($atts, $page_info) {
            $bk_configs = array();
            $atts = shortcode_atts(
                    array(
                        'category_id'   => true,
                        'limit'         => false,
                        'feature'       => false,
                        'bg_color'      => false,
                        'offset'        => false,
                        'order'         => false,
                    ),$atts);

            $bk_configs['category_id'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_category', true );

            $bk_configs['limit'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_limit', true );


            $bk_configs['feature'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_feature', true );


            $bk_configs['bg_color'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_bg_color', true );


            $bk_configs['offset'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_offset', true );


            $bk_configs['order'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_order', true );

            return $bk_configs;
        }
    }
}