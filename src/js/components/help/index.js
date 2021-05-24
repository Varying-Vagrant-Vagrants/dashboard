const Help = () => {
	return <section className="section" id="help">
		<h1 className="title">Help Using VVV</h1>
		<div className="content">
			<p>If you have problems, updating and runnning <code>vagrant up --provision</code> usually fixes them, but if you have a problem you can't solve, you should let the VVV team know. Don't spend hours figuring out a problem we can fix in minutes.</p>
			<p className="buttons">
				<a className="button" href="https://varyingvagrantvagrants.org/" target="_blank">
					VVV Documentation
				</a>
				<a className="button" href="https://github.com/Varying-Vagrant-Vagrants/VVV/issues/new/choose" target="_blank">
					Get Help on GitHub
				</a>
				<a className="button" href="https://varyingvagrantvagrants.org/docs/en-US/slack/" target="_blank">
					Join the VVV Slack
				</a>
			</p>
		</div>
		<hr/>
		<h2 className="subtitle">Logs</h2>
		<div className="content">
			<p>If provisioning does not work correctly, and you don't have the terminal output, you can find logs in the <code>logs/provisioners</code> subfolder, arranged by time and date.</p>
			<p>You can also find PHP error logs in <code>logs/php</code>.</p>
		</div>
		<hr/>
		<form method="get" action="https://varyingvagrantvagrants.org/search/">
			<div className="field">
				<label className="label">Search Documentation</label>
				<div className="control has-icons-right">
					<input className="input" name="q" type="text" placeholder="search documentation"/>
					<span className="icon is-small is-right">
						<i className="fas fa-search"></i>
					</span>
				</div>
			</div>
		</form>
	</section>;
};

export default Help;
