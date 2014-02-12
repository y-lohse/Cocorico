<?php
class CocoRadioUI extends AbstractCocoUI{
	
	public function render($params){
		$output = '';
		$options = $params['options'];
		$selected = get_option($this->name);
		
		foreach ($options as $label=>$value){
			$output .= '
			<label>
				<input type="radio" name="'.$this->name.'" value="'.$value.'" '.(($selected == $value) ? 'checked="checked"' : '').' />
				'.$label.'
			</label>
			';
		}
		
		return $output;
	}
	
}
//CocoDictionary::register('radio', 'CocoRadioUI');