<?php
/**
 * The template for 404 page (Not Found).
 *
 */
?>
<?php
    get_header();
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    $enableLogo  = ATBS_Core::bk_get_theme_option('404-logo-toggle');
    $logo        = ATBS_Core::bk_get_theme_option('404-logo');
    $logoW       = ATBS_Core::bk_get_theme_option('404-logo-width');
    $image       = ATBS_Core::bk_get_theme_option('404-image');
    $subtitle    = ATBS_Core::bk_get_theme_option('404-subtitle');
    $description = ATBS_Core::bk_get_theme_option('404-description');
    $search      = ATBS_Core::bk_get_theme_option('404-search');
    
    $atbs_allow_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'b'  => array(
            'class' => array(),
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
    );
?>
<div class="site-content page-404">
    <div class="container container--narrow text-center">
        <?php if ( $enableLogo ) : ?>
        <div class="page-404-logo site-logo">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
                <?php
                    if ( $logo && array_key_exists('url',$logo) && $logo['url'] ) : ?>
                        <img src="<?php echo esc_url($logo['url']);?>"
                             alt="<?php esc_attr_e('Logo', 'keylin');?>"
                             width="<?php echo esc_attr($logoW);?>">
                <?php
                    else :
                        echo esc_attr(bloginfo( 'name' ));
                    endif;
                ?>
            </a>
        </div>
        <?php endif; ?>
        <?php if ($image && array_key_exists('url',$image) && $image['url']) : ?>
        <div class="page-404-image">
            <img src="<?php echo esc_url($image['url']);?>" alt="<?php esc_attr_e('404', 'keylin');?>"/>                
        </div>
        <?php endif; ?>
        <div class="page-404-text">
            <?php if (!$image || !array_key_exists('url',$image) || !$image['url']) : ?>
            <h1 class="page-404-title"><?php esc_html_e('404', 'keylin');?></h1>
            <?php endif; ?>
            <?php if(!empty($subtitle)):?>
                <h2 class="page-404-subtitle"><?php echo wp_kses($subtitle, $atbs_allow_html);?></h2>
            <?php else:?>
                <h2 class="page-404-subtitle">
                <?php echo esc_html__('Something went wrong!', 'keylin');?>
                </h2>
            <?php endif;?>
            
            <?php if(!empty($description)) :?>
            <p class="page-404-description f-26"><?php echo wp_kses($description, $atbs_allow_html);?></p>
            <?php else: ?>
            <p class="page-404-description f-26">
            <?php echo esc_html__("We couldn't find the page you're looking for. Try searching or go back to the", "keylin");?>
                <a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Homepage', 'keylin');?></a>
            </p>
            <?php endif;?>
        </div>
        <div class="page-404-search">
            <form class="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input type="text" name="s" class="search-form__input" placeholder="<?php esc_attr_e('Type here to search', 'keylin');?>">
                <button type="submit" class="search-form__submit btn btn-primary"><?php esc_html_e('Search', 'keylin');?></button>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>