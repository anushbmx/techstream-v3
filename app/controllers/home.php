<?php

/**
* 
*/
class Home extends Controller
{
	public function index()
	{
		$this->model('User');
		$data['username'] = "Anush";
		$data['TITLE'] = "it works";
		$this->view('home/index.html',$data);
	}

}