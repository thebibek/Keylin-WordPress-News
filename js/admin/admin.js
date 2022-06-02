/* -----------------------------------------------------------------------------
 * Page Template Meta-box
 * -------------------------------------------------------------------------- */
;(function( $, window, document, undefined ){
	"use strict";
	$( document ).ready( function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        //wrapTabOptions();

        $(function() {
            if ($('input[name=post_format]:checked', '#post-formats-select').val() == 'video') {
                $('#bk_post_ops .post-layout-options').find('.rwmb-image-select:last-child').show();
            }else {
                $('#bk_post_ops .post-layout-options').find('.rwmb-image-select:last-child').hide();
            }
            $('#post-formats-select input').on('change', function() {
                var value = $('input[name=post_format]:checked', '#post-formats-select').val();
                if (value == 'video'){
                    $('#bk_post_ops .post-layout-options').find('.rwmb-image-select:last-child').show();
                }else {
                    $('#bk_post_ops .post-layout-options').find('.rwmb-image-select:last-child').hide();
                }
            });
        });

        // Pagebuilder Tabs
	} );
})( jQuery, window , document );
/* -----------------------------------------------------------------------------
 * UUID
 * https://github.com/eburtsev/jquery-uuid/blob/master/jquery-uuid.js
 * -------------------------------------------------------------------------- */
;(function( $, window, document, undefined ){
	$.uuid = function() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
			return v.toString(16);
		});
	};
})( jQuery, window , document );
