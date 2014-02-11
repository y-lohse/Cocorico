<?php
class CocoUI{
	
	protected $forms = array();
	
	public function __construct(){
	}
	
	public function field($form, $params){
		if (class_exists($form)){
			$form = new $form();
			array_push($this->forms, array($form, $params));
//			echo $form->render($params);
			return $form;
		}
	}
	
	public function render(){
		foreach ($this->forms as $form){
			echo $form[0]->render($form[1]);
		}
	}
	
}