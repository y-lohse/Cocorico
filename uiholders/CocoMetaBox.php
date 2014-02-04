<?php

class CocoMetaBox extends CocoAbstractUIHolder{

	public function __construct(){
		$this->store = new CocoMetaStore();
	}

	public function render(){
		$this->save();
		
		CocoFormTableUI::start();
		
		foreach ($this->forms as $form){
			CocoFormTableRowUI::start();
			
			CocoFormTableHeaderUI::start();
			$form->label();
			CocoFormTableHeaderUI::end();
			
			CocoFormTableCellUI::start();
			$form->render();
			CocoFormTableCellUI::end();
			
			CocoFormTableRowUI::end();
		}
		
		CocoFormTableUI::end();
	}

}