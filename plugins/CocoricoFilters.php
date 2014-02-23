<?php
//save to wordpress options
function cocoricoSaveFilter($value, $name, $component){
	$component->getStore()->set($name, $value);
	return $value;
}
CocoDictionary::register(CocoDictionary::FILTER, 'save', 'cocoricoSaveFilter');

//strips backslahes
function cocoricoStripSlashFilter($value){
	return stripslashes($value);
}
CocoDictionary::register(CocoDictionary::FILTER, 'stripslashes', 'cocoricoStripSlashFilter');

//nonce validation
function cocoricoNonceFilter($value, $action){
	$result = wp_verify_nonce($value, $action);
	
	if ($result) return $value;
	else return CocoComponent::STOP_FILTERS;
}
CocoDictionary::register(CocoDictionary::FILTER, 'nonce', 'cocoricoNonceFilter');