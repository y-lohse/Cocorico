<?php
class CocoSaveFilter{
	
	public static function apply($data, $params){
		$result = CocoStore::request($data);
		update_option($params['name'], $result);
	}
	
}