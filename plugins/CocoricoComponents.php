<?php
//raw text
function cocoricoRawComponent($component){
	return $component->getName();
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'raw', 'cocoricoRawComponent');

//description
function cocoricoDescriptionComponent($component){
	return '<p class="description">'.$component->getName().'</p>';
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'description', 'cocoricoDescriptionComponent');

//link
function cocoricoLinkComponent($component, $href, $options=array()){
	$output = '<a';
	
	$attrs = array(
		'href'=>$href,
	);
	$attrs['class'] = (is_array($options['class'])) ? implode($options['class'], ' ') : $options['class'];
	
	foreach ($attrs as $name=>$value){
		$output .= ' '.$name.'="'.esc_attr($value).'"';
	}
	
	$output .= '>'.$component->getName().'</a>';
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'link', 'cocoricoLinkComponent');

//nonce
function cocoricoNonceComponent($component, $action){
	return wp_nonce_field($action, $component->getName(), true, false);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'nonce', 'cocoricoNonceComponent');

//label
function cocoricoLabelComponent($component, $for){
	$output = '<label for="'.esc_attr($for).'">'.$component->getName().'</label>';
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'label', 'cocoricoLabelComponent');

//text input
function cocoricoInputComponent($component, $type='text', $options=array()){
	$options = array_merge(array(
		'class'=>array(),
	), $options);
	
	$value = (isset($options['value'])) ? $options['value'] : $component->getValue();
	
	$attrs = array(
		'type'=>$type,
		'name'=>$component->getName(),
		'id'=>$component->getName(),
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
CocoDictionary::register(CocoDictionary::COMPONENT, 'input', 'cocoricoInputComponent');

//submit button
function cocoricoSubmitComponent($component, $options=array()){
	$options = array_merge(array(
		'class'=>array('button', 'button-primary'),
		'value'=>'Save'
	), $options);
	return cocoricoInputComponent($component, 'submit', $options);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'submit', 'cocoricoSubmitComponent');

//radio button set
function cocoricoRadioComponent($component, $radios, $options=array()){
	$options = array_merge(array(
		'before'=>'',
		'after'=>''
	), $options);
	
	$output = '';
	$selected = $component->getValue();

	foreach ($radios as $label=>$value){
		$output .= $options['before'];
		$output .= '
		<label>
			<input type="radio" name="'.$component->getName().'" value="'.$value.'" '.(($selected == $value) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
		$output .= $options['after'];
	}

	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'radio', 'cocoricoRadioComponent');

//checkbox button set
function cocoricoCheckboxComponent($component, $checkboxes, $options=array()){
	$options = array_merge(array(
		'before'=>'',
		'after'=>''
	), $options);
	
	$output = '';
	$selected = $component->getValue();

	foreach ($checkboxes as $label=>$value){
		$output .= $options['before'];
		$output .= '
		<label>
			<input type="checkbox" name="'.$component->getName().'[]" value="'.$value.'" '.((in_array($value, $selected)) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
		$output .= $options['after'];
	}

	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'checkbox', 'cocoricoCheckboxComponent');