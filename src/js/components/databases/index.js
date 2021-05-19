import useTools from "../../redux/hooks/useTools";

const Databases = () => {
	const tools = useTools().filter( tool => tool.category === 'database' );
	return <section className="section">
		<h1 className="title">Databases</h1>
		<div className="content">
			<p>You can find a Sequel Pro/Sequel Ace connection file in the database folder. For the default database credentials see the following:</p>
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
