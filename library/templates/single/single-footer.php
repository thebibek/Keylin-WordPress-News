<?php
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    $share_box = $atbs_option['bk-sharebox-sw'];
    $postID = get_the_ID();
    $tags = get_the_tags($postID);
    $tagCount = 0;
?>
<footer class="single-footer entry-footer">
    <div class="entry-info flexbox">
        <?php if ( !empty($tags) ) : ?>
        <div class="entry-tags">
            <span class="entry-tags__icon"><i class="mdicon mdicon-local_offer"></i></span>
            <ul class="post__tags">
                <?php
                    foreach ($tags as $tagKey => $tag):
                        echo '<li><a class="tag" rel="tag" href="'. get_tag_link($tag->term_id) .'">'. $tag->name.'</a></li>';
                    endforeach;
                ?>
            </ul>
        </div>
        <!-- .entry-tags -->
        <?php endif;?>
        <?php
            if ( $share_box ) {
                if ( function_exists( 'atbs_extension_single_entry_share_box_keylin' ) ) {
                    echo atbs_extension_single_entry_share_box_keylin(get_the_ID(), 'text-right');
                }
            }
        ?>
    </div>
</footer>