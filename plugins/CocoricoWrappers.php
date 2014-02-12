<?php
function cocoricoFormWrapper($content){
	$output = '<form method="post">';
	$output .= $content;
	$output .= '</form>';
	return $output;
}
CocoDictionary::register('wrapper', 'form', 'cocoricoFormWrapper');