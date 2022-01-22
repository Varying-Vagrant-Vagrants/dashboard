import { Link } from "react-router-dom";
import useCurrentPHPDebugExtension from "../redux/hooks/useCurrentPHPDebugExtension";
import useVersion from "../redux/hooks/useVersion";

const StatusBar = () => {
	const phpDebugExtension = useCurrentPHPDebugExtension();
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
			<span className="navbar-item">
				v{ version }
			</span>
		</div>

		<div className="navbar-end">
			<span className="navbar-item">
				<span className="icon">
					<i className="fas fa-bug"></i>
				</span>
				<span>
					{ phpDebugExtension.name }
				</span>
			</span>
		</div>
	</nav>;
};

export default StatusBar;
