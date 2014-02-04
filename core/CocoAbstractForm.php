<?php
abstract class CocoAbstractForm{
	
	abstract public function render();
	
	protected $name;
	protected $store;
	protected $options;
	
	public function __construct($name, $store, $options = array()){
		$this->name = $name;
		$this->store = $store;
		$this->options = $options;
		
		$this->store->register($name);
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function value(){
		return $this->store->get($this->name);
	}
	
	public function save($value){
		return $this->store->set($this->name, $value);
	}
	
	public function label(){
		echo '<label for="'.$this->name.'">';
		echo (isset($this->options['label'])) ? $this->options['label'] : $this->name;
		echo '</label>';
	}
}