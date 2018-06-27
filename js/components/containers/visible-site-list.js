import { connect } from 'react-redux';
import SiteList from '../site-list';

const getVisibleSites = sites => sites;
/* {
  return sites;
  /* switch (filter) {
    /* case 'SHOW_PROVISIONED'://, filter) => {
            return SITES.filter(S => S.skip_provisioning)
        case 'SHOW_UNPROVISIONED':
            return sites.filter(s => !s.skip_provisioning)
        case 'SHOW_ALL': , state.visibilityFilter),
    default:
      return sites;
  }
}; */

const mapStateToProps = state => ({
  sites: getVisibleSites(state.sites),
});

/* const mapDispatchToProps = dispatch => {
  return { }/*
    onTodoClick: id => {
      dispatch(toggleTodo(id))
    }
}
} */


const VisibleSiteList = connect(mapStateToProps /* , mapDispatchToProps */)(SiteList);

export default VisibleSiteList;
