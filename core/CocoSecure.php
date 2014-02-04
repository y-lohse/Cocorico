<?php
class CocoSecure{
	
	public static $post = 'lolololdefulkt';
	public static $postId;
	
	
	public function save_post($post_id){
		CocoSecure::$post = $_POST['etendard_portfolio_client'];
		CocoSecure::$postId = $post_id;
		
//		update_post_meta($post_id, 'etendard_portfolio_client', $_POST['etendard_portfolio_client']);
	}
	
}

add_action('save_post', array('CocoSecure', 'save_post'));