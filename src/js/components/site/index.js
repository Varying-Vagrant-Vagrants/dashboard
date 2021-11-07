import { useParams } from 'react-router';

import useSite from '../../redux/hooks/useSite';

const Site = () => {
	const { id } = useParams();
	const site = useSite( id );
	return <>
		<section className="hero">
			<div className="hero-body">
				<p className="title">
					{ id }
				</p>
				<div className="tags">
					{ site?.skip_provisioning ? <span className="tag is-info">Disabled</span> : null }
				</div>
				<p className="subtitle">
					{ site.description ? site.description : null }
				</p>
			</div>
			<div className="hero-foot">
				<nav className="tabs">
					<div className="container">
						<ul>
							<li className="is-active"><a>Overview</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</section>
		<section className="section content" id="site">
			<h1 className="title">Overview</h1>
			<p>Information about this site, its folder location, PHP version etc</p>

			<h2>Hosts</h2>
			<div className="buttons">
				{
					site.hosts.map( ( host ) =>
						<a className="button" href={ `http://${host}` } target="_blank">
							<span className="icon is-small">
								<i className="fas fa-link"></i>
							</span>
							<span>{ host }</span>
						</a>
					)
				}
			</div>

			<h2>Useful data</h2>

			<table>
				<tr>
					<td>VM folder Location:</td>
					<td><code>/srv/www/{id}</code></td>
				</tr>
				<tr>
					<td>Host folder Location:</td>
					<td><code>www/{id}</code></td>
				</tr>
				<tr>
					<td>Provisioner git repository URL:</td>
					<td><code>{site.repo ? site.repo : 'none'}</code></td>
				</tr>
				<tr>
					<td>Provisioner logs:</td>
					<td><code>{ `logs/provisioners/{time-of-provision}/provision-${id}.log` }</code></td>
				</tr>
			</table>

			<h2>Debug data</h2>
			<p>This is the JSON version of what VVV sees for this site:</p>
			<pre>
				{ JSON.stringify( site, null, 4 ) }
			</pre>
		</section>
	</>;
};

export default Site;
