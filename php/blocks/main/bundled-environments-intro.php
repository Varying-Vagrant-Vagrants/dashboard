<div class="box">
	<h3>Bundled Environments</h3>
	<p>VVV reads a config file to discover and provision sites named in <code>config/config.yml</code>. If it doesn't exist, it falls back to <code>config/default-config.yml</code>.
	<?php if ( ! file_exists( '/srv/config/config.yml' ) ) { ?>
		<b><code>config.yml</code> does not exist! Please copy <code>config/default-config.yml</code> to <code>config/config.yml</code></b>
	<?php } else { ?>
		Below is a list of the sites in <code>config.yml</code>, remember to reprovision if you change it!
	<?php } ?>
</div>
