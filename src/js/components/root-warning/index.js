import useRootWarning from "../../redux/hooks/useRootWarning";

const RootWarning = () => {
	const provisionedAsRoot = useRootWarning();

	if ( ! provisionedAsRoot ) {
		return null;
	}

	return <div className="notification is-danger">
		<div className="content">
			<h1 className="title">
				<span className="icon-text">
					<span className="icon">
						<i className="fas fa-ban"></i>
					</span>
					<span>
						<strong>Danger</strong> this VVV was created using the <code>sudo</code> command!
					</span>
				</span>
			</h1>
			<p>This will cause lots of problems, back up your database, destroy your virtual machine, and erase the <code>.vagrant</code> folder, as well as any root owned virtual machine files and folders, then reprovision VVV without sudo.</p>
			<p>To fix this, these commands must be done in this order.</p>
			<ol>
				<li>Back up your databases. You can SSH in and use <code>mysqldump</code>, use the built in backup script, or PHPMyAdmin.</li>
				<li>Run <code>sudo vagrant halt</code> to power down VVV.</li>
				<li>Run <code>sudo vagrant destroy --force</code> to destroy the VM.</li>
				<li>It may be necessary to launch the VirtualBox user interface as a root user to clean up virtual machines running as root.</li>
				<li>You will need to delete the <code>.vagrant</code> subfolder.</li>
				<li>You will need to change the owner and group of all files in the VVV folder to your user ( not root) <code>whoami</code> will tell you the user to change ownership to.</li>
				<li>Run <code>vagrant up</code> without using <code>sudo</code>, if this fails, search for virtualbox and vagrant files across your system that have not been cleaned up.</li>
				<li><em>Never</em> use <code>sudo</code> again. Not even just in case.</li>
			</ol>
			<p>In the future we will be adding more roadblocks to prevent normal usage of VVV while under root. E.g. sites will refuse to provision, features will disable themselves, etc.</p>
			<hr/>
			<p><em>By continuing to use VVV with <code>sudo</code> you will be unable to request support for anything other than fixing this issue.</em></p>
		</div>
	</div>;
};

export default RootWarning;
