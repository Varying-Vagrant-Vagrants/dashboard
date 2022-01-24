<?php

function is_extension_enabled( $search_extension ) {
	$data = read_config();

	if ( empty( $data ) ) {
		return false;
	}

	if ( ! empty( $data['extensions'] ) ) {
		// check the extensions section
		foreach ( $data['extensions'] as $suite => $extension ) {
			if ( in_array( $search_extension, $extension, true ) ) {
				return true;
			}
		}
	}

	if ( ! empty( $data['utilities'] ) ) {
		// check the utilities fallback
		foreach ( $data['utilities'] as $suite => $extension ) {
			if ( in_array( $search_extension, $extension, true ) ) {
				return true;
			}
		}
	}

	return false;
}

?>
<div class="box">
	<h3>Tools</h3>
	<nav class="tools">
		<?php
		if ( is_extension_enabled( 'phpmyadmin' ) ) {
			?>
			<a class="button tool-phpmyadmin" href="//vvv.test/database-admin/" target="_blank">phpMyAdmin</a>
			<?php
		}

		if ( is_extension_enabled( 'memcached-admin' ) ) {
			?>
			<a class="button tool-memcached-admin" href="//vvv.test/memcached-admin/" target="_blank">phpMemcachedAdmin</a>
			<?php
		}

		if ( is_extension_enabled( 'opcache-status' ) ) {
			?>
			<a class="button tool-opcache-status" href="//vvv.test/opcache-status/opcache.php" target="_blank">Opcache Status</a>
			<?php
		}

		if ( is_extension_enabled( 'opcache-gui' ) ) {
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

		if ( is_extension_enabled( 'tideways' ) ) {
			?>
			<a class="button tool-xhgui tool-tideways" href="//xhgui.vvv.test/" target="_blank">XHGui Profiler</a>
			<?php
		}
		if ( is_extension_enabled( 'webgrind' ) ) {
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
			<a class="button tool-xdebug tool-xdebuginfo" href="//vvv.test/xdebuginfo/" target="_blank">Xdebug Info</a>
			<?php
		}
		?>
	</nav>
</div>
