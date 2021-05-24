const NewSite = () => {
	return <section className="section" id="newsite">
		<h1 className="title">Adding a New Site</h1>
		<div className="content">
			<p>To add a new site, update the sites section of <code>config/config.yml</code> then run <code>vagrant provision</code> to apply the changes.</p>
			<p>For more details on what to add and examples, see the documentation here:</p>
			<p className="buttons">
				<a href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/" target="_blank" className="button">
					VVV Docs: Adding a new site
				</a>
				<a href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/adding-an-existing-site/" target="_blank" className="button">
					VVV Docs: Adding an existing site
				</a>
			</p>
		</div>
	</section>;
};

export default NewSite;
