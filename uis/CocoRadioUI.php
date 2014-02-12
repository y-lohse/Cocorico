<?php
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