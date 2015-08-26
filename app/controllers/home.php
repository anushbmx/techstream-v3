<?php

/**
* 
*/
class Home extends Controller
{
	public function index( $paramater = null )
	{
		if( ! $paramater ){
			$data['username'] = "Anush";
			$data['TITLE'] = "it works";
			$this->view('home/index.html',$data);
		} else {
			$data['username'] = "Anush";
			$data['TITLE'] = "Article";
			$this->view('home/article.html',$data);
		}
		
	}

}