<?php

define('COCORICO_PATH', dirname(__FILE__));

//Cocorico is supposed to be dropped in a plugin or a theme-get the url either way
if (strpos(COCORICO_PATH, get_theme_root()) >= 0){
	$rootlessPath = substr(COCORICO_PATH, strlen(get_theme_root()));
	define('COCORICO_URI', get_theme_root_uri().str_replace('\\', '/', $rootlessPath));
}
else{
	var_dump('implement plugin support');
	define('COCORICO_URI', '');
}


//autoload everything
foreach (array('core', 'plugins') as $dir){
	foreach (glob(COCORICO_PATH.'/'.$dir.'/*.php') as $file){
		require_once $file;
	}
}

if (!function_exists('cocorico_enqueue')){
	function cocorico_enqueue(){
		wp_register_script('cocorico', COCORICO_URI.'/frontend/cocorico.js', array('jquery'), '1', true);
		wp_enqueue_script('cocorico');
	}
}
add_action('admin_enqueue_scripts', 'cocorico_enqueue');