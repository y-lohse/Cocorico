<?php
//starts a table form wrapper
function cocoricoFormTableStartShorthand($cocorico){
	$cocorico->startWrapper('form-table');
}
CocoDictionary::register('shorthand', 'startForm', 'cocoricoFormTableStartShorthand');

//ends a table form wrapper
function cocoricoFormTableEndShorthand($cocorico){
	$cocorico->endWrapper('form-table');
}
CocoDictionary::register('shorthand', 'endForm', 'cocoricoFormTableEndShorthand');

//input field in a table
function cocoricoSettingShorthand($cocorico, $params){
	$cocorico->startWrapper('tr');
	
	$cocorico->startWrapper('th');
	if (!in_array($params['type'], array('radio'))){
		$cocorico->field('label', $params['label'], $params['name']);
	}
	else{
		$cocorico->field('raw', $params['label']);
	}
	$cocorico->endWrapper('th');
	
	$cocorico->startWrapper('td');
	
	switch ($params['type']){
		case 'radio':
			if (!isset($params['options'])) $params['options'] = array();
			$cocorico->field('radio', $params['name'], $params['radios'], $params['options'])->filter('save', $params['name']);
			break;
		default:
			if (!isset($params['options'])) $params['options'] = array();
			$cocorico->field('input', $params['name'], $params['type'], $params['options'])->filter('save', $params['name']);
			break;
	}
	$cocorico->endWrapper('td');
	
	$cocorico->endWrapper('tr');
}
CocoDictionary::register('shorthand', 'setting', 'cocoricoSettingShorthand');