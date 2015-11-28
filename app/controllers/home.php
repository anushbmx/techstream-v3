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

			$data['bits']  = objectToArray($article->articleList('Bits','SECURL',0,10));
			$data['article']  = objectToArray($article->articleList(1,'FEATURED',0,10));
			if ( sizeof($data['article']) < 8 ) {
				$data['article'] = array_merge(objectToArray(objectToArray($article->articleList(0,'TYPE',0,10))));
			} 
			$data['username'] = "Anush";
			$data['TITLE'] = "Tech Stream";
			$data['DESCRIPTION'] = "Tech stream is a Web Design and Development blog dedicated to provide inspiring and innovative contents.";
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
				$data['CONTENT'] = str_replace('[IMAGE]', MEDIAPATH , $data['CONTENT']);
				$data['DESCRIPTION'] = $data['DES'];
				$data['CANONICAL']	= PUBLICPATH . $data['LINK'];
				$data['TITLE '] = $data['TITLE'] . "| Tech Stream";
				$data['sidebar']['article']	= objectToArray($article->articleList(0,'TYPE', 0,5));
				switch ( $article->data()->TEMPLATE ) {
					case 0:
						$this->view('home/article.html',$data);
						break;

					case 1:
						$this->view('home/bits.html',$data);
						break;
					
					default:
						$this->view('home/bits.html',$data);
						break;
				}
			}else{
				$parameter = explode('/', $parameter);


				if ( $parameter[0] == 'All' ) {
					$targetParameter = 0;
					$targetEntry	= 'TEMPLATE';	
				} else {
					$targetParameter = $parameter[0];
					$targetEntry	= 'SECURL';
				}
				


				$section  = $article->articleList($targetParameter,$targetEntry);

				$total = $article->count();
				if( $section ) {
					$data['start'] = 0;
					$data['page']  = 1;
					$data['limit'] = 10;			// Number of articles on a page
					$data['sectionUrl'] = PUBLICPATH . $parameter[0];
					$total = $article->count();
					$data['totalArticle'] 	= $total;
					if ( ! isset($parameter[1]) || $parameter[1] < 1 ) {
						$parameter[1] = 1;
					}

					if( is_numeric($parameter[1]) ) {
						$data['page']  = $parameter[1];
						$data['start'] = $data['limit']  * ($parameter[1]-1) ;
						if( $data['start'] >= $total ) {
							// Redirect to 404
							echo "no found";
							die();
						}
					}
					$data['sidebar']['article']	= objectToArray($article->articleList(0,'TYPE', 0,5));
					$data['items'] = objectToArray($article->articleList($targetParameter,$targetEntry, $data['start'],$data['limit'] ) );					
					if ( $targetParameter ) {
						$data['TITLE'] = removeHyphen($data['items'][0]['SECURL']) . "| Tech Stream";
					} else {
						$data['TITLE'] = "All Articles" . "| Tech Stream" ;
					}
					$data['TOTAL'] = $total;
					$data['DESCRIPTION'] = "Find out the list of articles and posts in : " . $data['TITLE'];
					if($data['items'][0]['TYPE'] == 1 ) {
						$this->view('home/list.bits.html',$data);
					} else {
						$this->view('home/list.article.html',$data);						
					}
				} else {
					$article = new Article('NotFound');
					$data = objectToArray( $article->data() );
					$data['CONTENT'] = str_replace('[IMAGE]', MEDIAPATH , $data['CONTENT']);
					$data['sidebar']['article']	= objectToArray($article->articleList(0,'TYPE', 0,5));
					$data['DESCRIPTION'] = $data['DES'];
					$this->view('home/bits.html',$data);
				}

			}
		}
		
	}

}