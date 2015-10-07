<?php
/**
 * Form Vaidator
 *
 * Input forms validator. The class contains the following functions:
 *  1. Validation for required.
 * 	2. Validation for Min Length.
 *  3. Validation for Max Length.
 *  4. Validation for match with other field in same submission.
 *  5. Check for Unique entry for input name, in the database table name provided.
 *
 * @return Array. Array key will be name of the input and value
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class Validate
{
	/** Private variables used in the class */
	private $_passed = false,
		    $_errors = array(),
		    $_db = null;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	/**
	 * Error Reorder
	 *
	 * Records the error to class error.
	 *
	 * @param String $error Error message.
	 */
	private function addError( $error, $key = null ) {
		if ( $key ) {
			$this->_errors[ 'error_' . $key ] = $error;
		} else {
			$this->_errors[] = $error;
		}
	}

	/**
	 * Check Function
	 * 
	 * Performs the Validation functions. See class description for avalible validation funtions.
	 *
	 * @param array $source The post data or get data array. eg $_POST
	 * @param array $items Rules for validating the inputs. Must be suppleied
	 *        as array with array keys as Rulename and value as value.
	 */
	public function check( $source, $items = array() ) {
		// If the $source is empty no point in proceeding
		if ( empty($source) ) {
			return;
		}

		foreach ( $items as $item => $rules ) {
			foreach ( $rules as $rule => $rule_value ) {
				$value = trim($source[ $item ]);

				//Check if a display name is set for the field. If set use it else use the field name.
				if ( isset( $rules['name'] ) ) {
					$field_name = $rules['name'];
				} else {
					$field_name = $item;
				}

				//If required flag is set for the field check if it's provided.
				if ( $rule === 'required' && empty($value) ) {
					$this->addError("$field_name is required.", $item);
				} else if ( ! empty( $value ) ) {
 					switch ( $rule ) {
 						case 'min':
 							if ( strlen( $value ) < $rule_value ) {
 								$this->addError("$field_name must be a minimum of {$rule_value} characters.", $item);
 							}
 							break;

 						case 'max':
 							if ( strlen( $value ) > $rule_value ) {
 								$this->addError("Maximum allowed characters for $field_name is {$rule_value}.", $item);
 							}
 							break;

 						case 'matches':
 							if ( $value != $source[ $rule_value ] ) {
 								
 								//Check if a display name is set for the matches field. If set use it else use the field name.
								if ( isset( $items[ $item ]['name'] ) ) {
									$match_name = $items[ $item ]['name'];
								} else {
									$match_name = $rule_value;
								}

 								$this->addError("$field_name must Match $match_name.", $item);
 							}
 							break;

 						case 'unique':

 							$check = $this->_db->get( $rule_value, array( $item, "=", $value ) );
 							if ( $check->count() ) {
 								$this->addError("$field_name Already Exist.", $item);
 							}
 							break;
 						/*
						 * Check the input for the input type.
						 * 
						 * Avalible Types are :
						 * 1. Email
						 * 2. Domain
						 * 3. URL
 						 */
 						case 'type':
 							if ( ! empty( $rules['type'] ) ) {
 									switch ( $rules['type'] ) {
 										case 'email':
 											if( filter_var( $value,FILTER_VALIDATE_EMAIL )=== false ){
				 								$this->addError("$field_name is not valid.", $item);
				 							}
				 							break;

				 						case 'URL':
				 							if(filter_var($value,FILTER_VALIDATE_URL)=== false){
										    	$this->addError("$field_name is not valid.", $item);
										    }
										break;
 									}
 							}
 							
 							break;
 						default:
 							# Not used now.
 							break;
 					}
				}

			}
		}

		// if all the condiction checks pass _passed class variable is set to true.
		if ( empty($this->_errors) ) {
			$this->_passed = true;
			return true;
		}
	}

	/**
	 * Error Status
	 *
	 * Returns the error status of query
	 *
	 */
	public function errors() {
		return $this->_errors;
	}	
	
	/**
	 * Validation Result / Status
	 *
	 * Returns the result for the validation
	 *
	 */
	public function passed() {
		return $this->_passed;
	}

}