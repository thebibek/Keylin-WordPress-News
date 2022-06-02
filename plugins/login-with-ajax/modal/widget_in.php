<?php
/*
 * This is the page users will see logged in.
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<?php
    global $current_user;
    wp_get_current_user();

    if((is_user_logged_in())) {
        $userID = get_current_user_id();
        $bookmarkData = get_user_meta( $userID, 'atbs_posts_bookmarked', true );
    }else {
        $bookmarkData = array();
    }
    if((is_user_logged_in())) {
        $userID = get_current_user_id();
        $dismissData = get_user_meta( $userID, 'atbs_dismiss_articles', true );
    }else {
        $dismissData = array();
    }
    $latestLink = ATBS_Core::bk_get_theme_option('bookmark_dropdown_latest_news');
    if($latestLink == null){$latestLink == '';}
    $bookmarkLink = ATBS_Core::bk_get_theme_option('bookmark_dropdown_bookmark_news');
    if($bookmarkLink == null){$bookmarkLink == '';}
    $dismissLink = ATBS_Core::bk_get_theme_option('bookmark_dropdown_dismiss_news');
    if($dismissLink == null){$dismissLink == '';}
?>
<div class="bk-lwa navigation-bar-btn">
    <table>
        <tr>
            <td class="avatar lwa-avatar bk-avatar">
                <a href="#"><?php echo get_avatar( $current_user->ID, $size = '27' );  ?></a>
                <div class="bk-username hidden">
                    <a href="<?php echo get_edit_user_link($current_user->ID); ?>"><?php echo esc_html($current_user->display_name);  ?></a>
                </div>
                <div class="bk-canvas-logout hidden">
                    <i class="mdicon mdicon-log-out"></i>
                    <a class="wp-logout" href="<?php echo wp_logout_url() ?>"><?php esc_html_e( 'Log Out' ,'keylin') ?></a>
                </div>
            </td>
        </tr>
    </table>
    <div class="bk-account-info">
        <div class="bk-lwa-profile bk-profile-custom">
            <div class="profile-author-wrap">
                <div class="bk-avatar">
                    <?php echo get_avatar( $current_user->ID, $size = '80' );  ?>
                </div>

                <div class="bk-user-data clearfix">
                    <div class="bk-username">
                        <a href="<?php echo get_edit_user_link($current_user->ID); ?>"><?php echo esc_html($current_user->display_name);  ?></a>
                    </div>
                </div>
            </div>

            <div class="profile-context-wrap">
                <div class="bk-block bk-user-item">
                    <a href="<?php echo get_edit_user_link($current_user->ID); ?>"><?php esc_html_e("Edit Profile", 'keylin'); ?></a>
                 </div>
                 <?php if($latestLink != ''):?>
                 <div class="bk-block bk-user-item">
                    <a href="<?php echo esc_url($latestLink);?>"><?php esc_html_e( 'Latest News ' ,'keylin');?></a>
                 </div>
                 <?php endif;?>
                 <?php if(($bookmarkLink != '') && (is_array($bookmarkData) && (count($bookmarkData) > 0))):?>
                 <div class="bk-block bk-user-item">
                    <a href="<?php echo esc_url($bookmarkLink);?>"><?php esc_html_e( 'Bookmark ' ,'keylin'); if(is_array($bookmarkData)) echo '('.count($bookmarkData).')';?></a>
                 </div>
                 <?php endif;?>
                 <?php if(($dismissLink != '') && (is_array($dismissLink) && (count($dismissLink) > 0))):?>
                 <div class="bk-block bk-user-item">
                    <a href="<?php echo esc_url($dismissLink);?>"><?php esc_html_e( 'Dismiss ' ,'keylin'); if(is_array($dismissData)) echo '('.count($dismissData).')';?></a>
                 </div>
                 <?php endif;?>
                 <div class="bk-block bk-user-item">
                    <a class="wp-logout" href="<?php echo wp_logout_url() ?>"><?php esc_html_e( 'Log Out' ,'keylin') ?></a>
                 </div>


            </div>
        </div>
    </div>
</div>