import autocomplete from 'autocomplete.js'
import algoliasearch from 'algoliasearch'

var index = algoliasearch('3QR3FQ20DS', '8cfd247f67e7405c330e517d2974d5d6')

export const listingsautocomplete = (selector) => {
	var listings =index.initIndex('listings')

	return autocomplete(selector, {}, [
		{
			source: autocomplete.sources.hits(listings, {
				hitsPerPage: 5
			}),
			templates: {
				suggestion (suggestion) {
					return '<span>' + suggestion.title + '</span>'
				}
			},
			displaykey: 'title',
			empty: '<div class="aa-empty">No Listings found</div>'
		}
	])
}