<?php
function cocoricoTextUI($name, $params){
	//saved is the key to a wordpress option containing the value
	//value is the direct value to output
	$option_key = (isset($params['saved'])) ? $params['saved'] : $name;
	$value = (isset($params['value'])) ? $params['value'] : get_option($option_key);
	
	$output = '<input type="text" name="'.$name.'" value="'.$value.'" />';
	return $output;
}
CocoDictionary::register('ui', 'text', 'cocoricoTextUI');