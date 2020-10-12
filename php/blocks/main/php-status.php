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
	<h3>PHP Debugging Extensions</h3>

	<?php
	$exts = [
		'XDebug'          => 'xdebug',
		'Tideways XHProf' => 'tideways_xhprof',
		'PCov'            => 'pcov',
	];
	$current_debug_ext = '';
	foreach ( $exts as $name => $ext ) {
		if ( ! extension_loaded( $ext ) ) {
			continue;
		}
		$current_debug_ext = $ext;
		break;
	}
	?>
	<table>
		<thead>
			<tr>
				<th>On?</th>
				<th>Name</th>
				<th>Command to activate</th>
			</tr>
		</thead>
		<?php
		foreach ( $exts as $name => $ext ) {
			?>
			<tr>
				<td><?php
				if ( ! file_exists( '/etc/php/7.2/mods-available/' . $ext . '.ini' ) ) {
					echo 'Not present';
				} else {
					if ( extension_loaded( $ext ) ) {
						echo 'Active';
					} else {
						echo 'Inactive';
					}
				}?></td>
				<td><?php echo $name; ?></td>
				<td>
					<?php
					if ( ! file_exists( '/etc/php/7.2/mods-available/' . $ext . '.ini' ) ) {
						?><a href="https://varyingvagrantvagrants.org/docs/en-US/references/tideways-xhgui/" target="_blank">Learn how to add Tideways XHProf</a><?php
					} else {
						?>
						<code>vagrant ssh -c "switch_php_debugmod <?php echo $ext; ?>"</code>
						<?php
					}
					?>
				</td>
			</tr>

			<?php
		}
		?>
		<tr>
			<td>-</td>
			<td>None</td>
			<td><code>vagrant ssh -c "switch_php_debugmod none"</code></td>
		</tr>
	</table>

</div>
