import useTools from "../../redux/hooks/useTools";

const Php = () => {
	const tools = useTools().filter( ( tool ) => tool.category === 'php' );
	return <section className="section">
		<h1 className="title">PHP</h1>
		<div className="buttons">
			<a
				className="button"
				href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/changing-php-version/"
				target="_blank"
			>
				Custom PHP Versions
			</a>
			<a
				className="button"
				href="https://varyingvagrantvagrants.org/docs/en-US/references/xdebug/"
				target="_blank"
			>
				Using Xdebug
			</a>
			<a
				className="button"
				href="https://varyingvagrantvagrants.org/docs/en-US/references/xdebug-and-phpstorm/"
				target="_blank"
			>
				Using Xdebug and PhpStorm
			</a>
		</div>
		<hr/>

		<h2 className="subtitle">Tools</h2>
		<div className="columns is-multiline">
			{
				tools.map( ( tool ) => {
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

export default Php;
