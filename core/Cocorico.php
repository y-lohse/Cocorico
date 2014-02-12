<?php
class Cocorico{
	
	protected $uis = array();
	protected $validated = true;//default to true so that the nonce filter runs
	
	public function __construct(){
//		$nonce_action = 'cocorico_nonce_validation';
//		$nonce = $this->field('CocoNonceUI', 'coco_nonce', array('action'=>$nonce_action))->filter('CocoNonceFilter', array('action'=>$nonce_action));
//		$this->validated = (bool)$nonce->getValue();
	}
	
	public function field($ui, $name, $params=array()){
		$fn = CocoDictionary::translate($ui, 'ui');
		$instance = new CocoUI($name, $fn);
		//if (!$this->validated) $instance->preventFilters();
		array_push($this->uis, array($instance, $params));
		return $instance;
	}
	
	public function render(){
		foreach ($this->uis as $ui){
			echo $ui[0]->render($ui[1]);
		}
	}
	
}