<?php
/*
Template Name: Page Builder
*/
get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>

<div class="site-content">
    <?php atbs_page_builder(); ?>
</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>