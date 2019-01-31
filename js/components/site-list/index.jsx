import * as React from 'react';
import PropTypes from 'prop-types';
import Site from '../site';

const SiteList = ({
  sites, filter, showAllSites, showProvisionedSites, showSkippedSites,
}) => {
  const siteList = sites.map(site => <Site key={`vvv_site_${site.name}`} name={site.name} site={site} />);

  return (
    <div>
      <div className="vvv_sites_filter">
        <ul>
          <li>Filter sites: </li>
          <li>
            <button className={ filter == 'all' ? 'active_filter' : ''} onClick={showAllSites} onKeyDown={showAllSites}>All</button>
          </li>
          <li>
            <button className={ filter == 'provisioned' ? 'active_filter' : ''} onClick={showProvisionedSites} onKeyDown={showProvisionedSites}>Active</button>
          </li>
          <li>
            <button className={ filter == 'skipped' ? 'active_filter' : ''} onClick={showSkippedSites} onKeyDown={showSkippedSites}>Skipped</button>
          </li>
        </ul>
      </div>
      <div className="vvv_sites">{siteList}</div>
    </div>
  );
};

SiteList.propTypes = {
  sites: PropTypes.array,
  showAllSites: PropTypes.func.isRequired,
  showProvisionedSites: PropTypes.func.isRequired,
  showSkippedSites: PropTypes.func.isRequired,
};

SiteList.defaultProps = {
  sites: [],
};
export default SiteList;
