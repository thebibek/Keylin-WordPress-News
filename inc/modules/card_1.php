<?php
if (!class_exists('ATBS_Card_1')) {
    class ATBS_Card_1 {

        function render($postAttr) {
            ob_start();
            $postID = $postAttr['postID'];
            $bk_permalink = get_permalink($postID);
            $bk_post_title = get_the_title($postID);
            $thumbAttr = array (
                'postID'        => $postID,
                'thumbSize'     => $postAttr['thumbSize'],
            );
            if(isset($postAttr['postIcon']) && ($postAttr['postIcon'] != '')) {
                $postIcon = $postAttr['postIcon'];
            }else {
                $postIcon = '';
            }
            if(isset($postAttr['catClass']) && ($postAttr['catClass'] != '')) {
                $catClass = $postAttr['catClass'];
            }else {
                $catClass = '';
            }
            $theBGLink = ATBS_Core::bk_get_post_thumbnail_bg_link($thumbAttr);
            if (isset($postAttr['DarkMode']) && ($postAttr['DarkMode'] != '')) :
                $data_dark_mode = 'true';
            else:
                $data_dark_mode = 'false';
            endif;
            ?>
            <article class="post post--card <?php if(isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
				<div class="post__thumb">
					<a href="<?php echo esc_url($bk_permalink);?>">
						<div class="background-img" style="background-image: url('<?php echo esc_url($theBGLink);?>');"></div>
					</a>
                    <?php if(isset($postAttr['cat']) && ($postAttr['cat'] == 2)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
				    <?php
                    if($postIcon != '') :
                        echo ATBS_Core::bk_get_post_icon($postID, $postIcon);
                    else :
                        if(get_comments_number($postID) > 0) {
                            echo '<a href="'.get_permalink($postID).'" title="'.ATBS_Core::bk_get_comment_number_and_text($postID).'" class="comments-count-box overlay-item">'.get_comments_number($postID).'</a>';
                        }
                    endif;
                    ?>
                </div>
				<div class="post__text <?php if(isset($postAttr['additionalTextClass']) && ($postAttr['additionalTextClass'] != null)) echo esc_attr($postAttr['additionalTextClass']);?>">
					<?php if(isset($postAttr['cat']) && ($postAttr['cat'] != 0) && ($postAttr['cat'] != 1) && ($postAttr['cat'] != 2)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
                    <h3 class="post__title <?php if(isset($postAttr['typescale'])) echo esc_attr($postAttr['typescale']);?>"><?php echo ATBS_Core::bk_get_post_title_link($postAttr['postID']);?></h3>
				</div>
                <?php if (isset($postAttr['meta']) && ($postAttr['meta'] != '')) :?>
                    <?php if (isset($postAttr['footerType']) && ($postAttr['footerType'] == '2-cols')) :?>
        				<div class="post__footer">
        					<div class="post__footer-left post__meta">
        						<?php echo ATBS_Core::bk_meta_cases($postAttr['meta'][0]);?>
        					</div>
        					<div class="post__footer-right post__meta">
        						<?php echo ATBS_Core::bk_meta_cases($postAttr['meta'][1]);?>
        					</div>
        				</div>
                    <?php else:?>
                        <div class="post__footer text-center">
                            <div class="post__meta">
        					<?php
                                echo ATBS_Core::bk_get_post_meta($postAttr['meta']);
                            ?>
                            </div>
        				</div>
                    <?php endif;?>
                <?php endif;?>
                <?php if(isset($postAttr['cat']) && ($postAttr['cat'] == 1)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
			</article>


            <?php return ob_get_clean();
        }

    }
}