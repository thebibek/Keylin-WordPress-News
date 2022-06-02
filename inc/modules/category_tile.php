<?php
if (!class_exists('ATBS_Category_Tile')) {
    class ATBS_Category_Tile {

        function render($postAttr) {
            ob_start();
            if(isset($postAttr['catID'])) {
                $catID = intval($postAttr['catID']);
            }else {
                return ob_get_clean();
            }
            $imageID = get_term_meta( $catID, 'bk_category_feat_img', false );
            if((!empty($imageID)) && (count($imageID) != 0) && $imageID[0] != '') {
                $bgURL = wp_get_attachment_image_src( $imageID[0], $postAttr['thumbSize'] );
            }else {
                $bgURL = '';
            }
            if(isset($bgURL[0]) && ($bgURL[0] != '')) {
                $bgStyle = 'style="background-image: url('. "'" .esc_url($bgURL[0]). "'" . ');"';
            }else {
                $bgStyle = '';
            }
            if (isset($postAttr['DarkMode']) && ($postAttr['DarkMode'] != '')) :
                $data_dark_mode = 'true';
            else:
                $data_dark_mode = 'false';
            endif;
            ?>
            <div class="category-tile cat-<?php echo trim($catID);?> <?php if(isset($postAttr['additionalClass']) && ($postAttr['additionalClass'] != null)) echo esc_attr($postAttr['additionalClass']);?>" data-dark-mode="<?php echo esc_attr($data_dark_mode);?>">
                <div class="category-tile__wrap">
                    <div class="background-img background-img--darkened" <?php echo ATBS_Core::atbs_html_render($bgStyle);?>></div>
                    <div class="category-tile__inner">
						<div class="category-tile__text inverse-text">
							<div class="category-tile__name cat-theme-bg"><?php echo get_cat_name($catID);?></div>
							<?php if((isset($postAttr['description'])) && (isset($postAttr['description']) != '')) echo '<div class="category-tile__description">'. $postAttr['description'] .'</div>';?>
						</div>
					</div>
					<a href="<?php echo get_category_link( $catID )?>" class="link-overlay" title="View all World"></a>
                </div>
            </div>
            <?php return ob_get_clean();
        }

    }
}