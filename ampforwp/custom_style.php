/** Container **/
html { 
    font-size: 14px;
}
.cntr {
    padding: 0 15px;
}
.cntr, header .cntr {
    max-width: 1200px;
}
/*************************/
.atbs-amp-container {
    max-width: 1200px;
    margin: auto;
}
.atbs-amp-single .amp-category .amp-cat {

}
.atbs-amp-single .amp-author .author-details .author-name{
    font-weight: bold;
    text-transform: capitalize;
}
.atbs-amp-single .amp-author .author-details p {
    margin-top: 8px;
    font-size: 14px;
    max-width: 680px;
}
.atbs-amp-single .sp-rt .amp-author {
    background: #fafafa;
    border-color: #f2f2f2;
    padding: 30px;
}
.atbs-amp-single .sp-rt {
    padding: 0;
    width: 74%;
}
.atbs-amp-single .sf-img {
    padding: 0 15px;
}
.atbs-amp-single figure.amp-featured-image:first-child {
    margin-top: 0;
}
.atbs-amp-single .sf-img .wp-caption-text {
    max-width: 1170px;
    width: 100%;
}
.atbs-amp-single .amp-author-image amp-img {
    margin-right: 30px;
}
.atbs-amp-single .atbs-amp-single-pagination #pagination {
    margin-top: 40px;
    padding-top: 40px;
    border-top: 1px solid #eee;
}
.atbs-amp-single .atbs-amp-single-comment .amp-comment-button a {
    padding: 20px;
}
@media (max-width: 768px ) {
    .atbs-amp-single .sp-rt {
        width: 100%;
    }
}
/** Inline-related articles **/
.rp .related-title {
    font-size: 20px;
    font-weight: 700;
    color: #333;
}
.rp .related-title {
    margin-bottom: 30px;
}
.rp .related_link a {
    font-weight: 600;
}
.ampforwp-inline-related-post {
    padding: 40px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    margin-bottom: 40px;
}
.ampforwp-inline-related-post .relatedpost ol {
    margin: -15px !important;
    display: flex;
    flex-wrap: wrap;
}
.ampforwp-inline-related-post .relatedpost li {
    padding: 15px;
    margin: 0;
    width: calc(100% / 3);
    justify-content: initial;
}
.ampforwp-inline-related-post .relatedpost li > a {
    margin-top: 0;
}
.rp .related_link p:last-child {
    margin-bottom: 0;
}
@media (max-width: 991px) and (min-width: 769px) {
    .rp .related_link a {
        font-size: 16px;
    }

}
@media (max-width: 768px) {
    .ampforwp-inline-related-post .relatedpost li {
        width: 50%;
    }
}
@media (max-width: 576px) {
    .atbs-amp-single .atbs-amp-single-comment .amp-comment-button a {
        padding: 15px 20px;
    }
}
@media (max-width: 480px) {
    .ampforwp-inline-related-post .relatedpost li {
        width: 100%;
    }
    .ampforwp-inline-related-post .relatedpost li > a {
        margin-bottom: 15px;
    }
    .rp .related_link a {
        font-weight: 700;
        margin-bottom: 12px;
    }
    .loop-wrapper .atbs-amp-verticle-post h2 {
        font-size: 20px;
    }
}
/** Relared **/
.atbs-amp-related-post-heading h3 {
    font-size: 22px;
    font-weight: bold;
    color: #222;
    text-transform: initial;
    margin-bottom: 30px;
}
.atbs-amp-verticle-post .amp-article-featured-img amp-img{
    position: relative;
    height: 220px;
}
.atbs-amp-verticle-post .amp-article-featured-img amp-img img{
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.atbs-amp-verticle-post .loop-category {
    margin-bottom: 7px;
}
.atbs-amp-verticle-post .loop-category li{
    margin-top: 10px;
}
.atbs-amp-verticle-post .loop-category li,
.loop-category li {
    font-size: 12px;
    font-weight: 400;
    line-height: 1.4;
}
.atbs-amp-verticle-post .loop-title {
    font-weight: bold;
    margin-bottom: 12px;
}
.atbs-amp-verticle-post .amp-post-excerpt {
    margin-bottom: 8px;
}
.fbp-cnt p, .fsp-cnt p {
    color: var(--color-text-dark-gray);
    font-size: 1rem;
    font-weight: 300;
    line-height: 1.5;
    opacity: 0.8;
}
.loop-wrapper .cntn-wrp.srch {
    padding: 0 15px;
}
.right a, .left a {
    border-radius: 0;
}
@media(max-width: 991px) {
    .amp-post-title {
        font-size: 36px;
        line-height: 1.4;
    }
}
@media(max-width: 768px) {
    .atbs-amp-related-posts {
        margin-top: 40px;
    }
    .atbs-amp-related-post-heading h3 {
        border-top: 0;
        padding: 0;
    }
    .loop-wrapper h2 {
        font-size: 24px;
        font-weight: bold;
    }
    .loop-wrapper .atbs-amp-verticle-post h2 {
        font-size: 20px;
    }
}
@media(max-width: 576px) {
    .amp-post-title {
        font-size: 32px;
        line-height: 1.4;
    }
    .loop-wrapper h2 {
        font-size: 20px;
        font-weight: bold;
    }
    .loop-wrapper .atbs-amp-verticle-post h2 {
        font-size: 20px;
    }
}
@media(max-width: 480px) {
    .loop-wrapper {
        margin-top: 0;
    }
    .amp-comment-button {
        margin-top: 0;
    }
    .amp-post-title {
        font-size: 28px;
        line-height: 1.4;
    }
    .fsp h2, .fsp h3 {
        font-size: 20px;
        line-height: 1.5;
    }
}
@media(max-width: 425px) {
    .fsp h2, .fsp h3 {
        font-size: 20px;
        line-height: 1.5;
    }
}
@media(max-width: 360px) {
    .fsp h2, .fsp h3 {
        font-size: 18px;
        line-height: 1.5;
    }
}
/** Index **/
.atbs-amp-index-page .atbs-amp-first-article {

}
.amp-post__meta {
    font-size: 0.85714rem;
    line-height: 1.5;
}
.loop-pagination {
    margin-top: 50px;
}
.fbp-cnt .amp-author {
    font-weight: 600;
    text-transform: capitalize;
    padding-left: 10px;
}
@media(max-width: 576px) {
    .loop-pagination {
        margin-top: 40px;
    }
}
/** Archive **/
.arch-tlt {
    margin-top: 60px;
}
.arch-tlt {
    margin-top: 65px;
    margin-bottom: 35px;
}
.arch-tlt h1.amp-archive-title,
.arch-tlt h1.amp-loop-label {
    font-size: 22px;
    line-height: 1.3;
    font-weight: 700;
    text-transform: uppercase;
    color: rgba(0, 0, 0, 0.8);
    padding: 0;
}

@media  (max-width: 576px) {
    .arch-tlt {
    margin-bottom: 30px;
    }
}
@media  (max-width: 480px) {
    .arch-tlt {
        margin-bottom: 20px;
    }
}
/** Menu **/

.content-wrapper.atbs-amp-sticky-header-enabled {
    margin-top: 80px;
}
.atbs-amp-header-not-border {
    border: none;
}
.atbs-amp-navigation-menu {
    background-color: transparent;
    border: none;
    box-shadow: 0px 3px 2px 0px rgba(0, 0, 0, 0.03), 0 1px 0 0 rgba(0, 0, 0, 0.04), 0 0 0 0 rgba(0, 0, 0, 0.04);
}
.atbs-amp-head-top {
    height: 80px;
}
.atbs-amp-sign-up a {
    background-color: #3545ee;
    border-radius: 4px;
    border: none;
    color: #fff;
    font-size: 15px;
    padding: 10px 20px;
}
.atbs-amp-sign-up a:hover {
    color: #fff;
}
.atbs-amp-head-top h1 {
    font-size: 30px;
}

.atbs-amp-navigation-menu ul li {
    margin-right: 30px;
}
.atbs-amp-navigation-menu ul li a {
    padding: 20px 0px 20px 0px;
    font-size: 14px;
    font-weight: 500;
    color: rgba(0, 0, 0, 0.8);
    -webkit-transition: all 0.2s ease-out 0.05s;
    -o-transition: all 0.2s ease-out 0.05s;
    transition: all 0.2s ease-out 0.05s;
    white-space: normal;
}

.atbs-amp-navigation-menu ul li .sub-menu {
    padding: 10px 0;
    min-width: 290px;
    background-color: #fff;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.03), 0 6px 6px rgba(0, 0, 0, 0.05);
}
@media (min-width: 769px) {
    .atbs-amp-navigation-menu ul li .sub-menu li {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .atbs-amp-navigation-menu ul li .sub-menu li:not(:last-child) {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
}

.atbs-amp-navigation-menu ul li .sub-menu li a {
    padding: 15px 20px 15px 20px;
    font-weight: 500;
    font-size: 14px;
}
.atbs-amp-navigation-menu ul li.menu-item-has-children .sub-menu li a {
    padding: 15px 30px 15px 20px;

}
.atbs-amp-navigation-menu ul li.menu-item-has-children .sub-menu li label {
    position: absolute;
    right: 8px;
    top: 12px;
}
@media (max-width: 768px ) {
    .p-menu .toggle {
        background: none;
    }
}
@media (max-width: 480px) {
    .atbs-amp-head-top h1 {
        font-size: 25px;
    }

}
.atbs-amp-search-full-page {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    z-index: 5;
}
.atbs-amp-search-full-page form {
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%) ;
    right: unset;
    width: 680px;
}
.amp-search-wrapper {
    width: 100%;
}
.atbs-amp-search-full-page form .user-valid:not(.icon-search), .lb-btn .s {
    padding: 20px !important;
    font-size: 16px !important;
    outline: none !important;

}
.atbs-amp-search-full-page form  .overlay-search:before {
    top: 50%;
    transform: translateY(-50%);
}
/** Off Canvas Menu **/
.atbs-amp-off-canvas-content {
    width: 320px;
    background: #fff;
}
.atbs-amp-off-canvas-content .m-menu {
    padding: 20px 30px;
}
.atbs-amp-off-canvas-content .m-menu li a{
    color: rgba(0, 0, 0, 0.8);
    padding: 15px 0;
    -webkit-transition: all 0.2s ease-out 0.05s;
    -o-transition: all 0.2s ease-out 0.05s;
    transition: all 0.2s ease-out 0.05s;
}
.atbs-amp-off-canvas-content .m-menu li .toggle:after {
    color: rgba(0, 0, 0, 0.8);
}
.atbs-amp-off-canvas-content .m-menu .amp-menu li.menu-item-has-children>ul>li:not(:last-child) {
    border-bottom: 1px solid rgba(0,0,0,0.1)
}
.atbs-amp-offcanvas-menu-search, .atbs-amp-copyright {
    border-top: 1px solid rgba(0,0,0,0.1);
    color: rgba(0, 0, 0, 0.8);
}
@media (max-width: 991px) {
    .atbs-amp-search-full-page form {
        width: auto;
        left: 30px;
        right: 30px;
        transform: none;
    }
}
.widget__title, .w-bl h4:not(:last-child) {
    margin-bottom: 30px;
}
.w-bl h4, .w-bl h4 a.rsswidget, .w-bl h4 a.rsswidget:hover  {
    font-size: 17px;
    font-weight: 600;
    text-transform: initial;
    letter-spacing: 0;
    color: rgba(0, 0, 0, 0.7);
    padding-bottom: 0;
    margin-bottom: 0;
}

.w-bl li > a {
    display: inline-block;
    text-decoration: none;
    color: rgba(0, 0, 0, 0.8);
}

/** Widget **/
.w-bl select {
    width: 100%;
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    vertical-align: middle;
    background-color: #fff;
    background-image: none;
    border: 1px solid rgba(0, 0, 0, 0.1);
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    color: rgba(0, 0, 0, 0.8);
    outline: none;
    -webkit-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}

.w-bl .calendar_wrap  table{
    border: 1px solid rgba(0, 0, 0, 0.05);
}
.w-bl .calendar_wrap caption {
    padding: 0.6em;
    text-align: center;
    font-size: 16px;
    font-size: 1.1428rem;
    font-weight: 500;
    color: #fff;
    background-color: #333;
    margin-bottom: 0;
}
.w-bl .calendar_wrap tr {
    border-bottom: 1px solid #eee;
}
.w-bl .calendar_wrap th{
    padding: 1em;
    text-align: center;
    border: none;
    font-size: 0.8571rem;
    color: rgba(0, 0, 0, 0.6);
}
.w-bl .calendar_wrap td {
    padding: 0.8em 1em;
    border: none;
    text-align: center;
    font-size: 0.8571rem;
    color: rgba(0, 0, 0, 0.6);
}
.w-bl .calendar_wrap td#today {
    position: relative;
    font-weight: 700;
    color: #fff;
    background-color: #333;
}
.w-bl .calendar_wrap tfoot a{
    font-size: 1rem;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.8);
    position: relative;
    text-decoration: none;
}

