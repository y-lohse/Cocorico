<?php

$cocoPath = dirname(__FILE__);

//autoload everything
foreach (array('core', 'plugins') as $dir){
	foreach (glob($cocoPath.'/'.$dir.'/*.php') as $file){
		require_once $file;
	}
}