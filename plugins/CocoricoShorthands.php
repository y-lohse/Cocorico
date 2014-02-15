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
function cocoricoInputShorthand($cocorico, $params){
	$cocorico->startWrapper('tr');
	
	$cocorico->startWrapper('th');
	$cocorico->field('label', $params['label'], $params['name']);
	$cocorico->endWrapper('th');
	
	$cocorico->startWrapper('td');
	$cocorico->field('input', $params['name'], $params['type'])->filter('save', $params['name']);
	$cocorico->endWrapper('td');
	
	$cocorico->endWrapper('tr');
}
CocoDictionary::register('shorthand', 'input', 'cocoricoInputShorthand');