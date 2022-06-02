<?php
    require_once (ATBS_INC.'composer/bk_composer_options.php');
    require_once (ATBS_INC.'composer/bk_pd_cfg.php');
    require_once (ATBS_INC.'composer/render-sections.php');
// Section

// Include Post Modules
    require_once(ATBS_MODULES.'horizontal_1.php');
    require_once(ATBS_MODULES.'horizontal_2.php');
    require_once(ATBS_MODULES.'horizontal_feat_block_a.php');
    require_once(ATBS_MODULES.'vertical_1.php');
    require_once(ATBS_MODULES.'vertical_1_ratio_2by1.php');
    require_once(ATBS_MODULES.'vertical_icon_side_right_ratio_2by1.php');
    require_once(ATBS_MODULES.'overlay_1.php');
    require_once(ATBS_MODULES.'overlay_3.php');
    require_once(ATBS_MODULES.'overlay_icon_side_right.php');
    require_once(ATBS_MODULES.'overlay_icon_side_left.php');
    require_once(ATBS_MODULES.'card_1.php');
    require_once(ATBS_MODULES.'category_tile.php');

// Include Post Block ATBS //

    // Featured module
    require_once (ATBS_BLOCKS.'short_code.php');
    require_once (ATBS_BLOCKS.'custom_html.php');

    require_once (ATBS_BLOCKS.'atbs/featured_module_1.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_2.php');

    require_once (ATBS_BLOCKS.'atbs/featured_module_3.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_4.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_5.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_6.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_7.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_8.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_9.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_10.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_11.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_12.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_13.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_14.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_15.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_16.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_17.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_18.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_19.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_20.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_21.php');
    require_once (ATBS_BLOCKS.'atbs/featured_module_22.php');

    // Posts grid
    require_once (ATBS_BLOCKS.'atbs/posts_grid_1.php');
    require_once (ATBS_BLOCKS.'atbs/posts_grid_2.php');

    require_once (ATBS_BLOCKS.'atbs/posts_grid_3.php');
    require_once (ATBS_BLOCKS.'atbs/posts_grid_4.php');
    require_once (ATBS_BLOCKS.'atbs/posts_grid_6.php');

    // Featured slider
    require_once (ATBS_BLOCKS.'atbs/featured_slider_1.php');

    // Posts carousel
    require_once (ATBS_BLOCKS.'atbs/posts_carousel_1.php');
    require_once (ATBS_BLOCKS.'atbs/posts_carousel_2.php');
    require_once (ATBS_BLOCKS.'atbs/posts_carousel_3.php');
    require_once (ATBS_BLOCKS.'atbs/posts_carousel_4.php');

    // Listing
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_1.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_2.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_3.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_4.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_5.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_6.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_7.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_8.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_overlay_aside_1.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_overlay_aside_2.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_grid_overlay_aside_3.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_1.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_2.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_3.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_4.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_5.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_6.php');
    require_once (ATBS_BLOCKS.'atbs/listing/block_listing_list_7.php');

    // Listing has sidebar
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_1_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_2_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_3_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_4_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_1_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_2_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_3_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_4_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_5_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_6_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_list_7_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_alt_1_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_alt_2_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_alt_3_has_sidebar.php');
    require_once (ATBS_BLOCKS.'atbs/listing-has-sidebar/block_listing_grid_alt_4_has_sidebar.php');
    // block main col
    require_once (ATBS_BLOCKS.'atbs/block-main-col/block_main_col_1.php');
    require_once (ATBS_BLOCKS.'atbs/block-main-col/block_main_col_2.php');
    require_once (ATBS_BLOCKS.'atbs/block-main-col/block_main_col_3.php');
    require_once (ATBS_BLOCKS.'atbs/block-main-col/block_main_col_4.php');


// Include Post Block ATBS //

    //horizontal
    require_once (ATBS_MODULES.'atbs/atbs_module_vertical_1.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_vertical_2.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_vertical_3.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_horizontal_1.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_horizontal_2.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_no_thumb_1.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_overlay_1.php');
    require_once (ATBS_MODULES.'atbs/atbs_module_overlay_2.php');

//Libs
// Header Libs
    require_once(ATBS_HEADER_TEMPLATES.'atbs_header.php');
    require_once(ATBS_FOOTER_TEMPLATES.'atbs_footer.php');
    require_once(ATBS_SINGLE_TEMPLATES.'atbs_single.php');
    require_once(ATBS_INC_LIBS.'keylin_editor.php');

    require_once(ATBS_INC_LIBS.'atbs_get_configs.php');
    require_once(ATBS_INC_LIBS.'atbs_core.php');
    require_once(ATBS_INC_LIBS.'atbs_tgm_activation.php');
    require_once(ATBS_INC_LIBS.'atbs_query.php');
    require_once(ATBS_INC_LIBS.'atbs_cache.php');
    require_once(ATBS_INC_LIBS.'atbs_youtube.php');
    require_once(ATBS_LIBS.'meta_box_config.php');

// Include Ajax Files
    require_once(ATBS_AJAX.'ajax-function.php');
    require_once(ATBS_AJAX.'ajax-search.php');
    require_once(ATBS_AJAX.'ajax-megamenu.php');
    require_once(ATBS_AJAX.'ajax-post-list.php');
//Widgets
    require_once(ATBS_INC_LIBS.'atbs_widget.php');
// Archive
    require_once(ATBS_INC_LIBS.'atbs_archive.php');