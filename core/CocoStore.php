<?php
class CocoStore{
	
	private static $requests = array();
	private static $restored = array();
	
	public static function request($name){
		$ser = serialize(array($name));
		update_option('cocostore_names', $ser);
		

		if (isset(CocoStore::$restored[$name])){
			return CocoStore::$restored[$name];
		}
		else{
			array_push(CocoStore::$requests, $name);
			return false;
		}
	}
	
	public function prepareBackup(){
		$ser = serialize(CocoStore::$requests);
		update_option('cocostore_names', $ser);
	}
	
	public function backup(){
		$names = unserialize(get_option('cocostore_names'));
		$values = array();
		
		foreach ($names as $name){
			$values[$name] = $_POST[$name];
		}
		
		update_option('cocostore_values', serialize($values));
	}
	
	public function restore(){
		CocoStore::$restored = array_merge(unserialize(get_option('cocostore_values')), $_POST);
		update_option('cocostore_values', serialize(array()));//clears the cache
	}
	
}
add_action('init', array('CocoStore', 'restore'));
add_action('save_post', array('CocoStore', 'backup'));
add_action('wp_footer', array('CocoStore', 'prepareBackup'));