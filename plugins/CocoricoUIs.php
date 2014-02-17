<?php
//raw text
//function cocoricoRawUI($content){
//	return $content;
//}
//CocoDictionary::register('ui', 'raw', 'cocoricoRawUI');
//
////link
//function cocoricoLinkUI($href, $content, $options=array()){
//	$output = '<a';
//	
//	$attrs = array(
//		'href'=>$href,
//	);
//	$attrs['class'] = (is_array($options['class'])) ? implode($options['class'], ' ') : $options['class'];
//	
//	foreach ($attrs as $name=>$value){
//		$output .= ' '.$name.'="'.esc_attr($value).'"';
//	}
//	
//	$output .= '>'.$content.'</a>';
//	return $output;
//}
//CocoDictionary::register('ui', 'link', 'cocoricoLinkUI');

//nonce
function cocoricoNonceUI($ui, $action){
	return wp_nonce_field($action, $ui->getName(), true, false);
}
CocoDictionary::register('ui', 'nonce', 'cocoricoNonceUI');

//submit button
function cocoricoSubmitUI($ui, $options=array()){
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
CocoDictionary::register('ui', 'submit', 'cocoricoSubmitUI');

//label
function cocoricoLabelUI($ui, $for){
	$output = '<label for="'.esc_attr($for).'">'.$ui->getName().'</label>';
	return $output;
}
CocoDictionary::register('ui', 'label', 'cocoricoLabelUI');

//text input
function cocoricoInputUI($ui, $type='text', $options=array()){
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
CocoDictionary::register('ui', 'input', 'cocoricoInputUI');

//radio button set
function cocoricoRadioUI($ui, $radios, $options=array()){
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
CocoDictionary::register('ui', 'radio', 'cocoricoRadioUI');