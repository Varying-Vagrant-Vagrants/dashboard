import * as React from 'react';
import PropTypes from 'prop-types';
import Site from '../site/index.js';

const SiteList = ( {sites} ) => (
	<div className="vvv_sites">
		{sites.map( ( site ) => {
//			return <p key={"vvv_"+site.name}>{typeof site}</p>;
			return <Site key={"vvv_site_"+site.name} site={site} />
		} )}
		<div className="box altbox">
			<form action="POST" method="">
				<h3>Add Site</h3>
				<p><label>Name <input type="text"  title="WIP:Coming soon"disabled placeholder="site name"/></label></p>
				<p><label>Description <input type="text" vdisabled placeholder="description"/></label></p>
				<p><label>URL <input type="url"  title="WIP:Coming soon"disabled placeholder="URL"/></label></p>
				<input type="submit"  title="WIP:Coming soon"disabled value="Update config file"/>
			</form>
		</div>	

	</div>
)
SiteList.propTypes = {
	sites: PropTypes.array
};
export default SiteList;