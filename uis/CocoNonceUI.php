<?php
function cocoricoNonceUI($name, $params){
	return wp_nonce_field($params['action'], $name, true, false);
}
CocoDictionary::register('ui', 'nonce', 'cocoricoNonceUI');