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
	}

	public function view($view, $data = [])
	{
		require_once APPPATH . 'views/header.php';
		require_once APPPATH . 'views/' .$view. '.php';
		require_once APPPATH . 'views/footer.php';
	}

}