<?php
/**
 * The Default Page Template -- With Sidebar page template
 *
 */
 ?>
<?php
    $pageID  = get_the_ID();

    $headerStyle    = ATBS_Single::bk_get_post_option($pageID, 'bk_page_header_style');
    $sidebar        = ATBS_Single::bk_get_post_option($pageID, 'bk_page_sidebar_select');
    $sidebarPos     = ATBS_Single::bk_get_post_option($pageID, 'bk_page_sidebar_position');
    $sidebarSticky  = ATBS_Single::bk_get_post_option($pageID, 'bk_page_sidebar_sticky');
    $featuredImage  = ATBS_Single::bk_get_post_option($pageID, 'bk_page_feat_img');
?>
<?php echo ATBS_Archive::render_page_heading($pageID, $headerStyle);?>
<div class="atbs-keylin-block atbs-keylin-block--fullwidth">
	<div class="container">
		<div class="row">
			<div class="atbs-keylin-main-col <?php if ($sidebarPos == 'left') echo('has-left-sidebar');?>" role="main">
                <article <?php post_class('post--single');?>>
                    <div class="single-content">
                        <?php
                            if ( ($featuredImage != 0) && ATBS_Core::bk_check_has_post_thumbnail($pageID)) {
                                echo '<div class="entry-thumb single-entry-thumb">';
                                echo get_the_post_thumbnail($pageID, 'atbs-m-2_1');
                				echo '</div>';
                            }
                        ?>
						<div class="entry-content typography-copy single-body">
                            <?php the_content();?>
                        </div>
                        <?php echo ATBS_Single::bk_post_pagination();?>
                    </div>
                </article>
                <?php if (comments_open()) {?>
                    <div class="comments-section single-entry-section">
                        <?php comments_template(); ?>
                    </div> <!-- End Comment Box -->
                <?php }?>
            </div><!-- .atbs-keylin-main-col -->
            <div class="atbs-keylin-sub-col sidebar <?php if ($sidebarSticky != 0) echo 'js-sticky-sidebar';?>" role="complementary">
				<?php
                    dynamic_sidebar( $sidebar );
                ?>
			</div><!-- .atbs-keylin-sub-col -->
        </div>
    </div> <!-- .container -->
</div><!-- .atbs-keylin-block -->