/**/
.widget__title-text {
    margin: 0;
    font-size: 15px;
    font-size: 1.1rem;
    line-height: 1.2;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}
.cntr .cntr {
    padding: 0;
}
.f-w {
    min-width: 100%;
    width: auto;
}
.w-bl .cat-item ul.children{
    padding-top: 15px;
    padding-left: 20px;
}

a.rsswidget:not(:first-child) {
    margin-left: 5px;
}
a.rsswidget {
    font-weight: 700;
    color: rgba(0, 0, 0, 0.8);
}
span.rss-date {
    display: block;
    margin-top: 0.4em;
    font-size: 12px;
    font-size: 0.8571rem;
    font-style: italic;
    color: rgba(0, 0, 0, 0.8);
}
.rssSummary {
    margin: 0.4em 0;
    color: rgba(0, 0, 0, 0.8);
}
cite {
    font-style: italic;
    color: rgba(0, 0, 0, 0.8);
}

.w-bl .search-field {
    width: 100%;
    padding: 12px 15px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    vertical-align: middle;
    background-color: #fff;
    background-image: none;
    border: 1px solid rgba(0, 0, 0, 0.1);
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    color: rgba(0, 0, 0, 0.8);
    outline: none;
    -webkit-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}
.textwidget p {
    margin-bottom: 15px;
}
.textwidget amp-img {
    margin-top: 15px;
}
.tagcloud a {
    display: inline-block;
    float: left;
    padding: 5px 10px;
    margin: 0 10px 10px 0;
    font-size: 12px;
    font-size: 0.8571rem;
    text-decoration: none;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    background: #fafafa;
    color: rgba(0, 0, 0, 0.44);
    -webkit-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}

