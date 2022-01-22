import { useState } from 'react';
import useSites from '../../redux/hooks/useSites';
import SiteListItem from '../site-list-item';
import NewSite from './new';
import SiteListControls from './site-list-controls';

const Sites = () => {
	const sites = useSites();
	const [siteFilter, setSiteFilter] = useState('enabled');
	const siteNames = Object.keys( sites );
	const filteredSiteNames = siteNames.map( ( siteName )=> {
		if ( siteFilter === 'all' ) {
			return siteName;
		}
		const site = sites[siteName];

		// if we're showing skipped/disabled sites
		if ( siteFilter === 'skipped' ) {
			// only show disabled sites
			if ( site.skip_provisioning == true ) {
				return siteName;
			}
			return null;
		}

		// If we aren't showing all or disabled sites, we must be showing only enabled sites
		if ( site.skip_provisioning == true ) {
			return null;
		}
		return siteName;
	}).filter(x => !!x); // strip out the nulls from the array

	const siteList = filteredSiteNames.map(
		( siteName ) => <SiteListItem siteName={ siteName } />
	);
	return <section className="section" id="sitelist">
		<h1 className="title">Sites</h1>
		<SiteListControls currentSiteFilter={ siteFilter } setSiteFilter={ setSiteFilter } />
		{ siteList }
		<NewSite/>
	</section>;
};

export default Sites;
