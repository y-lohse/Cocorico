<?php
abstract class CocoAbstractForm{
	
	abstract public function render();
	
	protected $name;
	protected $options;
	
	public function __construct($name, $options = array()){
		$this->name = $name;
		$this->options = $options;
	}
	
	public function label(){
		echo '<label for="'.$this->name.'">';
		echo (isset($this->options['label'])) ? $this->options['label'] : $this->name;
		echo '</label>';
	}
}