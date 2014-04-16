<?php

$site_config = (Array) F('site_options', '', C('APP_CONF_PATH'));
$sdk_config = (Array) F('sdk_options', '', C('APP_CONF_PATH'));


$config = array(
	'DEFAULT_THEME'			 => 'default', // 默认模板主题名称
	'TMPL_TEMPLATE_SUFFIX'	 => '.html', // 默认模板文件后缀
	'VIEW_PATH'				 => APP_ROOT
);

$all_config = array_merge($config, $site_config, $sdk_config);
//dump($all_config);
//define('THEME_PATH', C('APP_TPL_PATH') . $all_config['DEFAULT_THEME'] . '/');

return $all_config;
