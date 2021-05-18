<?php

require_once 'php/yaml.php';

$version = file_get_contents( '/vagrant/version' );
$root_warning = file_exists( '/vagrant/provisioned_as_root' );

$initial_config = [];

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

if ( false !== $config_file ) {
	$yaml = new Alchemy\Component\Yaml\Yaml();
	$initial_config = $yaml->load( $config_file );
}

$tools = [
	[
		'title'       => 'PHP Info',
		'url'         => '//vvv.test/phpinfo/',
		'description' => 'View PHP Info',
	],
	[
		'title'       => 'PHP Status',
		'url'         => '//vvv.test/php-status?html&amp;full',
		'description' => '',
	],
];

$environment = [
	'version'             => $version,
	'provisioned_as_root' => $root_warning,
];

//<a class="button tool-phpstatus" href="" target="_blank">PHP Status</a>

if ( is_dir( '/srv/www/default/database-admin/' ) ) {
	$tools[] = [
		'title'       => 'phpMyAdmin',
		'url'         => '//vvv.test/database-admin/',
		'description' => 'SQL database config, use root and root as the username and password.',
	];
}

if ( is_dir( '/srv/www/default/memcached-admin/' ) ) {
	$tools[] = [
		'title'       => 'Memcached Admin',
		'url'         => '//vvv.test/memcached-admin/',
		'description' => '...',
	];
}

if ( is_dir( '/srv/www/default/opcache-status/' ) ) {
	$tools[] = [
		'title'       => 'Opcache Status',
		'url'         => '//vvv.test/opcache-status/opcache.php',
		'description' => '...',
	];
}

if ( is_dir( '/srv/www/default/opcache-gui/' ) ) {
	$tools[] = [
		'title'       => 'Opcache GUI Admin',
		'url'         => '//vvv.test/opcache-gui/',
		'description' => '...',
	];
}

if ( file_exists( '/usr/local/bin/mailhog' ) ) {
	$tools[] = [
		'title'       => 'MailHog',
		'url'         => 'http://vvv.test:8025',
		'description' => '...',
	];
} elseif ( file_exists( '/usr/local/rvm/bin/mailcatcher' ) ) {
	$tools[] = [
		'title'       => 'Mailcatcher',
		'url'         => 'http://vvv.test:1080',
		'description' => '...',
	];
}

if ( is_dir( '/srv/www/default/xhgui/' ) ) {
	$tools[] = [
		'title'       => 'XHGui Profiler',
		'url'         => '//xhgui.vvv.test/',
		'description' => '...',
	];
}
if ( is_dir( '/srv/www/default/webgrind/' ) ) {
	$tools[] = [
		'title'       => 'Webgrind',
		'url'         => '//vvv.test/webgrind/',
		'description' => '...',
	];
}

if ( extension_loaded( 'xdebug' ) && is_dir( '/srv/www/default/xdebuginfo/' ) ) {
	$tools[] = [
		'title'       => 'Xdebug Info',
		'url'         => '//vvv.test/xdebuginfo/',
		'description' => '...',
	];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>VVV</title>
		<link rel="shortcut icon" href="/dashboard/vvv-tight.png">
		<link href="https://unpkg.com/@fortawesome/fontawesome-free@5.13.0/css/all.css" rel="stylesheet" />
		<link href="/dashboard/dist/css/style.css" rel="stylesheet">
		<script>
			window.vvv = <?php echo json_encode( [ 'config' => $initial_config, 'tools' => $tools, 'environment' => $environment ] ); ?>;
		</script>
		<script defer="defer" src="/dashboard/dist/main.js"></script>
	</head>
	<body class="has-navbar-fixed-bottom">
		<section id="container" class=""></section>
	</body>
</html>
<?php

return;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>VVV Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="/dashboard/style.css?t=<?php echo intval( filemtime( __DIR__ . '/style.css' ) ); ?>">
		<link rel="shortcut icon" href="/dashboard/vvv-tight.png">
	</head>
	<body class="<?php echo $root_warning ? 'root-warning' : ''; ?>">
		<header>
			<h2 id="vvv_logo">
				<img src="/dashboard/vvv-tight.png"/> VVV v<span class="version"><?php echo strip_tags( $version ); ?></span>
			</h2>
		</header>
		<?php
		require_once( __DIR__ . '/php/notices.php' );
		?>
		<div class="grid">
			<main class="column left-column">
				<?php
				require_once __DIR__ . '/php/blocks/main/sites.php';
				require_once __DIR__ . '/php/blocks/main/adding-site-doc.php';
				require_once __DIR__ . '/php/blocks/main/php-status.php';
				?>
			</main>
			<aside class="column right-column">
				<?php
				require_once __DIR__ . '/php/blocks/sidebar/inclusivity.php';
				require_once __DIR__ . '/php/blocks/sidebar/bundled-tools.php';
				require_once __DIR__ . '/php/blocks/sidebar/search-docs.php';
				require_once __DIR__ . '/php/blocks/sidebar/disk-info.php';
				require_once __DIR__ . '/php/blocks/sidebar/find-out-more-vvv.php';
				?>
			</aside>
		</div>
	</body>
</html>
