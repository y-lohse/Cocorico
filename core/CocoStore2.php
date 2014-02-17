<?php
class CocoStore2{
	
	private static $data = array();
	
	public static function get($key){
		if (isset(CocoStore2::$data[$key])){
			return CocoStore2::$data[$key];
		}
		else return get_option($key);
	}
	
	public static function set($key, $value){
		var_dump('setting '.$key);
	}
	
	//loads data for current page processing
	public static function loadData(){
		CocoStore2::$data = $_POST;
	}
	
	//backs up the data for the next page processing
	public static function backupData(){
		
	}
	
	//prepares stuff for the backupData function
	public static function prepareBackup(){
		
	}
	
}
add_action('init', array('CocoStore2', 'loadData'));
//add_action('save_post', array('CocoStore', 'backup'));
//add_action('shutdown', array('CocoStore', 'prepareBackup'));