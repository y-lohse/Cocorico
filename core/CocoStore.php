<?php
class CocoStore{
	
	private static $requests = array();
	private static $restored = array();
	
	public static function request($name){
		if (isset(CocoStore::$restored[$name])){
			return CocoStore::$restored[$name];
		}
		else{
			array_push(CocoStore::$requests, $name);
			return false;
		}
	}
	
	public function restore(){
		CocoStore::$restored = array_merge(unserialize(get_option('cocostore_values')), $_POST);
		update_option('cocostore_values', serialize(array()));//clears the cache
	}
	
	public function backup(){
		$names = unserialize(get_option('cocostore_names'));
		$values = array();
		
		foreach ($names as $name){
			$values[$name] = $_POST[$name];
		}
		
		update_option('cocostore_values', serialize($values));
//		remove_action('shutdown', array('CocoStore', 'prepareBackup'));
	}
	
	public function prepareBackup(){
		if (count(CocoStore::$requests) === 0) return;
		
		$ser = serialize(CocoStore::$requests);
		update_option('cocostore_names', $ser);
	}
	
}
//update_option('coco_lol', '');
add_action('init', array('CocoStore', 'restore'));
add_action('save_post', array('CocoStore', 'backup'));
add_action('shutdown', array('CocoStore', 'prepareBackup'));