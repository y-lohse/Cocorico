<?php
class CocoMetaBox extends CocoAbstractUIHolder{

	public function render(){
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