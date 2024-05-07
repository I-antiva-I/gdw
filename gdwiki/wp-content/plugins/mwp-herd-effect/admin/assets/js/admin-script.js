/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     d@dayes.dev
==================================================== */

'use strick';

(function ($) {

    //region Send Form
    $('#wow-plugin').on('submit', function(event) {
        event.preventDefault();
        getTinymceContent();
        let dataform = $(this).serialize();
        let prefix = $('#prefix').val();
        let data = 'action=' + prefix + '_item_save&' + dataform;
        $('#submit').addClass('is-loading');
        setTimeout(function(){
        $.post(ajaxurl, data, function(response) {
            if (response.status == 'OK') {
                $('#wow-message').addClass('notice notice-success is-dismissible');
                $('#wow-message').html('<p>' + response.message + '</p>');
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

    // Install Icon picker
    $('.icons').not('#clone .icons').fontIconPicker({
        theme: 'fip-darkgrey', emptyIcon: false, allCategoryText: 'Show all',
    });

    // Install the Icon Color
    $('.wp-color-picker-field').not('#clone .wp-color-picker-field').wpColorPicker();

    $('.toggle-preview').on('click', function () {
        $( '.live-builder, .toggle-preview .plus, .toggle-preview .minus' ).toggleClass( 'is-hidden' );
    });

    //region Accordion
    $('.accordion-title').on('click',function () {
        $('.accordion-title').removeClass('active');
        $('.accordion-content').slideUp('normal');
        if ($(this).next().is(':hidden') == true) {
            $(this).addClass('active');
            $(this).next().slideDown('normal');
        }
    });
    $('.accordion-content').hide();
    //endregion

    //region Save item
    $(document).on('click', '.wow-plugin-message .notice-dismiss', function () {
        $.ajax({
            url: ajaxurl, data: {
                action: 'herd_effect_message',
            },
        });
    });
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

    $(document).on('click', '.wow-plugin-message .notice-dismiss', function() {
        $.ajax({
            url: ajaxurl, data: {
                action: 'herd_effect_message',
            },
        });
    });

    iconType();
    steps();
    setDate();
    userRole();
    showChange();

})(jQuery);

function iconType() {

    let iconType = jQuery('#image_type').val();

    if (iconType === 'icon') {
        jQuery('#iconTypeIcon').removeClass('is-hidden');
        jQuery('#iconTypeCustom').addClass('is-hidden');
    } else {
        jQuery('#iconTypeIcon').addClass('is-hidden');
        jQuery('#iconTypeCustom').removeClass('is-hidden');
    }
}

function steps() {
    let steps = jQuery('#sec_step').val();

    if (steps === 'stable') {
        jQuery('.stable').removeClass('is-hidden');
        jQuery('.random').addClass('is-hidden');
    } else {
        jQuery('.stable').addClass('is-hidden');
        jQuery('.random').removeClass('is-hidden');
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

function getTinymceContent(){
    if (jQuery("#wp-herd_text-wrap").hasClass("tmce-active")){
        let content = tinyMCE.activeEditor.getContent();
        jQuery('#herd_text').val(content);
    }
}