.wp-caption-text {
    padding-top: 0.8em;
    padding-bottom: 0.8em;
    color: rgba(0, 0, 0, 0.4);
    font-size: 11px;
    font-size: 0.8em;
}


.w-bl .search-form label{
    width: 100%;
}
.w-bl ul[class *= 'list-space-']  li {
    margin-bottom: 0;
}
.atbs-ceris-widget-indexed-posts-a .posts-list li{
    display: block;
    counter-reset: li;
}
.atbs-ceris-widget-indexed-posts-a .posts-list  li::marker {
    content: '';
}
.atbs-ceris-widget-indexed-posts-a .posts-list > li .post__thumb {
    position: relative;
}
.atbs-ceris-widget-indexed-posts-a .posts-list>li .post__thumb:after {
    content: counter(li);
    counter-increment: li;
    display: block;
    height: 25px;
    width: 25px;
    position: absolute;
    top: -12px;
    right: auto;
    bottom: auto;
    left: -12px;
    border: 1px solid rgba(255, 255, 255, 0.4);
    background: #3545ee;
    color: #fff;
    text-align: center;
    font-size: 12px;
    line-height: 25px;
    font-weight: 700;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
}
/*B*/
.atbs-ceris-widget-indexed-posts-b .posts-list>li .post__title:after {
    content: counter(li);
    counter-increment: li;
    display: block;
    position: absolute;
    top: -30px;
    right: 15px;
    bottom: auto;
    left: auto;
    color: #3545ee;
    font-size: 96px;
    line-height: 1;
    font-weight: 700;
    font-style: italic;
    opacity: 0.25;
}
.atbs-ceris-widget-indexed-posts-b .posts-list>li .post__title {
    position: relative;
}
.atbs-ceris-widget-social-counter-counter a.social-tile {
    width: 100%;
}

