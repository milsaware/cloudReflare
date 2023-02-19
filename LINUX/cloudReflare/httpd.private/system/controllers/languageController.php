<?php
include_once(SYSMOD.'language.model.php');
use languageModel as lang;
class language {

	public static function fetch_language(){
		$white_list = array('EN', 'FR', 'GE', 'IT', 'RU', 'SP', 'TR');
		$lang_get = lang::fetch_language()[0]['value'];
		$lang = (in_array($lang_get, $white_list))? $lang_get : 'EN';

		return require_once(LNG.$lang.DS.'lang.'.strtolower($lang).'.php');
	}

}