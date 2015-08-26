<?php

/**
* 
*/
class Home extends Controller
{
	public function index( $paramater = null )
	{
		$data['username'] = "Anush";
		$data['TITLE'] = "it works";
		$this->view('home/index.html',$data);
	}

}