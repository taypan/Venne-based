/**
 * Venne:CMS (version 2.0-dev released on $WCDATE$)
 *
 * Copyright (c) 2011 Josef Kříž pepakriz@gmail.com
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

jQuery.extend({
	venne: {
		getBasePath: function(){
			return $("body").attr("data-venne-basepath");
		}
	}
});

$(function() {
	$.fn.extend({
		triggerAndReturn: function (name, data) {
			var event = new $.Event(name);
			this.trigger(event, data);
			return event.result !== false;
		}
	});
	
	$("a.ajax").live("click", function (event) {
		event.preventDefault();
		$.get(this.href);
	});
	
	$("form.ajax").live("submit", function () {
		$(this).ajaxSubmit();
		return false;
	});

	// odeslání pomocí tlačítek
	$("form.ajax :submit").live("click", function () {
		$(this).ajaxSubmit();
		return false;
	});

	$('a[data-confirm], button[data-confirm], input[data-confirm]').live('click', function (e) {
		var el = $(this);
		if (el.triggerAndReturn('confirm')) {
			if (!confirm(el.attr('data-confirm'))) {
				e.preventDefault();
				e.stopImmediatePropagation();
				return false;
			}
		}
	});
});


