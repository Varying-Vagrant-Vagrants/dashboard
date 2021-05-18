import useSites from '../redux/hooks/useSites';
import SiteListItem from './site-list-item';

const SiteList = () => {
	const sites = useSites();
	const siteNames = Object.keys( sites );
	const siteList = siteNames.map( ( siteName ) => <SiteListItem siteName={ siteName } /> );
	return <section className="section" id="sitelist">
	  <h1 className="title">Sites</h1>
	  { siteList }
	</section>;
};

export default SiteList;
