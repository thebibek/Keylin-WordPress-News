<form action="<?php echo esc_url(home_url('/')); ?>" id="searchform" class="search-form" method="get">
    <input type="text" name="s" id="s" class="search-form__input" placeholder="<?php esc_attr_e( 'Search','keylin'); ?>"/>
	<button type="submit" class="search-form__submit"><i class="mdicon mdicon-search"></i></button>
</form>