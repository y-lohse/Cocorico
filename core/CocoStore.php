<?php
interface CocoStore{

	public function get($key);
	public function set($key, $value);
	
}

class CocoOptionStore implements CocoStore{
	
	public function get($key){
		return get_option($key);
	}
	
	public function set($key, $value){
		var_dump('setting '.$key);
	}
	
}

class CocoPostMetaStore implements CocoStore{
	
	public function get($key){
		var_dump('get_postmeta');
	}
	
	public function set($key, $value){
		var_dump('setting '.$key);
	}
	
}