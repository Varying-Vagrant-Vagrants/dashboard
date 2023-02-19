<div class="box">
	<h3>Find out more about VVV</h3>
	<?php
	if ( file_exists( '/vagrant/version' ) ) {
		// note that at this time we cannot check for updates to be 100% sure,
		// that requires a network connection which isn't always present
		?>
		<p>You're running VVV <code>v<?php echo trim( strip_tags( file_get_contents( '/vagrant/version' ) ) ); ?></code>, <strong>if</strong> there are updates available you can run <code>git pull</code> and <code>vagrant up --provision</code> to apply them.</p>
		<?php
	}
	$distro_version = exec( 'lsb_release -ds' );
	?>
	<p>This VVV instance is inside a <?php echo $distro_version; ?> virtual machine.</p>
	<a class="button" href="https://github.com/varying-vagrant-vagrants/vvv/" target="_blank">View the code on GitHub</a>
</div>
