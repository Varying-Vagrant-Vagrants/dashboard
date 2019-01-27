// action types


export const ADD_SITE = 'ADD_SITE';
export const TOGGLE_SITE = 'TOGGLE_SITE';
export const SHOW_SITES = 'SHOW_SITES';

export const addSite = site => ({
  type: ADD_SITE,
  site,
});

export const showSites = filter => ({
  type: SHOW_SITES,
  filter,
});
