<?php
$version_arr = explode( '.', phpversion() );
$version = $version_arr[0] . "." . $version_arr[1] . "." . explode( '+', $version_arr[2] )[0];
?>
<div class="box alt-box">
	<table>
		<tr>
			<th>PHP Installations</th>
		</tr>
<?php
$default_version = 'php' . $version_arr[0] . "." . $version_arr[1];
$files = glob( '/usr/bin/php[0-9].*' );
foreach ( $files as $file ) {
	$default = '';
	if ( trim( basename( $file ) ) === $default_version ) {
		$default = ' <em>( default )</em>';
	}
	?>
		<tr>
			<td><?php echo basename( $file ) . $default; ?></td>
		</tr>
	<?php
}
?>
		<tr>
			<td><a href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/changing-php-version/" target="_blank">Adding more versions of PHP</a></td>
		</tr>
	</table>
</div>
<div class="box alt-box">
	<h3>PHP Debug Extension</h3>

<?php
$exts = [
	'XDebug'	=> 'xdebug',
	'Tideways'  => 'tideways_xhprof',
	'PCov'      => 'pcov',
];
$current_debug_ext = '';
foreach ( $exts as $name => $ext ) {
	if ( ! extension_loaded( $ext ) ) {
		continue;
	}
	$current_debug_ext = $ext;
	?>
	<p>The currently loaded debugging extension for PHP is <strong><?php echo $name; ?></strong> at version <code><?php echo phpversion( $ext ); ?></code></p>
	<?php
	break;
}
if ( empty( $current_debug_ext ) ) {
	?>
	<p>No debugging extension is active at the moment</p>
	<?php
}
?>

	<p>To switch between debug extensions, use <code>vagrant ssh</code> to enter the VM, then use <code>switch_php_debugmod</code> followed by the extension you prefer. For example <code>switch_php_debugmod xdebug</code>. Use <code>switch_php_debugmod none</code> to disable them. On older versions of VVV you would need to use <code>xdebug_on</code> or <code>xdebug_off</code>.</p>
	<p>All installs come with XDebug installed but turned off. Tideways can be added by modifying <code>config/config.yml</code></p>
</div>
