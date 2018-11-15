import * as React from 'react';
import PropTypes from 'prop-types';
import Site from '../site';

const SiteList = (props) => {
  const provisionedSites = props.provisionedSites.map(
  	site => <Site key={`vvv_site_${site.name}`} name={site.name} site={site} />
  );
  const skippedSites = props.skippedSites.map(
  	site => <Site key={`vvv_site_${site.name}`} name={site.name} site={site} />
  );

  return <div className="vvv_sites">{provisionedSites}{skippedSites}</div>;
};
// (PropTypes.object),
SiteList.propTypes = {
  sites: PropTypes.object,
  provisionedSites: PropTypes.array,
  skippedSites: PropTypes.array,
};

SiteList.defaultProps = {
  sites: [],
};
export default SiteList;
