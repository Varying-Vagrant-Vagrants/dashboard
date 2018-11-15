import { connect } from 'react-redux';
import SiteList from '../site-list';

const getVisibleSites = sites => sites;

const getProvisionedSites = (sites) => {
  const keys = Object.keys(sites);
  const provisionedSites = keys.map((key) => {
    if (sites[key].skip_provisioning === false) {
      return {
        ...sites[key],
        name: key,
      };
    }
    return null;
  });
  return provisionedSites.filter(s => s);
};

const getSkippedSites = (sites) => {
  const keys = Object.keys(sites);
  const skippedSites = keys.map((key) => {
    if (sites[key].skip_provisioning === true) {
      return {
        ...sites[key],
        name: key,
      };
    }
    return null;
  });
  return skippedSites.filter(s => s);
};


const mapStateToProps = state => ({
  sites: getVisibleSites(state.sites),
  provisionedSites: getProvisionedSites(state.sites),
  skippedSites: getSkippedSites(state.sites),
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
