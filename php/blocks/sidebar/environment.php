<?php
function getMySQLVersion() {
	$output = shell_exec('mysql -V');
	preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
	return $version[0];
}

?>
<div class="box disk-info">
	<h3>Environment</h3>

	<?php
	$os = shell_exec( 'lsb_release -a' );
	$mariadb = shell_exec( 'mysql -V' );
	?>
	<h3>Operating System</h3>
	<pre><?php echo htmlspecialchars( $os ); ?></pre>
	<h3>MariaDB</h3>
	<code><?php echo htmlspecialchars( $mariadb ); ?></code>
</div>
