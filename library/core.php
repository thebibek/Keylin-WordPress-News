<?php
/**
 * ATBS Comments
 */
if ( ! function_exists( 'atbs_comments') ) {
    function atbs_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php
                            echo get_avatar($comment, '60');
                        ?>
                        <b><?php printf('<span class="comment-author-name">%s</span>', get_comment_author_link()) ?></b>
                        <span class="says"><?php esc_html_e('says', 'keylin');?>:</span>
                    </div>
                    <div class="comment-metadata">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="comment-timestamp"><?php comment_time('j F, Y'); ?> <?php esc_html_e('at', 'keylin');?> <?php comment_time('g:i a'); ?></a>
                        <span class="edit-link">
                            <?php edit_comment_link(esc_html__('Edit', 'keylin'),'  ','');?>
                        </span>
                    </div>
                </footer><!-- .comment-meta -->
                <div class="comment-content">
    				<?php if ($comment->comment_approved == '0') : ?>
    				<div class="alert info">
    					<p><?php esc_html_e('Your comment is awaiting moderation.', 'keylin') ?></p>
    				</div>
    				<?php endif; ?>
    				<?php comment_text() ?>
                </div>
                <div class="reply">
                    <?php
                        comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                    ?>
                </div>
			</div>
		<!-- </li> is added by WordPress automatically -->
		<?php
    }
}
/**
 * ************* Pagination *****************
 *---------------------------------------------------
 */
if ( ! function_exists( 'atbs_paginate') ) {
    function atbs_paginate(){
        global $wp_query, $wp_rewrite;
        if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="atbs-keylin-pagination">
            <h4 class="atbs-keylin-pagination__title sr-only"><?php esc_html_e('Posts navigation', 'keylin');?></h4>
            <div class="atbs-keylin-pagination__links text-center">
        	<?php
        		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

            		$pagination = array(
            			'base' => add_query_arg( 'paged','%#%' ),
            			'format' => '',
            			'total' => $wp_query->max_num_pages,
            			'current' => $current,
            			'prev_text' => '<i class="mdicon mdicon-arrow_back"></i>',
            			'next_text' => '<i class="mdicon mdicon-arrow_forward"></i></i>',
            			'type' => 'plain'
            		);

        		if( $wp_rewrite->using_permalinks() )
        			$pagination['base'] = user_trailingslashit( trailingslashit( esc_url(remove_query_arg( 's', get_pagenum_link( 1 ) )) ) . 'page/%#%/', 'paged' );

        		if( !empty( $wp_query->query_vars['s'] ) )
        			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        		echo paginate_links( $pagination );

        	?>
            </div>
        </nav>
<?php
    endif;
    }
}