<?php
class CocoUI{
	
	protected $forms = array();
	
	public function __construct(){
	}
	
	public function field($form, $name, $params=array()){
		if (class_exists($form)){
			$form = new $form($name);
			array_push($this->forms, array($form, $params));
			return $form;
		}
	}
	
	public function render(){
		foreach ($this->forms as $form){
			echo $form[0]->render($form[1]);
		}
	}
	
}