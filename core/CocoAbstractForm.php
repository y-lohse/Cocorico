<?php
abstract class CocoAbstractForm{
	
	abstract public function render();
	
	protected $name;
	protected $options;
	
	public function __create($name, $options = array()){
		$this->name = $name;
		$this->options = $options;
	}
	
}