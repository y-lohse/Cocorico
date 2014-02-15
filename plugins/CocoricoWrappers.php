<?php
function cocoricoFormWrapper($content){
	$output = '<form method="post">';
	$output .= $content;
	$output .= '</form>';
	return $output;
}
CocoDictionary::register('wrapper', 'form', 'cocoricoFormWrapper');

function cocoricoFormTableWrapper($content){
	$output = '<table class="form-table">';
	$output .= $content;
	$output .= '</table>';
	return $output;
}
CocoDictionary::register('wrapper', 'form-table', 'cocoricoFormTableWrapper');

function cocoricoTableRowWrapper($content){
	$output = '<tr valign="top">';
	$output .= $content;
	$output .= '</tr>';
	return $output;
}
CocoDictionary::register('wrapper', 'tr', 'cocoricoTableRowWrapper');

function cocoricoTableCellWrapper($content){
	$output = '<td>';
	$output .= $content;
	$output .= '</td>';
	return $output;
}
CocoDictionary::register('wrapper', 'td', 'cocoricoTableCellWrapper');

function cocoricoTableHeaderWrapper($content){
	$output = '<th scope="row">';
	$output .= $content;
	$output .= '</th>';
	return $output;
}
CocoDictionary::register('wrapper', 'th', 'cocoricoTableHeaderWrapper');


//tr valign=top
//<th scope="row"><label for="blogname">Titre du site</label></th>
//<td><input name="blogname" id="blogname" value="Why Blog" class="regular-text" type="text"></td>
//p.description