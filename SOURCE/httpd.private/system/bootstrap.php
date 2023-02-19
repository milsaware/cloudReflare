<?php
$_GET['route'] = (isset($_GET['route']))? $_GET['route'] : 'home';
define("VERSION", "1.5.0");
define("SKIN", "original");
define("AUTHOR", "ozboware");
define("SITENAME", "cloudReflare");
define("BASEURL", "/");
define("IMGURL", BASEURL."assets/images/");
define("DS", DIRECTORY_SEPARATOR);
define("RT", getcwd() . DS);
$root = (strpos(RT, DS.'httpd.www'.DS) !== false)? substr(RT, 0, strpos(RT, DS.'httpd.www')) : RT;
define("ROOT", $root.DS);
define("PUROOT", ROOT."httpd.www".DS);
define("PROOT", ROOT."httpd.private".DS);
define("APP", PROOT."app".DS);
define("VIEWS", APP."views".DS);
define("SYS", PROOT."system".DS);
define("SYSMOD", SYS."models".DS);
define("CONTROLLER", APP."controllers".DS);
define("MODEL", APP."models".DS);
define("SYSCONT", SYS."controllers".DS);
define("LNG", SYS."lang".DS);

require(SYSCONT.'appController.php');
require(SYSCONT.'languageController.php');
require(SYSCONT.'routesController.php');
require(SYSCONT.'viewController.php');

include_once(SYS.'functions.php');
include_once PROOT.DS.'/routes/web.php';