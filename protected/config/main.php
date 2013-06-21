<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require(dirname(__FILE__) . DS . 'define.php');
$params = require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'params.php');
return array(
	'id' => 'teaPlaza',
	'name'=>'买买茶手机端',
	'basePath'=>dirname(__FILE__). DIRECTORY_SEPARATOR .'..',
	'charset' => 'utf-8',
    'language' => 'zh_cn',
    'layout' => 'main',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),

	'modules'=>array(
		'api' => array(),
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'admin',
		)
	),

	// application components
	'components'=>array(
		/*
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'guestName' => '游客',
		),
		*/
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat' => 'path',
		    'showScriptName' => false,
		    //'urlSuffix' => '.html',
            'rules' => array(
		        '/' => 'site/index',
				'api' => 'api/site/index',
				'weixin'=>'api/site/weixin'
            ),
		),
		
		'db'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=192.168.2.120;dbname=newmmc2',
			'emulatePrepare' => true,
			'username' => 'newshopex',
			'password' => 'newshopex',
			'charset' => 'utf8',
			'persistent' => true,
		    'tablePrefix' => 'sdb_'
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				)
			)
		)
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => $params,
);