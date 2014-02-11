<?php
class CocoNonceUI extends AbstractCocoUI{
	
	public function render($params){
		return wp_nonce_field($params['action'], $this->name, true, false);
	}
	
}
CocoDictionary::register('nonce', 'CocoNonceUI');