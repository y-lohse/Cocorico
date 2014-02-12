<?php
//save to wordpress options
function cocoricoSaveFilter($value, $params){
	update_option($params['name'], $value);
	return $value;
}
CocoDictionary::register('filter', 'save', 'cocoricoSaveFilter');

//nonce validation
function cocoricoNonceFilter($value, $params){
	$result = wp_verify_nonce($value, $params['action']);
		
	if ($result) return $value;
	else return false;
}
CocoDictionary::register('filter', 'nonce', 'cocoricoNonceFilter');