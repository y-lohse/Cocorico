<?php
//save to wordpress options
function cocoricoSaveFilter($value, $name){
	var_dump('saving');
	update_option($name, $value);
//	update_post_meta($post_id, 'etendard_portfolio_client', $client);
	return $value;
}
CocoDictionary::register('filter', 'save', 'cocoricoSaveFilter');

//strips backslahes
function cocoricoStripSlashFilter($value){
	return stripslashes($value);
}
CocoDictionary::register('filter', 'stripslashes', 'cocoricoStripSlashFilter');

//nonce validation
function cocoricoNonceFilter($value, $action){
	$result = wp_verify_nonce($value, $action);
	
	if ($result) return $value;
	else return false;
}
CocoDictionary::register('filter', 'nonce', 'cocoricoNonceFilter');