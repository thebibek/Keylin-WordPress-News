<?php
// Display Numbers instead of Thumbnails
if (!class_exists('ATBS_Horizontal_2')) {
    class ATBS_Horizontal_2 {

        function render($postAttr) {
            ob_start();
            $postID = $postAttr['postID'];
            if(isset($postAttr['catClass']) && ($postAttr['catClass'] != '')) {
                $catClass = $postAttr['catClass'];
            }else {
                $catClass = '';
            }
            if (isset($postAttr['DarkMode']) && ($postAttr['DarkMode'] != '')) :
                $data_dark_mode = 'true';
            else:
                $data_dark_mode = 'false';
            endif;
            ?>
            <article class="post post--horizontal <?php if(isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
                <div class="media">

                    <div class="media-left"><span class="index"><?php if(isset($postAttr['postCount']) && ($postAttr['postCount'] != null)) echo esc_attr($postAttr['postCount']);?>.</span></div>
                    <div class="post__text media-body">
						<?php if(isset($postAttr['cat']) && ($postAttr['cat'] != 0)) echo ATBS_Core::bk_get_post_cat_link($postID, $catClass);?>
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
            </article>
            <?php return ob_get_clean();
        }

    }
}