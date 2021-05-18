import useSite from '../../redux/hooks/useSite';

const SiteListItem = ( { siteName } ) => {
	const site = useSite( siteName );
	return <div className="box">
		<h3 className="subtitle">{ siteName }</h3>
		{
			site.description ? <div className="content"><p>{ site.description }</p></div> : null
		}
		<div className="buttons">
			{
				site.hosts.map( ( host ) =>
					<a className="button" href={ `http://${host}` } target="_blank">
						<span className="icon is-small">
							<i className="fas fa-link"></i>
						</span>
						<span>{host}</span>
					</a>
				)
			}
		</div>
	</div>;
};


export default SiteListItem;
