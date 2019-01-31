import {
  ADD_SITE,
  TOGGLE_SITE,
  SHOW_SITES,
} from './actions';

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

const getFilteredSites = (sites, filter) => {
  switch (filter) {
    case 'provisioned':
      return getProvisionedSites(sites);
    case 'skipped':
      return getSkippedSites(sites);
    default:
      return [...getProvisionedSites(sites), ...getSkippedSites(sites)];
  }
};

function vvvSitesApp(state = [], action) {
  switch (action.type) {
    case ADD_SITE:
      return {
        ...state,
        sites: [
          ...state.sites,
          {
            ...action.site,
            expanded: false,
          },
        ],
      };
    case TOGGLE_SITE:
      return {
        ...state,
        sites: state.sitesmap((site, index) => {
          if (index === action.index) {
            return Object.assign({}, site, {
              expanded: !site.expanded,
            });
          }
          return site;
        }),
      };
    case SHOW_SITES:
      return {
        ...state,
        visible_sites: getFilteredSites(state.sites, action.filter),
        filter: action.filter,
      };
    default:
      return state;
  }
}

export default vvvSitesApp;
