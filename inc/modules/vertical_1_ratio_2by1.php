<?php
if (!class_exists('ATBS_Vertical_1_Ratio_2by1')) {
    class ATBS_Vertical_1_Ratio_2by1 {

        function render($postAttr) {
            ob_start();
            $postID = $postAttr['postID'];
            $bk_permalink = get_permalink($postID);
            $bk_post_title = get_the_title($postID);
            if(isset($postAttr['catClass']) && ($postAttr['catClass'] != '')) {
                $catClass = $postAttr['catClass'];
            }else {
                $catClass = '';
            }
            if(isset($postAttr['postIcon']) && ($postAttr['postIcon'] != '')) {
                $postIcon = $postAttr['postIcon'];
            }else {
                $postIcon = '';
            }
            if(isset($postAttr['meta_seperator']) && ($postAttr['meta_seperator'] != '')) {
                $metaSeperator = 1;
            }else {
                $metaSeperator = 0;
            }
            $thumbAttr = array (
                'postID'        => $postID,
                'thumbSize'     => $postAttr['thumbSize'],
            );
            $theBGLink = ATBS_Core::bk_get_post_thumbnail_bg_link($thumbAttr);
            if (isset($postAttr['DarkMode']) && ($postAttr['DarkMode'] != '')) :
                $data_dark_mode = 'true';
            else:
                $data_dark_mode = 'false';
            endif;
            ?>
            <article class="post post--vertical <?php if(isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
                 <?php if(isset($postAttr['thumbSize']) && ($postAttr['thumbSize'] != '')) :?>
				    <div class="post__thumb ratio-2by1<?php if (isset($postAttr['additionalThumbClass']) && ($postAttr['additionalThumbClass'] != null)) echo ' ' . esc_attr($postAttr['additionalThumbClass']);?>">
                        <div class="background-img <?php if(isset($postAttr['additionalBGClass']) && ($postAttr['additionalBGClass'] != null)) echo esc_attr($postAttr['additionalBGClass']);?>" style="background-image: url('<?php echo esc_url($theBGLink);?>');"></div>
                        <?php
                            if(isset($postAttr['postIcon']) && ($postAttr['postIcon'] != '')) :
                                echo ATBS_Core::bk_get_post_icon($postID, $postAttr['postIcon']);
                            endif;
                        ?>
                        <?php if(isset($postAttr['cat']) && ($postAttr['cat'] == 2)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
                    </div>
                <?php endif;?>
				<div class="post__text <?php if(isset($postAttr['additionalTextClass']) && ($postAttr['additionalTextClass'] != null)) echo esc_attr($postAttr['additionalTextClass']);?>">
					<?php if(isset($postAttr['cat']) && ($postAttr['cat'] != 0) && ($postAttr['cat'] != 1) && ($postAttr['cat'] != 2)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
					<h3 class="post__title <?php echo esc_attr($postAttr['typescale']);?>"><a href="<?php echo esc_url($bk_permalink);?>"><?php echo esc_attr($bk_post_title);?></a></h3>
					<?php if(isset($postAttr['except_length']) && ($postAttr['except_length'] != null)) {?>
                    <div class="post__excerpt <?php if(isset($postAttr['additionalExcerptClass']) && ($postAttr['additionalExcerptClass'] != null)) echo esc_attr($postAttr['additionalExcerptClass']);?>">
						<?php echo ATBS_Core::bk_get_post_excerpt($postAttr['except_length']);?>
					</div>
                    <?php }?>
                    <?php
                    if (isset($postAttr['meta']) && ($postAttr['meta'] != '')) :
                        echo '<div class="post__meta">';
                        echo ATBS_Core::bk_get_post_meta($postAttr['meta'], $metaSeperator);
                        echo '</div>';
                    endif;
                    ?>
				</div>
                <?php if(isset($postAttr['cat']) && ($postAttr['cat'] == 1)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
			</article>
            <?php return ob_get_clean();
        }

    }
}