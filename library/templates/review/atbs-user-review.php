<?php
    $postID = get_the_ID();
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');

    $reviewCheck = get_post_meta($postID,'bk_performance_review_checkbox',true);
    $readerReviewData = array();
    $isReviewFormVisible = '';
    $readerReviewIDs = array();

    if ($reviewCheck != 1) :
        return '';
    endif;

    if ((is_user_logged_in())) {
        $userID = get_current_user_id();
        $readerReviewIDs = get_post_meta( $postID, 'atbs_reader_review_IDs', true );
        if ( is_array($readerReviewIDs) && ($readerReviewIDs != '') && in_array(intval($userID), $readerReviewIDs)) {
            $isReviewFormVisible = 'hidden-form';
            $readerReviewData = get_post_meta( $postID, 'atbs_reader_review_DATA-'.$userID, true );
        }
    }else {
        $userID = '';
    }
    $reviewBoxTitle = ATBS_Core::bk_get_theme_option('reader_review_box_title');
    ?>
    <div class="atbs-reviews-section">
        <div class="reviews-title">
            <h3 class="heading-title"><?php echo esc_html($reviewBoxTitle);?></h3>
        </div>
        <div class="reviews-content">
            <div class="reviews-score">
                <div class="reviews-score-list">
    <?php
    $reviewCriterias = get_post_meta($postID,'bk_performance_review_score_criteria_group',true);
    if (count($reviewCriterias) > 0) {
        foreach($reviewCriterias as $reviewCriteria) :
            ?>
            <div class="score-item" data-total="73">
                <div class="score-text">
                    <span class="score-name"><?php echo esc_html($reviewCriteria['review_criteria_title']);?></span>
                    <span class="score-number"><?php echo esc_html($reviewCriteria['review_criteria_score']);?></span>
                </div>
                <div class="score-value">
                    <span class="score-percent"></span>
                </div>
            </div>
            <?php

        endforeach;
    }
    ?>
                </div>
            </div>
            <?php $readerReviewCheck = get_post_meta($postID,'bk_reader_review_checkbox',true);?>
            <?php if (($readerReviewCheck != 0) && ($readerReviewCheck != '')):?>
            <div class="atbs-user-review-wrap">
                <div class="reviews-rating <?php echo esc_attr($isReviewFormVisible);?>" <?php if ((is_user_logged_in())) {echo 'data-userid="'.get_current_user_id().'" data-postid="'.esc_attr($postID).'"';}?>>
                    <?php if (is_array($readerReviewIDs) && (count($readerReviewIDs) > 0)):?>
                    <div class="reviews-score-average">
                        <span class="score-average-title"><?php esc_html_e('User Reviews', 'keylin');?></span>
                        <div class="score-average-content-wrap">
                            <?php
                                $totalScore = 0;
                                foreach($readerReviewIDs as $readerReviewID) :
                                    $userReviewData = get_post_meta( $postID, 'atbs_reader_review_DATA-'.$readerReviewID, true );
                                    $totalScore += round($userReviewData['user_star_rating'], 1);
                                endforeach;
                                $userStarsAverage = round($totalScore/(count($readerReviewIDs)), 1);
                                echo '<div class="score-average-number">'.esc_html($userStarsAverage).'/<span>5</span></div>';
                            ?>
                            <ul class="stars-list">
                            <?php
                                $starCounting = 1;
                                for($starCounting = 1; $starCounting <= 5; $starCounting++) {
                                    if ($starCounting <= $userStarsAverage) {
                                        echo '<li class="star-item star-full"><i class="mdicon mdicon-star"></i></li>';
                                    }else {
                                        $deltaStar =  $userStarsAverage - (int) $userStarsAverage;  // .7
                                        if (($deltaStar > 0) && ($deltaStar < 1)) {
                                            echo '<li class="star-item star-half"><i class="mdicon mdicon-star"></i></li>';
                                            $userStarsAverage = 0;
                                        }else {
                                             echo '<li class="star-item"><i class="mdicon mdicon-star"></i></li>';
                                        }
                                    }
                                }
                            ?>
                            </ul>
                            <span class="score-average-counter">(<?php echo count($readerReviewIDs).' '; echo esc_html_e('reviews', 'keylin');?>)</span>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if ((is_user_logged_in())) { ?>
                        <label <?php if ((is_user_logged_in())) { echo 'for="btn-open-form-rating-'.$postID.'"';}?> class="btn-open-form-rating atbs-noselect">
                            <?php echo esc_html('Add Your Review', 'keylin');?>
                        </label>
                    <?php }else {?>
                        <?php echo '<a class="btn-open-form-rating" href="#login-modal" data-toggle="modal" data-target="#login-modal">';?>
                        <span <?php if ((is_user_logged_in())) { echo 'for="btn-open-form-rating-'.$postID.'"';}?> class="atbs-noselect">
                            <?php echo esc_html('Add Your Review', 'keylin');?>
                        </span>
                        <?php echo '</a>';?>
                    <?php }?>

                    <input type="checkbox" <?php if ((is_user_logged_in())) { echo 'id="btn-open-form-rating-'.$postID.'"';}?> class="toggle-btn-open-form-rating" name="btn-open-form-rating" value="Review Product">
                    <div class="rating-frame">
                        <div class="rating-title">
                            <h3 class="heading-title"><?php esc_html_e('Your Review', 'keylin');?></h3>
                            <div class="heading-excerpt">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis distinctio dolore enim iure labore*
                            </div>
                        </div>
                        <div class="rating-content">
                            <form method="post" class="rating-form">
                                <div class="rating-star">
                                    <span class="stars-label">Rate the product</span>
                                    <span class="stars-list">
                                        <span class="star-item"><i class="mdicon mdicon-star_border"></i></span>
                                        <span class="star-item"><i class="mdicon mdicon-star_border"></i></span>
                                        <span class="star-item"><i class="mdicon mdicon-star_border"></i></span>
                                        <span class="star-item"><i class="mdicon mdicon-star_border"></i></span>
                                        <span class="star-item"><i class="mdicon mdicon-star_border"></i></span>
                                    </span>
                                </div>
                                <input name="user-star-rating" class="user-star-rating atbs-field-invisible" value="1"/>
                                <div class="rating-name">
                                    <input type="text" class="field-input" placeholder="<?php esc_attr_e('Review Title', 'keylin');?>" name="user-review-title" required>
                                </div>
                                <div class="rating-content">
                                    <textarea class="field-input" placeholder="<?php esc_attr_e('Write Your Review', 'keylin');?>" name="user-review-content" required></textarea>
                                </div>
                                <div class="rating-submit">
                                    <input name="submit" type="submit" class="submit field-submit field-submit-reviews" value="<?php esc_attr_e('Post Review', 'keylin');?>">
                                    <i class="mdicon mdicon--last mdicon-spinner2"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $readerReviewIDsReverse = array();
                $userReviewCount = 2;
                if (is_array($readerReviewIDs) && count($readerReviewIDs)) : ?>
                <div class="atbs-user-reviews atbs-user-reviews-rating" data-user-review-count="<?php echo esc_attr($userReviewCount);?>">
                    <div class="user-reviews__inner">
                        <div class="user-reviews-title">
                            <h3 class="heading-title"><?php esc_html_e('User Reviews', 'keylin');?></h3>
                        </div>
                        <div class="user-reviews-content">
                            <div class="user-reviews-list">
                                <?php
                                    $readerReviewIDsReverse = array_reverse($readerReviewIDs);
                                    foreach($readerReviewIDsReverse as $arrayKey => $readerReviewID) :
                                        echo ATBS_Single::bk_get_user_review_on_article($postID, $readerReviewID);
                                        if ($arrayKey == ($userReviewCount - 1)) {
                                            break;
                                        }
                                    endforeach;
                                ?>
                            </div>
                            <?php
                                $maxPages = (count($readerReviewIDs) / $userReviewCount);
                                $deltaMaxPages = $maxPages - intval($maxPages);
                                if ($deltaMaxPages > 0) {
                                    $finalMaxPages= intval($maxPages) + 1;
                                }else {
                                    $finalMaxPages = intval($maxPages);
                                }
                                $paginationClass = ' atbs-user-review-pagination';
                                if ($finalMaxPages > 1):
                                    echo ATBS_Ajax_Function::ajax_pagination($finalMaxPages, $paginationClass);
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php else :?>
                <div class="atbs-user-reviews atbs-user-reviews-rating" data-user-review-count="<?php echo esc_attr($userReviewCount);?>">
                    <div class="user-reviews__inner">
                        <div class="user-reviews-title">
                            <h3 class="heading-title text-center" style="font-weight: 400;"><?php echo esc_html('Be the first one review on this article', 'keylin');?></h3>
                        </div>
                        <div class="user-reviews-content">
                            <div class="user-reviews-list">
                            </div>
                        </div>
                    </div>
                </div>

                <?php endif;?>
            </div> <!-- .atbs-user-review-wrap --->
            <?php endif;?>
        </div>
        <div class="atbs-user-review-popup-notification">
            <div class="popup-content-wrap">
                <div class="popup-heading-icon">
                    <svg height="420pt" viewBox="0 -14 420 420" width="420pt">
                        <path d="m90 50h320c.007812-22.09375-17.90625-40.007812-40-40h-320c-22.09375-.007812-40.007812 17.90625-40 40v215.898438c-.007812 22.09375 17.90625 40.007812 40 40v-215.898438c-.007812-22.09375 17.90625-40.007812 40-40zm0 0" fill="#d4e1f4"/>
                        <path d="m278.101562 107.300781-88.601562 84.699219-47.398438-47.398438c-3.894531-3.894531-10.207031-3.894531-14.101562 0-3.894531 3.890626-3.894531 10.203126 0 14.097657l54.300781 54.300781c1.875 1.890625 4.4375 2.9375 7.097657 2.898438 2.582031.027343 5.066406-.980469 6.902343-2.796876l95.699219-91.402343c3.976562-3.835938 4.089844-10.171875.25-14.148438-3.839844-3.976562-10.171875-4.089843-14.148438-.25zm0 0" fill="#1ae5be"/><path d="m370 0h-320c-27.609375.0117188-49.9882812 22.390625-50 50v215.898438c.0117188 27.613281 22.390625 49.992187 50 50h103.601562l41.796876 69.101562c0 .101562.101562.101562.101562.199219 2.835938 4.496093 7.785156 7.214843 13.101562 7.199219 5.308594-.007813 10.246094-2.722657 13.097657-7.199219 0-.097657.101562-.097657.101562-.199219l41.800781-69.101562h106.398438c27.609375-.007813 49.988281-22.386719 50-50v-215.898438c-.011719-27.609375-22.390625-49.9882812-50-50zm30 265.898438c-.046875 16.550781-13.453125 29.953124-30 30h-112.101562c-3.5.011718-6.753907 1.824218-8.597657 4.800781l-40.800781 67.5-40.800781-67.5c-1.828125-2.996094-5.089844-4.816407-8.597657-4.800781h-109.101562c-16.546875-.046876-29.953125-13.449219-30-30v-215.898438c.046875-16.546875 13.453125-29.953125 30-30h320c16.546875.046875 29.953125 13.453125 30 30zm0 0" fill="#0635c9"/>
                    </svg>
                </div>
                <div class="popup-heading-wrap">
                    <h3><?php esc_html_e('Thank you!', 'keylin');?></h3>
                    <div class="popup-content">
                        <p><?php esc_html_e('Your review is appreciated', 'keylin');?></p>
                        <div class="btn-close-review-popup">
                            <span><?php esc_html_e('Ok', 'keylin');?></span>
                        </div>
                    </div>
                </div>
                <div class="btn-close-review-normal">
                    <span>X</span>
                </div>
            </div>
        </div>
        <div class="review-popup-backdrop"></div>
    </div><!-- End Review Section -->