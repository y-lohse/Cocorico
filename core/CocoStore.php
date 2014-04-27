<?php
interface CocoStoreInterface{

 	public function setPrefix($prefix); 
	public function get($key);
	public function set($key, $value);
	
}

class CocoOptionStore implements CocoStoreInterface{
	
	private $prefix = '';
	
	public function setPrefix($prefix){
		$this->prefix = $prefix;
	}
	
	public function get($key){
		return get_option($this->prefix.$key);
	}
	
	public function set($key, $value){
		return update_option($this->prefix.$key, $value);
	}
	
}

class CocoPostMetaStore implements CocoStoreInterface{
	
	private static $backupKey = 'CocoricoPostMetaStorePostId';
	private static $isPostContext = false;
	private static $postId = null;
	
	private $prefix = '';
	
	public function setPrefix($prefix){
		$this->prefix = $prefix;
	}
	
	private function honorPrefix($key){
		if (substr($key, 0, 1) === '_') $key = '_'.$this->prefix.substr($key, 1);
		else $key = $this->prefix.$key;
		
		return $key;
	}
	
	public function get($key){
		$return = get_post_meta(CocoPostMetaStore::$postId, $this->honorPrefix($key));
		if (count($return) === 1) return array_shift($return);
		else return $return;
	}
	
	public function set($key, $value){
		update_post_meta(CocoPostMetaStore::$postId, $this->honorPrefix($key), $value);
	}
	
	public static function isPostContext(){
		return CocoPostMetaStore::$isPostContext;
	}
	
	public static function currentScreenHook($screen){
		if ($screen->post_type !== ''){
			CocoPostMetaStore::$isPostContext = true;
			add_action('pre_get_posts', array('CocoPostMetaStore', 'loadFallbackPostId'));
		}
	}
	
	public static function loadFallbackPostId($query){
		if (CocoPostMetaStore::$postId === null) CocoPostMetaStore::$postId = $query->get('post_parent');
	}
	
	public static function checkPostTrigger(){
		$postId = get_option(CocoPostMetaStore::$backupKey);
		if ($postId != false){
			CocoPostMetaStore::$postId = $postId;
			update_option(CocoPostMetaStore::$backupKey, false);
		}
	}
	
	public static function savePostTrigger($postId){
		update_option(CocoPostMetaStore::$backupKey, $postId);
	}
	
}
add_action('init', array('CocoPostMetaStore', 'checkPostTrigger'));
add_action('save_post', array('CocoPostMetaStore', 'savePostTrigger'));
add_action('current_screen', array('CocoPostMetaStore', 'currentScreenHook'));

class CocoWidgetStore extends WP_Widget implements CocoStoreInterface{
	private $prefix = '';
	
	public function __construct(){
		parent::__construct(
			'CocoWidget',
			'Cocorcio WIdget',
			array('description'=>__('Les liens vers vos comptes sur différents réseaux sociaux.', TEXT_TRANSLATION_DOMAIN),)
		);
	}
	
	public function setPrefix($prefix){
		$this->prefix = $prefix;
	}
	
	public function get($key){
//		return get_option($this->prefix.$key);
	}
	
	public function set($key, $value){
//		return update_option($this->prefix.$key, $value);
	}
	
	public function widget($args, $instance){
		echo $args['before_widget'];
		echo 'ok';
		echo $args['after_widget'];
	}
	
	public function update($new_instance, $old_instance){
		return $new_instance;
	}
}