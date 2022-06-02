<?php
    $atbs_option                = ATBS_Core::bk_get_global_var('atbs_option');
    $posts_section_heading      = isset($atbs_option['search_recommend_heading']) ? $atbs_option['search_recommend_heading'] : '';
    $post_section_query         = isset($atbs_option['search_recommend_query_option']) ? $atbs_option['search_recommend_query_option'] : '';
?>
<div class="atbs-keylin-search-full-style-2">
    <span id="atbs-keylin-search-remove"><i class="atbs-keylin-icon-close"></i></span>
    <div class="atbs-keylin-search-full__wrap ajax-search is-in-navbar js-ajax-search is-active">
        <div class="atbs-keylin-search-full__inner">
            <div class="atbs-keylin-search-full__form">
                <div class="container-sm">
                    <form action="<?php echo esc_url(home_url('/')); ?>" id="searchform" class="search-form" method="get">
                        <div class="form-group">
                            <input type="search" name="s" class="search-form__input" autocomplete="off" placeholder="<?php esc_attr_e('Search ...', 'keylin');?>">
                            <button type="submit" class="btn search-form__submit"><i class="atbs-keylin-icon-right-arrow"></i></button>
                        </div>
                    </form>
                    <div class="data-typing-loader">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" stroke="#000">
                            <g fill="none">
                                <g transform="translate(1 1)" stroke-width="2">
                                    <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                                    <path d="M36 18c0-9.94-8.06-18-18-18">
                                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"/>
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div> <!-- .container -->
            </div>
            <div class="atbs-keylin-search-full__results search-results">

                <div class="container-sm">
                    <div class="search-results__inner">
                        <div class="search-results__content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .atbs-keylin-search-full__wrap -->
</div> <!-- .atbs-keylin-search-popup -->