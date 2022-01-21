<?php
function is_utility_enabled( $search_utility ) {
	$data = read_config();
	$found = false;
	foreach ( $data['utilities'] as $suite => $utility ) {
		if (
			isset( $utility[ $search_utility ] )
		) {
			$found = true;
		}
	}

	return $found;
}
?>
<div class="box">
	<h3>Tools</h3>
	<nav class="tools">
		<?php
		if ( is_utility_enabled( 'phpmyadmin' ) ) {
			?>
			<a class="button tool-phpmyadmin" href="//vvv.test/database-admin/" target="_blank">phpMyAdmin</a>
			<?php
		}

		if ( is_utility_enabled( 'memcached-admin' ) ) {
			?>
			<a class="button tool-memcached-admin" href="//vvv.test/memcached-admin/" target="_blank">phpMemcachedAdmin</a>
			<?php
		}

		if ( is_utility_enabled( 'opcache-status' ) ) {
			?>
			<a class="button tool-opcachestatus" href="//vvv.test/opcache-status/opcache.php" target="_blank">Opcache Status</a>
			<?php
		}

		if ( is_utility_enabled( 'opcache-gui' ) ) {
			?>
			<a class="button tool-opcache-gui" href="//vvv.test/opcache-gui/" target="_blank">Opcache Gui</a>
			<?php
		}

		if ( file_exists( '/usr/local/bin/mailhog' ) ) {
			?>
			<a class="button tool-mailhog" href="http://vvv.test:8025" target="_blank">📨 MailHog</a>
			<?php
		} else if ( file_exists( '/usr/local/rvm/bin/mailcatcher' ) ) {
			?>
			<a class="button tool-mailcatcher" href="http://vvv.test:1080" target="_blank">📨 Mailcatcher</a>
			<?php
		}

		if ( is_utility_enabled( 'tideways' ) ) {
			?>
			<a class="button tool-xhgui" href="//xhgui.vvv.test/" target="_blank">XHGui Profiler</a>
			<?php
		}
		if ( is_utility_enabled( 'webgrind' ) ) {
			?>
			<a class="button tool-webgrind" href="//vvv.test/webgrind/" target="_blank">Webgrind</a>
			<?php
		}
		?>
		<a class="button tool-phpinfo" href="//vvv.test/phpinfo/" target="_blank">PHP Info</a>
		<a class="button tool-phpstatus" href="php-status?html&amp;full" target="_blank">PHP Status</a>
		<?php
		if ( extension_loaded( 'xdebug' ) && is_dir( '/srv/www/default/xdebuginfo/' ) ) {
			?>
			<a class="button tool-xdebuginfo" href="//vvv.test/xdebuginfo/" target="_blank">Xdebug Info</a>
			<?php
		}
		?>
	</nav>
</div>
