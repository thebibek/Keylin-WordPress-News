<!-- Entry meta -->
<?php
    global $post; //$post->post_author
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    $postID = get_the_ID();
    $bk_author_name = get_the_author_meta('display_name', $post->post_author);
    $authorImgALT = $bk_author_name;
    $authorArgs = array(
        'class' => 'entry-author__avatar',
    );
    $atbs_article_date_unix = get_the_time('U', $postID);
    $atbs_meta_items = 8;
    if (isset($atbs_option['bk-single-meta-items'])):
        $atbs_meta_case = $atbs_option['bk-single-meta-items'];
        $atbs_meta_items = ATBS_Core::bk_get_meta_list($atbs_meta_case);
    endif;
?>

<div class="entry-meta">
    <?php // echo ATBS_Core::bk_meta_cases('view'); ?>
    <?php // echo ATBS_Core::bk_meta_cases('comment_text'); ?>
    <?php
    $tags = get_the_tags($postID);
    if ($tags != '') :
    $tagCount = 0;
    ?>
    <?php if ($tags != null) :?>
    <!-- <div class="entry-tags">
        <i class="mdicon mdicon-local_offer"></i>
        <?php
            foreach ($tags as $tagKey => $tag):
                if ($tagKey == 3) break;
                echo '<a class="post-tag" rel="tag" href="'. get_tag_link($tag->term_id) .'">#'. $tag->name.'</a>';
            endforeach;
        ?>
        <?php endif;?>
    </div> -->
    <?php endif;?>
</div>
<!--
<div class="entry-meta">
    <span class="entry-author entry-author--with-ava">
        <?php
            echo get_avatar($post->post_author, '34', '', $authorImgALT, $authorArgs);
            echo esc_html__('By', 'keylin');

            //function coauthors_posts_links( $between = null, $betweenLast = null, $before = null, $after = null, $echo = true )
            if (function_exists('coauthors_posts_links')){
                  echo coauthors_posts_links(', ', esc_html__(' and ', 'keylin'), ' ', ' ', false);
            }
            else {
                  echo ' <a class="entry-author__name" title="Posts by '.esc_attr($bk_author_name).'" rel="author" href="'.get_author_posts_url($post->post_author).'">'.esc_attr($bk_author_name).'</a>';
            }


        ?>
    </span>
    <?php echo ATBS_Core::bk_get_post_meta($atbs_meta_items); ?>
</div> -->