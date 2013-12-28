<?php
class CocoMetaBox extends CocoAbstractUIHolder{

	public function render(){
		CocoFormTableUI::start();
		
		foreach ($this->forms as $form){
			CocoFormTableRowUI::start();
			CocoFormTableCellUI::start();
			
			$form->render();
			
			CocoFormTableCellUI::end();
			CocoFormTableRowUI::end();
		}
		
		CocoFormTableUI::end();
	}

}