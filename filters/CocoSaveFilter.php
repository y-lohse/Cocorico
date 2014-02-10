<?php
class CocoSaveFilter{
	
	public static function apply($data, $params){
		$result = CocoStore::request($data);
		var_dump($result);
		update_option($params['name'], $result);
	}
	
}