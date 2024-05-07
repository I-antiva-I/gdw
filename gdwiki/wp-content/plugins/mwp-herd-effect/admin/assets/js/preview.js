/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     d@dayes.dev
==================================================== */

'use strict';

(function ($) {

    let content = jQuery('#herd_text').val();
    $('.notification-text').html(content);

    $('#postoptions').on('change', function () {
        builder();
    });

    $('#postoptions').on('keyup', function () {
        builder();
    });

    $(".wp-color-picker-field").wpColorPicker(
        'option',
        'change',
        function (event, ui) {
            builder();
        }
    );

    builder();

    function builder() {

        // location
        $('.notification').removeAttr('style');
        if ($('#include_herd_top').is(':checked')) {
            let unit = $('#herd_top_unit').val();
            let offset = $('#herd_top').val();
            $('.notification').css("top", offset + unit);
        }
        if ($('#include_herd_bottom').is(':checked')) {
            let unit = $('#herd_bottom_unit').val();
            let offset = $('#herd_bottom').val();
            $('.notification').css("bottom", offset + unit);
        }
        if ($('#include_herd_left').is(':checked')) {
            let unit = $('#herd_left_unit').val();
            let offset = $('#herd_left').val();
            $('.notification').css("left", offset + unit);
        }
        if ($('#include_herd_right').is(':checked')) {
            let unit = $('#herd_right_unit').val();
            let offset = $('#herd_right').val();
            $('.notification').css("right", offset + unit);
        }

        // Title
        let title = $('#herd_title').val();
        let title_size = $('#title_size').val() + 'px';
        let title_line_height = $('#title_line_height').val() + 'px';
        let title_font = $('#title_font').val();
        let title_font_weight = $('#title_font_weight').val();
        let title_font_style = $('#title_font_style').val();
        let title_align = $('#title_align').val();
        $('.notification-title')
            .text(title)
            .css({
                'font-size': title_size,
                'line-height': title_line_height,
                'font-family': title_font,
                'font-weight': title_font_weight,
                'font-style': title_font_style,
                'text-align': title_align,
            });

        // Content
        let content_size = $('#content_size').val() + 'px';
        let content_font = $('#content_font').val();
        let content_line_height = $('#content_line_height').val() + 'px';

        $('.notification-text, .notification-text p').css({
            'line-height': content_line_height,
            'font-family': content_font,
            'font-size': content_size,
        });

        let icon_size = $('#icon_size').val() + 'px';
        let iconType = $('#image_type').val();
        let icon;
        if (iconType === 'icon') {
            icon = '<span class="' + $('#menu_icon').val() + '"></span>';
        } else {
            let link = $('#herd_custom_link').val();
            icon = '<img src="' + link + '">';
        }

        $('.notification-img').html(icon).css({
            'font-size': icon_size,
        });

        // Close Button
        $('.notification-close').removeAttr('style');
        if ($('#show_close').is(':checked')) {
            $('.notification-close').css("display", 'block');
        }
        let close_size = $('#close_size').val();
        $('.notification-close').css({
            'font-size': close_size + 'px',
        });

        let builder_height = $('#notification').outerHeight() + 20;
        $('.live-builder').css({
            'height': builder_height + 'px',
        });
    }

    $('#herd_text').on('keydown', function () {
        let content = $('#herd_text').val();
        $('.notification-text').html(content);
    });

    window.onload = function () {
        if (typeof window.parent.tinymce !== 'undefined') {
            tinymce.get('herd_text').on('keydown', function (e) {
                let content = this.getContent();
                $('.notification-text').html(content);
            });
            tinymce.get('herd_text').on('change', function (e) {
                let content = this.getContent();
                $('.notification-text').html(content);
            });
        }
    }

})(jQuery);