.w-bl amp-img.amp-wp-enforced-sizes[layout=intrinsic] > img, .amp-wp-unknown-size > img {
    object-fit: cover;
}
.w-bl .post--vertical .amp-wp-enforced-sizes {
    width: 100%;
    display: block;
}
/*C*/
.atbs-ceris-widget-indexed-posts-c .posts-list>li .post--overlay .post__text-inner {
    padding-left: 10px;
}
.atbs-ceris-widget-indexed-posts-c .posts-list>li .post--overlay .list-index {
    margin-left: 0;
    color: #fff;
    font-size: 36px;
    font-size: 2.57rem;
}
.atbs-ceris-widget-indexed-posts-c .posts-list>li .post--overlay .post__title {
    color: #fff;
}
.atbs-ceris-widget-indexed-posts-c .posts-list>li .post--overlay .post__meta {
    color: rgba(255, 255, 255, 0.85);
}
.atbs-ceris-widget-indexed-posts-c .list-index {
    display: inline-block;
    min-width: 45px;
    margin-left: 10px;
    color: rgba(0, 0, 0, 0.8);
    font-size: 26px;
    font-size: 1.86rem;
    line-height: 1;
    font-weight: 700;
    text-align: center;
}

/*Listing Post C*/
.w-bl .widget-content .list-space-md > * {
    margin: 0;
}
@media (max-width: 768px) {
    .w-bl {
        width: 100%;
        flex: initial;
        margin: 0;
        padding: 22.5px 15px;
    }
}
/*Listing Post F*/
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .post__title,
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .post__cat,
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .background-img{
    -webkit-transition: 0.3s ease;
    -o-transition: 0.3s ease;
    -moz-transition: 0.3s ease;
    transition: 0.3s ease;
}
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li.active .post__cat,
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li.active .post__title,
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li.active .post--overlay .background-img{
    color: #fff;
    opacity: 1;
}
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li.active .post__cat:before {
    background-color: #fff;
}
.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .post--overlay .background-img {
    opacity: 0;
}

.atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li:first-child {
    border: none;
}

