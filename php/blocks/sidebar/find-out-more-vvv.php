<div class="box">
	<h3>Find out more about VVV</h3>
	<?php
	if ( file_exists( '/vagrant/version' ) ) {
		?>
		<p>You're running VVV <code><?php echo file_get_contents( '/vagrant/version' ); ?></code>, run <code>git pull</code> and reprovision to update</p>
		<?php
	}
	?>
	<a class="button" href="https://varyingvagrantvagrants.org/" target="_blank">Help &amp; Documentation</a>
	<a class="button" href="https://github.com/varying-vagrant-vagrants/vvv/" target="_blank">View the code on GitHub</a>
</div>
