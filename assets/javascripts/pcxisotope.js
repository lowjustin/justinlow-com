// $.fn.extend = function

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

var $grid = $('.grid').isotope({
	itemSelector: '.grid-item'
});

var filters = [];

$('.filter-button-group').on('click', 'button', function() {
	var $this = $(this);
	if ($this.hasClass("disabled")) return false;
	var $filter = $this.attr('data-filter');
	if ($filter == "") {
		filters = [];
		$('.filter-button-group button').removeClass('active');
	} else {
		if (filters.length > 0) {
			if ($.inArray($filter, filters) == -1) {
				filters.push($filter);
				$this.addClass('active');
			} else {
				filters.splice($.inArray($filter, filters), 1);
				$this.removeClass('active');
			}
		} else {
			filters.push($filter);
			$this.addClass('active');
		}
	}
	var filterValue = concatValues(filters);
	// location.hash = 'filter=' + encodeURIComponent(filterValue);
	$grid.isotope({
		filter: filterValue
	});

	if ( !$grid.data('isotope').filteredItems.length ) {
		$('.filter-no-results').attr('data-state', 'active');
	} else {
		$('.filter-no-results').attr('data-state', 'inactive');
	}

	var $filterClasses = [];

	$('.grid .grid-item').not('li.isotope-hidden').each(function(index){
		var $arr = $(this).attr('class').split(/\s+/);
		$arr.splice($.inArray('grid-item', $arr), 1);
		$filterClasses = $.merge($filterClasses, $arr);
	});
	$filterClasses = $.unique($filterClasses);

	$('.filter-button-group button').each(function(index) {
		$(this).addClass("disabled");
		var hasArticles = $.inArray($(this).attr('data-filter').replace(".", ""), $filterClasses);
		if (hasArticles > -1 || $(this).attr('data-filter') == "") {
			$(this).removeClass("disabled");
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