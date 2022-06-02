<?php
if (!class_exists('ATBS_Module_Post_Horizontal_1')) {
    class ATBS_Module_Post_Horizontal_1 {

        function render($postAttr) {
            ob_start();
            $postID = $postAttr['postID'];
            if (isset($postAttr['postIcon']) && ($postAttr['postIcon'] != '')) {
                $postIcon = $postAttr['postIcon'];
            } else {
                $postIcon = '';
            }
            if (isset($postAttr['catClass']) && ($postAttr['catClass'] != '')) {
                $catClass = $postAttr['catClass'];
            } else {
                $catClass = '';
            }
            $bk_permalink = get_permalink($postID);
            if (isset($postAttr['DarkMode']) && ($postAttr['DarkMode'] != '')) :
                $data_dark_mode = 'true';
            else:
                $data_dark_mode = 'false';
            endif;
            ?>
            <article class="post post--horizontal <?php if ( !(ATBS_Core::bk_check_has_post_thumbnail($postID))): echo 'post-not-exist-thumb'; endif;?> <?php if (isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
                <?php if ( isset($postAttr['thumbSize']) && ($postAttr['thumbSize'] != '')): ?>
                    <div class="post__thumb <?php if (isset($postAttr['additionalThumbClass']) && ($postAttr['additionalThumbClass'] != null)) echo esc_attr($postAttr['additionalThumbClass']);?>">
                        <?php echo ATBS_Core::get_feature_image($postID, $postAttr['thumbSize'], true, $postIcon);?>
                    </div>
                <?php endif;?>
                <div class="post__text <?php if (isset($postAttr['additionalTextClass']) && ($postAttr['additionalTextClass'] != null)) echo esc_attr($postAttr['additionalTextClass']);?>">
                    <?php if (isset($postAttr['cat']) && ($postAttr['cat'] != 0) && ($postAttr['cat'] != 1) && !isset($postAttr['catInMeta'])) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
                    <?php if (isset($postAttr['meta']) && ($postAttr['meta'] != '') && isset($postAttr['metaHead']) && ($postAttr['metaHead'] == 1)) : ?>
                        <div class="post__meta <?php if (isset($postAttr['additionalMetaClass']) && ($postAttr['additionalMetaClass'] != null)) { echo esc_attr($postAttr['additionalMetaClass']); } ?>">
                            <?php if(isset($postAttr['catInMeta']) && ($postAttr['catInMeta'] == 1)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass) ?>
                            <?php echo ATBS_Core::bk_get_post_meta($postAttr['meta']); ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="post__title <?php echo esc_attr($postAttr['typescale']);?>"><?php echo ATBS_Core::bk_get_post_title_link($postAttr['postID']);?></h3>
                    <?php if (isset($postAttr['except_length']) && ($postAttr['except_length'] != null) && (ATBS_Core::bk_get_post_excerpt($postAttr['except_length']) != '')):
                    ?>
                    <?php if (isset($postAttr['meta']) && ($postAttr['meta'] != '') && isset($postAttr['metaAboveExcerpt']) && $postAttr['metaAboveExcerpt'] == 1) : ?>
                        <div class="post__meta <?php if (isset($postAttr['additionalMetaClass']) && ($postAttr['additionalMetaClass'] != null)) { echo esc_attr($postAttr['additionalMetaClass']); } ?>">
                            <?php if(isset($postAttr['catInMeta']) && ($postAttr['catInMeta'] == 1)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass) ?>
                            <?php echo ATBS_Core::bk_get_post_meta($postAttr['meta']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="post__excerpt <?php if (isset($postAttr['additionalExcerptClass']) && ($postAttr['additionalExcerptClass'] != null)) echo esc_attr($postAttr['additionalExcerptClass']);?>">
                        <?php echo ATBS_Core::bk_get_post_excerpt($postAttr['except_length']);?>
                    </div>
                    <?php endif;?>
                    <?php
                    if (isset($postAttr['scoreStar']) && ($postAttr['scoreStar'] != '')) :
                        echo '<div class="post-score-star">';
                        echo ATBS_Core::bk_get_post_score_star($postAttr['scoreStar']);
                        echo '</div>';
                    endif;
                    ?>
                    <?php if (isset($postAttr['meta']) && ($postAttr['meta'] != '') && !isset($postAttr['metaHead'])) : ?>
                        <div class="post__meta <?php if (isset($postAttr['additionalMetaClass']) && ($postAttr['additionalMetaClass'] != null)) { echo esc_attr($postAttr['additionalMetaClass']); } ?>">
                            <?php if(isset($postAttr['catInMeta']) && ($postAttr['catInMeta'] == 1)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass) ?>
                            <?php echo ATBS_Core::bk_get_post_meta($postAttr['meta']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($postAttr['readmore']) && ($postAttr['readmore'] != '')) : ?>
                    <div class="post__readmore <?php if (isset($postAttr['additionalReadmoreClass']) && ($postAttr['additionalReadmoreClass'] != null)) echo esc_attr($postAttr['additionalReadmoreClass']);?>">
                        <a class="button__readmore" href="<?php echo esc_url($bk_permalink);?>">
                            <span class="readmore__text"> <?php esc_html_e('Read more', 'keylin'); ?></span>
                            <?php if (isset($postAttr['readmoreIcon']) && ($postAttr['readmoreIcon'] != '')) : ?>
                            <i class="mdicon mdicon-navigate_next"></i>
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </article>
            <?php return ob_get_clean();
        }

    }
}