<?php
class CocoTextUI extends CocoUI{
	
	public function render($params){
		$value = get_option($this->name);
		$output = '<input type="text" name="'.$this->name.'" value="'.$value.'" />';
		return $output;
	}
	
}