<?php
class CocoTextForm extends CocoForm{
	
	public function render($params){
		$value = get_option($this->name);
		$output = '<input type="text" name="'.$this->name.'" value="'.$value.'" />';
		return $output;
	}
	
}