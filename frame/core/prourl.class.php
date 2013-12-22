<?php
class Prourl 
{
	/**
	 * URL路由,转为PATHINFO的格式
	 */ 
	static function parseUrl()
	{
		if (isset($_SERVER['PATH_INFO']))
		{
			//获取 pathinfo
			$pathinfo = explode('/', trim($_SERVER['PATH_INFO'], "/"));

			// 获取controll
			$control = (!empty($pathinfo[0]) ? $pathinfo[0] : 'index');
			array_shift($pathinfo); //再将将数组开头的单元移出数组 
			
			//获取函数名
			$method_name = (!empty($pathinfo[0]) ? $pathinfo[0] : 'index');
			array_shift($pathinfo); //将数组开头的单元移出数组 
			//类名	
			$class_name = ucfirst($control);
			//包含控制器文件
			require_once(APP.SEP.'controllers'.SEP.$control.'.php');
			$class = new $class_name; 	
			//这是参数
			call_user_func_array(array($class, $method_name), $pathinfo);
		}
	}
}
