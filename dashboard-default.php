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
				<img src="/dashboard/vvv-tight.png"/> VVV
			</h2>
			<small class="version">v<?php echo strip_tags( $version ); ?></small>
		</header>
		<?php
		require_once( __DIR__ . '/php/notices.php' );
		?>
		<section>
			<div class="grid">
				<main class="column left-column">
					<?php
					require_once __DIR__ . '/php/blocks/main/sites.php';
					require_once __DIR__ . '/php/blocks/main/adding-site-doc.php';
					?>
				</main>
				<aside class="column right-column">
					<?php
					require_once __DIR__ . '/php/blocks/sidebar/bundled-tools.php';
					require_once __DIR__ . '/php/blocks/sidebar/inclusivity.php';
					?>
				</aside>
			</div>
		</section>
		<footer>
			<details>
				<summary>Advanced</summary>

				<div class="grid50">
					<div>
						<?php
						require_once __DIR__ . '/php/blocks/main/php-status.php';
						?>
					</div>
					<div>
						<?php
						require_once __DIR__ . '/php/blocks/sidebar/environment.php';
						require_once __DIR__ . '/php/blocks/sidebar/disk-info.php';
						require_once __DIR__ . '/php/blocks/sidebar/find-out-more-vvv.php';
						?>
					</div>

				</div>
			</details>
		</footer>
	</body>
</html>
