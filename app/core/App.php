<?php

/**
* 
*/
class App
{

	protected $controller = 'home';

	protected $method = 'index';

	protected $parms = [];
	
	function __construct()
	{
		$url = $this->parseUrl();
		
		if (file_exists( APPPATH . 'controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once APPPATH . 'controllers/' . $this->controller . '.php';

		$this->controller = new $this->controller;

		if(isset($url[1]))
		{	
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			} else {
				$this->params[] =  implode('/', $url);
			}

		}

		if( empty($this->params) ){
			$this->params = $url ? array_values($url) : [];
		}


		call_user_func_array([$this->controller,$this->method], $this->params);
	}

	public function parseUrl()
	{
		if(isset($_GET['url'])) 
		{
			$url = filter_var(rtrim($_GET['url'] , '/'), FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}