<?php
class CocoMetaStore extends CocoAbstractStore{
	
	public function get($key){
		global $post;
		
		return get_post_meta($post->ID, 'etendard_portfolio_client', true);
		
	}
	
	public function set($key, $value){
		
	}
	
}