<div id="vvv_provision_fail" class="top-notice box" style="display:none">
	<p><strong>Problem:</strong> Could not load the site, this implies that provisioning the site failed, please check there were no errors during provisioning, and reprovision.</p>
	<p><em><strong>Note</strong>, sometimes this is because provisioning hasn't finished yet, if it's still running, wait and refresh the page.</em> If that doesn't fix the issue, re-read our docs on adding sites, check the syntax of all your provisioner files, and double check our troubleshooting page:</p>
	<p><a class="button" href="https://varyingvagrantvagrants.org/docs/en-US/troubleshooting/">Troubleshooting</a> <a href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/" class="button">Adding a Site</a>
</div>
<div id="vvv_hosts_fail" class="top-notice box" style="display:none">
	<p><strong>Info:</strong> It appears you've accessed the dashboard via the IP, you should visit <a href="http://vvv.test">http://vvv.test</a>, but if this isn't working, make sure you've installed the hosts updater vagrant plugin</p>
	<p>If you're trying to access a site, you need to visit the host/domain given to the site if one was set.</p>
	<p><a href="http://vvv.test" class="button">Visit the Dashboard</a></p>
</div>
<div id="vvv_update" class="top-notice box" style="display:none">
	<p>There is a new update available for VVV! Check the <a href="https://varyingvagrantvagrants.org/docs/en-US/installation/keeping-up-to-date/#thoroughly-updating-vvv">documentation</a>.</p>
</div>

<script>
fetch('https://raw.githubusercontent.com/Varying-Vagrant-Vagrants/VVV/master/version').then(function(response) {
  return response.blob();
}).then(function(version) {
  if ( version !== document.querySelector('.version').textContent.trim() ) {
	document.querySelector('#vvv_update').style.display = 'block';
  }
});
// If it's not vvv.test then this site has failed to provision, let the user know
// also notify if the dashboard is being shown on the raw IP
if ( location.hostname.indexOf( "192.168") !== -1 ) {
	var notice = document.getElementById( 'vvv_hosts_fail' );
	notice.style.display = 'block';
} else if ( ( location.hostname != "vvv.dev" )
	&& ( location.hostname != "vvv.test" )
	&& ( location.hostname != "vvv.local" )
	&& ( location.hostname != "vvv.localhost" ) )
{
	var notice = document.getElementById( 'vvv_provision_fail' );
	notice.style.display = 'block';
}
</script>
