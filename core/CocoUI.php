<?php
class CocoUI{
	
	public function __construct(){
	}
	
	public function field($type, $params){
		if (class_exists($type)){
			echo $type::render($params);
		}
	}
	
}