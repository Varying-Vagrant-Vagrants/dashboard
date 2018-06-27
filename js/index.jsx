import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider } from 'react-redux';

import vvvSitesApp from './reducers/reducers';
import VisibleSiteList from './components/containers/visible-site-list';
import InitialState from './reducers/initial-state';

const store = createStore(vvvSitesApp, InitialState);

// off to the races!
ReactDOM.render(
  <Provider store={store}>
    <VisibleSiteList />
  </Provider>,
  document.getElementById('sitelist'),
);
