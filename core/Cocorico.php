<?php
class Cocorico{
	
	protected $forms = array();
	protected $validated = true;//default to true so that the nonce filter runs
	
	public function __construct(){
		$nonce_action = 'cocorico_nonce_validation';
		$nonce = $this->field('CocoNonceUI', 'coco_nonce', array('action'=>$nonce_action))->filter('CocoNonceFilter', array('action'=>$nonce_action));
		$this->validated = (bool)$nonce->getValue();
	}
	
	public function field($form, $name, $params=array()){
		if (class_exists($form)){
			$form = new $form($name);
			if (!$this->validated) $form->preventFilters();
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