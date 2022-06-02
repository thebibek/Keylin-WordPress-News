<?php
define('MAX_COUNT', 100);
/* -----------------------------------------------------------------------------
 * Render Sections
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'atbs_page_builder' ) ) {
	function atbs_page_builder( $args=array() ) {
		$page_info['page_id'] = get_queried_object_id();
        global $atbs_option;

        $sidebarSticky  = ATBS_Single::bk_get_post_option($page_info['page_id'], 'bk_pagebuilder_sidebar_sticky');

		for ( $counter=1; $counter < MAX_COUNT; $counter++ ) {
			$field_key = 'bk_section_'.$counter;
			$section_type = get_post_meta( $page_info['page_id'], $field_key, true );
			if ( ! $section_type ) continue;

            if ($section_type == 'fullwidth'){?>
                <?php
                for ($mcount=1; $mcount <MAX_COUNT; $mcount ++) {
                    $page_info['block_prefix'] = 'bk_fullwidth_module_'.$counter.'_'.$mcount;
                    $block_type = get_post_meta( $page_info['page_id'], $page_info['block_prefix'], true );
                    if ( ! $block_type ) continue;
                    $class = 'atbs_'.$block_type;
                    $section_render = new $class();
                    echo ATBS_Core::atbs_html_render($section_render->render($page_info));
                }?>
            <?php
            }else if($section_type == 'has-rsb') {
                $sidebar_key = 'bk_sidebar_'.$counter;
                $sidebar = get_post_meta( $page_info['page_id'], $sidebar_key, true );
                $sidebarPos_key = 'bk_sidebarpos_'.$counter;
                $sidebarPos = get_post_meta( $page_info['page_id'], $sidebarPos_key, true );
                ?>

                <div class="atbs-keylin-layout-split atbs-keylin-block atbs-keylin-block--fullwidth">
                    <div class="container">
                        <div class="row">
                            <div class="atbs-keylin-main-col <?php if($sidebarPos == 'left') echo('has-left-sidebar');?>" role="main">
                            <?php
                                for ($mcount=1; $mcount <MAX_COUNT; $mcount ++) {
                                    $page_info['block_prefix'] = 'bk_has_rsb_module_'.$counter.'_'.$mcount;
                                    $block_type = get_post_meta( $page_info['page_id'], $page_info['block_prefix'], true );
                                    if ( ! $block_type ) continue;
                                    $class = "atbs_".$block_type;
                                    $section_render = new $class();
                                    echo ATBS_Core::atbs_html_render($section_render->render($page_info));
                                }?>
                            </div>

                            <div class="atbs-keylin-sub-col atbs-keylin-sub-col--right <?php if($sidebarSticky != 0) echo 'js-sticky-sidebar';?>" role="complementary">
                                <?php dynamic_sidebar( $sidebar );?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
		}
	}
}
