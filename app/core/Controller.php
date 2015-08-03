<?php

/**
* 
*/
class Controller
{
	
	function __construct()
	{
		
	}

	public function model($model)
	{
		require_once APPPATH . 'models/' . $model . '.php';
		return new $model();
	}

	public function view($view, $data = [])
	{
		require_once APPPATH . 'views/siteWide/header.php';
		require_once APPPATH . 'views/' .$view. '.php';
		require_once APPPATH . 'views/siteWide/footer.php';
	}

}