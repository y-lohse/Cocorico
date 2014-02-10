<?php
class CocoUI{
	
	public function __construct(){
	}
	
	public function field($form, $params){
		if (class_exists($form)){
			echo $form::render($params);
		}
		
		//could return an instance of cocoform, and that woudl then have the filter method
		return $this;
	}
	
	public function filter($filter, $data, $params){
		if (class_exists($filter)){
			$filter::apply($data, $params);
		}
	}
	
}