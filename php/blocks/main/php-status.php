<?php
$version_arr = explode( '.', phpversion() );
$version = $version_arr[0] . "." . $version_arr[1] . "." . explode( '+', $version_arr[2] )[0];
$base_version = $version_arr[0] . "." . $version_arr[1];
?>
<div class="box alt-box">
	<h3>Installed PHP Versions</h3>
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
			$version = trim( basename( $file ) );
			$version = str_replace( 'php', '', $version );
			?>
				<li class="<?php echo $chip_class; ?>">
					PHP v<?php echo $version . $default; ?></li>
			<?php
		}
		?>
		<a class="chip" href="https://varyingvagrantvagrants.org/docs/en-US/adding-a-new-site/changing-php-version/" target="_blank">
			+ How To Add more
		</a>
	</ul>

	<h3>PHP Debugging Extensions</h3>

	<?php
	$exts = [
		'xdebug'          => [
			'name'        => 'XDebug',
			'description' => 'Useful for connecting a debugger',
			'command'     => 'vagrant ssh -c "switch_php_debugmod xdebug"'
		],
		'tideways_xhprof' => [
			'name'        => 'Tideways XHProf',
			'description' => 'Used with XHGui to generate profiles',
			'command'     => 'vagrant ssh -c "switch_php_debugmod tideways_xhprof"'
		],
		'pcov'            => [
			'name'        => 'PCov',
			'description' => 'Speeds up test coverage calculation',
			'command'     => 'vagrant ssh -c "switch_php_debugmod pcov"'
		],
		'none'            => [
			'name'        => 'None',
			'description' => 'Vanilla PHP',
			'command'     => 'vagrant ssh -c "switch_php_debugmod none"',
		],
	];
	$current_debug_ext = 'none';
	foreach ( $exts as $ext => $options ) {
		$exts[ $ext ]['active'] = false;
		if ( extension_loaded( $ext ) ) {
			$exts[ $ext ]['active'] = true;
			$current_debug_ext = $ext;
		}
	}

	if ( 'none' === $current_debug_ext ) {
		$exts['none']['active'] = true;
	}

	?>
	<table>
		<thead>
			<tr>
				<th>Extension</th>
				<th>Command to activate</th>
			</tr>
		</thead>
		<?php
		foreach ( $exts as $ext => $data ) {
			$chip_class = 'chip';
			if ( $data['active'] ) {
				$chip_class .= ' active';
			}

			?>
			<tr>
				<td>
					<span class="<?php echo $chip_class; ?>">
						<?php
						echo $data['name'];
						?>
					</span>
					<small><em>
						<?php
						if ( 'none' !== $ext && ! file_exists( '/etc/php/' . $version_arr[0] . "." . $version_arr[1] . '/mods-available/' . $ext . '.ini' ) ) {
							echo 'Not present';
						} else {
							if ( $data['active'] ) {
								echo 'Active';
							} else {
								echo 'Inactive';
							}
						}
						?>
					</em></small>
					<br/>
					<small>
						<?php
						echo strip_tags( $data['description'] );
						?>
					</small>
				</td>
				<td>
					<?php
					if ( 'none' !== $ext && ! file_exists( '/etc/php/' . $version_arr[0] . "." . $version_arr[1] . '/mods-available/' . $ext . '.ini' ) ) {
						if ( 'tideways_xhprof' === $ext ) {
							?>
							<a href="https://varyingvagrantvagrants.org/docs/en-US/references/tideways-xhgui/" target="_blank">Learn how to add Tideways XHProf</a>
							<?php
						} else {
							echo 'Update VVV to get this extension';
						}
					} else {
						?>
						<code><?php echo strip_tags( $data['command'] ); ?></code>
						<?php
					}
					?>
				</td>
			</tr>

			<?php
		}
		?>
	</table>

</div>
