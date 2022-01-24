<?php
$version = 0;
if ( file_exists( '/vagrant/version' ) && is_readable( '/vagrant/version' ) ) {
	$version = file_get_contents( '/vagrant/version' );
}

$root_warning = file_exists( '/vagrant/provisioned_as_root' );

?><!DOCTYPE html>
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
