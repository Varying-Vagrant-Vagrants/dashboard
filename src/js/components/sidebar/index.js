import MenuItem from "./menu-item";
import useTools from "../../redux/hooks/useTools";

const Sidebar = () => {
	const tools = useTools();
	return <nav className="menu" role="navigation" aria-label="main navigation">
		<p className="menu-label">Sites</p>
		<ul className="menu-list">
			<MenuItem to="/">Sites</MenuItem>
		</ul>
		<p className="menu-label">Tools</p>
		<ul className="menu-list">
			<MenuItem to="/databases">Databases</MenuItem>
			<MenuItem to="/php">PHP</MenuItem>
			{ tools.map(
				( tool ) => {
					if ( tool.category === 'database' ) {
						return null;
					}
					if ( tool.category === 'php' ) {
						return null;
					}
					return (<li>
						<a href={ tool.url } target="_blank">
							{ tool.title }
						</a>
					</li>);
				}
			) }
		</ul>
		<p className="menu-label">Misc</p>
		<ul className="menu-list">
			<MenuItem to="/help">Help</MenuItem>
			<MenuItem to="/demo">Component Demo</MenuItem>
		</ul>
	</nav>;
};

export default Sidebar;
