<?php
//save to wordpress options
function cocoricoSaveFilter($value, $name){
	update_option($name, $value);
	return $value;
}
CocoDictionary::register('filter', 'save', 'cocoricoSaveFilter');

//nonce validation
function cocoricoNonceFilter($value, $action){
	$result = wp_verify_nonce($value, $action);
	
	if ($result) return $value;
	else return false;
}
CocoDictionary::register('filter', 'nonce', 'cocoricoNonceFilter');