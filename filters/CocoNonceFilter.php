<?php
class CocoNonceFilter extends AbstractCocoFilter{
	
	public static function apply($value, $params){
		$result = wp_verify_nonce($value, $params['action']);
		
		if ($result) return $value;
		else return false;
	}
	
}
CocoDictionary::register('nonce', 'CocoNonceFilter');