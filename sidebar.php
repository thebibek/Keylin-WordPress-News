<?php $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');?>
    <?php
        if (is_front_page()) {
            dynamic_sidebar('home_sidebar');
        }else if (is_single()){
            if (strlen($sidebar)) {
                dynamic_sidebar($sidebar);
            }else {
                dynamic_sidebar('home_sidebar');
            }
        }else if (is_category()) {
            if (isset($atbs_option['category-page-sidebar'])) {
                $sidebar = $atbs_option['category-page-sidebar'];
            }else {
                $sidebar = '';
            }
            if (strlen($sidebar)) {
                dynamic_sidebar($sidebar);
            }else {
                dynamic_sidebar('home_sidebar');
            }
        }else if (is_author()){
            if (isset($atbs_option['author-page-sidebar'])) {
                $sidebar = $atbs_option['author-page-sidebar'];
            }else {
                $sidebar = '';
            }
            if (strlen($sidebar)) {
                dynamic_sidebar($sidebar);
            }else {
                dynamic_sidebar('home_sidebar');
            }
        }else if (is_archive()) {
            if (isset($atbs_option['archive-page-sidebar'])) {
                $sidebar = $atbs_option['archive-page-sidebar'];
            }else {
                $sidebar = '';
            }
            if (strlen($sidebar)) {
                dynamic_sidebar($sidebar);
            }else {
                dynamic_sidebar('home_sidebar');
            }
        }else if (is_search()) {
            if (isset($atbs_option['search-page-sidebar'])) {
                $sidebar = $atbs_option['search-page-sidebar'];
            }else {
                $sidebar = '';
            }
            if (strlen($sidebar)) {
                dynamic_sidebar($sidebar);
            }else {
                dynamic_sidebar('home_sidebar');
            }
        }else {
            wp_reset_postdata();
            if (is_page_template('blog.php')) {
                if (isset($atbs_option['blog-page-sidebar'])) {
                    $sidebar = $atbs_option['blog-page-sidebar'];
                }else {
                    $sidebar = '';
                }
                if (strlen($sidebar)) {
                    dynamic_sidebar($sidebar);
                }else {
                    dynamic_sidebar('home_sidebar');
                }
            }else {
                dynamic_sidebar('home_sidebar');
            }
        }
    ?>
<!--</home sidebar widget>-->