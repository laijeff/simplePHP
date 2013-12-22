<?php
//字符集
header('Content-Type: text/html; charset=utf-8');
//系统分隔符
define('SEP',DIRECTORY_SEPARATOR);
//根目录
define('BASE',dirname(__FILE__));
//框架目录
define('FRAME', BASE.SEP.'frame');
//核心代码
define('CORE', FRAME.SEP.'core');
//应用目录
define('APP', 'application');
//load key file
require_once(CORE.SEP.'controller.php');
require_once(CORE.SEP.'model.php');
require_once(CORE.SEP.'view.php');
//装入URL
$urlPath=CORE.SEP.'pathinfo.php';
require_once($urlPath);
Prourl::parseUrl();
