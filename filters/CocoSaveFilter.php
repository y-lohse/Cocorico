<?php
class CocoSaveFilter extends AbstractCocoFilter{
	
	public static function apply($value, $params){
		update_option($params['name'], $value);
		return $value;
	}
	
}
CocoDictionary::register('save', 'CocoSaveFilter');