import {
  Link
} from "react-router-dom";
import useTools from "../../redux/hooks/useTools";

const Sidebar = () => {
	const tools = useTools();
	return <nav className="menu" role="navigation" aria-label="main navigation">
		<p class="menu-label">Sites</p>
		<ul className="menu-list">
			<li><Link to="/">Sites</Link></li>
			<li>
				<a href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/" target="_blank">
					Adding New Sites
				</a>
			</li>
		</ul>
		<p class="menu-label">Tools</p>
		<ul class="menu-list">
			{ tools.map(
				( tool ) =>
					<li>
						<a href={ tool.url } target="_blank">
							{ tool.title }
						</a>
					</li>
			) }
		</ul>
		<p class="menu-label">Help</p>
		<ul className="menu-list">
			<li>
				<a href="https://github.com/Varying-Vagrant-Vagrants/VVV/issues/new/choose" target="_blank">
					Support on GitHub
				</a>
			</li>
			<li>
				<a href="https://varyingvagrantvagrants.org/docs/en-US/slack/" target="_blank">
					Slack
				</a>
			</li>
			<li><Link to="/demo">Component Demo</Link></li>
		</ul>
		<hr/>
		<form method="get" action="https://varyingvagrantvagrants.org/search/">
			<div class="field">
				<label class="label">Search Documentation</label>
				<div class="control has-icons-right">
					<input class="input" name="q" type="text" placeholder="search documentation"/>
					<span class="icon is-small is-right">
						<i class="fas fa-search"></i>
					</span>
				</div>
			</div>
		</form>
	</nav>
}

export default Sidebar;
