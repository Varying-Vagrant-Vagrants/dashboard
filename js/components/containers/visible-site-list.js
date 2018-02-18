import { connect } from 'react-redux'
import SiteList from '../site-list/index.js'

const getVisibleSites = (sites, filter) => {
	switch (filter) {
		/*case 'SHOW_PROVISIONED':
			return SITES.filter(S => S.skip_provisioning)
		case 'SHOW_UNPROVISIONED':
			return sites.filter(s => !s.skip_provisioning)
		case 'SHOW_ALL':*/
		default:
			return sites
	}
}

const mapStateToProps = state => {
	return {
		sites: getVisibleSites(state.sites, state.visibilityFilter)
	}
}

/*const mapDispatchToProps = dispatch => {
  return { }/*
	onTodoClick: id => {
	  dispatch(toggleTodo(id))
	}
}
}*/


const VisibleSiteList = connect(
	mapStateToProps/*,
	mapDispatchToProps*/
)(SiteList)

export default VisibleSiteList