
const siteObjKeys = Object.keys(window.vvv_sites);
const InitialState = {
  sites: window.vvv_sites,
  visible_sites: siteObjKeys.map(key => ({ ...window.vvv_sites[key], name: key })),
  visibilityFilter: 'all',
};
export default InitialState;
