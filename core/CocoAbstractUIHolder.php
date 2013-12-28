<?php
abstract class CocoAbstractUIHolder{
	
	abstract public function render();
	
	protected $forms = array();
	protected $store;
	
	public function form($name, $type, $options = array()){
		if (class_exists('Coco'.ucwords($type).'Form')){
			$class = 'Coco'.ucwords($type).'Form';
			array_push($this->forms, new $class($name, $this->store, $options));
		}
	}
	
}