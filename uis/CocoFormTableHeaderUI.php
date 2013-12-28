<?php
class CocoFormTableHeaderUI extends CocoAbstractUi{
	
	public static function start(){
		echo '<th>';
	}
	
	public static function end(){
		echo '</th>';
	}
	
}