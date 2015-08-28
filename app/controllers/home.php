<?php

/**
* 
*/
class Home extends Controller
{
	public function index( $parameter = null )
	{	
		$this->model('Article');
		/*
		 * If no parameter is received then will be the index page.	
		 */
		if( ! $parameter ){
			
			$article = new Article();

			$data['bits']  = objectToArray($article->articleList('Bits','SEC',0,10));
			$data['article']  = objectToArray($article->articleList(0,'TYPE',0,10));
			$data['username'] = "Anush";
			$data['TITLE'] = "it works";

			$this->view('home/index.html',$data);

		} else {
		/*
		 *	In case of parameter the following checking has to be done : 
		 *		1. If parameter is an article
		 *		2. If parameter is a Page
		 * 		1. If the parameter is name of section.
		 */
			
			$article = new Article($parameter);

			/*
			 *	If the Parameter represents Public URL of an entry then its a valid request
			 */
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
				$parameter = explode('/', $parameter);


				$section  = $article->articleList($parameter[0],'SECURL');

				if( $section ) {
					$start = 0;
					$page = 0;
					$limit = 10;			// Number of articles on a page
					$total = $article->count();

					if ( ! isset($parameter[1]) || $parameter[1] < 1 ) {
						$parameter[1] = 1;
					}

					if( is_numeric($parameter[1]) ) {
						$page = $parameter[1]-1;
						$start = $limit * $page;
						if( $start >= $total ) {
							// Redirect to 404
							echo "no found";
							die();
						}
					}
					$data['items'] = objectToArray($article->articleList($parameter[0],'SECURL', $start,$limit) );					
					$data['TITLE'] = $data['items'][0]['SEC'];
					if($parameter[0] == 'Bits' ) {
						$this->view('home/list.bits.html',$data);
					} else {
						$this->view('home/list.article.html',$data);						
					}
				} else {
					$data['TITLE'] = "No found";
					$this->view('home/bits.html',$data);
				}

			}
		}
		
	}

}