// action types


export const ADD_SITE = 'ADD_SITE';
export const TOGGLE_SITE = 'TOGGLE_SITE';

function addSite(site) {
  return {
    type: ADD_SITE,
    site,
  };
}

export default addSite;
