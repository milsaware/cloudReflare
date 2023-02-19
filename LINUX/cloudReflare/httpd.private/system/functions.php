<?php
function include_controller($file){
	include_once(CONTROLLER.$file.'.controller.php');
}

function include_model($file){
	include_once(MODEL.$file.'.model.php');
}

function url($ext){
	return BASEURL.$ext;
}