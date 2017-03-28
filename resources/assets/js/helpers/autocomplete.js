import autocomplete from 'autocomplete.js'
import algoliasearch from 'algoliasearch'

var index = algoliasearch('3QR3FQ20DS', '8cfd247f67e7405c330e517d2974d5d6')

export const listingsautocomplete = (selector, categoryId, areaIds) => {
	var listings =index.initIndex('listings')

	var areaFilters = 'area.id = ' + areaIds.join(' OR area.id = ');
	var filters = areaFilters

	if (typeof categoryId !== 'undefined') {
		filters = filters + ' AND category.id != ' + categoryId;
	}

	var sources = [{
		source: autocomplete.sources.hits(listings, { hitsPerPage: 5, filters: filters + ' AND live = 1' }),
		templates: {
			header: () => {
				if (typeof categoryId !== 'undefined') {
					return '<div class="aa-suggestions-category">Other categories</div>';
				}

				return '<div class="aa-suggestions-category">All categories</div>';
			},
			suggestion (suggestion) {
				return '<span><a href="/' + suggestion.area.slug + '/' + suggestion.id + '">' + 
						suggestion.title + '</a> in ' + 
						suggestion.category.name + ' </span> <span>' + 
						suggestion.created_at_human + '&bull; ' + 
						suggestion.area.name + ' </span>'
			}
		},
		displayKey: 'title',
		empty: '<div class="aa-empty">No listigs found</div>'
	}];

	if (typeof categoryId !== 'undefined') {
		sources.unshift({
			source: autocomplete.sources.hits(listings, { hitsPerPage: 5, filters: areaFilters + ' AND category.id = ' + categoryId + ' AND live = 1'}),
			templates: {
				header: '<div class="aa-suggestions-category">This category</div>',
				suggestion (suggestion) {
					return '<span><a href="/' + suggestion.area.slug + '/' + suggestion.id + '">' +
						suggestion.title + '</a> in ' + 
						suggestion.created_at_human + '&bull; ' + 
						suggestion.area.name + ' </span>'
				}
			},
			displayKey: 'title',
			empty: '<div class="aa-empty">No listigs found</div>'
		})
	}

	return autocomplete(selector, {}, sources)
}