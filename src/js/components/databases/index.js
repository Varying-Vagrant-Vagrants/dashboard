import useTools from "../../redux/hooks/useTools";

const Databases = () => {
	const tools = useTools().filter( tool => tool.category === 'database' );
	return <section className="section">
		<h1 className="title">Databases</h1>
		<div className="content">
			<p>You can find a Sequel Pro/Sequel Ace connection file at <code>database/sql/sequelpro.spf</code>. For the default database credentials see the following:</p>
		</div>
		<div classaName="buttons">
			<a
				className="button"
				href="https://varyingvagrantvagrants.org/docs/en-US/references/sql-client/"
				target="_blank"
			>
				Database Connection Help
			</a>
		</div>
		<hr/>
		<h2 className="subtitle">Back ups</h2>
		<div className="content">
			<p>You can manually back up databases by running the command <code>vagrant ssh -c "db_backup"</code>, and VVV will place SQL files in the <code>database/sql</code> VVV sub-folder.</p>
			<p>Backups can be manually restored using <code>vagrant ssh -c "db_restore"</code>.</p>
		</div>

		<h2 className="subtitle">Tools</h2>
		<div className="columns is-multiline">
			{
				tools.map( tool => {
					return <div className="column is-half">
						<div className="box">
							<h2 className="subtitle">{ tool.title }</h2>
							<div className="content">
								<p>{ tool.description }</p>
							</div>
							<a href={ tool.url } className="button" target="_blank">Open</a>
						</div>
					</div>;
				 } )
			}
		</div>
	</section>;
};

export default Databases;
