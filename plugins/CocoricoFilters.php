<?php
//save to wordpress options
function cocoricoSaveFilter($component, $name){
	$value = $component->getValue();
	$component->getStore()->set($name, $value);
	return $value;
}
CocoDictionary::register(CocoDictionary::FILTER, 'save', 'cocoricoSaveFilter');

//strips backslahes
function cocoricoStripSlashFilter($component){
	return stripslashes($component->getValue());
}
CocoDictionary::register(CocoDictionary::FILTER, 'stripslashes', 'cocoricoStripSlashFilter');

//nonce validation
function cocoricoNonceFilter($component, $action){
	$value = $component->getValue();
	$result = wp_verify_nonce($value, $action);
	
	if ($result) return $value;
	else return CocoComponent::STOP_FILTERS;
}
CocoDictionary::register(CocoDictionary::FILTER, 'nonce', 'cocoricoNonceFilter');