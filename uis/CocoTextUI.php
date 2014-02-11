<?php
class CocoTextUI extends AbstractCocoUI{
	
	public function render($params){
		$value = get_option($this->name);
		$output = '<input type="text" name="'.$this->name.'" value="'.$value.'" />';
		return $output;
	}
	
}