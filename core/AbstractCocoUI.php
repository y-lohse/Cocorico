<?php
abstract class AbstractCocoUI{
	
	abstract public function render($params);
	
	protected $name;
	protected $value = null;
	
	public function __construct($name){
		$this->name = $name;
		CocoStore::request($this->name);
	}
	
	public function getValue(){
		return $this->value;
	}
	
	public function preventFilters(){
		$this->value = false;
	}
	
	public function filter($filter, $params=array()){
		//on first run, load the posted value
		if ($this->value === null) $this->value = CocoStore::request($this->name);
		
		//run through the filters
		if ($this->value !== false){//prevents the remaining filters to run, either if no value was found or purposely by a filter
			if (class_exists($filter)){
				$this->value = $filter::apply($this->value, $params);
			}
		}
		
		return $this;
	}
}