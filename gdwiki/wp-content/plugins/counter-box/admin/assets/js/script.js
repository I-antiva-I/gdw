/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     d@dayes.dev
==================================================== */

'use strick';

(function ($) {

    //region Send Form
    $('#wow-plugin').on('submit', function (event) {
        event.preventDefault();
        getTinymceContent();
        let dataform = $(this).serialize();
        let prefix = $('#prefix').val();
        let data = 'action=' + prefix + '_item_save&' + dataform;
        $('#submit').addClass('is-loading');
        setTimeout(function () {
            $.post(ajaxurl, data, function (response) {
                if (response.status == 'OK') {
                    $('#wow-message')
                        .addClass('notice notice-success is-dismissible')
                        .html('<p>' + response.message + '</p>');
                    $('#add_action').val(2);
                    let tool_id = $('#tool_id').val();
                    $('.nav-tab.nav-tab-active').text('Update #' + tool_id);
                }
                $('#submit').removeClass('is-loading');
            });
        }, 500);
    });
    //endregion

    //region Tabs
    $('#tab li').on('click', function () {
        let tab = $(this).data('tab');
        $('#tab li').removeClass('is-active');
        $(this).addClass('is-active');
        $('#tab-content .tab-content').removeClass('is-active');
        $('[data-content="' + tab + '"]').addClass('is-active');
    });
    //endregion

    // Install the Icon Color
    $('.wp-color-picker-field').not('#clone .wp-color-picker-field').wpColorPicker();

    $('.toggle-preview').on('click', function () {
        $('.live-builder, .toggle-preview .plus, .toggle-preview .minus').toggleClass('is-hidden');
    });

    //region Accordion
    $('.accordion-title').on('click', function () {
        $('.accordion-title').removeClass('active');
        $('.accordion-content').slideUp('normal');
        if ($(this).next().is(':hidden') == true) {
            $(this).addClass('active');
            $(this).next().slideDown('normal');
        }
    });
    $('.accordion-content').hide();
    //endregion

    //region Share pluign
    $('[data-share]').on('click', function (event) {
        event.preventDefault();
        let network = $(this).data('share');
        let url = $('#wp-url').val();
        let title = $('#wp-title').val();

        let shareUrl;

        switch (network) {
            case 'facebook':
                shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
                break;
            case 'vk':
                shareUrl = 'http://vk.com/share.php?url=' + url;
                break;
            case 'twitter':
                shareUrl = 'https://twitter.com/share?url=' + url + '&text=' + title;
                break;
            case 'linkedin':
                shareUrl = 'https://www.linkedin.com/shareArticle?url=' + url + '&title=' + title;
                break;
            case 'pinterest':
                shareUrl = 'https://pinterest.com/pin/create/button/?url=' + url;
                break;
            case 'xing':
                shareUrl = 'https://www.xing.com/spi/shares/new?url=' + url;
                break;
            case 'reddit':
                shareUrl = 'http://www.reddit.com/submit?url=' + url + '&title=' + title;
                break;
            case 'blogger':
                shareUrl = 'https://www.blogger.com/blog-this.g?u=' + url + '&n=' + title;
                break;
            case 'telegram':
                shareUrl = 'https://telegram.me/share/url?url=' + url + '&text=' + title;
                break;


            default:
                shareUrl = '';
        }

        let popupWidth = 550;
        let popupHeight = 450;
        let topPosition = (screen.height - popupHeight) / 2;
        let leftPosition = (screen.width - popupWidth) / 2;
        let popup = 'width=' + popupWidth + ', height=' + popupHeight + ', top=' + topPosition + ', left=' + leftPosition +
            ', scrollbars=0, resizable=1, menubar=0, toolbar=0, status=0';

        window.open(shareUrl, null, popup);



    });
    //endregion

    $('.checkLabel')
        .each(function () {
            checkLabel(this);
        })
        .on('click', function () {
            checkLabel(this);
        });

    $('#counterType').on('change', counterType);

    $('#showMessage').on('click', showMessage);

    counterType();
    showMessage();

    setDate();
    userRole();
    showChange();

    function counterType() {
        let select = $('#counterType').val();
        $('.box-countdown, .box-timer, .box-counter, .box-date, .box-weekday').addClass('is-hidden');

        switch (select) {
            case 'CountToDate':
                $('.box-countdown, .box-date').removeClass('is-hidden');
                break;
            case 'ContFromDate':
                $('.box-countdown, .box-date').removeClass('is-hidden');
                break;
            case 'CountToWeekday':
                $('.box-countdown, .box-weekday').removeClass('is-hidden');
                break;
            case 'Timer':
                $('.box-timer').removeClass('is-hidden');
                break;
            case 'UserTimer':
                $('.box-timer').removeClass('is-hidden');
                break;
            case 'TimerStopGo':
                $('.box-timer').removeClass('is-hidden');
                break;
            case 'Counter':
                $('.box-counter').removeClass('is-hidden');
                break;
        }


    }

    function showMessage() {
        if (jQuery('#showMessage').prop('checked')) {
            jQuery('.target-message').removeClass('is-hidden');
        } else {
            jQuery('.target-message').addClass('is-hidden');
        }
    }

    changeWidth();
    $('#widthUnit').on('click',changeWidth);

    function changeWidth() {
        let unit = $('#widthUnit').val().toString();
        if(unit === 'auto') {
            $('#width').attr('disabled', 'disabled');
        } else {
            $('#width').removeAttr('disabled');
        }
    }

    changeHeight();
    $('#heightUnit').on('click',changeHeight);

    function changeHeight() {
        let unit = $('#heightUnit').val().toString();
        if(unit === 'auto') {
            $('#height').attr('disabled', 'disabled');
        } else {
            $('#height').removeAttr('disabled');
        }
    }

})(jQuery);



