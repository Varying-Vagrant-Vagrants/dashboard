<?php
$version = explode( '.', phpversion() );
$version = $version[0] . "." . $version[1] . "." . explode( '+', $version[2] )[0];
?>
<div class="box alt-box">
	<h3>PHP Status</h3>

	<p>The default version of PHP is <code>v<?php echo $version; ?></code>, but individual sites can use other versions of PHP. <a href="https://launchpad.net/~ondrej/+archive/ubuntu/php" target="_blank">PHP packages are installed from Ondřej Surý PPA</a></p>

	<p>Update your <code>config/config.yml</code> file to install more versions of PHP</p>


	<table>
		<tr>
			<th>PHP Installations</th>
		</tr>
<?php
$files = glob('/usr/bin/php5.*');
foreach ( $files as $file ) {
	?>
		<tr>
			<td><?php echo basename( $file ) ?></td>
		</tr>
	<?php
}
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
	<p>The currently loaded debugging extension for PHP is <strong><?php echo $name; ?></strong> at version <code><?php echo phpversion( 'xdebug' ); ?></code></p>
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
