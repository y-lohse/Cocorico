<?php
class CocoMetaStore extends CocoAbstractStore{
	
	protected $forms = array();
	
	public function __construct(){
		add_action('save_post', array($this, 'save_post'));
	}
	
	public function save_post($post_id){
		update_post_meta($post_id, 'etendard_portfolio_client', 'sdfsfzf');
	}
	
	public function register($name){
		array_push($this->forms, $name);
	}
	
	public function get($key){
		global $post;
		
		return get_post_meta($post->ID, $key, true);
		
	}
	
	public function set($key, $value){
//		var_dump($value);
	}
	
}