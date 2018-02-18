import * as React from 'react';
import PropTypes from 'prop-types';

const SiteList = ( {sites} ) => (
	<div className="box">
		<h3>Sites</h3>
		{ sites.map( ( site ) => {
			return <p key={"vvv_site_"+site.name}>{site.name}: {site.repo}</p>;
		} ) }
	</div>
)
SiteList.propTypes = {
	sites: PropTypes.array
};
export default SiteList;