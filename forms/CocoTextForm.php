<?php
class CocoTextForm extends CocoForm{
	
	public function render($params){
		$value = get_option($params['name']);
		$output = '<input type="text" name="'.$params['name'].'" value="'.$value.'" />';
		return $output;
	}
	
}