<?php
if (!class_exists('ATBS_Overlay_Icon_Side_Left')) {
    class ATBS_Overlay_Icon_Side_Left {

        function render($postAttr) {
            ob_start();
            $postID = $postAttr['postID'];

            if(isset($postAttr['catClass']) && ($postAttr['catClass'] != '')) {
                $catClass = $postAttr['catClass'];
            }else {
                $catClass = '';
            }

            $bk_permalink = get_permalink($postID);
            $bk_post_title = get_the_title($postID);
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
            <article class="post--overlay <?php if(isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
				<div class="background-img" style="background-image: url('<?php echo esc_url($theBGLink);?>');"></div>
				<div class="post__text">
					<div class="post__text-wrap">
						<div class="post__text-inner <?php if(isset($postAttr['additionalTextClass']) && ($postAttr['additionalTextClass'] != null)) echo esc_attr($postAttr['additionalTextClass']);?>">
                            <div class="media">
								<div class="media-left media-middle post-type-icon">
									<?php
                                        if(isset($postAttr['postIcon']) && ($postAttr['postIcon'] != '') && ($postAttr['postIcon']['iconType'] != 'gallery')) :
                                            echo ATBS_Core::bk_get_post_icon($postID, $postAttr['postIcon']);
                                        elseif(isset($postAttr['comment_box']) && (get_comments_number($postID) > 0)) :
                                            echo '<a href="'.get_permalink($postID).'" title="'.ATBS_Core::bk_get_comment_number_and_text($postID).'" class="comments-count-box overlay-item">'.get_comments_number($postID).'</a>';
                                        endif;
                                    ?>
								</div>
								<div class="media-body media-middle">
                                    <?php if(isset($postAttr['cat']) && ($postAttr['cat'] != 0) && ($postAttr['cat'] != '1')) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
									<h3 class="post__title <?php if(isset($postAttr['typescale'])) echo esc_attr($postAttr['typescale']);?>"><?php echo ATBS_Core::bk_get_post_title_link(get_the_ID());?></h3>
								    <?php if(isset($postAttr['except_length']) && ($postAttr['except_length'] != null)) {?>
                                    <div class="post__excerpt <?php if(isset($postAttr['additionalExcerptClass']) && ($postAttr['additionalExcerptClass'] != null)) echo esc_attr($postAttr['additionalExcerptClass']);?>">
                						<?php echo ATBS_Core::bk_get_post_excerpt($postAttr['except_length']);?>
                					</div>
                                    <?php }?>
                                    <?php if (isset($postAttr['meta']) && ($postAttr['meta'] != '')) :?>
                                        <?php if (isset($postAttr['footerType']) && ($postAttr['footerType'] == '2-cols')) :?>
                            				<div class="post__meta <?php if(isset($postAttr['additionalMetaClass']) && ($postAttr['additionalMetaClass'] != null)) echo esc_attr($postAttr['additionalMetaClass']);?>">
                            					<div class="post__meta-left">
                            						<?php echo ATBS_Core::bk_meta_cases($postAttr['meta'][0]);?>
                            					</div>
                            					<div class="post__meta-right">
                            						<?php echo ATBS_Core::bk_meta_cases($postAttr['meta'][1]);?>
                            					</div>
                            				</div>

                                        <?php else:?>
                                            <div class="post__meta <?php if(isset($postAttr['additionalMetaClass']) && ($postAttr['additionalMetaClass'] != null)) echo esc_attr($postAttr['additionalMetaClass']);?>">
                                                <?php echo ATBS_Core::bk_get_post_meta($postAttr['meta']);?>
                            				</div>
                                        <?php endif;?>
                                    <?php endif;?>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
                <?php
                if(isset($postAttr['postIcon']) && ($postAttr['postIcon'] != '') && ($postAttr['postIcon']['iconType'] == 'gallery')) :
                    echo ATBS_Core::bk_get_post_icon($postID, $postAttr['postIcon']);
                endif;
                ?>
				<a href="<?php echo esc_url($bk_permalink);?>" class="link-overlay"></a>
                <?php if(isset($postAttr['cat']) && ($postAttr['cat'] == '1')) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
			</article>
            <?php return ob_get_clean();
        }

    }
}