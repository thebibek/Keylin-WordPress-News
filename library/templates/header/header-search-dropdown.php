<div id="header-search-dropdown" class="header-search-dropdown ajax-search is-in-navbar js-ajax-search">
	<div class="container container--narrow">
		<form class="search-form search-form--horizontal" method="get" action="<?php echo esc_url(home_url('/')); ?>">
			<div class="search-form__input-wrap">
				<input type="text" name="s" class="search-form__input" placeholder="<?php esc_attr_e('Search', 'keylin');?>" value=""/>
			</div>
			<div class="search-form__submit-wrap">
				<button type="submit" class="search-form__submit btn btn-primary"><?php esc_html_e('Search', 'keylin');?></button>
			</div>
		</form>

		<div class="search-results">
			<div class="typing-loader"></div>
			<div class="search-results__inner"></div>
		</div>
	</div>
</div><!-- .header-search-dropdown -->