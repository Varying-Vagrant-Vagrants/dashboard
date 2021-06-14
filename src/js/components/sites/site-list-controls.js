import classnames from 'classnames';

const SiteListControls = ( { currentSiteFilter, setSiteFilter } ) => {
	return <nav className="level">
		<div className="level-left"></div>
		<div className="level-right">
			<div className="level-item">
				<div className="field has-addons">
					<p className="control">
						<button
							className={ classnames( 'button', { 'is-info': currentSiteFilter === 'all' } ) }
							onClick={ () => setSiteFilter('all') }
						>
							<span>All</span>
						</button>
					</p>
					<p className="control">
						<button
							className={ classnames( "button", { 'is-info': currentSiteFilter === 'enabled' } ) }
							onClick={ () => setSiteFilter('enabled') }
						>
							<span>Enabled</span>
						</button>
					</p>
					<p className="control">
						<button
							className={ classnames( "button", { 'is-info': currentSiteFilter === 'skipped' } ) }
							onClick={ () => setSiteFilter('skipped') }
						>
							<span>Skipped</span>
						</button>
					</p>
				</div>
			</div>
			<div className="level-item">
				<div class="control has-icons-left">
					<div className="select disabled">
						<select disabled>
							<option selected>config.yml order</option>
							<option>Enabled sites first</option>
							<option>A-Z order</option>
						</select>
					</div>
					<div class="icon is-small is-left">
						<i class="fas fa-sort"></i>
					</div>
				</div>
			</div>
		</div>
	</nav>;
};

export default SiteListControls;
