import * as React from 'react';
import PropTypes from 'prop-types';
import Site from '../site';

const SiteList = (props) => {
  let s = [];
  for(var key in props.sites) {
    const site = props.sites[key];
    const n = <Site key={`vvv_site_${key}`} name={key} site={site} />
    s.push(n);
  }

  return <div className="vvv_sites">
    {s}
  </div>
};
// (PropTypes.object),
SiteList.propTypes = {
  sites: PropTypes.object,
};

SiteList.defaultProps = {
  sites: [],
};
export default SiteList;
