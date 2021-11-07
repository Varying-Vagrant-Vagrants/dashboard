import PropTypes from 'prop-types';
import { Link } from "react-router-dom";

import useSite from '../../redux/hooks/useSite';

const SiteListItem = ( { siteName } ) => {
	const site = useSite( siteName );
	const disabledClass = site?.skip_provisioning ? 'disabled' : 'enabled';
	return <div className={ `card block ${disabledClass}` }>
		<header class="card-header">
			<h3 className="card-header-title">
				<Link to={ `/sites/${siteName}/` }>
					{ siteName }
				</Link>
			</h3>
		</header>
		<div className="card-content">
			<div className="block tags">
				{ site?.skip_provisioning ? <span className="tag is-info">Disabled</span> : null }
			</div>
			{
				site.description ? <p>{ site.description }</p> : null
			}
		</div>
		<footer class="card-footer">
			{
				site.hosts.map( ( host ) =>
					<a className="card-footer-item button" href={ `http://${host}` } target="_blank">
						<span className="icon is-small">
							<i className="fas fa-link"></i>
						</span>
						<span>{host}</span>
					</a>
				)
			}
		</footer>
	</div>;
};

SiteListItem.propTypes = {
	siteName: PropTypes.string.isRequired,
}

export default SiteListItem;
