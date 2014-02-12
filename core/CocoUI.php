<?php
class CocoUI{
	
	protected $renderFn;
	protected $name;//html sense of name
	protected $value = null;
	
	public function __construct($name, $fn){
		$this->name = $name;
		CocoStore::request($this->name);
		$this->renderFn = $fn;
	}
	
	public function render($args){
		array_unshift($args, $this->name);
		return call_user_func_array($this->renderFn, $args);
	}
	
	public function getValue(){
		return $this->value;
	}
	
	public function preventFilters(){
		$this->value = false;
	}
	
	public function filter($filter){
		//on first run, load the posted value
		if ($this->value === null){
			$this->value = CocoStore::request($this->name);
		}
		
		//run through the filters
		if ($this->value !== false){//prevents the remaining filters to run, either if no value was found or purposely by a filter
			$args = array_slice(func_get_args(), 1);
			array_unshift($args, $this->value);
			$filterFn = CocoDictionary::translate($filter, 'filter');
			$this->value = call_user_func_array($filterFn, $args);
		}
		
		return $this;
	}
}