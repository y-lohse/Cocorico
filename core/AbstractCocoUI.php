<?php
abstract class CocoUI{
	
	abstract public function render($params);
	
	protected $name;
	
	public function __construct($name){
		$this->name = $name;
	}
	
	public function filter($filter, $params=array()){
		if (class_exists($filter)){
			$filter::apply($this->name, $params);
		}
	}
}