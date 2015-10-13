<?php
/**
 * Input Request Processor 
 *
 * Processes the Get and Post reuest
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class Input 
{
	/**
	 * Existance check
	 *
	 * Check's if data has been submitted via GET or POST method.
	 * Default value is set to post. If no argument is passed check for POST data will be done.
	 *
	 * @param string $string request type to check eg : get or post.
	 */	
	public static function exists ( $type = 'post' ) {
		$type = strtolower($type); //convert the argunment to lower case of upper case is used.

		switch ( $type ) {
			case 'post':
					return( ! empty( $_POST ) ) ? true : false ;
				break;

			case 'get':
					return( ! empty( $_GET ) ) ? true : false ;
				break;
			
			default:
					return false;
				break;
		}
	}

	/**
	 * Data retrival
	 *
	 * Retrives the data submitted via GET or POST method from forms or via URL's.
	 * If no data exist empty character will be returned.
	 *
	 * @param string $item name of data variable used in GET or POST method. eg : username.
	 */
	public static function get( $item ) {
		if ( isset($_POST[ $item ]) && !empty($_POST[ $item ]) ) {
			return  ( $_POST[ $item ] );
		} else if ( isset( $_GET[ $item ] ) && !empty($_GET[ $item ]) ){
			return  ( $_GET[ $item ] );
		} else {
			return '';
		}
	}

	/**
	 * File Data retrival
	 *
	 * Retrives file data submitted via GET or POST method from forms or via URL's.
	 * If no data exist empty character will be returned.
	 *
	 * @param string $item name of data variable used in GET or POST method. eg : username.
	 */
	public static function getFiles ( $item ) {
		if ( isset($_POST) ) {
			return $_FILES[ $item ];
		} 

		return '';
	}
	/**
	 * Submitted Data
	 *
	 * Retrives the data submitted via GET or POST method from forms or via URL's.
	 * If no data exist empty character will be returned.
	 *
	 * @param array $formData submitted data in GET or POST method. eg : $_POST or $_GET.
	 */
	public static function values ( $formData ) {
		if ( ! empty( $formData ) ) {
			foreach($formData as $key=> $value) {
				$data[ $key ] = $value;
			}
			return $data;
		}
		return '';
	}
}