<!-- Schema meta -->
<?php
    if (!is_single()) {
        return '';
    }
    global $post;
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    $postID = get_the_ID();
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' );
    $bkEntryTeaser      = get_post_meta($postID,'bk_post_subtitle',true);

    $reviewScore = 0;
    $reviewCheck = get_post_meta($postID,'bk_review_checkbox',true);
    if ($reviewCheck == 1) :
        $reviewScore = get_post_meta($postID,'bk_review_score',true);
        $productName = get_post_meta($postID,'bk_review_box_title',true);
    endif;

    $bk_logo_url = '';
    $logo_src[0] = '';
    if ((isset($atbs_option['bk-logo'])) && (($atbs_option['bk-logo']) != NULL)){
        $bk_logo = $atbs_option['bk-logo'];
        if (($bk_logo != null) && (array_key_exists('url',$bk_logo)) && ($bk_logo['url'] != '')) {
            $bk_logo_url = $bk_logo['url'];
            $logo_attachment_id = attachment_url_to_postid( $bk_logo_url );
            $logo_src = wp_get_attachment_image_src( $logo_attachment_id, 'full' );
        }
    }

    $bk_author_name = get_the_author_meta('display_name', $post->post_author);

    $bk_publisher_name = get_bloginfo('name');
    if (empty($bk_publisher_name)){
        $bk_publisher_name = $bk_author_name;
    }

?>
<?php
    $reviewCheck = get_post_meta($postID,'bk_review_checkbox',true);
    if ($reviewCheck != 1) :?>
        <script type="application/ld+json">
{
          "@context": "http://schema.org",
          "@type": "NewsArticle",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo esc_url(get_permalink($postID))?>"
          },
          "headline": "<?php echo get_the_title($postID);?>",
          <?php if (!empty($thumbnail_src[0])) :?>
          "image": [
            "<?php echo esc_url($thumbnail_src[0]);?>"
           ],
          <?php endif;?>
          "datePublished": "<?php echo date(DATE_W3C, get_the_time('U', $postID));?>",
          "dateModified": "<?php echo the_modified_date('c', '', '', false);?>",
          "author": {
            "@type": "Person",
            "name": "<?php echo esc_attr($bk_author_name);?>"
          },
           "publisher": {
            "@type": "Organization",
            "name": "<?php echo esc_attr($bk_publisher_name);?>",
            "logo": {
              "@type": "ImageObject",
              "url": "<?php echo esc_url($logo_src[0]);?>"
            }
          },
          "description": "<?php echo esc_html($bkEntryTeaser);?>"
        }
        </script>
    <?php else:?>
        <script type="application/ld+json">
{
          "@context": "http://schema.org/",
          "@type": "Review",
          "itemReviewed": {
            "@type": "Thing",
            "name": "<?php echo esc_attr($productName);?>"
          },
          "author": {
            "@type": "Person",
            "name": "<?php echo esc_attr($bk_author_name);?>"
          },
          "reviewRating": {
            "@type": "Rating",
            "ratingValue": "<?php echo esc_attr($reviewScore);?>",
            "bestRating": "10"
          },
          "publisher": {
            "@type": "Organization",
            "name": "<?php echo esc_attr($bk_publisher_name);?>"
          }
        }
        </script>
    <?php endif;
?>