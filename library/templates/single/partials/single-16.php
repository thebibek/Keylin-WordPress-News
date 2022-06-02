<?php
/*
Template Name: Single Template 5 -- No Sidebar
*/
?>
<?php
    global $post;
    $atbs_option        = ATBS_Core::bk_get_global_var('atbs_option');
    $currentPost        = $post;
    $postID             = get_the_ID();
    $catIDClass         = '';
    $bkEntryTeaser      = get_post_meta($postID,'bk_post_subtitle',true);

    $reviewBoxPosition  = get_post_meta($postID,'bk_review_box_position',true);

    //Switch
    $bkAuthorSW         = ATBS_Single::bk_get_post_option($postID, 'bk-authorbox-sw');
    $bkPostNavSW        = ATBS_Single::bk_get_post_option($postID, 'bk-postnav-sw');
    $bkRelatedSW        = ATBS_Single::bk_get_post_wide_option($postID, 'bk-related-sw');
    $bkSameCatSW        = ATBS_Single::bk_get_post_wide_option($postID, 'bk-same-cat-sw');

    if (defined('KEYLIN_FUNCTIONS_PLUGIN_DIR')) {
        $reactionSW         = isset($atbs_option['bk-reaction-sw']) ? $atbs_option['bk-reaction-sw'] : 0;
        if ($reactionSW == null) {
            $reactionSW = 0;
        }
    }else {
        $reactionSW = 0;
    }

    // Single Infinity Scrolling Options
    $infinityScrolling  = $atbs_option['single-sections-infinity-scrolling'] ? $atbs_option['single-sections-infinity-scrolling'] : 0;
    if ($infinityScrolling != 0) {
        $infinity_PrevPost = get_previous_post();
        if(($infinity_PrevPost != '') || (is_array($infinity_PrevPost)) && (sizeof($infinity_PrevPost) != 0)) {
            $infinity_postIDtoLoad = $infinity_PrevPost->ID;
            $infinity_PermalinkToLoad = get_permalink($infinity_postIDtoLoad);
            $infinity_wrapDivClass = 'single-infinity-scroll';
        } else {
            $infinity_PrevPost = '';
            $infinity_PermalinkToLoad = '';
            $infinity_wrapDivClass = '';
        }
    }
    else {
        $infinity_PrevPost = '';
        $infinity_PermalinkToLoad = '';
        $infinity_wrapDivClass = '';
    }

    $currentPostID = get_the_ID();
    $scrollSinglePercentageProgress = $atbs_option['bk-scroll-percentage-progress'];
    $scrollSinglePercentageProgressClass = '';
    if(!empty($scrollSinglePercentageProgress) && ($scrollSinglePercentageProgress == 'style_2') ):
        $scrollSinglePercentageProgressClass = ' post-content-100-percent';
    endif;
    $thumbAttrXXL = array (
        'postID'        => $postID,
        'thumbSize'     => 'atbs-xxl',
    );
    $thumbAttr = array (
        'postID'        => $postID,
        'thumbSize'     => 'atbs-l-4_3',
    );
    $theBGLinkXXL   = ATBS_Core::bk_get_post_thumbnail_bg_link($thumbAttrXXL);
    $theBGLink      = ATBS_Core::bk_get_post_thumbnail_bg_link($thumbAttr);
