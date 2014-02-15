<?php
function cocoricoSettingShorthand($cocorico, $params){
	$cocorico->startWrapper('tr');
	
	$cocorico->startWrapper('th');
	$cocorico->field('label', $params['label'], $params['name']);
	$cocorico->endWrapper('th');
	
	$cocorico->startWrapper('td');
	$cocorico->field($params['type'], $params['name'])->filter('save', $params['name']);
	$cocorico->endWrapper('td');
	
	$cocorico->endWrapper('tr');
}
CocoDictionary::register('shorthand', 'setting', 'cocoricoSettingShorthand');