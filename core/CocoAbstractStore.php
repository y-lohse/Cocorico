<?php
abstract class CocoAbstractStore{
	
	abstract public function get($key);
	abstract public function set($key, $value);
	
}