<?php
class CocoTextForm extends CocoAbstractForm{
	
	public function render(){
		echo '<input type="text" id="'.$this->name.'" name="'.$this->name.'" value="'.$this->value().'" />';
	}

}