<?php
//class CocoTextUI extends AbstractCocoUI{
//	
//	//saved is the key to a wordpress option containing the value
//	//value is the direct value to output
//	public function render($params){
//		$option_key = (isset($params['saved'])) ? $params['saved'] : $this->name;
//		$value = (isset($params['value'])) ? $params['value'] : get_option($option_key);
//		$output = '<input type="text" name="'.$this->name.'" value="'.$value.'" />';
//		return $output;
//	}
//	
//}

//CocoDictionary::register('text', 'CocoTextUI');


function coco_text($name, $params){
	$option_key = (isset($params['saved'])) ? $params['saved'] : $name;
	$value = (isset($params['value'])) ? $params['value'] : get_option($option_key);
	
	$output = '<input type="text" name="'.$name.'" value="'.$value.'" />';
	return $output;
}
CocoDictionary::register('ui', 'text', 'coco_text');