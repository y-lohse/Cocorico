<?php
class Cocorico{
	
	protected $stack = array();
	protected $validated = true;//default to true so that the nonce filter runs
	protected $autoForm;
	
	public function __construct($autoForm=true, $autoNonce=true){
		$this->autoForm = $autoForm;
		if ($this->autoForm) $this->startWrapper('form');
		if ($autoNonce) $this->nonce();
	}
	
	public function nonce(){
		$nonce_action = 'cocorico_nonce_validation';
		$nonce = $this->field('nonce', 'coco_nonce', array('action'=>$nonce_action))->filter('nonce', array('action'=>$nonce_action));
		$this->validated = (bool)$nonce->getValue();
	}
	
	public function field($ui, $name, $params=array()){
		$fn = CocoDictionary::translate($ui, 'ui');
		
		$instance = new CocoUI($name, $fn);
		if (!$this->validated) $instance->preventFilters();
		
		array_push($this->stack, array( 'action'=>'render',
										'instance'=>$instance, 
										'params'=>$params));
		
		return $instance;
	}
	
	public function startWrapper($name){
		array_push($this->stack, array('action'=>'startBuffer'));
	}
	
	public function endWrapper($name){
		array_push($this->stack, array( 'action'=>'endBuffer',
										'wrapper'=>$name));
	}
	
	public function render(){
		if ($this->autoForm) $this->endWrapper('form');
		
		foreach ($this->stack as $action){
			if ($action['action'] === 'render'){
				echo $action['instance']->render($action['params']);
			}
			else if ($action['action'] === 'startBuffer'){
				ob_start();
			}
			else if ($action['action'] === 'endBuffer'){
				$content = ob_get_contents();
				ob_end_clean();
				
				$wrapperFn = CocoDictionary::translate($action['wrapper'], 'wrapper');
				echo call_user_func($wrapperFn, $content);
			}
		}
	}
	
}