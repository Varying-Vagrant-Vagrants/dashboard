<div class="box">
	<h3>Find out more about VVV</h3>
	<?php
	if ( file_exists( '/vagrant/version' ) ) {
		// note that at this time we cannot check for updates to be 100% sure,
		// that requires a network connection which isn't always present
		?>
		<p>You're running VVV <code><?php echo file_get_contents( '/vagrant/version' ); ?></code>, <strong>if</strong> there are updates available you can run <code>git pull</code> and reprovision to apply them</p>
		<?php
	}
	?>
	<a class="button" href="https://varyingvagrantvagrants.org/" target="_blank">Help &amp; Documentation</a>
	<a class="button" href="https://github.com/varying-vagrant-vagrants/vvv/" target="_blank">View the code on GitHub</a>
</div>
