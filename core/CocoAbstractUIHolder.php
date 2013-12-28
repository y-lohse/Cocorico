<?php
abstract class CocoAbstractUIHolder{
	
	abstract public function render();
	
	protected $forms = array();
	
	public function addForm($name, $type, $options = array()){
		if (class_exists('Coco'.ucwords($type).'Form')){
			$class = 'Coco'.ucwords($type).'Form';
			array_push($this->forms, new $class($name, $options));
		}
	}
	
}