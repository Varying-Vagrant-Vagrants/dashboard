<?php
require_once __DIR__ . '/../../yaml.php';

function endsWith( $haystack, $needle ) {
	$length = strlen( $needle );

	return $length === 0 || ( substr( $haystack, -$length ) === $needle );
}

function show_warnings( array $warnings ) : void {
	if ( empty( $warnings ) ) {
		return;
	}
	echo '<div class="warning">';
	echo implode( '', $warnings );
	echo '</div>';
}

function get_site_description( $name, array $site ) {
	if ( !empty( $site['description'] ) ) {
		return $site['description'];
	}
	if ( 'wordpress-default' === $name ) {
		return 'WordPress stable';
	}
	if ( 'wordpress-develop' === $name ) {
		return 'A dev build of WordPress, with a trunk build in the <code>src</code> subfolder, and a grunt build in the <code>build</code> folder';
	}
	return 'A WordPress installation';
}

function get_site_warnings( array $site ) : array {
	$warnings = [];

	if ( empty( $site['hosts'] ) ) {
		$warnings[] = '
		<p><strong>Warning:</strong> there are no hosts for this site! It might be unreachable in the browser, add a hosts section to this sites config file.</p>';
		return $warnings;
	}
	$has_dev = array_reduce( $site['hosts'], function( $has_dev, $host ) {
		return $has_dev || endsWith( $host, '.dev' );
	});
	$has_local = array_reduce( $site['hosts'], function( $has_local, $host ) {
		return $has_local || endsWith( $host, '.local' );
	});

	if ( $has_dev ) {
		$warnings[] = '
		<p><strong>Warning:</strong> the <code>.dev</code> TLD is owned by Google, and will not work in Chrome 58+, you should migrate to URLs ending with <code>.test</code></p>';
	}

	if ( $has_local ) {
		$warnings[] = '
		<p><strong>Warning:</strong> the <code>.local</code> TLD is used by Macs/Bonjour/Zeroconf as quick access to a local machine, this can cause clashes that prevent the loading of sites in VVV. E.g. a MacBook named <code>test</code> can be reached at <code>test.local</code>. You should migrate to URLs ending with <code>.test</code></p>';
	}

	if ( $has_dev || $has_local ) {
		$warnings[] = '<p><a class="button" href="https://varyingvagrantvagrants.org/docs/en-US/troubleshooting/dev-tld/">Click here for instructions for switching to .test</a></p>';
	}
	return $warnings;
}

function display_site( $name, array $site ) : void {
	$classes = [];
	$description = get_site_description( $name, $site );
	$site_title = $name;
	if ( isset( $site['custom']['site_title'] ) ) {
		$site_title = $site['custom']['site_title'];
	}

	$upstream = 'php';
	if ( ! empty( $site['nginx_upstream'] ) ) {
		$upstream = $site['nginx_upstream'];
	}

	$version_arr = explode( '.', phpversion() );
	$php_version = $version_arr[0] . '.' . $version_arr[1];
	if ( ! empty( $site['php'] ) ) {
		$php_version = $site['php'];
	}

	$skip_provisioning = false;
	if ( ! empty( $site['skip_provisioning'] ) ) {
		$skip_provisioning = $site['skip_provisioning'];
		$classes[] = 'site_skip_provision';
	} else {
		$classes[] = 'site_provision';
	}

	$vm_dir = '/srv/www/' . $name;
	if ( ! empty( $site['vm_dir'] ) ) {
		$vm_dir = $site['vm_dir'];
	}

	?>
	<article class="box <?php echo strip_tags( implode( ',', $classes ) ); ?>">
		<div class="site-header-meta">
			<span class="chip">
				<code><?php echo strip_tags( $vm_dir ); ?></code>
			</span>
			<?php
			if ( $upstream !== 'php' ) {
				?><span class="chip">Custom Upstream: <?php echo strip_tags( $upstream ); ?></span><?php
			}
			?>
			<span class="chip">PHP: <?php echo strip_tags( $php_version ); ?></span>
		</div>
		<h4>
			<?php
			echo '<strong>' . strip_tags( $site_title ) . '</strong>';
			if ( true == $skip_provisioning ) {
				echo ' <a target="_blank" href="https://varyingvagrantvagrants.org/docs/en-US/config/#skip_provisioning"><small class="site_badge">provisioning skipped</small></a>';
			}
			?>
		</h4>
		<?php
		if ( ! empty( $description ) ) {
			?>
			<p><?php echo strip_tags( $description ); ?></p>
			<?php
		}
		?>
		<p class="vvv-site-links">
			<?php
			if ( !empty( $site['hosts'] ) ) {
				array_walk( $site['hosts'], function( $host ) {
					?><a class="vvv-site-link" href="<?php echo 'http://'.$host; ?>" target="_blank"><?php echo 'http://'.$host; ?></a><?php
				} );
			}

			?>
		</p>
		<?php
		$warnings = get_site_warnings( $site );
		show_warnings( $warnings );
		?>
	</article>
	<?php
}

function read_config() {
	$config_locations = [
		'/srv/vvv/config.yml',
		'/vagrant/config.yml',
		'/vagrant/vvv-custom.yml',
	];

	$config_file = false;
	foreach ( $config_locations as $location ) {
		if ( is_readable( $location ) ) {
			$config_file = $location;
			break;
		}
	}

	if ( false === $config_file ) {
		return false;
	}

	$yaml = new Alchemy\Component\Yaml\Yaml();
	return $yaml->load( $config_file );
}

function display_sites() : void {
	$data = read_config();

	if ( false === $data ) {
		echo '<p>No config file was found.</p>';
		return;
	}

	$provisioned_sites = [];
	$skipped_sites = [];

	if ( ! empty( $data['sites'] ) && is_array( $data['sites'] ) ) {
		foreach ( $data['sites'] as $name => $site ) {
			if (
				isset( $site['skip_provisioning'] )
				&& ( $site['skip_provisioning'] == true )
			) {
				$skipped_sites[ $name ] = $site;
			} else {
				$provisioned_sites[ $name ] = $site;
			}
		}
	} else {
		echo '<p>No sites were found.</p>';
	}

	if ( ! empty( $provisioned_sites ) ) {
		foreach ( $provisioned_sites as $name => $site ) {
			display_site( $name, $site );
		}
	} else {
		echo '<p>There are no provisioned sites.</p>';
	}

	if ( ! empty( $skipped_sites ) ) {
		?>
		<details class="box alt-box">
			<summary>Disabled Sites</summary>
			<p>These sites had <code>skip_provisioning: true</code> set in the config file when VVV was last provisioned. They were consequently skipped. Set this to <code>false</code> and reprovision to activate them.</p>
			<?php
			foreach ( $skipped_sites as $name => $site ) {
				display_site( $name, $site );
			}
			?>
		</details>
		<?php
	}
}

?>
<div class="vvv-sites">
	<?php
	display_sites();
	?>
</div>
