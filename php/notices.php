<div id="vvv_provision_fail" class="top-notice box" style="display:none">
	<p><strong>Problem:</strong> Could not load the site, this implies that provisioning the site failed, please check there were no errors during provisioning, and reprovision.</p>
	<p><em><strong>Note</strong>, sometimes this is because provisioning hasn't finished yet, if it's still running, wait and refresh the page.</em> If that doesn't fix the issue, re-read our docs on adding sites, check the syntax of all your provisioner files, and double check our troubleshooting page:</p>
	<p><a class="button" href="https://varyingvagrantvagrants.org/docs/en-US/troubleshooting/">Troubleshooting</a> <a href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/" class="button">Adding a Site</a></p>
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
/**
 * Compares two software version numbers (e.g. "1.7.1" or "1.2b").
 *
 * This function was born in http://stackoverflow.com/a/6832721.
 *
 * @param {string} v1 The first version to be compared.
 * @param {string} v2 The second version to be compared.
 * @param {object} [options] Optional flags that affect comparison behavior:
 * <ul>
 *     <li>
 *         <tt>lexicographical: true</tt> compares each part of the version strings lexicographically instead of
 *         naturally; this allows suffixes such as "b" or "dev" but will cause "1.10" to be considered smaller than
 *         "1.2".
 *     </li>
 *     <li>
 *         <tt>zeroExtend: true</tt> changes the result if one version string has less parts than the other. In
 *         this case the shorter string will be padded with "zero" parts instead of being considered smaller.
 *     </li>
 * </ul>
 * @returns {number|NaN}
 * <ul>
 *    <li>0 if the versions are equal</li>
 *    <li>a negative integer iff v1 < v2</li>
 *    <li>a positive integer iff v1 > v2</li>
 *    <li>NaN if either version string is in the wrong format</li>
 * </ul>
 *
 * @copyright by Jon Papaioannou (["john", "papaioannou"].join(".") + "@gmail.com")
 * @license This function is in the public domain. Do what you want with it, no strings attached.
 */
function versionCompare(v1, v2, options) {
	var lexicographical = options && options.lexicographical,
		zeroExtend = options && options.zeroExtend,
		v1parts = v1.split('.'),
		v2parts = v2.split('.');
	function isValidPart(x) {
		return (lexicographical ? /^\d+[A-Za-z]*$/ : /^\d+$/).test(x);
	}
	if (!v1parts.every(isValidPart) || !v2parts.every(isValidPart)) {
		return NaN;
	}
	if (zeroExtend) {
		while (v1parts.length < v2parts.length) v1parts.push("0");
		while (v2parts.length < v1parts.length) v2parts.push("0");
	}
	if (!lexicographical) {
		v1parts = v1parts.map(Number);
		v2parts = v2parts.map(Number);
	}
	for (var i = 0; i < v1parts.length; ++i) {
		if (v2parts.length == i) {
			return 1;
		}
		if (v1parts[i] == v2parts[i]) {
			continue;
		}
		else if (v1parts[i] > v2parts[i]) {
			return 1;
		}
		else {
			return -1;
		}
	}
	if (v1parts.length != v2parts.length) {
		return -1;
	}
	return 0;
}
fetch('https://raw.githubusercontent.com/Varying-Vagrant-Vagrants/VVV/master/version').then(function(response) {
	return response.text();
}).then(function(version) {
	const currentVersion = document.querySelector('.version').textContent.trim();
	if ( versionCompare( version.trim(), currentVersion ) > 0 ) {
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
