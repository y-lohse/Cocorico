<?php
class CocoSaveFilter{
	
	public static function apply($name, $params){
		$result = CocoStore::request($name);
		if ($result) update_option($name, $result);
	}
	
}