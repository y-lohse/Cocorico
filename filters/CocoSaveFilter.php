<?php
class CocoSaveFilter{
	
	public static function apply($data, $params){
		$result = CocoStore::request($data);
		if ($result) update_option($params['name'], $result);
	}
	
}