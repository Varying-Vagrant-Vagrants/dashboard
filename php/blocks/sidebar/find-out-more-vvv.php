<div class="box">
	<h3>Find out more about VVV</h3>
	<?php
	$distro_version = exec( 'lsb_release -ds' );
	?>
	<p>This VVV instance is inside a <?php echo htmlspecialchars( $distro_version ); ?> virtual machine.</p>
	<a class="button" href="https://github.com/varying-vagrant-vagrants/vvv/" target="_blank">View the code on GitHub</a>
</div>
