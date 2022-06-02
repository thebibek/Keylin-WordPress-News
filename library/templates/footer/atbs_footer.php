<?php
if (!class_exists('ATBS_Footer')) {
    class ATBS_Footer {
        static function bk_footer_mailchimp(){
            $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
            $htmlOutput = '';

            if(isset($atbs_option['footer-mailchimp--shortcode']) && ($atbs_option['footer-mailchimp--shortcode'] != '')) :
    			$htmlOutput .= do_shortcode($atbs_option['footer-mailchimp--shortcode']);
            endif;

            return $htmlOutput;
        }

    } // Close ATBS_Footer

}