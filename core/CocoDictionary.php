<?php
class CocoDictionary{

	protected static $uis = array();
	protected static $filters = array();
	protected static $wrappers = array();
	protected static $shorthands = array();
	
	public static function register($type='ui', $aliases, $fn, $priority=0){
		if (!is_array($aliases)) $aliases = array($aliases);
		
		$destination = null;
		switch ($type){
			case 'wrapper':
				$destination = &CocoDictionary::$wrappers;
				break;
			case 'filter':
				$destination = &CocoDictionary::$filters;
				break;
			case 'shorthand':
				$destination = &CocoDictionary::$shorthands;
				break;
			case 'ui':
			default:
				$destination = &CocoDictionary::$uis;
				break;
		}
		
		foreach ($aliases as $alias){
			if (!array_key_exists($alias, $destination)) $destination[$alias] = array();
			$destination[$alias][$priority] = $fn;
		}
	}
	
	public static function translate($alias, $type='ui'){
		switch ($type){
			case 'wrapper':
				$lookup = CocoDictionary::$wrappers;
				break;
			case 'filter':
				$lookup = CocoDictionary::$filters;
				break;
			case 'shorthand':
				$lookup = &CocoDictionary::$shorthands;
				break;
			case 'ui':
			default:
				$lookup = CocoDictionary::$uis;
				break;
		}
		
		if (array_key_exists($alias, $lookup)){
			return $lookup[$alias][count($lookup[$alias])-1];//buggy, count may not be highest index
		}
		else{
			//@TODO exeception
			return false;
		}
	}
}