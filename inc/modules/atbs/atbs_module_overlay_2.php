<?php
if (!class_exists('ATBS_Module_Post_Overlay_2')) {
    class ATBS_Module_Post_Overlay_2 {

        function render($postAttr) {
            ob_start();
            global $atbs_DismissPage;
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
            $label_button = '';
            if (isset($postAttr['DarkMode']) && ($postAttr['DarkMode'] != '')) :
                $data_dark_mode = 'true';
            else:
                $data_dark_mode = 'false';
            endif;
            ?>

            <article class="post post--overlay <?php if ( !(ATBS_Core::bk_check_has_post_thumbnail($postID) && isset($postAttr['thumbSize']) && ($postAttr['thumbSize'] != ''))): echo 'post-not-exist-thumb'; endif;?> <?php if (isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
                <div class="post__thumb <?php if (isset($postAttr['additionalThumbClass']) && ($postAttr['additionalThumbClass'] != null)) echo esc_attr($postAttr['additionalThumbClass']);?>">
                    <?php echo ATBS_Core::get_feature_image($postID, $postAttr['thumbSize'], true, $postIcon);?>
                </div>
                <div class="post__text <?php if (isset($postAttr['additionalTextClass']) && ($postAttr['additionalTextClass'] != null)) echo esc_attr($postAttr['additionalTextClass']);?>">
                    <div class="post__text-wrap">
                        <div class="post__text-inner  <?php if (isset($postAttr['additionalTextInnerClass']) && ($postAttr['additionalTextInnerClass'] != null)) echo esc_attr($postAttr['additionalTextInnerClass']);?>">
                            <?php if( is_single() && isset($postAttr['navigation_label']) && ($postAttr['navigation_label'] == 1)):
                                if($postAttr['swNavigation'] == 'prev'): ?>
                                    <a class=navigation-button href="<?php echo esc_attr(get_permalink($postID)); ?>">
                                        <svg width="18px" height="18px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                             <g>
                                                 <path d="M492,236H68.442l70.164-69.824c7.829-7.792,7.859-20.455,0.067-28.284c-7.792-7.83-20.456-7.859-28.285-0.068    l-104.504,104c-0.007,0.006-0.012,0.013-0.018,0.019c-7.809,7.792-7.834,20.496-0.002,28.314c0.007,0.006,0.012,0.013,0.018,0.019    l104.504,104c7.828,7.79,20.492,7.763,28.285-0.068c7.792-7.829,7.762-20.492-0.067-28.284L68.442,276H492    c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/>
                                             </g>
                                        </svg> <?php esc_html_e('Previous Article', 'keylin'); ?>
                                    </a>
                                <?php
                                else: ?>
                                    <a class=navigation-button href="<?php echo esc_attr(get_permalink($postID)); ?>">
                                        <svg width="18px" height="18px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                                <path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068    c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557    l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104    c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z"/>
                                            </g>
                                        </svg>
                                        <?php esc_html_e('Next Article', 'keylin'); ?>
                                    </a>
                                <?php
                                endif;
                                ?>
                            <?php endif; ?>
                            <?php if (isset($postAttr['cat']) && ($postAttr['cat'] != 0) && ($postAttr['cat'] != '1')) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
                            <h3 class="post__title <?php echo esc_attr($postAttr['typescale']);?>"><?php echo ATBS_Core::bk_get_post_title_link($postAttr['postID']);?></h3>
                            <?php
                            if (isset($postAttr['meta']) && ($postAttr['meta'] != '')) :
                                echo '<div class="post__meta">';
                                echo ATBS_Core::bk_get_post_meta($postAttr['meta']);
                                echo '</div>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <a class="link-overlay" href="<?php echo esc_url($bk_permalink);?>"></a>
            </article>
            <?php return ob_get_clean();
        }
    }
}