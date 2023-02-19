<?php
use routesController as route;
$route = preg_replace('#[^a-zA-Z0-9_]#', '', $_GET['route']);

if($route === 'home'){
	route::get('home', 'app@index');
}
elseif($route === 'help'){
	route::get('help', 'app@help');
}
elseif($route === 'saveSettings'){
	route::get('saveSettings', 'app@save_settings');
}
elseif($route === 'recordPlus'){
	route::get('recordPlus', 'app@record_plus');
}
elseif($route === 'changeRecord'){
	route::get('changeRecord', 'app@change_record');
}
elseif($route === 'deleteRecord'){
	route::get('deleteRecord', 'app@delete_record');
}
elseif($route === 'startMonitor'){
	route::get('startMonitor', 'app@start_monitor');
}
elseif($route === 'resetIPaddress'){
	route::get('resetIPaddress', 'app@reset_ip_address');
}
elseif($route === 'fetchTimer'){
	route::get('fetchTimer', 'app@fetch_timer');
}
elseif($route === 'changeLanguage'){
	route::get('changeLanguage', 'app@change_language');
}
else{
	$data['content'] = 'Page not found';
	route::error($data);
}