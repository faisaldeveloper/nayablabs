<?php

	/**
	* EArPHP class file, is a wrapper component for the great ar-PHP library
	*
	* @author Muaid Al Mohammadi <dr.muaid@gmail.com>
	* @link http://www.muaid.info/
	* @copyright Copyright &copy; 2013-2014 Muaid Al Mohammadi
	* @license New BSD License
	*/
	class EArPHP extends CApplicationComponent
	{
		/**
		* @var string The path of the ar-PHP vendor folder.
		*/
		public $libPath='application.vendor.I18N';
		
		/**
		* Initializing component and set translated Path Of Alias.
		*/
		public function init()
	    {
	    	$this->libPath=Yii::getPathOfAlias($this->libPath).DIRECTORY_SEPARATOR.'Arabic.php';
	    }

	    /**
	    * Return the requested class object.
	    *
	    * @param string $className The class name of the ar-PHP library to load.
	    * @return mixed New instance of requested class name.
	    */
	    public function __get($className)
	    {
	    	require_once($this->libPath);
	    	return  new I18N_Arabic($className);;
	    }
	}