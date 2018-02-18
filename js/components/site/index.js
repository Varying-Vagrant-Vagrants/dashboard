import * as React from 'react';
import PropTypes from 'prop-types';

const Site = ( {site} ) => {
	var expanded = null;
	//if ( true === site.expanded ) {
		expanded = <div className="vvv_site_expanded subpanel">
			<p><small>template: {site.repo.replace("https://github.com/",'').replace('.git','')}</small></p>
			<p>
				<button alt="WIP:Coming soon" className="button" disabled>Disable</button> 
				<button alt="WIP:Coming soon" className="button" disabled>Delete</button>
			</p>
		</div>;
	//}
	var visitButton = null;
	if ( site.hosts.length > 0 ) {
		var sites = site.hosts.map( (host) => {
			return <a key={"vvv_site_link_"+host} className="vvv_site_link" href={"http://"+host}>
				{host}
			</a>;}
		);
		visitButton = <p>{sites}</p>;
	}
	var provisioned = null;
	if ( site.skip_provisioning ) {
		provisioned = <span className="vvv_site_provision_skip_notice">Provisioning Skipped</span>
	}
	return <div className="box site">
		<h3>{site.name} {provisioned}</h3>
		<p>{site.description}</p>
		{visitButton}
		{expanded}
	</div>
}
Site.propTypes = {
	site: PropTypes.object
};
export default Site;