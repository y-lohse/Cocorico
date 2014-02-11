<?php
abstract class AbstractCocoUI{
	
	abstract public function render($params);
	
	protected $name;
	protected $value = null;
	
	public function __construct($name){
		$this->name = $name;
	}
	
	public function filter($filter, $params=array()){
		//on first run, load the posted value
		if ($this->value === null) $this->value = CocoStore::request($this->name);
		
		//run through the filters
		if ($this->value === false) return;
		else{
			if (class_exists($filter)){
				$this->value = $filter::apply($this->value, $params);
			}
		}
	}
}