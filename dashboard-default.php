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
	'php'                 => [
		'debug_extensions' => [
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
		],
	],
];

$current_debug_ext = 'none';
foreach ( $environment['php']['debug_extensions'] as $ext => $options ) {
	$environment['php']['debug_extensions'][ $ext ]['active'] = false;
	if ( extension_loaded( $ext ) ) {
		$environment['php']['debug_extensions'][ $ext ]['active'] = true;
		$current_debug_ext = $ext;
	}
}
$environment['php']['current_debug_extension'] = $current_debug_ext;

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
		'title'       => 'XDebug Info',
		'url'         => '//vvv.test/xdebuginfo/',
		'description' => '...',
	];
}

$vvv = [
	'config'      => $initial_config,
	'environment' => $environment,
	'tools'       => $tools,
];

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
			window.vvv = <?php echo json_encode( $vvv ); ?>;
		</script>
		<script defer="defer" src="/dashboard/dist/main.js"></script>
	</head>
	<body class="has-navbar-fixed-bottom">
		<section id="container" class=""></section>
	</body>
</html>
