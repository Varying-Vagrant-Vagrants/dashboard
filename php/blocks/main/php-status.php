<?php
$version = explode( '.', phpversion() );
$version = $version[0] . "." . $version[1] . "." . explode( '+', $version[2] )[0];
?>
<div class="box alt-box">
	<h3>PHP Status</h3>
	<p>The default version of PHP is <code>v<?php echo $version; ?></code>, but individual sites can use other versions of PHP.</p>

	<table>
		<tr>
			<th>PHP</th>
		</tr>
<?php
$files = glob('/usr/bin/php7.*');
foreach ( $files as $file ) {
	?>
		<tr>
			<td><?php echo basename( $file ) ?></td>
		</tr>
	<?php
}
?>

	</table>

	<table>
		<tr>
			<th>Debug Extension</th>
			<th>Loaded</th>
			<th>Version</th>
		</tr>
		<tr>
			<td>XDebug</td>
			<td><?php echo extension_loaded('xdebug') ? 'yes' : 'no'; ?></td>
			<td><?php echo phpversion( 'xdebug' ); ?></td>
		</tr>
		<tr>
			<td>Tideways/XHProf</td>
			<td><?php echo extension_loaded('tideways_xhprof') ? 'yes' : 'no'; ?></td>
			<td><?php echo phpversion( 'tideways_xhprof' ); ?></td>
		</tr>
	</table>

	<p>To switch between debug mods, use <code>vagrant ssh</code> to enter the VM, then use <code>switch_php_debugmod</code> followed by the extension you prefer. For example to use XDebug, you would run <code>switch_php_debugmod xdebug</code>. On older versions of VVV you would need to use <code>xdebug_on</code> or <code>xdebug_off</code>.</p>
</div>
