<?php

/**
* Model for Article
* 
* Deals with all Article/Post's requested
*/
class Article
{
	
	/** Private variables used in the class */
	private $_db,
			$_count = 0, // Counter for query results
			$_data;		// Will be notification Object to store Aticle data.

	function __construct( $article )
	{
		$this->_db = DB::getInstance();

		if( is_numeric($article) ){
			$value = "SL_NO";
		} else {
			$value = "LINK";
		}
		$this->find($article, $value);
	}

	/**
	 * Crates New Article
	 *
	 * @param array $fields array with information for new notificaiton. Array Keys must match the database column name.,
	 */

	public function create( $fields = array() ) {
		if ( ! $this->_db->insert( ARTICLE_TABLE, $fields ) ) {
			throw new Exception("There was a problem creating Article.");

		}
	}

	/**
	 * Returns the count for last run query
	 */
	public function count () {
		return $this->_count;
	}


	/**
	 * Once Article Objected is created, the created object data will be stored in $_data. Data() is retrival function.
	 */
	public function data () {
		return $this->_data;
	}

	/**
	 * Returns True if Data of Article is extracted from DB and is stored in the object.
	 */
	public function exists () {
		return ( !empty( $this->_data ) ) ? true : false;
	}

	/**
	 * Find Article from Article ID , Article URL
	 *
	 * @param string/integer $article Article ID , Article URL
	 * @param string $field the Identifyer to be looked. eg article_id ( Default ) or url
	 */
	public function find ( $article = null, $field = 'SL_NO' ) {

		if ( $article  && $field ) {
			$data = $this->_db->get( ARTICLE_TABLE, array( $field, '=', $article ) );

			if ( $this->_db->count() ) {
				$this->_data = $data->first();
				$this->_count = $this->_db->count();
				return true;
			} else {
				$this->_count = 0;
			}
		}
		return false;
	}

	/**
	 * Returns Article ID's for the requested paramater
	 *
	 * @param $article to select articles
	 * @param $field 
	 *
	 */
	public function articleList ( $notification = null, $field = null , $start = null, $end = null) {

		if ( $field ) {
			if ( $start && $end ) {
				$data = $this->_db->where( ARTICLE_TABLE, "SELECT *", "$field = $notification ORDER BY DATE DESC");
			} else {
				$data = $this->_db->where( ARTICLE_TABLE, "SELECT *", "$field = $notification ORDER BY DATE DESC LIMIT $start, $end");
			}

			if ( $this->_db->count() ) {
				$this->_count = $this->_db->count();
				return $data->results();
			}
		}
		return false;
	}


	/**
	 * Update Artice information.
	 *
	 * @param array $field Information to be updated. Array Keys must match the database column name.
	 * @param integer $article Uniue ID of the Notification.
	 **/
	public function update ( $field = array(), $article = null ) {

		if ( ! $article) {
			return false;
		}

 		if( $field ) {
 			if ( ! $this->_db->update( ARTICLE_TABLE, $field, array( 'SL_NO', '=', $article ) ) ) {
 				throw new Exception("Error Updating Details");
 			}
 		}
		return true;
	}
}