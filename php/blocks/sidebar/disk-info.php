<div class="box disk-info">
	<h3>Disk Space</h3>

	<?php
	$v_free_space_mb = round( disk_free_space( '/' ) / 1024 / 1024, 1 );
	$v_free_space_gb = round( $v_free_space_mb / 1024, 1 );
	$v_total_space   = round( disk_total_space( '/' ) / 1024 / 1024 / 1024, 0 );
	$v_used_space    = round( $v_total_space - ( $v_free_space_mb / 1024 ), 1 );
	$v_used_percent  = round( ( $v_used_space / $v_total_space ) * 100, 0 );
	$v_low_space     = ( 200 > $v_free_space_mb );
	$v_free_space    = ( $v_free_space_mb < 1024 ) ? $v_free_space_mb . ' MB' : $v_free_space_gb . ' GB';
	?>
	<div class="disk">
		<div class="disk-header-meta">
			<div class="disk-label">VVV Guest VM</div>
			<div class="disk-total"><?php echo $v_total_space; ?> GB</div>
		</div>
		<div class="disk-use-bar"><div class="inner<?php echo $v_low_space ? ' low' : ''; ?>" style="width: <?php echo $v_used_percent; ?>%"></div></div>
		<div class="disk-footer-meta">
			<div class="disk-used"><small><?php echo $v_used_space; ?> GB (<?php echo $v_used_percent; ?>%)</small></div>
			<div class="disk-free"><small><?php echo $v_free_space; ?></small></div>
		</div>
	</div>

	<?php
	$p_free_space_mb = round( disk_free_space( '.' ) / 1024 / 1024, 1 );
	$p_free_space_gb = round( $p_free_space_mb / 1024, 1 );
	$p_total_space   = round( disk_total_space( '.' ) / 1024 / 1024 / 1024, 0 );
	$p_used_space    = round( $p_total_space - ( $p_free_space_mb / 1024 ), 1 );
	$p_used_percent  = round( ( $p_used_space / $p_total_space ) * 100, 0 );
	$p_low_space     = ( 200 > $p_free_space_mb );
	$p_free_space    = ( $p_free_space_mb < 1024 ) ? $p_free_space_mb . ' MB' : $p_free_space_gb . ' GB';
	?>
	<div class="disk">
		<div class="disk-header-meta">
			<div class="disk-label">Host Machine</div>
			<div class="disk-total"><?php echo $p_total_space; ?> GB</div>
		</div>
		<div class="disk-use-bar"><div class="inner<?php echo $p_low_space ? ' low' : ''; ?>" style="width: <?php echo $p_used_percent; ?>%"></div></div>
		<div class="disk-footer-meta">
			<div class="disk-used"><small><?php echo $p_used_space; ?> GB (<?php echo $p_used_percent; ?>%)</small></div>
			<div class="disk-free"><small><?php echo $p_free_space; ?></small></div>
		</div>
	</div>

	<?php if ( $v_low_space || $p_low_space ) : ?>
		<div id="vvv_disk_space_fail"><strong>Warning:</strong> Low disk space!</div>
	<?php endif; ?>
</div>
