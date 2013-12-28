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
	}
	
	public function value(){
		return $this->store->get($this->name);
	}
	
	public function label(){
		echo '<label for="'.$this->name.'">';
		echo (isset($this->options['label'])) ? $this->options['label'] : $this->name;
		echo '</label>';
	}
}