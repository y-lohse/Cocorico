<?php
//nonce
function cocoricoNonceUI($name, $action){
	return wp_nonce_field($action, $name, true, false);
}
CocoDictionary::register('ui', 'nonce', 'cocoricoNonceUI');

//submit button
function cocoricoSubmitUI($name, $options=array()){
	$options = array_merge(array(
		'class'=>array('button', 'button-primary')
	), $options);
	
	$attrs = array(
		'type'=>'submit',
		'name'=>$name,
	);
	$attrs['class'] = (is_array($options['class'])) ? implode($options['class'], ' ') : $options['class'];
	if (isset($options['value'])) $attrs['value'] = $options['value'];
	
	$output = '<input';
	foreach ($attrs as $name=>$value){
		$output .= ' '.$name.'="'.esc_attr($value).'"';
	}
	$output .= ' />';
	
	return $output;
}
CocoDictionary::register('ui', 'submit', 'cocoricoSubmitUI');

//label
function cocoricoLabelUI($label, $for){
	$output = '<label for="'.esc_attr($for).'">'.$label.'</label>';
	return $output;
}
CocoDictionary::register('ui', 'label', 'cocoricoLabelUI');

//text input
function cocoricoTextUI($name, $options=array()){
	$options = array_merge(array(
	), $options);
	
	//saved is the key to a wordpress option containing the value
	//value is the direct value to output
	$option_key = (isset($options['saved'])) ? $options['saved'] : $name;
	$value = (isset($options['value'])) ? $options['value'] : get_option($option_key);
	
	$attrs = array(
		'type'=>'text',
		'name'=>$name,
		'id'=>$name,
		'value'=>$value
	);
	$attrs['class'] = (is_array($options['class'])) ? implode($options['class'], ' ') : $options['class'];
	
	$output = '<input';
	foreach ($attrs as $name=>$value){
		$output .= ' '.$name.'="'.esc_attr($value).'"';
	}
	$output .= ' />';
	
	return $output;
}
CocoDictionary::register('ui', 'text', 'cocoricoTextUI');

//radio button set
function cocoricoRadioUI($name, $radios, $options=array()){
	$options = array_merge(array(
		'before'=>'',
		'after'=>''
	), $options);
	
	$output = '';
	$selected = get_option($name);

	foreach ($radios as $label=>$value){
		$output .= $options['before'];
		$output .= '
		<label>
			<input type="radio" name="'.$name.'" value="'.$value.'" '.(($selected == $value) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
		$output .= $options['after'];
	}

	return $output;
}
CocoDictionary::register('ui', 'radio', 'cocoricoRadioUI');