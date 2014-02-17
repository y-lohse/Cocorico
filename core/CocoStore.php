<?php
class CocoStore{
	
	public static function get($key){
		return get_option($key);
	}
	
	public static function set($key, $value){
		var_dump('setting '.$key);
	}
	
}