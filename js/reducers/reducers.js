import {
	ADD_SITE,
	TOGGLE_SITE
} from './actions'

function vvvSitesApp(state = [], action) {
	switch (action.type) {
		case ADD_SITE:
			return {
				...state,
				"sites": [
					...state.sites,
					{
						repo: "https://github.com/Varying-Vagrant-Vagrants/custom-site-template.git",
						name: action.site.name,
						expanded: false,
						skip_provisioning: action.site.skip_provisioning
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