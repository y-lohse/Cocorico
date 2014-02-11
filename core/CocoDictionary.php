<?php
class CocoDictionary{

	protected static $uis = array();
	
	public static function register($aliases, $class, $priority=0){
		if (!is_array($aliases)) $aliases =array($aliases);
		
		foreach ($aliases as $alias){
			if (!array_key_exists($alias, CocoDictionary::$uis)) CocoDictionary::$uis[$alias] = array();
			CocoDictionary::$uis[$alias][$priority] = $class;
		}
	}
	
	public static function translate($alias){
		if (array_key_exists($alias, CocoDictionary::$uis)){
			return CocoDictionary::$uis[$alias][count(CocoDictionary::$uis[$alias])-1];
		}
	}
}