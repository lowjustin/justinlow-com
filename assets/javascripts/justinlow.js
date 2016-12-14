// JQuery function:
// selector.exists()
// Checks if an element is present		
$.fn.exists = function(callback) {
	var args = [].slice.call(arguments, 1);

	if (this.length) {
		callback.call(this, args);
	}

	return this;
};

$(document).ready(function() {
	$(".content img").lazyload({
		effect : "fadeIn"
	});

	$('.grid').isotope({
		itemSelector: '.grid-item',
		layoutMode: 'fitRows'
	});

	$('.grid').exists(function(){
		var itemReveal = Isotope.Item.prototype.reveal;
		Isotope.Item.prototype.reveal = function() {
			itemReveal.apply( this, arguments );
			$( this.element ).removeClass('isotope-hidden');
		};

		var itemHide = Isotope.Item.prototype.hide;
		Isotope.Item.prototype.hide = function() {
			itemHide.apply( this, arguments );
			$( this.element ).addClass('isotope-hidden');
		};

		var $grid = $(this).isotope({
			itemSelector: '.grid-item'
		});

		var filters = [];

		var filterButtonGroup = $('.filter-button-group');
		var filterButtonE = 'button';

		filterButtonGroup.on('click', filterButtonE, function() {
			var $this = $(this);
			if ($this.hasClass('isotope-disabled')) return false;
			var $filter = $this.attr('data-filter');
			if ($filter == "") {
				filters = [];
				filterButtonGroup.find(filterButtonE).removeClass('isotope-active');
			} else {
				if (filters.length > 0) {
					if ($.inArray($filter, filters) == -1) {
						filters.push($filter);
						$this.addClass('isotope-active');
					} else {
						filters.splice($.inArray($filter, filters), 1);
						$this.removeClass('isotope-active');
					}
				} else {
					filters.push($filter);
					$this.addClass('isotope-active');
				}
			}
			var filterValue = concatValues(filters);
			$grid.isotope({
				filter: filterValue
			});

			var $filterClasses = [];

			$('.grid .grid-item').not('.isotope-hidden').each(function(index){
				var $arr = $(this).attr('class').split(/\s+/);
				$arr.splice($.inArray('grid-item', $arr), 1);
				$filterClasses = $.merge($filterClasses, $arr);
			});
			$filterClasses = $.unique($filterClasses);

			filterButtonGroup.find(filterButtonE).each(function(index) {
				$(this).addClass('isotope-disabled');
				var hasArticles = $.inArray($(this).attr('data-filter').replace(".", ""), $filterClasses);
				if (hasArticles > -1 || $(this).attr('data-filter') == "") {
					$(this).removeClass('isotope-disabled');
				}
			});
		});

		function concatValues(obj) {
			var value = '';
			for (var prop in obj) {
				value += obj[prop];
			}
			return value;
		}
	});
});