?>
<div class="site-content single-entry <?php echo esc_attr($infinity_wrapDivClass);?>">
    <div class="atbs-keylin-block atbs-keylin-block--fullwidth single-entry-container <?php if($infinityScrolling != 0): echo 'single-infinity-container'; endif;?>">
        <div class="atbs-keylin-block single-entry-section-wrap single-style-16 single-16 single-entry--no-sidebar single-entry--billboard-blur atbs-keylin-block-<?php echo esc_attr($currentPostID);?> element-scroll-percent<?php echo esc_attr($scrollSinglePercentageProgressClass);?> <?php if($infinityScrolling != 0): echo 'single-infinity-inner'; endif;?>" data-url-to-load="<?php echo esc_url($infinity_PermalinkToLoad);?>" data-postid="<?php echo esc_attr($currentPostID);?>">
            <div class="atbs-keylin-block atbs-keylin-block--fullwidth atbs-keylin-block--contiguous single-billboard js-overlay-bg">
                <div class="background-img hidden-xs hidden-sm" style="background-image: url('<?php echo esc_url($theBGLinkXXL);?>');"></div>
        		<div class="background-img background-img--darkened hidden-md hidden-lg" style="background-image: url('<?php echo esc_url($theBGLink);?>');"></div>
                <div class="single-billboard__inner">
                    <header class="single-header single-header--center">
                        <div class="container">
                            <div class="single-header__inner inverse-text js-overlay-bg-sub-area">
                                <div class="background-img background-img--dimmed blurred-more hidden-xs hidden-sm js-overlay-bg-sub" style="background-image: url('<?php echo esc_url($theBGLinkXXL);?>');"></div>
                                <div class="single-header__content">
                                   <?php
                                        echo '<div class="cat-time-group">';
                                        echo '<div class="cat-container cat-color-gray">';
                                        $catClass = 'entry-cat cat-theme';
                                        echo ATBS_Core::bk_get_post_cat_link($postID, $catClass, true);
                                        echo '</div></div>';

                                        echo '<h1 class="entry-title text-uppercase">';
                                        echo get_the_title($postID);
                                        echo '</h1>';

                                        if ($bkEntryTeaser) {
                                            echo '<div class="entry-teaser">';
                                            echo esc_html($bkEntryTeaser);
                                            echo '</div>';
                                        }

                                        echo '<div class="entry-meta entry-author-horizontal-has-avatar">';
                                        echo ATBS_Core::bk_meta_cases('author_has_time');
                                        echo '</div>';
                                    ?>
                                </div>
                            </div>
                        </div>
        			</header>
                </div>
        	</div>
            <div class="atbs-keylin-block atbs-keylin-block--fullwidth single-entry-wrap">

                <article <?php post_class('atbs-keylin-block post--single');?>>
                    <div class="container container--narrow">
                        <div class="single-content">
                            <?php
                                if (function_exists('has_post_format')){
                                    $postFormat = get_post_format($postID);
                                } else {
                                    $postFormat = 'standard';
                                }

                                if (($postFormat == 'video') || ($postFormat == 'gallery')) {
                                    echo '<div class="atbs-keylin-post-media-wide atbs-keylin-post-format-media">';
                                    echo ATBS_Single::bk_entry_media($postID);
                                    echo '</div>';
                                }
                            ?>
                            <div class="single-body single-body--wide entry-content typography-copy">
                                <?php
                                    if($reviewBoxPosition == 'top') {
                                        echo ATBS_Single::bk_post_review_box_default($postID, $reviewBoxPosition);
                                    }
                                ?>
                                <?php the_content();?>
            				</div>
                            <?php echo ATBS_Single::bk_post_pagination();?>
                            <?php
                                if ($reviewBoxPosition == 'default') {
                                    echo ATBS_Single::bk_post_review_box_default($postID);
                                }
                            ?>
                            <?php get_template_part( 'library/templates/single/single-footer');?>
                        </div><!-- .container -->
                    </div><!-- .single-content -->
                </article><!-- .post-single -->
                <div class="container container--narrow single-entry-section">
                    <?php
                        if (($reactionSW != '') && ($reactionSW != 0)) {
                            get_template_part( 'library/templates/single/atbs-reaction');
                        }

                        if (($bkAuthorSW != '') && ($bkAuthorSW != 0)) {
                            echo ATBS_Single::bk_author_box($currentPost->post_author);
                        }

                        if (($bkPostNavSW != '') && ($bkPostNavSW != 0)) {
                            echo ATBS_Single::bk_post_navigation('');
                        }
                    ?>
                </div><!-- .container -->
                <?php
                    $sectionsSorter = $atbs_option['single-sections-sorter']['enabled'];

                    if ($sectionsSorter): foreach ($sectionsSorter as $key=>$value) {
                        switch($key) {
                            case 'related':
                                if (($bkRelatedSW != '') && ($bkRelatedSW != 0)) {
                                    echo ATBS_Single::bk_related_post_wide($currentPost);
                                }
                                break;

                            case 'comment':
                                comments_template();
                            break;

                            case 'same-cat':
                                if (($bkSameCatSW != '') && ($bkSameCatSW != 0)) {
                                    echo ATBS_Single::bk_same_category_posts_wide($currentPost);
                                }
                            break;
                        }
                    }
                    endif;
                ?>
            </div> <!-- .single-entry-wrap -->
        </div> <!-- .single-entry-section-wrap -->
    </div> <!-- .single-entry-container -->
    <?php if (($infinity_wrapDivClass != '') && ($infinityScrolling != 0)): ?>
        <div class="infinity-single-trigger"></div>
    <?php endif;?>
</div> <!-- .site-content -->