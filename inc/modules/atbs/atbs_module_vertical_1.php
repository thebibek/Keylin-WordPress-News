<?php
if (!class_exists('ATBS_Module_Post_Vertical_1')) {
    class ATBS_Module_Post_Vertical_1 {

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

            <article class="post post--vertical <?php if ( !(ATBS_Core::bk_check_has_post_thumbnail($postID) )): echo 'post-not-exist-thumb'; endif;?> <?php if (isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
                <?php if ( isset($postAttr['thumbSize']) && ($postAttr['thumbSize'] != '')): ?>
                    <div class="post__thumb <?php if (isset($postAttr['additionalThumbClass']) && ($postAttr['additionalThumbClass'] != null)) echo esc_attr($postAttr['additionalThumbClass']);?>">
                        <?php echo ATBS_Core::get_feature_image($postID, $postAttr['thumbSize'], true, $postIcon);?>
                    </div>
                <?php endif;?>
                <div class="post__text <?php if (isset($postAttr['additionalTextClass']) && ($postAttr['additionalTextClass'] != null)) echo esc_attr($postAttr['additionalTextClass']);?>">
                    <div class="post__text-wrap">
                        <div class="cat-time-group flexbox">
                            <?php if (isset($postAttr['cat']) && ($postAttr['cat'] != 0) && ($postAttr['cat'] != 1)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
                            <?php
                            if (isset($postAttr['meta']) && ($postAttr['meta'] != '')) :
                                echo '<div class="post__meta">';
                                echo ATBS_Core::bk_get_post_meta($postAttr['meta']);
                                echo '</div>';
                            endif;
                            ?>
                        </div>
                        <h3 class="post__title <?php echo esc_attr($postAttr['typescale']);?>"><?php echo ATBS_Core::bk_get_post_title_link($postAttr['postID']);?></h3>
                    </div>
                    <a class="link-overlay" href="<?php echo esc_url($bk_permalink);?>"></a>
                </div>
            </article>
            <?php return ob_get_clean();
        }

    }
}