function checkLabel(that) {
    if (jQuery(that).prop('checked')) {
        jQuery(that).parent().siblings('.field').removeClass('is-hidden');
    } else {
        jQuery(that).parent().siblings('.field').addClass('is-hidden');
    }
}

function setDate() {
    if (jQuery('#set_dates').prop('checked')) {
        jQuery('.date-set').removeClass('is-hidden');
    } else {
        jQuery('.date-set').addClass('is-hidden');
    }
}

function userRole() {
    let user = jQuery('#item_user').val();
    if (user === '2') {
        jQuery('.user-role').removeClass('is-hidden');
    } else {
        jQuery('.user-role').addClass('is-hidden');
    }
}

function showChange() {
    let show = jQuery('#show').val();
    if (show === 'posts' || show === 'pages' || show === 'expost' || show === 'expage' || show === 'taxonomy' || show === 'postsincat') {
        jQuery('.id-post').removeClass('is-hidden');
        jQuery('.shortcode').addClass('is-hidden');
    } else if (show === 'shortecode') {
        jQuery('.shortcode').removeClass('is-hidden');
        jQuery('.id-post').addClass('is-hidden');
    } else {
        jQuery('.shortcode').addClass('is-hidden');
        jQuery('.id-post').addClass('is-hidden');
    }
    if (show === 'taxonomy') {
        jQuery('.taxonomy').removeClass('is-hidden');
    } else {
        jQuery('.taxonomy').addClass('is-hidden');
    }
}

function getTinymceContent() {
    if (jQuery("#wp-counterBoxContent-wrap").hasClass("tmce-active")) {
        // let main_content = tinymce.get("#counterBoxContent").getContent();
        let main_content = tinyMCE.get('counterBoxContent').getContent();
        jQuery('#counterBoxContent').val(main_content);
    }
    if (jQuery("#wp-counterMessage-wrap").hasClass("tmce-active")) {
        let message_content = tinymce.get("counterMessage").getContent();
        // let message_content = tinyMCE.getContent('counterMessage');
        jQuery('#counterMessage').val(message_content);
    }




}

