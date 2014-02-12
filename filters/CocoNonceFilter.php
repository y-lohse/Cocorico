<?php
function cocoricoNonceFilter($value, $params){
	$result = wp_verify_nonce($value, $params['action']);
		
	if ($result) return $value;
	else return false;
}
CocoDictionary::register('filter', 'nonce', 'cocoricoNonceFilter');