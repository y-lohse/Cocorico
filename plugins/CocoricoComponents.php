<?php
//raw text
function cocoricoRawComponent($ui){
	return $ui->getName();
}
CocoDictionary::register('ui', 'raw', 'cocoricoRawComponent');

//link
function cocoricoLinkComponent($ui, $href, $options=array()){
	$output = '<a';
	
	$attrs = array(
		'href'=>$href,
	);
	$attrs['class'] = (is_array($options['class'])) ? implode($options['class'], ' ') : $options['class'];
	
	foreach ($attrs as $name=>$value){
		$output .= ' '.$name.'="'.esc_attr($value).'"';
	}
	
	$output .= '>'.$ui->getName().'</a>';
	return $output;
}
CocoDictionary::register('ui', 'link', 'cocoricoLinkComponent');

//nonce
function cocoricoNonceComponent($ui, $action){
	return wp_nonce_field($action, $ui->getName(), true, false);
}
CocoDictionary::register('ui', 'nonce', 'cocoricoNonceComponent');

//submit button
function cocoricoSubmitComponent($ui, $options=array()){
	$options = array_merge(array(
		'class'=>array('button', 'button-primary')
	), $options);
	
	$attrs = array(
		'type'=>'submit',
		'name'=>$ui->getName(),
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
CocoDictionary::register('ui', 'submit', 'cocoricoSubmitComponent');

//label
function cocoricoLabelComponent($ui, $for){
	$output = '<label for="'.esc_attr($for).'">'.$ui->getName().'</label>';
	return $output;
}
CocoDictionary::register('ui', 'label', 'cocoricoLabelComponent');

//text input
function cocoricoInputComponent($ui, $type='text', $options=array()){
	$options = array_merge(array(
		'class'=>array(),
	), $options);
	
	$value = (isset($options['value'])) ? $options['value'] : $ui->getValue();
	
	$attrs = array(
		'type'=>$type,
		'name'=>$ui->getName(),
		'id'=>$ui->getName(),
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
CocoDictionary::register('ui', 'input', 'cocoricoInputComponent');

//radio button set
function cocoricoRadioComponent($ui, $radios, $options=array()){
	$options = array_merge(array(
		'before'=>'',
		'after'=>''
	), $options);
	
	$output = '';
	$selected = $ui->getValue();

	foreach ($radios as $label=>$value){
		$output .= $options['before'];
		$output .= '
		<label>
			<input type="radio" name="'.$ui->getName().'" value="'.$value.'" '.(($selected == $value) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
		$output .= $options['after'];
	}

	return $output;
}
CocoDictionary::register('ui', 'radio', 'cocoricoRadioComponent');

function cocoricoDescriptionComponent($ui){
	return '<p class="description">'.$ui->getName().'</p>';
}
CocoDictionary::register('ui', 'description', 'cocoricoDescriptionComponent');