@media (min-width: 769px) {
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li{
        border-top: 1px solid rgb(3,3,3,0.04);
        margin: 0;
    }
    /*hover*/
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .post__text {
        padding-top: 0;
        min-height: 150px;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active .post--overlay .background-img {
        opacity: 0;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active .post--overlay .post__title{
        color: #222;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active .post--overlay .post__cat{
        color: var(--color-sub);
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active .post--overlay .post__cat:before{
        background-color: #3545ee;
    }


    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li:hover .post__cat,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li:hover .post__title,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li:hover .post--overlay .background-img,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active:hover .post--overlay .background-img,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active:hover .post__cat,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active:hover .post__title{
        color: #fff;
        opacity: 1;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li:hover .post__cat:before,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul:hover li.active:hover .post--overlay .post__cat:before{
        background-color: #fff;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li .post__title a {
        transition: initial;
    }
}
@media (max-width: 768px ) {

    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li .post__cat,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li .post__title,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li .post--overlay .background-img,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul li.active .post--overlay .background-img,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul li.active .post__cat,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul li.active .post__title{
        color: #fff;
        opacity: 1;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li .post__cat:before,
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first ul li.active .post--overlay .post__cat:before{
        background-color: #fff;
    }
    .atbs-ceris-widget-posts-list.atbs-ceris-widget-posts-list-overlay-first .posts-list li .post__title {
        font-size: 18px;
    }
}

/*Listing Post G*/
.atbs-ceris-widget-indexed-posts-a .list-index {
    font-size: 16px;
    font-weight: 400;
    font-style: italic;
    opacity: 0.7;
    width: 30px;
    height: 30px;
    text-align: center;
    display: inline-block;
    line-height: 30px;
    background: blue;
    color: #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}
.atbs-ceris-widget-posts-list .list-space-md {
    margin-bottom: 0;
    margin-top: 0;
}
.atbs-ceris-widget-indexed-posts-a .media-left {
    padding-right: 25px;
}


/*Most comment*/
.atbs-ceris-widget-most-commented .comments-count-box {
    color: #fff;
    text-decoration: none;
    min-width: 48px;
    margin-right: 10px;
    padding: 10px 12px;
    background: #444;
    font-size: 16px;
}
.atbs-ceris-widget-most-commented .comments-count-box:before {
    border-top-color: #444;
}
.atbs-ceris-widget--box .widget__inner {
    padding: 20px;
    background: #fafafa;
}
.atbs-ceris-widget--box .widget__title{
    margin-bottom: 0;
    padding: 15px 20px;
    background: #444;
    border-bottom: none;
    color: #fff;
}
.atbs-ceris-widget--box .widget__title h4 {
    color: #fff;
}

/*Most comment*/
.w-bl .slide-content:not(:last-child) {
    margin-bottom: 30px;
}
.w-bl .slide-content .post--vertical .post__title{
    margin-bottom: 0;
}
@media (max-width: 480px) {
    .w-bl .slide-content .post--vertical .post__title.typescale-0.custom-typescale-0 {
        font-weight: 600;
        color: #222222;
        font-size: 17px;
    }
}


/*Review  A*/
.atbs-ceris-widget-reviews-list .post-score-star{
    display: none;
}
@media (max-width: 768px) {
    .atbs-ceris-widget-reviews-list .post--vertical .post__title.typescale-0 {
        font-size: 18px;
    }
}
/*--instagram*/
.w-bl .widget__content{
    position: relative;
    margin: -5px;
}
.w-bl .instagram-item{
    float: left;
    padding: 5px;
    width: 33.333%;
    -webkit-transition: opacity 0.2s ease-in-out;
    -o-transition: opacity 0.2s ease-in-out;
    -moz-transition: opacity 0.2s ease-in-out;
    transition: opacity 0.2s ease-in-out;
    overflow: hidden;
    margin-bottom: 0;
}
.w-bl .instagram-item a, .w-bl .instagram-item  .amp-wp-enforced-sizes {
    display: block;
    width: 100%;
    height: 100%;
}

.w-bl .instagram-item img{
    -o-object-fit: cover;
    object-fit: cover;
    width: 100%;
    height: 100%;
}
/*temp*/
.w-bl .instagram-item:nth-child(4n+1){
    width: -webkit-calc( 150px + 5px);
    width: -moz-calc( 150px + 5px);
    width: calc( 150px + 5px);
    height: -webkit-calc( 165px + 5px);
    height: -moz-calc( 165px + 5px);
    height: calc( 165px + 5px); /*10px of padding top-bottom*/
}
.w-bl .instagram-item:nth-child(4n+2), .w-bl .instagram-item:nth-child(4n+3){
    width: -webkit-calc( 120px + 5px);
    width: -moz-calc( 120px + 5px);
    width: calc( 120px + 5px);
    height: -webkit-calc( 80px + 5px);
    height: -moz-calc( 80px + 5px);
    height: calc( 80px + 5px);
}
.w-bl .instagram-item:nth-child(4n+4){
    width: 100%;
    height: -webkit-calc( 120px + 10px);
    height: -moz-calc( 120px + 10px);
    height: calc( 120px + 10px);

}

.w-bl .instagram-item:nth-child(n) {
    width: calc(100% / 2);
    height: 150px;
}
@media (max-width: 380px) {
    .w-bl .instagram-item:nth-child(n) {
        height: 100px;
    }
}

/** Auth **/
.post {
    position: relative;
}
.post--horizontal .post__text {
    overflow: hidden;
}
.post--horizontal-xxs .post__thumb, .post--horizontal-xs .post__thumb {
    width: 70px;
    float: left;
    margin: 0 15px 5px 0;
}
.post--horizontal::after {
    clear: both;
    content: "";
    display: table;
}
.post--vertical .post__thumb {
    display: block;
    margin-bottom: 15px;
    -webkit-transition: all 0.15s ease-out 0s;
    -o-transition: all 0.15s ease-out 0s;
    -moz-transition: all 0.15s ease-out 0s;
    transition: all 0.15s ease-out 0s;
}
.post--vertical .post__thumb a{
    width: 100%;
    height: 100%;
    display: block;
}
.post--overlay {
    position: relative;
}
.post--overlay .amp-wp-enforced-sizes {
    width: 100%;
    height: 100%;
}
.post__thumb--overlay.post__thumb {
    position: absolute;
    width: 100%;
    height: 100%;
}
.post--overlay .background-img {
    overflow: hidden;
}
.post--overlay .post__text {
    display: -webkit-box;
    display: -moz-box;
    display: box;
    display: -moz-flex;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    width: 100%;
    min-height: 14.28571rem;
}
.post--overlay-bottom .post__text {
    display: -webkit-box;
    display: -moz-box;
    display: box;
    display: -moz-flex;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: end;
    box-align: end;
    -moz-align-items: flex-end;
    -ms-align-items: flex-end;
    -o-align-items: flex-end;
    -webkit-align-items: flex-end;
    -moz-box-align: end;
    align-items: flex-end;
    -ms-flex-align: end;
    padding-top: 40px;
}
.post--overlay.post--overlay-floorfade .post__text {
    overflow: hidden;
}
.post--overlay-xs .post__text {
    min-height: 17.85714rem;
}
.post--overlay .post__text {
    z-index: 1;
    pointer-events: none;
}
.post--overlay .post__text a {
    pointer-events: auto;
}
.post__text-inner {
    position: relative;
    padding: 20px;
}


.media {
    margin-top: 15px;
}
.media:first-child {
    margin-top: 0;
}
.media, .media-body {
    overflow: hidden;
    zoom: 1;
}
.media-left, .media>.pull-left {
    padding-right: 10px;
}
.media-left {
    padding-right: 30px;
}
.media-right, .media>.pull-right {
    padding-left: 10px;
}

.media-body, .media-left, .media-right {
    display: table-cell;
    vertical-align: top;
}
.media-middle {
    vertical-align: middle;
}
.media-body {
    width: 10000px;
}
.p-r-sm {
    padding-right: 15px !important;
}
.background-img {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
}
.background-img:not(.category-title-image):after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #111;
    opacity: 0.2;
    -webkit-transition-property: all;
    -o-transition-property: all;
    -moz-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: 0.3s;
    -o-transition-duration: 0.3s;
    -moz-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-timing-function: ease;
    -o-transition-timing-function: ease;
    -moz-transition-timing-function: ease;
    transition-timing-function: ease;
}
.background-img--darkened:after {
    opacity: 0.4;
}
.has-cover-bg-img, .background-img:not(.category-title-image) {
    background-color: #333;
    background-position: 50% 50%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: scroll;
}
.post--overlay-floorfade .post__text-wrap:before {
    content: '';
    position: absolute;
    top: -100%;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: -o-linear-gradient(bottom, black 0%, rgba(0, 0, 0, 0.917) 5.3%, rgba(0, 0, 0, 0.834) 10.6%, rgba(0, 0, 0, 0.753) 15.9%, rgba(0, 0, 0, 0.672) 21.3%, rgba(0, 0, 0, 0.591) 26.8%, rgba(0, 0, 0, 0.511) 32.5%, rgba(0, 0, 0, 0.433) 38.4%, rgba(0, 0, 0, 0.357) 44.5%, rgba(0, 0, 0, 0.283) 50.9%, rgba(0, 0, 0, 0.213) 57.7%, rgba(0, 0, 0, 0.147) 65%, rgba(0, 0, 0, 0.089) 72.9%, rgba(0, 0, 0, 0.042) 81.4%, rgba(0, 0, 0, 0.011) 90.6%, transparent 100%);
    background-image: -webkit-gradient(linear, left bottom, left top, from(black), color-stop(5.3%, rgba(0, 0, 0, 0.917)), color-stop(10.6%, rgba(0, 0, 0, 0.834)), color-stop(15.9%, rgba(0, 0, 0, 0.753)), color-stop(21.3%, rgba(0, 0, 0, 0.672)), color-stop(26.8%, rgba(0, 0, 0, 0.591)), color-stop(32.5%, rgba(0, 0, 0, 0.511)), color-stop(38.4%, rgba(0, 0, 0, 0.433)), color-stop(44.5%, rgba(0, 0, 0, 0.357)), color-stop(50.9%, rgba(0, 0, 0, 0.283)), color-stop(57.7%, rgba(0, 0, 0, 0.213)), color-stop(65%, rgba(0, 0, 0, 0.147)), color-stop(72.9%, rgba(0, 0, 0, 0.089)), color-stop(81.4%, rgba(0, 0, 0, 0.042)), color-stop(90.6%, rgba(0, 0, 0, 0.011)), to(transparent));
    background-image: -webkit-linear-gradient(bottom, black 0%, rgba(0, 0, 0, 0.917) 5.3%, rgba(0, 0, 0, 0.834) 10.6%, rgba(0, 0, 0, 0.753) 15.9%, rgba(0, 0, 0, 0.672) 21.3%, rgba(0, 0, 0, 0.591) 26.8%, rgba(0, 0, 0, 0.511) 32.5%, rgba(0, 0, 0, 0.433) 38.4%, rgba(0, 0, 0, 0.357) 44.5%, rgba(0, 0, 0, 0.283) 50.9%, rgba(0, 0, 0, 0.213) 57.7%, rgba(0, 0, 0, 0.147) 65%, rgba(0, 0, 0, 0.089) 72.9%, rgba(0, 0, 0, 0.042) 81.4%, rgba(0, 0, 0, 0.011) 90.6%, transparent 100%);
    background-image: -moz-linear-gradient(bottom, black 0%, rgba(0, 0, 0, 0.917) 5.3%, rgba(0, 0, 0, 0.834) 10.6%, rgba(0, 0, 0, 0.753) 15.9%, rgba(0, 0, 0, 0.672) 21.3%, rgba(0, 0, 0, 0.591) 26.8%, rgba(0, 0, 0, 0.511) 32.5%, rgba(0, 0, 0, 0.433) 38.4%, rgba(0, 0, 0, 0.357) 44.5%, rgba(0, 0, 0, 0.283) 50.9%, rgba(0, 0, 0, 0.213) 57.7%, rgba(0, 0, 0, 0.147) 65%, rgba(0, 0, 0, 0.089) 72.9%, rgba(0, 0, 0, 0.042) 81.4%, rgba(0, 0, 0, 0.011) 90.6%, transparent 100%);
    background-image: linear-gradient(0deg, black 0%, rgba(0, 0, 0, 0.917) 5.3%, rgba(0, 0, 0, 0.834) 10.6%, rgba(0, 0, 0, 0.753) 15.9%, rgba(0, 0, 0, 0.672) 21.3%, rgba(0, 0, 0, 0.591) 26.8%, rgba(0, 0, 0, 0.511) 32.5%, rgba(0, 0, 0, 0.433) 38.4%, rgba(0, 0, 0, 0.357) 44.5%, rgba(0, 0, 0, 0.283) 50.9%, rgba(0, 0, 0, 0.213) 57.7%, rgba(0, 0, 0, 0.147) 65%, rgba(0, 0, 0, 0.089) 72.9%, rgba(0, 0, 0, 0.042) 81.4%, rgba(0, 0, 0, 0.011) 90.6%, transparent 100%);
}
.overlay-content .post__title,
.overlay-content .post__title a,
.inverse-text .post__title,
.inverse-text .post__title a,
.inverse-text .entry-title,
.inverse-text .entry-title a {
    color: #fff;
}
.overlay-content .post__meta,
.overlay-content .post__meta a,
.overlay-content .entry-meta,
.overlay-content .entry-meta a,
.overlay-content .meta-text,
.overlay-content a.meta-text,
.inverse-text .post__meta,
.inverse-text .post__meta a,
.inverse-text .entry-meta,
.inverse-text .entry-meta a,
.inverse-text .meta-text,
.inverse-text a.meta-text {
    color: rgba(255, 255, 255, 0.85);
}
.post__title, .entry-title {
    margin: 0.25em 0 0.45em;
    color: rgba(0, 0, 0, 0.8);
    margin-top: 0;
}
.post__title a, .post__title a:hover, .post__title a:focus, .post__title a:active {
    display: inline-block;
    color: inherit;
    text-decoration: none;
}
.post__cat, a.post__cat {
    font-size: 12px;
    color: var(--color-sub);
    border-bottom: none;
    opacity: 1;
    text-transform: uppercase;
    margin-bottom: 12px;
    letter-spacing: 1px;
    display: inline-block;
    margin-right: 8px;
    text-decoration: none;
    line-height: 1.4;
}
a.post__cat.post__cat-has-line {
    position: relative;
    padding-left: 13px;
    font-weight: 500;
}
.post__cat-has-line:before {
    content: '';
    width: 3px;
    height: 60%;
    background-color: #3545ee;
    position: absolute;
    left: 0;
    top: 50%;
    -webkit-transform: translate(0,-50%);
    -ms-transform: translate(0,-50%);
    -moz-transform: translate(0,-50%);
    -o-transform: translate(0,-50%);
    transform: translate(0,-50%);
}
.post__meta, .entry-meta {
    margin-top: 0.4em;
    margin-bottom: 0.4em;
    color: rgba(0, 0, 0, 0.4);
    font-size: 12px;
    font-size: 0.85714rem;
    line-height: 1.5;
}

.post__title.typescale-0, .entry-title.typescale-0 {
    font-weight: 400;
}
.typescale-0 {
    font-size: 15px;
    font-size: 1.0714rem;
    line-height: 1.5;
}
.post__title.typescale-1, .entry-title.typescale-1 {
    font-weight: 500;
    line-height: 1.5;
    font-size: 17px;
    font-size: 1.2142rem;
}
.text-center {
    text-align: center;
}
.list-unstyled, .atbs-ceris-video-box__playlist ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.list-space-md {
    margin-top: -10px;
    margin-bottom: -10px;
}
.list-space-md > * {
    padding-top: 10px;
    padding-bottom: 10px;
}
.list-space-lg {
    margin-top: -15px;
    margin-bottom: -15px;
}
.list-space-lg>* {
    padding-top: 15px;
    padding-bottom: 15px;
}
.list-space-sm {
    margin-top: -7.5px;
    margin-bottom: -7.5px;
}
.list-space-sm>* {
    padding-top: 7.5px;
    padding-bottom: 7.5px;
}
[class*="list-seperated"].list-space-md {
    margin-top: -20px;
    margin-bottom: -20px;
}
[class*="list-seperated"].list-space-md>* {
    padding-top: 20px;
    padding-bottom: 20px;
}
[class*="list-seperated"] > *:not(:last-child) {
    border-bottom: 1px solid rgba(0, 0, 0, 0.07);
}
.list-seperated-exclude-first > *:first-child {
    border-bottom: none;
}
.overlay-item--center-xy {
    position: absolute;
    top: 50%;
    right: auto;
    bottom: auto;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.ratio-1by1 {
    position: relative;
    padding-bottom: 100%;
    height: 0;
}

.ratio-2by1 {
    position: relative;
    padding-bottom: 50%;
    height: 0;
}

.ratio-3by1 {
    position: relative;
    padding-bottom: 33.33%;
    height: 0;
}

.ratio-4by3 {
    position: relative;
    padding-bottom: 75%;
    height: 0;
}

.ratio-16by9 {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
}

.post-score-hexagon {
    position: relative;
    display: inline-block;
    line-height: 0;
    vertical-align: middle;
}
.post-score-hexagon .hexagon-svg {
    width: 50px;
    padding: 2px;
    -webkit-filter: drop-shadow(0px 0px 1px rgba(0, 0, 0, 0.25));
    filter: drop-shadow(0px 0px 1px rgba(0, 0, 0, 0.25));
    overflow: visible;
}
.post-score-hexagon .hexagon-svg path {
    fill: #aaa1a1;
}
.post-score-hexagon .post-score-value {
    position: absolute;
    top: 50%;
    right: auto;
    bottom: auto;
    left: 50%;
    z-index: 2;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 20px;
    font-weight: 700;
    line-height: 1;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
}

.social-tile {
    color: inherit;
    text-decoration: none;
    display: block;
    position: relative;
    padding: 15px 30px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    background: rgba(0, 0, 0, 0.05);
    overflow: hidden;
    -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.15);
    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.15);
    -webkit-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}
.social-tile:before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: -o-linear-gradient(top, rgba(255, 255, 255, 0.2) 0, rgba(255, 255, 255, 0) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, 0.2)), to(rgba(255, 255, 255, 0)));
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.2) 0, rgba(255, 255, 255, 0) 100%);
    background: -moz-linear-gradient(top, rgba(255, 255, 255, 0.2) 0, rgba(255, 255, 255, 0) 100%);
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.2) 0, rgba(255, 255, 255, 0) 100%);
}
.social-tile__title {
    margin: 0;
    color: #fff;
    font-size: 1.2rem;
    font-weight: 700;
    text-transform: uppercase;
}
.social-tile__count {
    color: rgba(255, 255, 255, 0.6);
    font-size: 1rem;
    line-height: 1.1;
}
.social-tile__icon {
    position: absolute;
    top: auto;
    right: auto;
    bottom: 0;
    left: 0;
    font-size: 5.7143rem;
    color: rgba(255, 255, 255, 0.2);
    line-height: 1;
    -webkit-transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform: translate(20%, 25%) scale(1, 1);
    -ms-transform: translate(20%, 25%) scale(1, 1);
    -moz-transform: translate(20%, 25%) scale(1, 1);
    -o-transform: translate(20%, 25%) scale(1, 1);
    transform: translate(20%, 25%) scale(1, 1);
    -webkit-transform-origin: 0 50% 0;
    -ms-transform-origin: 0 50% 0;
    -moz-transform-origin: 0 50% 0;
    -o-transform-origin: 0 50% 0;
    transform-origin: 0 50% 0;
}
.social-tile:hover .social-tile__icon {
    -webkit-transform: translate(20%, 20%) scale(1.4, 1.4);
    -ms-transform: translate(20%, 20%) scale(1.4, 1.4);
    -moz-transform: translate(20%, 20%) scale(1.4, 1.4);
    -o-transform: translate(20%, 20%) scale(1.4, 1.4);
    transform: translate(20%, 20%) scale(1.4, 1.4);
}
.facebook-theme-bg, .facebook-theme-bg-hover:hover {
    background-color: #3b5998 !important;
}
.twitter-theme-bg, .twitter-theme-bg-hover:hover {
    background-color: #55acee !important;
}
.youtube-theme-bg, .youtube-theme-bg-hover:hover {
    background-color: #cd201f !important;
}
.googleplus-theme-bg, .googleplus-theme-bg-hover:hover {
    background-color: #dc4e41 !important;
}
.inverse-text {
    position: relative;
    color: white;
}
.post__title.typescale-2, .entry-title.typescale-2 {
    font-weight: 700;
    line-height: 1.5;
}
.comments-count-box {
    display: inline-block;
    position: relative;
    padding: 6px 10px;
    background: #3545ee;
    font-size: 12px;
    line-height: 1;
    font-weight: 700;
    color: #fff !important;
    text-align: center;
    text-decoration: none !important;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
}
.comments-count-box:before {
    content: '';
    position: absolute;
    top: 100%;
    right: auto;
    bottom: auto;
    left: 50%;
    margin-left: -5px;
    border: 0 solid transparent;
    border-width: 4px 5px;
    border-bottom-width: 0;
    border-top-color: #3545ee;
}

