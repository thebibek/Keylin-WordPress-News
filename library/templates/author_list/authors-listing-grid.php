<?php
/*
Template Name: Authors Listing Grid
*/
 ?>
<?php
    get_header();

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts('post_type=post&post_status=publish&paged=' . $paged);

    $sticky = get_option('sticky_posts') ;
    rsort( $sticky );

    $pageID         = get_the_ID();
    $headerStyle     = ATBS_Core::bk_get_theme_option('bk_authors_list_page_header_style');
    $sidebar        = ATBS_Core::bk_get_theme_option('bk_authors_list_page_sidebar_select');
    $sidebarPos     = ATBS_Core::bk_get_theme_option('bk_authors_list_page_sidebar_position');
    $sidebarSticky  = ATBS_Core::bk_get_theme_option('bk_authors_list_page_sidebar_sticky');

    $user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );
    $users_found = $user_query->get_results();
?>
<div class="site-content">
    <div class="atbs-keylin-block atbs-keylin-block--fullwidth">
        <?php echo ATBS_Archive::render_page_heading($pageID, $headerStyle);?>
        <div class="container">
            <div class="row">
                <div class="atbs-keylin-main-col <?php if($sidebarPos == 'left') echo('has-left-sidebar');?>" role="main">
                    <div class="atbs-keylin-block author-listing-grid--layout">
                        <ul class="list-unstyled list-space-lg">
                        <?php
                            foreach($users_found as $user) :
                                $authorID = $user->data->ID;
                                echo '<li class="col-md-6">'.ATBS_Archive::author_box($authorID).'</li>';
                            endforeach;
                        ?>
                        </ul>
                    </div><!-- .atbs-keylin-block -->
                </div><!-- .atbs-keylin-main-col -->

                <div class="atbs-keylin-sub-col sidebar <?php if($sidebarSticky != 0) echo 'js-sticky-sidebar';?>" role="complementary">
    				<?php
                        dynamic_sidebar( $sidebar );
                    ?>
    			</div><!-- .atbs-keylin-sub-col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .atbs-keylin-block -->
</div>
<?php get_footer(); ?>