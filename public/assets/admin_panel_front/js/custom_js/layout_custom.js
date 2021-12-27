$(document).ready( function () {
    'use strict';

    $('.toggle-right').on('click', function () {

        if (!$('body').hasClass('sidebar-right-opened')) {
            $('#right').css('right', '-250px');
        } else {
            var window_w = $( window ).width();
            var body_w = $( 'body').width();
            var margin_right = (window_w - body_w)/2;
            $('#right').css('right', margin_right);
        }
        $( window ).resize(function() {
            if ($('body').hasClass('sidebar-right-opened')) {
                var window_w = $( window ).width();
                var body_w = $( 'body').width();
                var margin_right = (window_w - body_w)/2;
                $('#right').css('right', margin_right);
            }
        });
    });
});