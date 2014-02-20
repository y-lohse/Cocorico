<?php
//save to wordpress options
function cocoricoSaveFilter($ui, $name){
	$value = $ui->getValue();
	$ui->getStore()->set($name, $value);
	return $value;
}
CocoDictionary::register(CocoDictionary::FILTER, 'save', 'cocoricoSaveFilter');

//strips backslahes
function cocoricoStripSlashFilter($ui){
	return stripslashes($ui->getValue());
}
CocoDictionary::register(CocoDictionary::FILTER, 'stripslashes', 'cocoricoStripSlashFilter');

//nonce validation
function cocoricoNonceFilter($ui, $action){
	$value = $ui->getValue();
	$result = wp_verify_nonce($value, $action);
	
	if ($result) return $value;
	else return CocoComponent::STOP_FILTERS;
}
CocoDictionary::register(CocoDictionary::FILTER, 'nonce', 'cocoricoNonceFilter');