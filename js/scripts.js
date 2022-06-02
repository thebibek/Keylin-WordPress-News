var MINIMALDOG = MINIMALDOG || {};

(function($){

    // USE STRICT
    "use strict";

    var $window = $(window);
    var $document = $(document);
    var $goToTopEl = $('.js-go-top-el');
    var $overlayBg = $('.js-overlay-bg');
    $(".single-body").fitVids();

    MINIMALDOG.header = {

        init: function(){
            MINIMALDOG.header.pagiButton();
            MINIMALDOG.header.ajaxSearch();
            MINIMALDOG.header.ajaxMegamenu();
            MINIMALDOG.header.loginForm();
            MINIMALDOG.header.offCanvasMenu();
            MINIMALDOG.header.priorityNavInit();
            MINIMALDOG.header.smartAffix.init({
                fixedHeader: '.js-sticky-header',
                headerPlaceHolder: '.js-sticky-header-holder',
            });
        },

        /* ============================================================================
         * Fix sticky navbar padding when open modal
         * ==========================================================================*/
        stickyNavbarPadding: function() {
            var oldSSB = $.fn.modal.Constructor.prototype.setScrollbar;
            var $stickyHeader = $('.sticky-header .navigation-bar');

            $.fn.modal.Constructor.prototype.setScrollbar = function ()
            {
                oldSSB.apply(this);
                if(this.bodyIsOverflowing && this.scrollbarWidth)
                {
                    $stickyHeader.css('padding-right', this.scrollbarWidth);
                }
            }

            var oldRSB = $.fn.modal.Constructor.prototype.resetScrollbar;
            $.fn.modal.Constructor.prototype.resetScrollbar = function ()
            {
                oldRSB.apply(this);
                $stickyHeader.css('padding-right', '');
            }
        },
        /* ============================================================================
         * AJAX search
         * ==========================================================================*/
        ajaxSearch: function() {
            var $results = '';
            var $ajaxSearch = $('.js-ajax-search');
            var ajaxStatus = '';
            var noResultText = '<span class="noresult-text">There are no results.</span>';
            var errorText = '<span class="error-text">There was some error.</span>';

            $ajaxSearch.each(function() {
                var $this = $(this);
                var $searchForm = $this.find('.search-form__input');
                var $resultsContainer = $this.find('.search-results');
                // console.log($resultsContainer);
                var $resultsContent = $this.find('.search-results__content:not(.default)');
                var searchTerm = '';
                var lastSearchTerm = '';

                $searchForm.on('input', $.debounce(800, function() {
                    searchTerm = $searchForm.val();

                    if (searchTerm.length > 0) {

                        $('.atbs-keylin-search-full-style-2').addClass("is-active");

                        if ((searchTerm != lastSearchTerm) || (ajaxStatus === 'failed' )) {
                            $resultsContainer.removeClass('is-error').addClass('is-loading');
                            $resultsContainer.parents('.atbs-keylin-search-full-style-2').addClass('is-loading');

                            // Hide current content while loading
                            if ($resultsContainer.hasClass('is-loading')) {
                                $resultsContent.css('opacity', 1).addClass('slide-out').on('animationend', function() {
                                    $(this).removeClass('slide-out').css('opacity', 0);
                                });
                            } else

                            lastSearchTerm = searchTerm;
                            ajaxLoad(searchTerm, $resultsContainer, $resultsContent);
                        }
                    } else {
                        $resultsContainer.removeClass('is-active');
                        $('.atbs-keylin-search-full-style-2').removeClass("is-active");
                    }
                }));
            });

            function ajaxLoad(searchTerm, $resultsContainer, $resultsContent) {
                var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];
                var ajaxCall = $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        dataType: 'html',
                        data: {
                            action: 'atbs_ajax_search',
                            searchTerm: searchTerm,
                            securityCheck: atbsAjaxSecurity,
                        },
                    });

                ajaxCall.done(function(respond) {
                    $results = $.parseJSON(respond);
                    ajaxStatus = 'success';
                    if (!$results.length) {
                        $results = noResultText;
                    }
                    $resultsContent.html($results).css('opacity', 0)
                    .addClass('slide-in')
                    .on('animationend', function() {
                        $(this).removeClass('slide-in').css('opacity', '');
                    });

                    var $resultsContainer = $resultsContent.parents('.atbs-keylin-search-full__inner').find('.search-results');
                    var $resultsContainerParents = $resultsContent.parents('.atbs-keylin-search-full-style-2');
                    $resultsContainer.addClass("is-active");
                    $resultsContainerParents.removeClass('is-loading');
                });

                ajaxCall.fail(function() {
                    ajaxStatus = 'failed';
                    $resultsContainer.addClass('is-error');
                    $results = errorText;
                    $resultsContent.html($results).css('opacity', 0)
                    .addClass('slide-in')
                    .on('animationend', function() {
                        $(this).removeClass('slide-in').css('opacity', '');
                    });
                });

                ajaxCall.always(function() {
                    $resultsContainer.removeClass('is-loading');
                });
            }
        },

        /* ============================================================================
         * Megamenu Ajax
         * ==========================================================================*/
        ajaxMegamenu: function() {
            var $results = '';
            var $subCatItem = $('.atbs-keylin-mega-menu ul.sub-categories > li');
            $subCatItem.on('click',function(e) {
              e.preventDefault();
                var $this = $(this);
                if($(this).hasClass('active')) {
                    return;
                }
                $(this).parents('.sub-categories').find('li').removeClass('active');
                var $container = $this.parents('.atbs-keylin-mega-menu__inner').find('.posts-list');
                var $thisCatSplit = $this.attr('class').split('-');
                var thisCatID = $thisCatSplit[$thisCatSplit.length - 1];
                var megaMenuStyle = 0;
                $container.append('<div class="bk-preload-wrapper"></div>');
                $container.find('article').addClass('bk-preload-blur');
                if ($container.hasClass('megamenu-1st-large')) {
                    megaMenuStyle = 2;
                } else if ($container.hasClass('megamenu-4th-large')) {
                    megaMenuStyle = 3;
                } else {
                    megaMenuStyle = 1;
                }
                $this.addClass('active');
                var $htmlRestore = ajax_buff['megamenu'][thisCatID]['html'];
                //console.log($htmlRestore);
                if($htmlRestore == '') {
                    ajaxLoad(thisCatID, megaMenuStyle, $container);
                }else {
                    ajaxRestore($container, thisCatID, $htmlRestore);
                }
            });
            function ajaxLoad(thisCatID, megaMenuStyle, $container) {
                var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];
                var ajaxCall = {
                    action: 'atbs_ajax_megamenu',
                    thisCatID: thisCatID,
                    megaMenuStyle : megaMenuStyle,
                    securityCheck: atbsAjaxSecurity
                };
                $.post(ajaxurl, ajaxCall, function (response) {
                    $results = $.parseJSON(response);
                    //Save HTML
                    ajax_buff['megamenu'][thisCatID]['html'] = $results;
                    // Append Result
                    $container.html($results).css('opacity', 0).animate({opacity: 1}, 500);
                    $container.find('.bk-preload-wrapper').remove();
                    $container.find('article').removeClass('bk-preload-blur');
                });
            }
            function ajaxRestore($container, thisCatID, $htmlRestore) {
                // Append Result
                $container.html($htmlRestore).css('opacity', 0).animate({opacity: 1}, 500);
                $container.find('.bk-preload-wrapper').remove();
                $container.find('article').removeClass('bk-preload-blur');
            }
        },

        /* ============================================================================
         * Ajax Button
         * ==========================================================================*/
        pagiButton: function() {
            var $dotNextTemplate = '<span class="atbs-keylin-pagination__item atbs-keylin-pagination__dots atbs-keylin-pagination__dots-next">&hellip;</span>';
            var $dotPrevTemplate = '<span class="atbs-keylin-pagination__item atbs-keylin-pagination__dots atbs-keylin-pagination__dots-prev">&hellip;</span>';
            var $buttonTemplate = '<a class="atbs-keylin-pagination__item" href="#">##PAGENUMBER##</a>';
            var $dotIndex_next;
            var $dotIndex_prev;
            var $pagiAction;
            var $results = '';

            $('body').on('click', '.atbs-keylin-module-pagination .atbs-keylin-pagination__links > a', function(e) {
                e.preventDefault();
                var $this = $(this);
                if(($this.hasClass('disable-click')) || $this.hasClass('atbs-keylin-pagination__item-current'))
                    return;

                var $pagiChildren = $this.parent().children();
                var $totalPageVal = parseInt($($pagiChildren[$pagiChildren.length - 2]).text());
                var $lastIndex = $this.parent().find('.atbs-keylin-pagination__item-current').index();
                var $lastPageVal = parseInt($($pagiChildren[$lastIndex]).text());

                var $nextButton = $this.parent().find('.atbs-keylin-pagination__item-next');
                var $prevButton = $this.parent().find('.atbs-keylin-pagination__item-prev');

                // Save the last active button
                var $lastActiveButton = $this.parent().find('.atbs-keylin-pagination__item-current');
                // Save the last page
                var $lastActivePage = $this.parent().find('.atbs-keylin-pagination__item-current');

                // Add/Remove current class
                $this.siblings().removeClass('atbs-keylin-pagination__item-current');
                if($this.hasClass('atbs-keylin-pagination__item-prev')) {
                    $lastActivePage.prev().addClass('atbs-keylin-pagination__item-current');
                }else if($this.hasClass('atbs-keylin-pagination__item-next')) {
                    $lastActivePage.next().addClass('atbs-keylin-pagination__item-current');
                }else {
                    $this.addClass('atbs-keylin-pagination__item-current');
                }

                var $currentActiveButton = $this.parent().find('.atbs-keylin-pagination__item-current');
                var $currentIndex = $this.parent().find('.atbs-keylin-pagination__item-current').index();
                var $currentPageVal = parseInt($($pagiChildren[$currentIndex]).text());

                if($currentPageVal == 1) {
                    $($prevButton).addClass('disable-click');
                    $($nextButton).removeClass('disable-click');
                }else if($currentPageVal == $totalPageVal) {
                    $($prevButton).removeClass('disable-click');
                    $($nextButton).addClass('disable-click');
                }else {
                    $($prevButton).removeClass('disable-click');
                    $($nextButton).removeClass('disable-click');
                }

                if($totalPageVal > 5) {

                    if($this.parent().find('.atbs-keylin-pagination__dots').hasClass('atbs-keylin-pagination__dots-next')) {
                        $dotIndex_next = $this.parent().find('.atbs-keylin-pagination__dots-next').index();
                    }else {
                        $dotIndex_next = -1;
                    }
                    if($this.parent().find('.atbs-keylin-pagination__dots').hasClass('atbs-keylin-pagination__dots-prev')) {
                        $dotIndex_prev = $this.parent().find('.atbs-keylin-pagination__dots-prev').index();
                    }else {
                        $dotIndex_prev = -1;
                    }

                    if(isNaN($currentPageVal)) {
                        if($this.hasClass('atbs-keylin-pagination__item-prev')) {
                            $currentPageVal = parseInt($($pagiChildren[$currentIndex + 1]).text()) - 1;
                        }else if($this.hasClass('atbs-keylin-pagination__item-next')) {
                            $currentPageVal = parseInt($($pagiChildren[$currentIndex - 1]).text()) + 1;
                        }else {
                            return;
                        }

                    }

                    if($currentPageVal > $lastPageVal) {
                        $pagiAction = 'up';
                    }else {
                        $pagiAction = 'down';
                    }

                    if(($pagiAction == 'up')) {
                        if(($currentIndex == ($dotIndex_next - 1)) || ($currentIndex == $dotIndex_next) || ($currentPageVal == $totalPageVal)) {

                            $this.parent().find('.atbs-keylin-pagination__dots').remove();                 //Remove ALL Dot Signal

                            if($currentIndex == $dotIndex_next) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal))).insertAfter($lastActiveButton);
                                $lastActiveButton.next().addClass('atbs-keylin-pagination__item-current');
                                $currentActiveButton = $this.parent().find('.atbs-keylin-pagination__item-current');
                            }

                            while(parseInt(($this.parent().find('a:nth-child(3)')).text()) != $currentPageVal) {
                                $this.parent().find('a:nth-child(3)').remove();       //Remove 1 button before
                            }

                            $($dotPrevTemplate).insertBefore($currentActiveButton);                 //Insert Dot Next

                            if(($currentPageVal < ($totalPageVal - 3))) {
                                $($dotNextTemplate).insertAfter($currentActiveButton);              //Insert Dot Prev
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal + 2))).insertAfter($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal + 1))).insertAfter($currentActiveButton);
                            }else if(($currentPageVal < ($totalPageVal - 2))) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal + 2))).insertAfter($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal + 1))).insertAfter($currentActiveButton);
                            }
                            else if(($currentPageVal < ($totalPageVal - 1))) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal + 1))).insertAfter($currentActiveButton);
                            }
                            if($currentPageVal == $totalPageVal) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 3))).insertBefore($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 2))).insertBefore($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 1))).insertBefore($currentActiveButton);
                            }else if($currentPageVal == ($totalPageVal - 1)) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 2))).insertBefore($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 1))).insertBefore($currentActiveButton);
                            }else if($currentPageVal == ($totalPageVal - 2 )) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 1))).insertBefore($currentActiveButton);
                            }
                        }
                    }else if($pagiAction == 'down') {
                        if(($currentIndex == ($dotIndex_prev + 1)) || ($currentIndex == $dotIndex_prev) || (($currentPageVal == 1) && ($currentIndex < $dotIndex_prev))) {

                            $this.parent().find('.atbs-keylin-pagination__dots').remove();                 //Remove ALL Dot Signal

                            if($currentIndex == $dotIndex_prev) {
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal))).insertBefore($lastActiveButton);
                                $lastActiveButton.prev().addClass('atbs-keylin-pagination__item-current');
                                $currentActiveButton = $this.parent().find('.atbs-keylin-pagination__item-current');
                                while(parseInt($this.parent().find('a:nth-child('+($currentIndex + 2)+')').text()) != $totalPageVal) {
                                    $this.parent().find('a:nth-child('+($currentIndex + 2)+')').remove();       //Remove 1 button before
                                }
                            }else if(($currentPageVal == 1) && ($currentIndex < $dotIndex_prev)) {
                                while(parseInt($this.parent().find('a:nth-child('+($currentIndex + 2)+')').text()) != $totalPageVal) {
                                    $this.parent().find('a:nth-child('+($currentIndex + 2)+')').remove();       //Remove 1 button before
                                }
                            }else {
                                while(parseInt($this.parent().find('a:nth-child('+($currentIndex + 1)+')').text()) != $totalPageVal) {
                                    $this.parent().find('a:nth-child('+($currentIndex + 1)+')').remove();       //Remove 1 button before
                                }
                            }
                            $($dotNextTemplate).insertAfter($currentActiveButton);                  //Insert Dot After

                            if($currentPageVal > 4) {                                               // <- 1 ... 5 6 7 ... 10 ->
                                $($dotPrevTemplate).insertBefore($currentActiveButton);              //Insert Dot Prev
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 2))).insertBefore($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 1))).insertBefore($currentActiveButton);
                            }else if($currentPageVal > 3) {                                         // <- 1 ... 4 5 6 ... 10 ->
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 2))).insertBefore($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 1))).insertBefore($currentActiveButton);
                            }
                            else if($currentPageVal > 2) {                                          // <- 1 ... 3 4 5 ... 10 ->
                                $($buttonTemplate.replace('##PAGENUMBER##', ($currentPageVal - 1))).insertBefore($currentActiveButton);
                            }
                            if($currentPageVal == 1) {
                                $($buttonTemplate.replace('##PAGENUMBER##', 4)).insertAfter($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', 3)).insertAfter($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', 2)).insertAfter($currentActiveButton);
                            }else if($currentPageVal == 2) {
                                $($buttonTemplate.replace('##PAGENUMBER##', 4)).insertAfter($currentActiveButton);
                                $($buttonTemplate.replace('##PAGENUMBER##', 3)).insertAfter($currentActiveButton);
                            }else if($currentPageVal == 3) {
                                $($buttonTemplate.replace('##PAGENUMBER##', 4)).insertAfter($currentActiveButton);
                            }
                        }
                    }
                }
                if($currentPageVal != 1) {
                    $this.siblings('.atbs-keylin-pagination__item-prev').css('display', 'inline-block');
                }else {
                    if($this.hasClass('atbs-keylin-pagination__item-prev')) {
                        $this.css('display', 'none');
                    }else {
                        $this.siblings('.atbs-keylin-pagination__item-prev').css('display', 'none');
                    }
                }
                if($currentPageVal == $totalPageVal) {
                    if($this.hasClass('atbs-keylin-pagination__item-next')) {
                        $this.css('display', 'none');
                    }else {
                        $this.siblings('.atbs-keylin-pagination__item-next').css('display', 'none');
                    }
                }else {
                    $this.siblings('.atbs-keylin-pagination__item-next').css('display', 'inline-block');
                }
                ajaxListing($this, $currentPageVal);
            });
            function ajaxListing($this, $currentPageVal) {
                var $moduleID = $this.closest('.atbs-keylin-block').attr('id');
                var moduleName = $moduleID.split("-")[0];
                var args = ajax_buff['query'][$moduleID]['args'];
                if(moduleName == 'atbs_author_results') {
                    var postOffset = ($currentPageVal-1)*args['number'] + parseInt(args['offset']);
                    var $container = $this.closest('.atbs-keylin-block').find('.authors-list');
                    var moduleInfo = '';
                }else {
                    var postOffset = ($currentPageVal-1)*args['posts_per_page'] + parseInt(args['offset']);
                    var $container = $this.closest('.atbs-keylin-block').find('.posts-list');
                    var moduleInfo = ajax_buff['query'][$moduleID]['moduleInfo'];
                }
                var parameters = {
                        moduleName: moduleName,
                        args: args,
                        moduleInfo: moduleInfo,
                        postOffset: postOffset,
                    };
                //console.log(parameters);
                $container.css('height', $container.height()+'px');
                $container.append('<div class="bk-preload-wrapper"></div>');
                $container.find('article').addClass('bk-preload-blur');

                loadAjax(parameters, $container);

                var $mainCol = $this.parents('.atbs-keylin-main-col');
                if($mainCol.length > 0) {
                    var $subCol = $mainCol.siblings('.atbs-keylin-sub-col');
                    $subCol.css('min-height', '1px');
                }
                var $scrollTarget = $this.parents('.atbs-keylin-block');
                $('body,html').animate({
                    scrollTop: $scrollTarget.offset().top,
                }, 1100);
                var containerInnerMNSR = $container.parents('dolly-block__inner');
                if($container.hasClass('js-masonry')){
                    setTimeout(function(){ containerInnerMNSR.css('height', 'auto'); }, 1100);
                }else{
                    setTimeout(function(){ $container.css('height', 'auto'); }, 1100);
                }
            }
            function loadAjax(parameters, $container){

                //console.log(parameters.moduleName);
                var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];

                var ajaxCall = {
                    action: parameters.moduleName,
                    args: parameters.args,
                    moduleInfo: parameters.moduleInfo,
                    postOffset: parameters.postOffset,
                    securityCheck: atbsAjaxSecurity
                };
                //console.log(ajaxCall);
                $.post(ajaxurl, ajaxCall, function (response) {
                    $results = $.parseJSON(response);
                    //Save HTML
                    // Append Result
                    $container.html($results).css('opacity', 0).animate({opacity: 1}, 500);
                    $container.find('.bk-preload-wrapper').remove();
                    $container.find('article').removeClass('bk-preload-blur');
                    var masonryContainers = $('.js-masonry');
                    if($($container).hasClass('js-masonry')) {
                        $($container).imagesLoaded(function(){
                            $($container).masonry('destroy');
                            if($(masonryContainers).width() > 510 ){
                                if($(masonryContainers).hasClass('atbs-masonry-guiter-40')) {
                                    var masonryGutter = 40;
                                }else {
                                    var masonryGutter = 30;
                                }
                            }else{
                                var masonryGutter = 20;
                            }
                            if(($(masonryContainers).width() > 510) && ($(masonryContainers).width() < 546)){
                                var masonryGutter = 20;
                            }
                            $($container).masonry({
                                // options
                                itemSelector: '.list-item',
                                columnWidth: '.list-item',
                                gutter: masonryGutter,
                                percentPosition: true, // Work well with percent-width item
                                horizontalOrder: true,
                                transitionDuration: '0.2s',
                                stagger: 25, // mili sec
                            });
                        });
                    }
                });
            }
            function checkStickySidebar($this){
                var $subCol = $this.parents('.atbs-keylin-main-col').siblings('.atbs-keylin-sub-col');
                if($subCol.hasClass('js-sticky-sidebar')) {
                    return $subCol;
                }else {
                    return 0;
                }
            }
        },

        /* ============================================================================
         * Login Form tabs
         * ==========================================================================*/
        loginForm: function() {
            var $loginFormTabsLinks = $('.js-login-form-tabs').find('a');

            $loginFormTabsLinks.on('click', function (e) {
                e.preventDefault()
                $(this).tab('show');
            });
        },


        /* ============================================================================
         * Offcanvas Menu
         * ==========================================================================*/
        offCanvasMenu: function() {
            var $backdrop = $('<div class="atbs-keylin-offcanvas-backdrop"></div>');
            var $offCanvas = $('.js-atbs-keylin-offcanvas');
            var $offCanvasToggle = $('.js-atbs-keylin-offcanvas-toggle');
            var $offCanvasClose = $('.js-atbs-keylin-offcanvas-close');
            var $offCanvasMenuHasChildren = $('.navigation--offcanvas').find('li.menu-item-has-children > a');
            var menuExpander = ('<div class="submenu-toggle"><i class="mdicon mdicon-expand_more"></i></div>');
            var check_show_more = false;

            $backdrop.on('click', function(){
                var button_hide =  $offCanvas.find('.btn-nav-show_full i');
                $(this).fadeOut(200, function(){
                    $(this).detach();
                });
                var check_show_full = $offCanvas;
                if($(check_show_full).hasClass('show-full')){
                    $(check_show_full).removeClass('animation');
                    setTimeout(function () {
                        $(check_show_full).removeClass('show-full');
                        $(check_show_full).removeClass('is-active');
                    },400);
                }
                else{
                    $(check_show_full).removeClass('show-full');
                    $(check_show_full).removeClass('is-active');
                }
                setTimeout(function () {
                    $(check_show_full).removeClass('animation');
                    $(check_show_full).removeClass('show-full');
                    $(check_show_full).removeClass('is-active');
                },400);
                check_show_more = false;
                button_hide.attr('class','mdicon mdicon-chevron-thin-right');
            });
            $offCanvasToggle.on('click', function(e){
                var check_show_full = $offCanvas;
                e.preventDefault();
                var targetID = $(this).attr('href');
                var $target = $(targetID);
                $target.toggleClass('is-active');
                $backdrop.hide().appendTo(document.body).fadeIn(200);
            });
            $offCanvasClose.on('click', function(e){
                e.preventDefault();
                // var targetID = $(this).attr('href');
                // var $target = $(targetID);
                // $target.removeClass('is-active');
                var button_hide =  $offCanvas.find('.btn-nav-show_full i');
                $backdrop.fadeOut(200, function(){
                    $(this).detach();
                });
                check_show_more = false;
                var check_show_full = $offCanvas;
                if($(check_show_full).hasClass('show-full')){
                    $(check_show_full).removeClass('animation');
                    setTimeout(function () {
                        $(check_show_full).removeClass('show-full');
                        $(check_show_full).removeClass('is-active');
                    },400);
                }
                else{
                    $(check_show_full).removeClass('show-full');
                    $(check_show_full).removeClass('is-active');
                }
                button_hide.attr('class','mdicon mdicon-chevron-thin-right');
            });
            $offCanvasMenuHasChildren.append(function() {
                return $(menuExpander).on('click', function(e){
                    e.preventDefault();
                    var $subMenu = $(this).parent().siblings('.sub-menu');
                    $subMenu.slideToggle(200);
                });
            });
            $(window).on('resize',function (e) {
                var checkExist = setInterval(function() {
                    var elementPC = $('#atbs-keylin-offcanvas-primary');
                    var elementMB = $('#atbs-keylin-offcanvas-mobile');
                    if(elementPC.hasClass('is-active') ){
                        var checkDisplay = elementPC.css('display');
                        if(checkDisplay == 'none' ){
                            $backdrop.css('display','none');
                            clearInterval(checkExist);
                        }
                    }
                    if(elementMB.hasClass('is-active')) {
                        var checkDisplay = elementMB.css('display');
                        if( checkDisplay == 'none'){
                            $backdrop.css('display','none');
                            clearInterval(checkExist);
                        }
                    }
                    if(elementPC.hasClass('is-active')  && elementPC.css('display') != 'none' || elementMB.hasClass('is-active')  && elementMB.css('display') != 'none'){
                        $backdrop.css('display','block');
                        clearInterval(checkExist);
                    }
                    clearInterval(checkExist);
                }, 100); // check every 100ms
            });
            var btn_show_more = $('.btn-nav-show_full');
            $(btn_show_more).click(function () {
                var $this = $(this).parents('.atbs-keylin-offcanvas');
                var button_hide =  $(this).find('i');
                $(this).fadeOut(500);
                if( check_show_more == false){
                    // $($this).animate({'width':'1420px'},500);
                    $($this).addClass('animation');
                    setTimeout(function () {
                        $($this).addClass("show-full");
                        button_hide.attr('class','mdicon mdicon-chevron-thin-left');
                        $(btn_show_more).fadeIn(50);
                    },600);
                    check_show_more = true;
                }
                else {
                    $($this).removeClass("show-full");
                    $(this).fadeOut(1000);
                    setTimeout(function () {
                        // $($this).animate({'width':'530px'},500);
                        $($this).removeClass('animation');
                        $(btn_show_more).fadeIn(50);
                         button_hide.attr('class','mdicon mdicon-chevron-thin-right');
                    },200);
                    check_show_more = false;

                }
            });
        },
        /* ============================================================================
         * Prority+ menu init
         * ==========================================================================*/
        priorityNavInit: function() {
            var $menus = $('.js-priority-nav');
            $menus.each(function() {
                MINIMALDOG.priorityNav($(this));
            })
        },

        /* ============================================================================
         * Smart sticky header
         * ==========================================================================*/
        smartAffix: {
            //settings
            $headerPlaceHolder: '', //the affix menu (this element will get the mdAffixed)
            $fixedHeader: '', //the menu wrapper / placeholder
            isDestroyed: false,
            isDisabled: false,
            isFixed: false, //the current state of the menu, true if the menu is affix
            isShown: false,
            windowScrollTop: 0,
            lastWindowScrollTop: 0, //last scrollTop position, used to calculate the scroll direction
            offCheckpoint: 0, // distance from top where fixed header will be hidden
            onCheckpoint: 0, // distance from top where fixed header can show up
            breakpoint: 992, // media breakpoint in px that it will be disabled

            init : function init (options) {

                //read the settings
                this.$fixedHeader = $(options.fixedHeader);
                this.$headerPlaceHolder = $(options.headerPlaceHolder);

                // Check if selectors exist.
                if ( !this.$fixedHeader.length || !this.$headerPlaceHolder.length ) {
                    this.isDestroyed = true;
                } else if ( !this.$fixedHeader.length || !this.$headerPlaceHolder.length || ( MINIMALDOG.documentOnResize.windowWidth <= MINIMALDOG.header.smartAffix.breakpoint ) ) { // Check if device width is smaller than breakpoint.
                    this.isDisabled = true;
                }

            },// end init

            compute: function compute(){
                if (MINIMALDOG.header.smartAffix.isDestroyed || MINIMALDOG.header.smartAffix.isDisabled) {
                    return;
                }

                // Set where from top fixed header starts showing up
                if( !this.$headerPlaceHolder.length ) {
                    this.offCheckpoint = 400;
                } else {
                    this.offCheckpoint = $(this.$headerPlaceHolder).offset().top + 400;
                }

                this.onCheckpoint = this.offCheckpoint + 500;

                // Set menu top offset
                this.windowScrollTop = MINIMALDOG.documentOnScroll.windowScrollTop;
                if (this.offCheckpoint < this.windowScrollTop) {
                    this.isFixed = true;
                }
            },

            updateState: function updateState(){
                //update affixed state
                if (this.isFixed) {
                    if((this.$fixedHeader != '')) {
                        this.$fixedHeader.addClass('is-fixed');
                    }
                } else {
                    if((this.$fixedHeader != '')) {
                        this.$fixedHeader.removeClass('is-fixed');
                        $window.trigger('stickyHeaderHidden');
                    }
                }

                if (this.isShown) {
                    if((this.$fixedHeader != '')) {
                        this.$fixedHeader.addClass('is-shown');
                    }
                } else {
                    if((this.$fixedHeader != '')) {
                        this.$fixedHeader.removeClass('is-shown');
                    }
                }
            },

            /**
             * called by events on scroll
             */
            eventScroll: function eventScroll(scrollTop) {

                var scrollDirection = '';
                var scrollDelta = 0;

                // check the direction
                if (scrollTop != this.lastWindowScrollTop) { //compute direction only if we have different last scroll top

                    // compute the direction of the scroll
                    if (scrollTop > this.lastWindowScrollTop) {
                        scrollDirection = 'down';
                    } else {
                        scrollDirection = 'up';
                    }

                    //calculate the scroll delta
                    scrollDelta = Math.abs(scrollTop - this.lastWindowScrollTop);
                    this.lastWindowScrollTop = scrollTop;

                    // update affix state
                    if (this.offCheckpoint < scrollTop) {
                        this.isFixed = true;
                    } else {
                        this.isFixed = false;
                    }

                    // check affix state
                    if (this.isFixed) {
                        // We're in affixed state, let's do some check
                        if ((scrollDirection === 'down') && (scrollDelta > 14)) {
                            if (this.isShown) {
                                this.isShown = false; // hide menu
                            }
                        } else {
                            if ((!this.isShown) && (scrollDelta > 14) && (this.onCheckpoint < scrollTop)) {
                                this.isShown = true; // show menu
                            }
                        }
                    } else {
                        this.isShown = false;
                    }

                    this.updateState(); // update state
                }
            }, // end eventScroll function

            /**
            * called by events on resize
            */
            eventResize: function eventResize(windowWidth) {
                // Check if device width is smaller than breakpoint.
                if ( MINIMALDOG.documentOnResize.windowWidth < MINIMALDOG.header.smartAffix.breakpoint ) {
                    this.isDisabled = true;
                } else {
                    this.isDisabled = false;
                    MINIMALDOG.header.smartAffix.compute();
                }
            }
        },
    };

    MINIMALDOG.documentOnScroll = {
        ticking: false,
        windowScrollTop: 0, //used to store the scrollTop

        init: function() {
            window.addEventListener('scroll', function(e) {
                if (!MINIMALDOG.documentOnScroll.ticking) {
                    window.requestAnimationFrame(function() {
                        MINIMALDOG.documentOnScroll.windowScrollTop = $window.scrollTop();

                        // Functions to call here
                        if (!MINIMALDOG.header.smartAffix.isDisabled && !MINIMALDOG.header.smartAffix.isDestroyed) {
                            MINIMALDOG.header.smartAffix.eventScroll(MINIMALDOG.documentOnScroll.windowScrollTop);
                        }

                        MINIMALDOG.documentOnScroll.goToTopScroll(MINIMALDOG.documentOnScroll.windowScrollTop);

                        MINIMALDOG.documentOnScroll.ticking = false;
                    });
                }
                MINIMALDOG.documentOnScroll.ticking = true;
            });
        },

        /* ============================================================================
         * Go to top scroll event
         * ==========================================================================*/
        goToTopScroll: function(windowScrollTop){
            if ($goToTopEl.length) {
                if(windowScrollTop > 800) {
                    if (!$goToTopEl.hasClass('is-active')) $goToTopEl.addClass('is-active');
                } else {
                    $goToTopEl.removeClass('is-active');
                }
            }
        },
        /* ============================================================================
         * INFINITY AJAX load more posts
         * ==========================================================================*/
        infinityAjaxLoadPost: function() {

            var loadedPosts = '';
            var ajaxLoadPost = $('.infinity-ajax-load-post');
            var $this;

            function ajaxLoad(parameters, postContainer) {
                var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];
                var ajaxStatus = '',
                    ajaxCall = $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        dataType: 'html',
                        data: {
                            action: parameters.action,
                            args: parameters.args,
                            postOffset: parameters.postOffset,
                            type: parameters.type,
                            moduleInfo: parameters.moduleInfo,
                            securityCheck: atbsAjaxSecurity
                            // other parameters
                        },
                    });
                ajaxCall.done(function(respond) {
                    loadedPosts = $.parseJSON(respond);
                    ajaxStatus = 'success';
                    if(loadedPosts == 'no-result') {
                        postContainer.closest('.infinity-ajax-load-post').addClass('disable-infinity-load');
                        postContainer.closest('.infinity-ajax-load-post').find('.js-ajax-load-post-trigger').addClass('hidden');
                        postContainer.closest('.infinity-ajax-load-post').find('.atbs-no-more-button').removeClass('hidden');
                        return;
                    }
                    if (loadedPosts) {
                        var elToLoad = $(loadedPosts).hide().fadeIn('1500');
                        postContainer.append(elToLoad);
                        var currentPostionScroll = $(window).scrollTop();
                        var masonryContainers = $('.js-masonry');
                        if($(postContainer).hasClass('js-masonry')) {
                            $(postContainer).imagesLoaded(function(){
                                postContainer.masonry('destroy');
                                if($(masonryContainers).width() > 510 ){
                                    if($(masonryContainers).hasClass('atbs-masonry-guiter-40')) {
                                        var masonryGutter = 40;
                                    }else {
                                        var masonryGutter = 30;
                                    }
                                }else{
                                    var masonryGutter = 20;
                                    
                                }
                                if(($(masonryContainers).width() > 510) && ($(masonryContainers).width() < 546)){
                                    var masonryGutter = 20;
                                }
                                $(postContainer).masonry({
                                    // options
                                    itemSelector: '.list-item',
                                    columnWidth: '.list-item',
                                    gutter: masonryGutter,
                                    percentPosition: true, // Work well with percent-width item
                                    horizontalOrder: true,
                                    transitionDuration: '0.3s',
                                    stagger: 25, // mili sec
                                });
                                window.scrollTo(0,currentPostionScroll);    
                            });
                        }           

                    }
                    $('html, body').animate({ scrollTop: $window.scrollTop() + 1 }, 0).animate({ scrollTop: $window.scrollTop() - 1 }, 0); // for recalculating of sticky sidebar
                    // do stuff like changing parameters
                });

                ajaxCall.fail(function() {
                    ajaxStatus = 'failed';
                });

                ajaxCall.always(function() {
                    postContainer.closest('.infinity-ajax-load-post').removeClass('atbs_loading');
                    postContainer.closest('.infinity-ajax-load-post').removeClass('infinity-disable');
                });
            }
            function ajaxLoadInfinitiveScroll(){
                ajaxLoadPost.each(function(index) {
                    $this = $(this);

                    var triggerElement = $this.find('.js-ajax-load-post-trigger');
                    var top_of_element = triggerElement.offset().top;
                    var bottom_of_element = triggerElement.offset().top + triggerElement.outerHeight();
                    var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
                    var top_of_screen = $(window).scrollTop();


                    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
                        if($this.hasClass('infinity-disable') || $this.hasClass('disable-infinity-load'))
                            return;

                        $this.addClass('infinity-disable');

                        var $moduleID = $this.closest('.atbs-keylin-block').attr('id');
                        var moduleName = $moduleID.split("-")[0];
                        var args = ajax_buff['query'][$moduleID]['args'];

                        var postContainer = $this.find('.posts-list');
                        var moduleInfo = ajax_buff['query'][$moduleID]['moduleInfo'];

                        $this.addClass('atbs_loading');

                        var postOffset      = parseInt(args['offset']) + $this.find('article').length;

                        if($this.closest('.atbs-keylin-block').hasClass('atbs_latest_blog_posts')) {
                            var stickPostLength = args['post__not_in'].length;
                            postOffset = postOffset - stickPostLength;
                        }

                        var parameters = {
                            action: moduleName,
                            args: args,
                            postOffset: postOffset,
                            type: 'loadmore',
                            moduleInfo: moduleInfo,
                        };
                        ajaxLoad(parameters, postContainer);

                    }
                });
            }

            $(window).on('scroll', $.debounce(250, ajaxLoadInfinitiveScroll));
        },
        //single Scrolling
        /* ============================================================================
         * Single INFINITY AJAX Load More
         * ==========================================================================*/
        infinityAjaxLoadSinglePost: function() {
            var ajaxLoadPost = $('.single-infinity-scroll');
            var $this;
            function ajaxLoad(parameters, postContainer) {
                var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];
                var ajaxStatus = '',
                    ajaxCall = $.ajax({
                        url: parameters.postURLtoLoad,
                        type: "GET",
                        dataType: "html"
                    });
                ajaxCall.done(function(respond) {

                    if (respond) {
                        var elToLoad = $($(respond).find('.single-infinity-container').html()).hide().fadeIn('1500');
                        postContainer.append(elToLoad);
                        setTimeout(function() {
                            var $stickySidebar = $(postContainer).children().last().find('.js-sticky-sidebar');
                            var $stickyHeader = $('.js-sticky-header');

                            var marginTop = ($stickyHeader.length) ? ($stickyHeader.outerHeight() + 20) : 0; // check if there's sticky header

                            if ( $( document.body ).hasClass( 'admin-bar' ) ) // check if admin bar is shown.
                                marginTop += 32;
                            if($stickySidebar.length > 0) {
                                if ( $.isFunction($.fn.theiaStickySidebar) ) {
                                    $stickySidebar.theiaStickySidebar({
                                        additionalMarginTop: marginTop,
                                        additionalMarginBottom: 20,
                                    });
                                }
                            } 
                            //React

                            var reactions = $(postContainer).children().last().find('.js-atbs-reaction');
                            MINIMALDOG.ATBS_reaction.atbs_reaction(reactions);

                        }, 250); // wait a bit for precise height;

                        // Run Photorama
                        setTimeout(function() {
                            var galleryPhotorama = $(postContainer).children().last().find('.fotorama');
                            if(galleryPhotorama.length > 0) {
                              $(galleryPhotorama).fotorama();
                            }
                        }, 250); // wait a bit for precise height;

                        // js blur single
                        var overlayBackgroundSingle = $(postContainer).children().find('.js-overlay-bg');

                        if (overlayBackgroundSingle.length) {
                            overlayBackgroundSingle.each(function() {

                                var $mainArea = $(this).find('.js-overlay-bg-main-area');
                                if (!$mainArea.length) {
                                    $mainArea = $(this);
                                }

                                var $subArea = $(this).find('.js-overlay-bg-sub-area');
                                var $subBg = $(this).find('.js-overlay-bg-sub');

                                var leftOffset = $mainArea.offset().left - $subArea.offset().left;
                                var topOffset = $mainArea.offset().top - $subArea.offset().top;

                                $subBg.css('display', 'block');
                                $subBg.css('position', 'absolute');
                                $subBg.css('width', $mainArea.outerWidth() + 'px');
                                $subBg.css('height', $mainArea.outerHeight() + 'px');
                                $subBg.css('left', leftOffset + 'px');
                                $subBg.css('top', topOffset + 'px');
                            });
                        };

                        // do stuff like changing parameters
                        var $postSliderSidebar = $(postContainer).children().last().find('.js-atbs-keylin-carousel-1i-loopdot');
                            $postSliderSidebar.each( function() {
                                $(this).owlCarousel({
                                    items: 1,
                                    margin: 0,
                                    loop: true,
                                    nav: true,
                                    dots: false,
                                    autoHeight: true,
                                    navText: ['<i class="mdicon mdicon-chevron-thin-left"></i>', '<i class="mdicon mdicon-chevron-thin-right"></i>'],
                                    smartSpeed: 500,
                                    responsive: {
                                        0 : {
                                            items: 1,
                                        },

                                },
                            });
                        });
                    }

                });
                ajaxCall.fail(function() {
                    ajaxStatus = 'failed';
                });
                ajaxCall.always(function() {
                    $this.removeClass('infinity-disable');
                    var triggerElement = $this.find('.infinity-single-trigger');
                    if(!triggerElement.length) {
                        return;
                    }
                    //MINIMALDOG.ajaxLazyload.lazyload_start();
                });
            }
            function ajaxLoadInfinitiveScroll(){

                $this = ajaxLoadPost;
                var triggerElement = $this.find('.infinity-single-trigger');
                if(!triggerElement.length) {
                    return;
                }

                var top_of_element = triggerElement.offset().top;
                var bottom_of_element = triggerElement.offset().top + triggerElement.outerHeight();
                var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
                var top_of_screen = $(window).scrollTop();

                if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
                    if($this.hasClass('infinity-disable'))
                        return;

                    $this.addClass('infinity-disable');
                    var postURLtoLoad = $this.find('.single-infinity-inner').last().data('url-to-load');
                    var postContainer = $this.find('.single-infinity-container');

                    var parameters = {
                        postURLtoLoad: postURLtoLoad,
                    };
                    ajaxLoad(parameters, postContainer);

                }
            }

            $(window).on('scroll', $.debounce(250, ajaxLoadInfinitiveScroll));
        },
    };

    MINIMALDOG.documentOnResize = {
        ticking: false,
        windowWidth: $window.width(),

        init: function() {
            window.addEventListener('resize', function(e) {
                if (!MINIMALDOG.documentOnResize.ticking) {
                    window.requestAnimationFrame(function() {
                        MINIMALDOG.documentOnResize.windowWidth = $window.width();

                        // Functions to call here
                        if (!MINIMALDOG.header.smartAffix.isDestroyed) {
                            MINIMALDOG.header.smartAffix.eventResize(MINIMALDOG.documentOnResize.windowWidth);
                        }

                        MINIMALDOG.clippedBackground();

                        MINIMALDOG.documentOnResize.ticking = false;
                    });
                }
                MINIMALDOG.documentOnResize.ticking = true;
            });
        },
    };
    /* ============================================================================
     * Reaction
     * ==========================================================================*/
    MINIMALDOG.ATBS_reaction = {
        init: function() {
            var reactions = $('.js-atbs-reaction');
            MINIMALDOG.ATBS_reaction.atbs_reaction(reactions);
        },
        /**/
        atbs_reaction: function(reactions){
            reactions.each( function() {
                var reaction_col = $(this).find('.atbs-reactions-col');
                function react(reactionItem) {
                    var reactionType = reactionItem.data('reaction-type');
                    var reaction_content = reactionItem.find('.atbs-reactions-content');
                    var reactionStatus = '';
                    if (reactionItem.find('.atbs-reactions-image').hasClass("active")){
                        reactionStatus = 'active';
                    } else {
                        reactionStatus = 'non-active';
                    }
                    if (reactionItem.find('.atbs-reactions-image').hasClass("active")){
                        reactionItem.find('.atbs-reactions-image').removeClass("active");
                        reactionItem.find('.atbs-reactions-image').removeClass("scale-icon");
                        
                    } else {
                        reactionItem.find('.atbs-reactions-image').addClass("active");
                        reactionItem.find('.atbs-reactions-image').addClass("scale-icon"); 
                    }
                    if(reaction_content.hasClass("active")){
                        reaction_content.removeClass("active");
                        reaction_content.removeClass("scale-count");
                    }else{
                        reaction_content.addClass("active");
                        reaction_content.addClass("scale-count");
                    }
                    MINIMALDOG.ATBS_reaction.ajaxLoad(reactionItem, reactionType, reactionStatus);
                }
                // On Click
                reaction_col.on('click', function() {
                    react($(this));
                });
                // Keyboard Accessibility
                reaction_col.keypress(function (e) {
                    e.preventDefault(); // Prevent scrolling when press 'Space'
                    var key = e.which;
                    if( (key == 13) || (key == 32) ) { // 13: Enter, 32: Space (key code)
                        react($(this));
                        return;  
                    }
                });
            });
        },
        ajaxLoad: function(reaction, reactionType, reactionStatus) {
            var $this = reaction;
            var reaction_content = $this.find('.atbs-reactions-content');
            var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];
            var postID = reaction.closest('.js-atbs-reaction').data('article-id');
            var ajaxCall = $.ajax({
                    url: ajaxurl,
                    type: 'post',
                    dataType: 'html',
                    data: {
                        action: 'atbs_ajax_reaction',
                        postID: postID,
                        reactionType: reactionType,
                        reactionStatus: reactionStatus,
                        securityCheck: atbsAjaxSecurity,
                    },
                });
            ajaxCall.done(function(respond) {
                var results = $.parseJSON(respond);
                $this.find('.atbs-reaction-count').html(results);
            });
            ajaxCall.fail(function() {
                //console.log('failed');
            });
            ajaxCall.always(function() {
                 if($this.find('.atbs-reactions-image').hasClass("active")){
                    $this.find('.atbs-reactions-image').removeClass("scale-icon");
                 }
                if(reaction_content.hasClass("active")){
                    reaction_content.removeClass("scale-count");
                }
            });
        },
    }
    MINIMALDOG.documentOnReady = {

        init: function(){
            MINIMALDOG.header.init();
            MINIMALDOG.header.smartAffix.compute();
            MINIMALDOG.documentOnScroll.init();
            MINIMALDOG.documentOnReady.ajaxLoadPost();
            MINIMALDOG.documentOnScroll.infinityAjaxLoadPost();
            MINIMALDOG.documentOnScroll.infinityAjaxLoadSinglePost();
            MINIMALDOG.documentOnReady.scrollSingleCountPercent();
            MINIMALDOG.documentOnReady.carousel_1i();
            MINIMALDOG.documentOnReady.keylin_slider_wArrowImg();
            MINIMALDOG.documentOnReady.carousel_textnav_1i0m();
            MINIMALDOG.documentOnReady.carousel_1i30m();
            MINIMALDOG.documentOnReady.carousel_2i4m();
            MINIMALDOG.documentOnReady.carousel_2i20m();
            MINIMALDOG.documentOnReady.carousel_3i4m();
            MINIMALDOG.documentOnReady.carousel_3i4m_center();
            MINIMALDOG.documentOnReady.carousel_3i20m_custom_1();
            MINIMALDOG.documentOnReady.carousel_3i4m_small();
            MINIMALDOG.documentOnReady.carousel_3i20m();
            MINIMALDOG.documentOnReady.carousel_headingAside_3i();
            MINIMALDOG.documentOnReady.carousel_4i();
            MINIMALDOG.documentOnReady.carousel_4i4m();
            MINIMALDOG.documentOnReady.carousel_4i20m();
            MINIMALDOG.documentOnReady.customCarouselNav();
            MINIMALDOG.documentOnReady.carousel_center();
            MINIMALDOG.documentOnReady.countdown();
            MINIMALDOG.documentOnReady.goToTop();
            MINIMALDOG.documentOnReady.lightBox();
            MINIMALDOG.documentOnReady.perfectScrollbarInit();
            MINIMALDOG.documentOnReady.tooltipInit();
            MINIMALDOG.documentOnReady.atbs_search_button();
            MINIMALDOG.ATBS_reaction.init();
            MINIMALDOG.documentOnReady.atbs_theme_switch();
            MINIMALDOG.documentOnReady.ATBSNavDetectEdgeBrowser();
            MINIMALDOG.documentOnReady.masonryGrid();
        },
        masonryGrid: function() {
            var masonryContainers = $('.js-masonry');
            $(masonryContainers).each(function(index, masonryContainer){
                
                if($(masonryContainers).width() > 510 ){
                    if($(masonryContainer).hasClass('atbs-masonry-guiter-40')) {
                        var masonryGutter = 40;
                    }else {
                        var masonryGutter = 30;
                    }
                }else{
                    var masonryGutter = 20;
                    
                }
                if(($(masonryContainers).width() > 510) && ($(masonryContainers).width() < 546)){
                    var masonryGutter = 20;
                }
                $(masonryContainer).imagesLoaded( function() {
                    $(masonryContainer).masonry({
                        // options
                        itemSelector: '.list-item',
                        columnWidth: '.list-item',
                        gutter: masonryGutter,
                        percentPosition: true, // Work well with percent-width item
                        horizontalOrder: true,
                        transitionDuration: '0.2s',
                        stagger: 25, // mili sec
                    });
                });
            });

        },
        ATBSNavDetectEdgeBrowser: function(){
            $("#main-menu li").on('mouseenter mouseleave', function (e) {
                if ($('ul', this).length) {
                    var elm = $('ul:first', this);
                    var off = elm.offset();
                    var l = off.left;
                    var w = elm.width();
                    var docW = $(".site-wrapper").width();
                    var isEntirelyVisible = (l + w <= docW);

                    if (!isEntirelyVisible) {
                        $(this).addClass('atbs-submenu-to-left');
                    } else {
                        //$(this).removeClass('atbs-submenu-to-left');
                    }

                    if(l<0) {
                        $(this).addClass('atbs-submenu-to-right');
                    } else {
                        //$(this).removeClass('atbs-submenu-to-right');
                    }
                }
            });
        },
        /* ============================================================================
        * Dark Mode & Light Mode   js
        * ==========================================================================*/
        atbs_theme_switch: function () {
            const siteWrapper          = $('.site-wrapper');
            const darModeOptionEnabled = siteWrapper.hasClass('atbs-enable-dark-mode-option');
            if ( !darModeOptionEnabled ) {
                return;
            }
            const theme_switch         = $('.atbs-theme-switch');
            const keylin_logo_switch   = $('.atbs-keylin-logo');
            function getCookie(cookieName) {
                var name = cookieName + '=';
                var decodedCookie = decodeURIComponent(document.cookie);
                var cookies = decodedCookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];
                    while (cookie.charAt(0) == ' ') {
                        cookie = cookie.substring(1);
                    }
                    if (cookie.indexOf(name) == 0) {
                        return cookie.substring(name.length, cookie.length);
                    }
                }
                return '';
            }
            function setCookie(cookieName, cookieValue, expireDays) {
                var date = new Date();
                date.setTime(date.getTime() + expireDays * 24 * 60 * 60 * 1000);
                var expires = 'expires=' + date.toGMTString();
                document.cookie = cookieName + '=' + cookieValue + ';' + expires + ';path=/';
            }
            function toggleDarkMode(status) {
                if (status == 'on') {
                    $(theme_switch).addClass('active');
                    $(keylin_logo_switch).addClass('logo-dark-mode-active');
                    siteWrapper.addClass('keylin-dark-mode');
                    setCookie(ATBS_DARKMODE_COOKIE_NAME[0], 1, 30); // Save data
                } else {
                    $(theme_switch).removeClass('active');
                    $(keylin_logo_switch).removeClass('logo-dark-mode-active');
                    siteWrapper.removeClass('keylin-dark-mode');
                    setCookie(ATBS_DARKMODE_COOKIE_NAME[0], 0, 30); // Save data
                }
            }
            function updateDarkMode() {
                var darkMode = getCookie(ATBS_DARKMODE_COOKIE_NAME[0]);
                if (darkMode == 1) {
                    toggleDarkMode('off');
                } else {
                    toggleDarkMode('on');
                }
            }
            function initDarkMode() {
                var darkMode        = getCookie(ATBS_DARKMODE_COOKIE_NAME[0]);
                var defaultDarkMode = siteWrapper.hasClass('keylin-dark-mode-default');
                // Turn on Dark Mode default if is set in Theme Option
                if (darkMode == '') {
                    if ( defaultDarkMode ) {
                        toggleDarkMode('on');
                    }
                }
            }
            theme_switch.each(function() {
                $(this).on('click', updateDarkMode);
            });
            initDarkMode(); // init
        },
        /* ============================================================================
        * Single scroll percent
        * ==========================================================================*/
        scrollSingleCountPercent: function(){
            var lastWindowScrollTop = 0;
            var scrollDirection = '';
            var elemnt_scroll = $('.element-scroll-percent');
            if(elemnt_scroll.length > 0){
                var ofsetTop_element_scroll;
                var ofsetBottom_element_scroll;
                var progressValue = $('.progress__value');
                var progressValueMobile = $('.scroll-count-percent-mobile .percent-number');
                var percentNumberText = $('.percent-number').find('.percent-number-text');
                var RADIUS = 54;
                var CIRCUMFERENCE = 2 * Math.PI * RADIUS;
                var docHeight = 0;
                $(progressValue).css({'stroke-dasharray' : CIRCUMFERENCE });
                var reading_indicator =  $('.scroll-count-percent');
                progress(0);
                $(percentNumberText).html(0);
                $(progressValueMobile).css({'width':'0px'});
                $(window).scroll(function(e){
                    if($(window).scrollTop() > lastWindowScrollTop) {
                        scrollDirection = 'down';
                    }else {
                        scrollDirection = 'up';
                    }
                    elemnt_scroll  = $('.element-scroll-percent');

                    if(elemnt_scroll.hasClass('post-content-100-percent')) {
                        var theContentPercent = elemnt_scroll.find('.single-body');
                        theContentPercent.each( function() {
                            var theJourney = $(window).scrollTop() - ($(this).offset().top - 400);
                            if((theJourney > 0) && (theJourney <= $(this).height())) {
                                ofsetTop_element_scroll = $(this).offset().top - 400;
                                ofsetBottom_element_scroll = ofsetTop_element_scroll + $(this).height();
                                docHeight = $(this).height();
                            }
                        });
                    }else {
                        elemnt_scroll.each( function() {
                            var theJourney = $(window).scrollTop() - $(this).offset().top;
                            if((theJourney > 0) && (theJourney <= $(this).height())) {
                                ofsetTop_element_scroll = $(this).offset().top - 400;
                                ofsetBottom_element_scroll = ofsetTop_element_scroll + $(this).height();
                                docHeight = $(this).height();
                            }
                        });
                    }
                    if(docHeight == 0) {
                        return false;
                    }
                    if (($(window).scrollTop() >= ofsetTop_element_scroll) ){
                        $('.scroll-count-percent').addClass('active');
                    }
                    else{
                        $('.scroll-count-percent').removeClass('active');
                    }
                    var windowScrollTop = $(window).scrollTop();
                    var scrollPercent = (windowScrollTop - ofsetTop_element_scroll) / (docHeight);
                    var scrollPercentRounded = Math.round(scrollPercent*100);
                    if(scrollPercentRounded <= 0){
                        scrollPercentRounded = 0;
                    }else if(scrollPercentRounded >= 100) {
                        scrollPercentRounded = 100;
                        $('.scroll-count-percent').removeClass('active');
                    }
                    progress(scrollPercentRounded);
                    $(percentNumberText).html(scrollPercentRounded);
                    $(progressValueMobile).css({'width': scrollPercentRounded + '%'});
                    lastWindowScrollTop = $(window).scrollTop();
                });
                $(window).resize(function () {
                    elemnt_scroll  = $('.element-scroll-percent');
                    if(elemnt_scroll.hasClass('post-content-100-percent')) {
                        var theContentPercent = elemnt_scroll.find('.single-context');
                        theContentPercent.each( function() {
                            var theJourney = $(window).scrollTop() - $(this).offset().top;
                            if((theJourney > 0) && (theJourney <= $(this).height())) {
                                ofsetTop_element_scroll = $(this).offset().top;
                                ofsetBottom_element_scroll = ofsetTop_element_scroll + $(this).height();
                                docHeight = $(this).height();
                                return false;
                            }
                        });
                    }else {
                        elemnt_scroll.each( function() {
                            var theJourney = $(window).scrollTop() - $(this).offset().top;
                            if((theJourney > 0) && (theJourney <= $(this).height())) {
                                ofsetTop_element_scroll = $(this).offset().top;
                                ofsetBottom_element_scroll = ofsetTop_element_scroll + $(this).height();
                                docHeight = $(this).height();
                                return false;
                            }
                        });

                    }

                    var windowScrollTop = $(window).scrollTop();
                    var winHeight = $(window).height();
                    var scrollPercent = (windowScrollTop - ofsetTop_element_scroll) / (docHeight);
                    var scrollPercentRounded = Math.round(scrollPercent*100);

                    if(scrollPercentRounded <= 0){
                        scrollPercentRounded = 0;
                    }else if(scrollPercentRounded > 100) {
                        scrollPercentRounded = 100;
                        $('.scroll-count-percent').removeClass('active');
                    }
                    progress(scrollPercentRounded);
                    $(percentNumberText).html(scrollPercentRounded);
                    $(progressValueMobile).css({'width': scrollPercentRounded + '%'});
                });
            }
            function progress(value) {
                var progress = value / 100;
                var dashoffset = CIRCUMFERENCE * (1 - progress);
                $(progressValue).css({'stroke-dashoffset': dashoffset });
            }
        },

        /* ============================================================================
         * atbs Search Button
         * ==========================================================================*/
        atbs_search_button: function() {
            $('.js-search-popup').on('click',function(){
                $('.atbs-keylin-search-full-style-2').toggleClass('is-open');
            });
            $('#atbs-keylin-search-remove').on('click',function(){
                $('.atbs-keylin-search-full-style-2').removeClass('is-open').removeClass("active");
                $('.search-form__input').val('');


                $('.atbs-keylin-search-full-style-2').removeClass("is-active");

                var $resultsContainer =  $('.atbs-keylin-search-full-style-2').find('.search-results');
                $resultsContainer.removeClass("is-active");
            });
        },

        /* ============================================================================
         * AJAX load more posts
         * ==========================================================================*/
        ajaxLoadPost: function() {
            var loadedPosts = '';
            var $ajaxLoadPost = $('.js-ajax-load-post');
            var $this;
            function ajaxLoad(parameters, $postContainer) {
                var atbsAjaxSecurity = ajax_buff['atbs_security']['atbs_security_code']['content'];
                var ajaxStatus = '',
                    ajaxCall = $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        dataType: 'html',
                        data: {
                            action: parameters.action,
                            args: parameters.args,
                            postOffset: parameters.postOffset,
                            type: parameters.type,
                            moduleInfo: parameters.moduleInfo,
                            the__lastPost: parameters.the__lastPost,
                            securityCheck: atbsAjaxSecurity
                            // other parameters
                        },
                    });
                //console.log(parameters.action);
                ajaxCall.done(function(respond) {
                    loadedPosts = $.parseJSON(respond);
                    ajaxStatus = 'success';
                    if(loadedPosts == 'no-result') {
                        $postContainer.closest('.js-ajax-load-post').addClass('disable-click');
                        $postContainer.closest('.js-ajax-load-post').find('.js-ajax-load-post-trigger').addClass('hidden');
                        $postContainer.closest('.js-ajax-load-post').find('.atbs-no-more-button').removeClass('hidden');
                        return;
                    }
                    if (loadedPosts) {
                        var elToLoad = $(loadedPosts).hide().fadeIn('1500');
                        $postContainer.append(elToLoad);
                        var currentPostionScroll = $(window).scrollTop();
                        var masonryContainers = $('.js-masonry');
                        if($($postContainer).hasClass('js-masonry')) {
                            $($postContainer).imagesLoaded(function(){
                                $postContainer.masonry('destroy');
                                    if($(masonryContainers).width() > 510 ){
                                        if($(masonryContainers).hasClass('atbs-masonry-guiter-40')) {
                                            var masonryGutter = 40;
                                        }else {
                                            var masonryGutter = 30;
                                        }
                                    }else{
                                        var masonryGutter = 20;
                                        
                                    }
                                    if(($(masonryContainers).width() > 510) && ($(masonryContainers).width() < 546)){
                                        var masonryGutter = 20;
                                    }
                                $($postContainer).masonry({
                                    // options
                                    itemSelector: '.list-item',
                                    columnWidth: '.list-item',
                                    gutter: masonryGutter,
                                    percentPosition: true, // Work well with percent-width item
                                    horizontalOrder: true,
                                    transitionDuration: '0.3s',
                                    stagger: 25, // mili sec
                                });
                                window.scrollTo(0,currentPostionScroll);    
                            });
                        }        
                    }
                    $('html, body').animate({ scrollTop: $window.scrollTop() + 1 }, 0).animate({ scrollTop: $window.scrollTop() - 1 }, 0); // for recalculating of sticky sidebar
                    // do stuff like changing parameters
                });

                ajaxCall.fail(function() {
                    ajaxStatus = 'failed';
                });

                ajaxCall.always(function() {
                    $postContainer.closest('.js-ajax-load-post').removeClass('atbs_loading');
                });
            }

            $ajaxLoadPost.each(function() {
                $this = $(this);
                var $moduleID = $this.closest('.atbs-keylin-block').attr('id');
                var moduleName = $moduleID.split("-")[0];
                var $triggerBtn = $this.find('.js-ajax-load-post-trigger');
                var args = ajax_buff['query'][$moduleID]['args'];

                var $postContainer = $this.find('.posts-list');
                var moduleInfo = ajax_buff['query'][$moduleID]['moduleInfo'];

                $triggerBtn.on('click', function() {

                    $this = $(this).closest('.js-ajax-load-post');

                    if($this.hasClass('disable-click'))
                        return;

                    $this.addClass('atbs_loading');

                    var postOffset  = parseInt(args['offset']) + $this.find('article').length;

                    if($this.closest('.atbs-keylin-block').hasClass('atbs_latest_blog_posts')) {
                        var stickPostLength = args['post__not_in'].length;
                        postOffset = postOffset - stickPostLength;
                    }
                    var the__lastPost   = $this.find('article').length;

                    var parameters = {
                        action: moduleName,
                        args: args,
                        postOffset: postOffset,
                        type: 'loadmore',
                        moduleInfo: moduleInfo,
                        the__lastPost: the__lastPost,
                    };
                    //console.log(parameters);
                    ajaxLoad(parameters, $postContainer);
                });
            });
        },
        /* ============================================================================
        * Carousel funtions Custom
        * ==========================================================================*/
        carousel_textnav_1i0m: function() {
            var $carousels = $('.js-carousel-textnav-1i0m');
            $carousels.each( function() {
                var $this = $(this);
                $(this).owlCarousel({
                    items: 1,
                    margin: 0,
                    loop: true,
                    nav: true,
                    dots: true,
                    autoHeight: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', ''],
                    smartSpeed: 500,
                    onInitialized: OwlInitialized($(this)),
                });
                function OwlInitialized($this) {
                    var checkExist = setInterval(function() {
                        if ($this.find('.owl-next').length) {

                            var current = $($this).find('.owl-item.active').index();

                            var textnext = $($this).find(".owl-item").eq(current).next().find(".post__title a").text();

                            var htmlOutput = '<div class="slider-control"><div class="nextBtn limit-line-text limit-line-2">'+ textnext +'</div></div>';

                            htmlOutput += '<i class="mdicon mdicon-navigate_next"></i>';

                            var container = $this.find('.owl-next');

                            container.html(htmlOutput);

                            $($this).find('.owl-next').children().wrapAll( "<div class='owl-next--inner clearfix' />");

                            clearInterval(checkExist);
                        }
                    }, 100); // check every 100ms



                }
                $('.nextBtn').click(function(){
                    $(this).trigger('next.owl.carousel');
                });

                $(this).on('changed.owl.carousel', function(property) {
                    var current = property.item.index;
                    var textnext = $(this).find(".owl-item").eq(current).next().find(".post__title a").text();

                    var htmlOutput = '<div class="slider-control"><div class="nextBtn limit-line-text limit-line-2">'+textnext+'</div></div>';

                    htmlOutput += '<i class="mdicon mdicon-navigate_next"></i>';

                    var container = $(this).find('.owl-next');

                    container.html(htmlOutput);

                    container.children().wrapAll( "<div class='owl-next--inner clearfix' />");
                });
            });
        },
        carousel_3i20m_custom_1: function() {
            var $carousels = $('.js-carousel-3i20m-custom-1');
            $carousels.each( function() {
                $(this).owlCarousel({
                    margin: 20,
                    loop: true,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        481 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },
                    },
                });
            })
        },
        carousel_1i: function() {
            var $carousels = $('.js-carousel-1i');
            $carousels.each( function() {
                $(this).owlCarousel({
                    items: 1,
                    margin: 0,
                    loop: true,
                    nav: true,
                    dots: true,
                    autoHeight: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    smartSpeed: 500,
                });
            })
        },
        keylin_slider_wArrowImg: function () {
            var keylinArrows = ajax_buff['keylinArrows']['sliderArrows']['content'];
            var $carousels = $('.js-keylin-wArrowImg');
            $carousels.each( function() {
                $(this).owlCarousel({
                    items: 1,
                    margin: 0,
                    nav: true,
                    loop: true,
                    dots: false,
                     lazyLoad: true,
                    autoHeight: true,
                    navText: ['<img src="'+keylinArrows['light-prev']+'" alt="left" class="left-arrow ">', '<img src="'+keylinArrows['light-next']+'" alt="left" class="left-arrow ">'],
                    smartSpeed: 500,
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 1,
                        },
                    },
                });
            })
        },
        carousel_center: function() {
            var $carousels = $('.js-carousel-center');
            $carousels.each( function() {
                $(this).owlCarousel({
                    items: 2,
                    margin: 4,
                    loop: true,
                    nav: true,
                    center: true,
                    dots: false,
                    autoHeight: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    smartSpeed: 500,
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },
                    },
                });
            })
        },

        carousel_1i30m: function() {
            var $carousels = $('.js-carousel-1i30m');
            $carousels.each( function() {
                $(this).owlCarousel({
                    items: 1,
                    margin: 30,
                    loop: true,
                    nav: true,
                    dots: true,
                    autoHeight: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    smartSpeed: 500,
                });
            })
        },
        carousel_2i4m: function() {
            var $carousels = $('.js-carousel-2i4m');
            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    items: 2,
                    margin: 4,
                    loop: carousel_loop,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },
                    },
                });
            })
        },

        carousel_3i: function() {
            var $carousels = $('.js-carousel-3i');
            $carousels.each( function() {
                $(this).owlCarousel({
                    loop: true,
                    nav: true,
                    dots: false,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },
                    },
                });
            })
        },

        carousel_3i4m: function() {
            var $carousels = $('.js-carousel-3i4m');
            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    margin: 4,
                    loop: carousel_loop,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },
                    },
                });
            })
        },

        carousel_3i4m_center: function() {
            var $carousels = $('.js-carousel-3i4m-center');
            $carousels.each( function() {
                $(this).owlCarousel({
                    items: 2,
                    margin: 4,
                    loop: true,
                    center: true,
                    autoHeight: true,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },
                        576 : {
                            items: 2,
                        }
                    }
                });
            })
        },

        carousel_3i4m_small: function() {
            var $carousels = $('.js-carousel-3i4m-small');
            $carousels.each( function() {
                $(this).owlCarousel({
                    margin: 4,
                    loop: false,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    autoHeight: true,
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },

                        1200 : {
                            items: 3,
                        },
                    },
                });
            })
        },

        carousel_2i20m: function() {
            var $carousels = $('.js-carousel-2i20m');
            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    margin: 20,
                    loop: carousel_loop,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },
                    },
                });
            })
        },

        carousel_3i20m: function() {
            var $carousels = $('.js-carousel-3i20m');
            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    margin: 20,
                    loop: carousel_loop,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },
                    },
                });
            })
        },

        carousel_headingAside_3i: function() {
            var $carousels = $('.js-atbs-keylin-carousel-heading-aside-3i');
            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    margin: 20,
                    nav: false,
                    dots: false,
                    loop: carousel_loop,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                            margin: 10,
                            stagePadding: 40,
                            loop: false,
                        },

                        768 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },
                    },
                });
            })
        },

        customCarouselNav: function() {
            if ( $.isFunction($.fn.owlCarousel) ) {
                var $carouselNexts = $('.js-carousel-next');
                $carouselNexts.each( function() {
                    var carouselNext = $(this);
                    var carouselID = carouselNext.parent('.atbs-keylin-carousel-nav-custom-holder').attr('data-carouselID');
                    var $carousel = $('#' + carouselID);

                    carouselNext.on('click', function() {
                        $carousel.trigger('next.owl.carousel');
                    });
                });

                var $carouselPrevs = $('.js-carousel-prev');
                $carouselPrevs.each( function() {
                    var carouselPrev = $(this);
                    var carouselID = carouselPrev.parent('.atbs-keylin-carousel-nav-custom-holder').attr('data-carouselID');
                    var $carousel = $('#' + carouselID);

                    carouselPrev.on('click', function() {
                        $carousel.trigger('prev.owl.carousel');
                    });
                });
            }
        },

        carousel_4i: function() {
            var $carousels = $('.js-carousel-4i');

            $carousels.each( function() {
                $(this).owlCarousel({
                    loop: true,
                    nav: true,
                    dots: false,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },

                        992 : {
                            items: 4,
                        },
                    },
                });
            })
        },

        carousel_4i4m: function() {
            var $carousels = $('.js-carousel-4i4m');
            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    margin: 4,
                    nav: true,
                    dots: true,
                    loop: carousel_loop,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        576 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },

                        1200 : {
                            items: 4,
                        }
                    }
                });
            })
        },

        carousel_4i20m: function() {
            var $carousels = $('.js-carousel-4i20m');

            $carousels.each( function() {
                var carousel_loop = $(this).data('carousel-loop');
                $(this).owlCarousel({
                    items: 4,
                    margin: 20,
                    loop: carousel_loop,
                    nav: true,
                    dots: true,
                    navText: ['<i class="mdicon mdicon-navigate_before"></i>', '<i class="mdicon mdicon-navigate_next"></i>'],
                    responsive: {
                        0 : {
                            items: 1,
                        },

                        768 : {
                            items: 2,
                        },

                        992 : {
                            items: 3,
                        },

                        1199 : {
                            items: 4,
                        },
                    },
                });
            })
        },

        /* ============================================================================
         * Countdown timer
         * ==========================================================================*/
        countdown: function() {
            if ( $.isFunction($.fn.countdown) ) {
                var $countdown = $('.js-countdown');

                $countdown.each(function() {
                    var $this = $(this);
                    var finalDate = $this.data('countdown');

                    $this.countdown(finalDate, function(event) {
                        $(this).html(event.strftime(''
                        + '<div class="countdown__section"><span class="countdown__digit">%-D</span><span class="countdown__text meta-font">day%!D</span></div>'
                        + '<div class="countdown__section"><span class="countdown__digit">%H</span><span class="countdown__text meta-font">hr</span></div>'
                        + '<div class="countdown__section"><span class="countdown__digit">%M</span><span class="countdown__text meta-font">min</span></div>'
                        + '<div class="countdown__section"><span class="countdown__digit">%S</span><span class="countdown__text meta-font">sec</span></div>'));
                    });
                });
            };
        },

        /* ============================================================================
         * Scroll top
         * ==========================================================================*/
        goToTop: function() {
            if ($goToTopEl.length) {
                $goToTopEl.on('click', function() {
                    $('html,body').stop(true).animate({scrollTop:0},400);
                    return false;
                });
            }
        },

        /* ============================================================================
         * Lightbox
         * ==========================================================================*/
        lightBox: function() {
            if ( $.isFunction($.fn.magnificPopup) ) {
                var $galleryLightbox = $('.js-atbs-keylin-lightbox-gallery');
                $galleryLightbox.each(function() {
                    $(this).magnificPopup({
                        delegate: '.gallery-icon > a',
                        type: 'image',
                        gallery:{
                            enabled: true,
                        },
                        mainClass: 'mfp-zoom-in',
                        removalDelay: 80,
                    });
                });
            }
        },

        /* ============================================================================
         * Custom scrollbar
         * ==========================================================================*/
        perfectScrollbarInit: function() {
            if ( $.isFunction($.fn.perfectScrollbar) ) {
                var $area = $('.js-perfect-scrollbar');

                $area.perfectScrollbar({
                    wheelPropagation: true,
                    swipeEasing: true,
                });
            }
        },

        /* ============================================================================
         * Sticky sidebar
         * ==========================================================================*/
        stickySidebar: function() {
            setTimeout(function() {
                var $stickySidebar = $('.js-sticky-sidebar');
                var $stickyHeader = $('.js-sticky-header');

                var marginTop = ($stickyHeader.length) ? ($stickyHeader.outerHeight() + 20) : 0; // check if there's sticky header

                if ( $( document.body ).hasClass( 'admin-bar' ) ) // check if admin bar is shown.
                    marginTop += 32;

                if ( $.isFunction($.fn.theiaStickySidebar) ) {
                    $stickySidebar.theiaStickySidebar({
                        additionalMarginTop: marginTop,
                        additionalMarginBottom: 20,
                    });
                }
            }, 250); // wait a bit for precise height;
            var $stickySidebarMobileFixed = $('.js-sticky-sidebar.atbs-keylin-sub-col--mobile-fixed');
            $stickySidebarMobileFixed.each(function () {
                var $this = $(this);
                var $drop_sub_col = $($this).find('.drop-sub-col');
                var $open_sub_col = $($this).find('.open-sub-col');
                setTimeout(function () {
                    $($this).append('<div class="drop-sub-col"></div>');
                    // <i class="mdicon mdicon-arrow_forward"></i>
                    $($this).append('<div class="open-sub-col">What news <i class="mdicon mdicon-arrow_forward"></i></div>');

                    var checkExist = setInterval(function() {
                        if($drop_sub_col && $open_sub_col){
                            $drop_sub_col = $($this).find('.drop-sub-col');
                            $open_sub_col = $($this).find('.open-sub-col');
                            $drop_sub_col.on('click',function () {
                                $($this).removeClass('active');
                            });
                            $open_sub_col.on('click',function () {
                                $($this).addClass('active');
                            });
                            clearInterval(checkExist);
                        }
                    }, 100); // check every 100ms

                },250);
            });
        },

        /* ============================================================================
         * Bootstrap tooltip
         * ==========================================================================*/
        tooltipInit: function() {
            var $element = $('[data-toggle="tooltip"]');

            $element.tooltip();
        },
    };

    MINIMALDOG.documentOnLoad = {

        init: function() {
            MINIMALDOG.clippedBackground();
            MINIMALDOG.header.smartAffix.compute(); //recompute when all the page + logos are loaded
            MINIMALDOG.header.smartAffix.updateState(); // update state
            MINIMALDOG.header.stickyNavbarPadding(); // fix bootstrap modal backdrop causes sticky navbar to shift
            MINIMALDOG.documentOnReady.stickySidebar();
        }

    };

    /* ============================================================================
     * Blur background mask
     * ==========================================================================*/
    MINIMALDOG.clippedBackground = function() {

        if ($overlayBg.length) {

            $overlayBg.each(function() {

                var $mainArea = $(this).find('.js-overlay-bg-main-area');
                if (!$mainArea.length) {
                    $mainArea = $(this);
                }

                var $subArea = $(this).find('.js-overlay-bg-sub-area');
                var $subBg = $(this).find('.js-overlay-bg-sub');
                if(!$subArea.length){
                    return;
                }
                if(!$subBg.length){
                    return;
                }
                var leftOffset = $mainArea.offset().left - $subArea.offset().left;
                var topOffset = $mainArea.offset().top - $subArea.offset().top;

                $subBg.css('display', 'block');
                $subBg.css('position', 'absolute');
                $subBg.css('width', $mainArea.outerWidth() + 'px');
                $subBg.css('height', $mainArea.outerHeight() + 'px');
                $subBg.css('left', leftOffset + 'px');
                $subBg.css('top', topOffset + 'px');
            });
        };
    }

    /* ============================================================================
     * Priority+ menu
     * ==========================================================================*/
    MINIMALDOG.priorityNav = function($menu) {
        var $btn = $menu.find('button');
        var $menuWrap = $menu.find('.navigation');
        var $menuItem = $menuWrap.children('li');
        var hasMore = false;
        var onLoadTry = 1;

        if(!$menuWrap.length) {
            return;
        }

        function calcWidth() {
            if ($menuWrap[0].getBoundingClientRect().width === 0)
                return;

            var navWidth = 0;

            $menuItem = $menuWrap.children('li');
            $menuItem.each(function() {
                navWidth += $(this)[0].getBoundingClientRect().width;
            });

            if (hasMore) {
                var $more = $menu.find('.priority-nav__more');
                var moreWidth = $more[0].getBoundingClientRect().width;
                var availableSpace = $menu[0].getBoundingClientRect().width;

                //Remove the padding width (assumming padding are px values)
                availableSpace -= (parseInt($menu.css("padding-left"), 10) + parseInt($menu.css("padding-right"), 10));
                //Remove the border width
                availableSpace -= ($menu.outerWidth(false) - $menu.innerWidth());

                if (navWidth > availableSpace) {
                    var $menuItems = $menuWrap.children('li:not(.priority-nav__more)');
                    var itemsToHideCount = 1;

                    $($menuItems.get().reverse()).each(function(index){
                        navWidth -= $(this)[0].getBoundingClientRect().width;
                        if (navWidth > availableSpace) {
                            itemsToHideCount++;
                        } else {
                            return false;
                        }
                    });

                    var $itemsToHide = $menuWrap.children('li:not(.priority-nav__more)').slice(-itemsToHideCount);

                    $itemsToHide.each(function(index){
                        $(this).attr('data-width', $(this)[0].getBoundingClientRect().width);
                    });

                    $itemsToHide.prependTo($more.children('ul'));
                } else {
                    var $moreItems = $more.children('ul').children('li');
                    var itemsToShowCount = 0;

                    if ($moreItems.length === 1) { // if there's only 1 item in "More" dropdown
                        if (availableSpace >= (navWidth - moreWidth + $moreItems.first().data('width'))) {
                            itemsToShowCount = 1;
                        }
                    } else {
                        $moreItems.each(function(index){
                            navWidth += $(this).data('width');
                            if (navWidth <= availableSpace) {
                                itemsToShowCount++;
                            } else {
                                return false;
                            }
                        });
                    }

                    if (itemsToShowCount > 0) {
                        var $itemsToShow = $moreItems.slice(0, itemsToShowCount);

                        $itemsToShow.insertBefore($menuWrap.children('.priority-nav__more'));
                        $moreItems = $more.children('ul').children('li');

                        if ($moreItems.length <= 0) {
                            $more.remove();
                            hasMore = false;
                        }
                    }
                }
            } else {
                var $more = $('<li class="priority-nav__more"><a href="#"><span>More</span><i class="mdicon mdicon-more_vert"></i></a><ul class="sub-menu"></ul></li>');
                var availableSpace = $menu[0].getBoundingClientRect().width;

                //Remove the padding width (assumming padding are px values)
                availableSpace -= (parseInt($menu.css("padding-left"), 10) + parseInt($menu.css("padding-right"), 10));
                //Remove the border width
                availableSpace -= ($menu.outerWidth(false) - $menu.innerWidth());

                if (navWidth > availableSpace) {
                    var $menuItems = $menuWrap.children('li');
                    var itemsToHideCount = 1;

                    $($menuItems.get().reverse()).each(function(index){
                        navWidth -= $(this)[0].getBoundingClientRect().width;
                        if (navWidth > availableSpace) {
                            itemsToHideCount++;
                        } else {
                            return false;
                        }
                    });

                    var $itemsToHide = $menuWrap.children('li:not(.priority-nav__more)').slice(-itemsToHideCount);

                    $itemsToHide.each(function(index){
                        $(this).attr('data-width', $(this)[0].getBoundingClientRect().width);
                    });

                    $itemsToHide.prependTo($more.children('ul'));
                    $more.appendTo($menuWrap);
                    hasMore = true;
                    if(onLoadTry) {
                        calcWidth();
                        onLoadTry--;
                    }
                }
            }
        }

        $window.on('load webfontLoaded', calcWidth );
        $window.on('resize', $.throttle( 50, calcWidth ));
    }

    $document.ready( MINIMALDOG.documentOnReady.init );
    $window.on('load', MINIMALDOG.documentOnLoad.init );
    $window.on( 'resize', MINIMALDOG.documentOnResize.init );

})(jQuery);
