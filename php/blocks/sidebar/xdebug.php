<?php

if ( ! function_exists( 'xdebug_is_debugger_active' ) ) {
	return;
}
if ( ! xdebug_is_debugger_active() ) {
	return;
}
?>
<div class="box">
	<p>✅ Active Xdebug session detected.</p>
</div>
