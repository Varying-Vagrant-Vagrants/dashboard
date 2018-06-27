import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider } from 'react-redux';

import vvvSitesApp from './reducers/reducers';
import VisibleSiteList from './components/containers/visible-site-list';
import InitialState from './reducers/initial-state';
import { addSite } from './reducers/actions';

console.log(InitialState);
const store = createStore(vvvSitesApp, InitialState);

// import all the sites intothe store from the config via window.vvv_sites
/*const keys = Object.keys(window.vvv_sites);
function dispatchSites(k) {
  const site = window.vvv_sites[k];
  site.name = k;
  store.dispatch(addSite(site));
}
keys.forEach(dispatchSites);*/

// off to the races!
ReactDOM.render(
  <Provider store={store}>
    <VisibleSiteList />
  </Provider>,
  document.getElementById('sitelist'),
);
