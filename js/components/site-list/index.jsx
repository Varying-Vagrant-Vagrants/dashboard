import * as React from 'react';
import PropTypes from 'prop-types';
import Site from '../site';

const SiteList = (props) => {
  const keys = Object.keys(props.sites);
  const sites = keys.map(key => <Site key={`vvv_site_${key}`} name={key} site={props.sites[key]} />);
  return <div className="vvv_sites">{sites}</div>;
};
// (PropTypes.object),
SiteList.propTypes = {
  sites: PropTypes.object,
};

SiteList.defaultProps = {
  sites: [],
};
export default SiteList;
