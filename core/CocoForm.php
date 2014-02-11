<?php
abstract class CocoForm{
	abstract public function render($params);
	
	public function filter($filter, $data, $params){
		if (class_exists($filter)){
			$filter::apply($data, $params);
		}
	}
}