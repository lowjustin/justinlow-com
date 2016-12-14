// $.fn.exists = function(callback) {
// 	var args = [].slice.call(arguments, 1);

// 	if (this.length) {
// 		callback.call(this, args);
// 	}

// 	return this;
// };

// justinlow = {
// 	init: function() {
// 		justinlow.menu.init();
// 	},
// 	menu: {
// 		body: $('body'),
// 		page: $('#wrapper'),
// 		menu: $('#nav__wrapper'),
// 		toggle: $('.nav__main--toggle'),
// 		shield: $('.shield'),
// 		isOpen: false,

// 		open: function() {
// 			justinlow.menu.body.attr('data-state', 'inactive');
// 			justinlow.menu.page.attr('data-state', 'closed');
// 			justinlow.menu.menu.attr('data-state', 'open');
// 			justinlow.menu.toggle.attr('data-state', 'active');
// 			justinlow.menu.shield.attr('data-state', 'active');
// 			justinlow.menu.isOpen = true;
// 		},
// 		close: function() {
// 			justinlow.menu.body.attr('data-state', 'active');
// 			justinlow.menu.page.attr('data-state', 'open');
// 			justinlow.menu.menu.attr('data-state', 'closed');
// 			justinlow.menu.toggle.attr('data-state', 'inactive');
// 			justinlow.menu.shield.attr('data-state', 'inactive');
// 			justinlow.menu.isOpen = false;
// 		},
// 		initToggle: function() {
// 			justinlow.menu.toggle.on('click', function() {
// 				if (justinlow.menu.isOpen == false) {
// 					justinlow.menu.open();
// 				} else {
// 					justinlow.menu.close();
// 				}
// 			});
// 		},
// 		initShieldToggle: function() {
// 			justinlow.menu.shield.on('click', function() {
// 				justinlow.menu.close();
// 			});
// 		},
// 		init: function() {
// 			justinlow.menu.initToggle();
// 			justinlow.menu.initShieldToggle();
// 		},
// 		scrollToggle: function() {
// 			if (justinlow.menu.isOpen == true) {
// 				justinlow.menu.close();
// 			}
// 		}
// 	}
// }
$(document).ready(function() {
	// justinlow.menu.init();
	$("#content img").lazyload({
		effect : "fadeIn"
	});
});
// $(window).scroll(function(){
// 	facets.menu.scrollToggle();
// });