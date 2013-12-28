<?php
class CocoUIHolder extends CocoAbstractUIHolder{
	
	public function render(){
		foreach ($this->forms as $form){
			$form->render();
		}
	}

}