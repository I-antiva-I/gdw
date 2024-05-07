/* ========= INFORMATION ============================
 
  - document:  Wow Herd Effects Pro
	- author:    Wow-Company
	- version:   2.3
	- email:     yoda@wow-company.com
	- url:       https://wow-estore.com/item/wow-herd-effects-pro/
 
 ==================================================== */

!function($) {
	$.fn.Notification = function(options) {
		var settings = $.extend({
			Variable1: ['Emma', 'Noah', 'Olivia', 'Liam', 'Ava', 'William'],
			Variable2: ['Bangkok', 'London', 'Paris', 'Dubai', 'New York', 'Singapore'],
			Amount: [100, 2500],
			Content: '[varible1] from [varible2] has just placed an order for $[amount].',
			Show: ['stable', 5, 25],
			Close: 5,
			Time: [0, 23],
			AnimationEffectOpen: 'fadeIn',
			AnimationEffectClose: 'fadeOut',
			Number: 3,
			Link: [false, 'https://wow-estore.com/item/wow-herd-effects-pro/', '_blank'],
			CloseButton: false,
		}, options);
		return this.each(function() {
			var self = this;
			var id = self.id;
			var number = 0;
			var nclose = 0;
			var fcookie = get_cookie('FakeNotClick');
			var currenttime = new Date();
			var currenthours = currenttime.getHours();
			if (settings.Time[0] <= currenthours && currenthours <= settings.Time[1] && fcookie == null) {
				openNotification();
			}
			$(self).click(function() {
				if (settings.Link[0] == true && settings.Link[3] == true) {
					document.cookie = 'FakeNotClick=yes; path=/;';
				}
			});
			$('#' + id + ' .notification-close').click(function() {
				document.cookie = 'FakeNotClick=yes; path=/;';
				closeNotificationNow();
			});
			styleNotification();

			function styleNotification() {
				$(self).addClass('wow-animated');
				if (settings.Link[0] == true) {
					$(self).
							attr('onclick', 'window.open(\'' + settings.Link[1] + '\',\'' + settings.Link[2] + '\');');
					$(self).css({
						'cursor': 'pointer',
					});
				}
				if (settings.CloseButton == true) {
					$(self).find('.notification-close').css({
						'display': 'block',
					});
				}
			};

			function openNotification() {
				if (settings.Show[0] == 'stable') {
					var open = settings.Show[1] * 1000;
				} else {
					var open = (Math.floor(Math.random() * (settings.Show[2] - settings.Show[1])) + settings.Show[1]) * 1000;
				}
				setTimeout(function() {
					removeEffectClassClose();
					$(self).show();
					addEffectClassOpen();
					var rand_heard_name = Math.floor(Math.random() * settings.Variable1.length);
					var rand_heard_city = Math.floor(Math.random() * settings.Variable2.length);
					var rand_heard_product = Math.floor(Math.random() * settings.Variable3.length);
					var rand_variable4 = Math.floor(Math.random() * settings.Variable4.length);
					var rand_variable5 = Math.floor(Math.random() * settings.Variable5.length);
					var rand_heard_number = Math.floor(Math.random() * (settings.Amount[0] - settings.Amount[1])) +
							settings.Amount[1];
					if (settings.Content.indexOf('[varible1]') + 1) {
						var content = settings.Content.replace('[varible1]', settings.Variable1[rand_heard_name]);
					} else {
						var content = settings.Content.replace('[variable1]', settings.Variable1[rand_heard_name]);
					}
					if (content.indexOf('[varible2]') + 1) {
						var content = content.replace('[varible2]', settings.Variable2[rand_heard_city]);
					} else {
						var content = content.replace('[variable2]', settings.Variable2[rand_heard_city]);
					}
					if (content.indexOf('[variable3]') + 1) {
						var content = content.replace('[variable3]', settings.Variable3[rand_heard_product]);
					} else {
						var content = content.replace('[variable3]', settings.Variable3[rand_heard_product]);
					}
					if (content.indexOf('[variable4]') + 1) {
						var content = content.replace('[variable4]', settings.Variable4[rand_variable4]);
					} else {
						var content = content.replace('[variable4]', settings.Variable4[rand_variable4]);
					}
					if (content.indexOf('[variable5]') + 1) {
						var content = content.replace('[variable5]', settings.Variable5[rand_variable5]);
					} else {
						var content = content.replace('[variable5]', settings.Variable5[rand_variable5]);
					}
					var content = content.replace('[amount]', rand_heard_number);
					$(self).find('.notification-text').html(content);
					number++;
					closeNotification();
				}, open);
			}

			function closeNotification() {
				var close = settings.Close * 1000;
				setTimeout(function() {
					removeEffectClassOpen();
					addEffectClassClose();
					if (number < settings.Number && nclose == 0) {
						openNotification();
					}
				}, close);
			}

			function closeNotificationNow() {
				removeEffectClassOpen();
				addEffectClassClose();
				nclose++;
			}

			function addEffectClassOpen() {
				$(self).addClass(settings.AnimationEffectOpen);
			}

			function removeEffectClassOpen() {
				$(self).removeClass(settings.AnimationEffectOpen);
			}

			function addEffectClassClose() {
				$(self).addClass(settings.AnimationEffectClose);
			}

			function removeEffectClassClose() {
				$(self).removeClass(settings.AnimationEffectClose);
			}

			function get_cookie(cookie_name) {
				var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

				if (results) return (unescape(results[2])); else return null;
			}
		});
	};
}(jQuery);