import { Link } from "react-router-dom";
import useVersion from "../redux/hooks/useVersion";

const StatusBar = () => {
	const version = useVersion();
	return <nav className="navbar is-fixed-bottom" role="navigation" aria-label="top navigation">
		<div className="navbar-brand">
			<Link to="/" className="navbar-item">
				<img src="http://vvv.test/dashboard/vvv-tight.png" width="22" height="21" />
				<h1 className="title is-sr-only">
					VVV
				</h1>
			</Link>
		</div>
		<div className="navbar-start">
			<span class="navbar-item">
				v{ version }
			</span>
		</div>

		<div className="navbar-end">
			<span class="navbar-item">
				PHP debug module: Unknown
			</span>
		</div>
	</nav>
}

export default StatusBar;
