<?php
class CocoFormTableUI extends CocoAbstractUi{

	public static function start(){
		echo '<table class="form-table">';
	}
	
	public static function end(){
		echo '</table>';
	}

}