<?php

require( __DIR__ . '/../../yaml.php' );
function endsWith( $haystack, $needle ) {
    $length = strlen( $needle );

    return $length === 0 || 
    ( substr( $haystack, -$length ) === $needle );
}
$yaml = new Alchemy\Component\Yaml\Yaml();
$data = $yaml->load( (file_exists('/vagrant/vvv-custom.yml')) ? '/vagrant/vvv-custom.yml' : '/vagrant/vvv-config.yml' );
?>
<script>
window.vvv_sites = <?php echo json_encode( $data['sites'] ); ?>
</script>
<div id="sitelist"></div>
