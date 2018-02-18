import {
	ADD_SITE,
	TOGGLE_SITE
} from './actions'

function vvvSitesApp(state = [], action) {
	action.site;
	switch (action.type) {
		case ADD_SITE:
			return {
				...state,
				"sites": [
					...state.sites,
					{
						...action.site,
						expanded: false
					}
				]
			}
		case TOGGLE_SITE:
			return {
				...state,
				"sites": state.sitesmap((site, index) => {
					if (index === action.index) {
						return Object.assign({}, site, {
							expanded: !site.expanded
						})
					}
					return site
				})
			}
		default:
			return state
	}
}

export default vvvSitesApp