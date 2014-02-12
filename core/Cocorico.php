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
		$nonce = $this->field('nonce', 'coco_nonce', $nonce_action)->filter('nonce', $nonce_action);
		$this->validated = (bool)$nonce->getValue();
	}
	
	public function field($alias, $name){
		$fn = CocoDictionary::translate($alias, 'ui');
		
		$instance = new CocoUI($name, $fn);
		if (!$this->validated) $instance->preventFilters();
		
		$args = array_slice(func_get_args(), 2);
		array_push($this->stack, array( 'action'=>'render',
										'instance'=>$instance, 
										'args'=>$args));
		
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
				echo $action['instance']->render($action['args']);
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