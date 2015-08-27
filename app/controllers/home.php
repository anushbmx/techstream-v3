<?php

/**
* 
*/
class Home extends Controller
{
	public function index( $paramater = null )
	{	
		$this->model('Article');
		$article = new Article($paramater);

		if( ! $paramater ){
			$data['article']  = objectToArray($article->articleList(0,'TYPE',0,10));
			$data['username'] = "Anush";
			$data['TITLE'] = "it works";
			$this->view('home/index.html',$data);
		} else {
			if( $article->count() ) {
				$data = objectToArray( $article->data() );
				$data['FULLTEXT'] = str_replace('[IMAGE]', MEDIAPATH , $data['FULLTEXT']);
				switch ( $article->data()->TYPE ) {
					case 0:
						$this->view('home/article.html',$data);
						break;

					case 0:
						$this->view('home/bits.html',$data);
						break;
					
					default:
						$this->view('home/bits.html',$data);
						break;
				}
			}else{
				$data['TITLE'] = "No found";
			}
			//$this->view('home/bits.html',$data);
		}
		
	}

}