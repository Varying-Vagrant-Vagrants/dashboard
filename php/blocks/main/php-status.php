<?php
$version_arr = explode( '.', phpversion() );
$version = $version_arr[0] . "." . $version_arr[1] . "." . explode( '+', $version_arr[2] )[0];
?>
<div class="box alt-box">
	<h3>PHP Versions</h3>
	<ul class="chips">
		<?php
		$default_version = 'php' . $version_arr[0] . "." . $version_arr[1];
		$files = glob( '/usr/bin/php[0-9].*' );
		foreach ( $files as $file ) {
			$chip_class = 'chip';
			$default = '';
			if ( trim( basename( $file ) ) === $default_version ) {
				$default = ' <strong>( default )</strong>';
				$chip_class .= ' default';
			}
			?>
				<li class="<?php echo $chip_class; ?>"><?php echo basename( $file ) . $default; ?></li>
			<?php
		}
		?>
		<a class="chip" href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/changing-php-version/" target="_blank">+ Add more</a>
	</ul>

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
				<th>Extension</th>
				<th>Status</th>
				<th>Command to activate</th>
			</tr>
		</thead>
		<?php
		foreach ( $exts as $name => $ext ) {
			$active = false;
			$chip_class = 'chip';
			if ( extension_loaded( $ext ) ) {
				$active = true;
				$chip_class .= ' active';
			}

			?>
			<tr>
				<td>
					<span class="<?php echo $chip_class; ?>">
						<?php
						echo $name;
						?>
					</span>
				</td>
				<td>
					<?php
					if ( ! file_exists( '/etc/php/' . $version_arr[0] . "." . $version_arr[1] . '/mods-available/' . $ext . '.ini' ) ) {
						echo 'Not present';
					} else {
						if ( $active ) {
							echo 'Active';
						} else {
							echo 'Inactive';
						}
					}
					?>
				</td>
				<td>
					<?php
					if ( ! file_exists( '/etc/php/7.2/mods-available/' . $ext . '.ini' ) ) {
						if ( 'tideways_xhprof' === $ext ) {
							?>
							<a href="https://varyingvagrantvagrants.org/docs/en-US/references/tideways-xhgui/" target="_blank">Learn how to add Tideways XHProf</a>
							<?php
						} else {
							echo 'Update VVV to get this extension';
						}
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
			<td><span class="chip">None</span></td>
			<td></td>
			<td><code>vagrant ssh -c "switch_php_debugmod none"</code></td>
		</tr>
	</table>

</div>
