<?php
$currentPostID = get_the_ID();
$currentUserID = get_current_user_id();
$bookmarkData = get_user_meta( $currentUserID, 'atbs_posts_bookmarked', true );

if ($bookmarkData == '') {
    $bookmarkData = array();
}

if ( in_array(intval($currentPostID), $bookmarkData)) {
    $bookmarkClass = 'is-saved';
} else {
    $bookmarkClass = '';
}
?>
<div id="atbs-scroll-single-percent-wrap" class="atbs-scroll-single-percent-wrap" data-userid="<?php echo esc_attr($currentUserID);?>" data-postid="<?php echo esc_attr($currentPostID);?>" >
    <div class="scroll-count-percent scroll-count-percent-with-bookmark">
        <svg class="progress-scroll" width="120" height="120" viewBox="0 0 120 120">
    <!--        <circle class="progress__meter" cx="60" cy="60" r="54" stroke-width="3" />-->

            <circle cx="60" cy="60" r="55" fill="#fff" stroke-width="1" stroke="rgba(0,0,0,0.2)"/>
            <circle class="progress__value" cx="60" cy="60" r="54" stroke-width="5" />
        </svg>
        <div class="btn-bookmark-icon <?php echo esc_attr($bookmarkClass);?>">


            <svg class="bookmark-status-saved" width="25" height="25">
                 <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126c.205.183.52.17.708-.03a.5.5 0 0 0 .118-.285H19V6z"></path>
             </svg>


            <svg class="bookmark-status-not-save" width="25" height="25">
                <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
            </svg>
        </div>
    </div>
</div>