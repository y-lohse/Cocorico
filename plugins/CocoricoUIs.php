<?php
//nonce
function cocoricoNonceUI($name, $params){
	return wp_nonce_field($params['action'], $name, true, false);
}
CocoDictionary::register('ui', 'nonce', 'cocoricoNonceUI');

//text input
function cocoricoTextUI($name, $params){
	//saved is the key to a wordpress option containing the value
	//value is the direct value to output
	$option_key = (isset($params['saved'])) ? $params['saved'] : $name;
	$value = (isset($params['value'])) ? $params['value'] : get_option($option_key);
	
	$output = '<input type="text" name="'.$name.'" value="'.$value.'" />';
	return $output;
}
CocoDictionary::register('ui', 'text', 'cocoricoTextUI');

//radio button set
function cocoricoRadioUI($name, $params){
	$output = '';
	$options = $params['options'];
	$selected = get_option($name);

	foreach ($options as $label=>$value){
		$output .= '
		<label>
			<input type="radio" name="'.$name.'" value="'.$value.'" '.(($selected == $value) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
	}

	return $output;
}
CocoDictionary::register('ui', 'radio', 'cocoricoRadioUI');