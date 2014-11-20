<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//if( isset($_GET['lan']) && $_GET['lan']){}

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>Yii::t('layout','Point of Sale'),
	'theme'=>'theme',
	//'sourceLanguage'=>'en',
	// preloading 'log' component
	'preload'=>array('log',),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.compositekey.CCompositeUniqueKeyValidator',
		
		'application.modules.srbac.controllers.SBaseController',
		),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'generatorPaths'=>array('bootstrap.gii'),
			'password'=>'imdad',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),	

	'srbac' => array(
		'userclass'=>'User', //default: User
		'userid'=>'id', //default: userid
		'username'=>'username', //default:username
		'delimeter'=>'@', //default:-
		'debug'=>false, //default :false
		'pageSize'=>10, // default : 15
		'superUser' =>'Authority', //default: Authorizer
		'css'=>'srbac.css', //default: srbac.css
		//'layout'=>'application.views.layouts.main', //default: application.views.layouts.main,
		//'layout'=>'application.modules.admin.views.layouts.admin', //default: application.views.layouts.main,
		
		'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
		//srbac.views.authitem.unauthorized, must be an existing alias
		'alwaysAllowed'=>array( //default: array()
		'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
		'SiteError', 'SiteContact'),
		'userActions'=>array('Show','View','List'), //default: array()
		'listBoxNumberOfLines' => 15, //default : 10 
		 'imagesPath' => 'srbac.images', // default: srbac.images 
		 'imagesPack'=>'noia', //default: noia 
		 'iconText'=>true, // default : false 
		 'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
		//must be an existing alias 
		'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
		//must be an existing alias 
		'showHeader'=>true, // default: false 
		'showFooter'=>true, // default: false
		'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
		// must be an existing alias 
		),
	),

	// application components
	'components'=>array(
	
	
		'clientScript' => array(
        'class'=>'ext.NLSClientScript.NLSClientScript', 
       'includePattern'=>'/\/jquery|bootstrap|jquery\.min|chosen\.jquery\.min|bootstrap\.min/', //javacsript regexp, if set, only the matched urls will be filtered
       //'excludePattern'=>'/\/raw/'      //javacsript regexp, if set, the matched urls won't be filtered
       ),
	   
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
			'responsiveCss' => true,
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'widgetFactory'=>array(
		  'class'=>'ext.theme.EWidgetFactory',
		
		  'widgets' => array(
		  
		  /*'CGridView'=>array(
                    'htmlOptions'=>array('cellspacing'=>'0','cellpadding'=>'0'),
					'itemsCssClass'=>'item-class',
					'pagerCssClass'=>'pager-class'
                ),
			'CListView'=>array(
                    'htmlOptions'=>array('cellspacing'=>'0','cellpadding'=>'0'),
					'itemsCssClass'=>'item-class',
					'pagerCssClass'=>'pager-class'
                ),
			'CDetailView'=>array(
					'cssFile'=>'tables.css',
                    'htmlOptions'=>array('cellspacing'=>'0','cellpadding'=>'0','class'=>'detail-view'),
					
                ),*/
				
			'CJuiWidget' => array(
			  'themeUrl'=>'/yiibooster/css/themes', // example
			  'theme'=>'black-tie', // base cupertino dark-hive start ui-lightness black-tie excite-bike
			  
			),
		  ),
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=rms',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'enableProfiling' => true,
            'enableParamLogging' => true,
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'authManager'=>array(
		// Path to SDbAuthManager in srbac module if you want to use case insensitive
		//access checking (or CDbAuthManager for case sensitive access checking)
		'class'=>'application.modules.srbac.components.SDbAuthManager',
		// The database component used
		'connectionID'=>'db',
		// The itemTable name (default:authitem)
		'itemTable'=>'items',
		// The assignmentTable name (default:authassignment)
		'assignmentTable'=>'assignments',
		// The itemChildTable name (default:authitemchild)
		'itemChildTable'=>'itemchildren',
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
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);