import useSite from '../../redux/hooks/useSite';

const SiteListItem = ( { siteName } ) => {
	const site = useSite( siteName );
	return <div class="box">
		<h3 class="subtitle">{ siteName }</h3>
		{
			site.description ? <div class="content"><p>{ site.description }</p></div> : null
		}
		<div class="buttons">
			{
				site.hosts.map( host =>
					<a class="button" href={ host } target="_blank">
						<span class="icon is-small">
							<i class="fas fa-link"></i>
						</span>
						<span>{host}</span>
					</a>
				)
			}
		</div>
	</div>;
};


export default SiteListItem;
