<?php
class CocoStore{
	
	public static function request($name){
		update_option('cocostore', $name);
		return get_option('cocobackup');
	}
	
	public function backup(){
		update_option('cocobackup', $_POST[get_option('cocostore')]);
	}
	
}
add_action('save_post', array('CocoStore', 'backup'));