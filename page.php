<?php
/**
 * The Default Page Template
 *
 */
 ?>
<?php
    get_header();
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    $pageID  = get_the_ID();
    $pageLayout     = ATBS_Single::bk_get_post_option($pageID, 'bk_page_layout');
    $pageSidebar    = ATBS_Single::bk_get_post_option($pageID, 'bk_page_sidebar_select');
    
    $sidebar_option = '';
    if(!is_active_sidebar($pageSidebar)) {
        $sidebar_option = 'disable';
    }
?>
<div class="site-content">
    <?php
        if ( is_page() ) :
            if ($pageLayout == 'has_sidebar') {
                if($sidebar_option == 'disable') :
                    get_template_part( '/library/templates/page/page_fw' ); //full-width
                else:
                    get_template_part( '/library/templates/page/page_with__sidebar'); //with-sidebar
                endif;
            }else if ($pageLayout == 'no_sidebar') {
                get_template_part( '/library/templates/page/page_fw' ); //full-width
            }
        endif;
    ?>
</div>

<?php endwhile; endif;?>
 <?php get_footer(); ?>