@media (min-width: 360px) {
    .typescale-2 {
        font-size: 1.3571rem;
        line-height: 1.5;
        font-weight: 500;
    }
}

@media (min-width: 577px) {
    .typescale-2 {
        font-size: 1.44rem;
        line-height: 1.5;
    }
}
@media (min-width: 768px) {
    .typescale-2.custom-typescale-2 {
        font-size: 1.428rem;
        line-height: 1.5;
        font-weight: 600;
    }
    .typescale-2.custom-typescale-2 {
        font-size: 1.428rem;
        line-height: 1.5;
        font-weight: 600;
    }
    .typescale-0 {
        font-size: 15px;
        font-size: 1.0714rem;
        line-height: 1.5;
    }
}
@media (min-width: 992px) {
    .typescale-2.custom-typescale-2 {
        font-size: 1.428rem;
        line-height: 1.5;
        font-weight: 600;
    }
    .typescale-0 {
        font-size: 15px;
        font-size: 1.0714rem;
        line-height: 1.5;
    }
    .typescale-0.custom-typescale-0 {
        font-size: 16px;
        font-size: 1.1428rem;
        line-height: 1.5;
    }
}
@media (max-width: 991px) {
    [class*=" custom-"].post__title.typescale-2 {
        font-weight: 600;
        line-height: 1.5;
    }
}
@media (max-width: 991px) and (min-width: 577px) {
    .post__title.typescale-0 {
        font-size: 16px;
        font-weight: 500 !important;
    }
}
@media (max-width: 768px) and (min-width: 481px) {
    .post--overlay .post__text {
        min-height: 280px;
    }
}
@media (max-width: 480px) and (min-width: 321px) {
    .post--overlay .post__text {
        min-height: 230px;
    }
}
@media (max-width: 360px) {
    .post__title.typescale-1, .entry-title.typescale-1 {
        font-size: 16px !important;
    }
}