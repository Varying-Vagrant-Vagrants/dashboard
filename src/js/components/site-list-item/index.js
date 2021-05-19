import useSite from '../../redux/hooks/useSite';

const SiteListItem = ( { siteName } ) => {
	const site = useSite( siteName );
	const disabledClass = site?.skip_provisioning ? 'disabled' : 'enabled';
	return <div className={ `box ${disabledClass}` }>
		<h3 className="title">
			{ siteName }
		</h3>
		<div className="block tags">
			{ site?.skip_provisioning ? <span className="tag">Disabled</span> : null }
		</div>
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
