<?php
function cocoricoSaveFilter($value, $params){
	update_option($params['name'], $value);
	return $value;
}
CocoDictionary::register('filter', 'save', 'cocoricoSaveFilter');