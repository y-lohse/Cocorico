<?php
class CocoSaveFilter{
	
	public static function apply($data, $params){
		if (isset($_POST) && isset($_POST[$data])){
			echo 'saving data '.$data;
		}
	}
	
}