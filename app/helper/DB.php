<?php
/**
 * Dababase base class 
 *
 *
 * @since 1.0.0
 * @package OOP's Login
 */
class DB {

	/** Store's the instance of the database */
	private static $_instance = null;

	/** Private variables used in the class */
	private $_pdo, 
			$_query, 
			$_error	 = false, 
			$_results, 
			$_count = 0;

	/**
	 * Constructor to Initiate the PDO connection to Database.
	 */
	function __construct() {
		try {
			$this->_pdo = new PDO( "mysql:host=" . Config::get( 'mysql/host' ) . "; dbname=" . Config::get( 'mysql/db' ) . "; ", Config::get( 'mysql/username' ), Config::get( 'mysql/password' ) );
		} catch ( PDOException $e ) {
			die( $e->getMessage() );
		}
	}

	/**
	 * Actions
	 * 
	 * Performs the actions to the database.
	 * Called by get(),delete(), update() and insert() functions
	 *
	 * @param String $action Action to be performed. eg : SELECT , DELETE, INSERT 
	 * @param String $table Table name where the action is to be performed
	 * @param array $where The contents of action. eg : array('username', '=', 'bmx')
	 */
	public function actions ( $action, $table, $where = array() ) {

		if ( count($where) === 3 ) {
			/* If the parameters in $where is less than three, it's not a valid query */
			$operators = array( '=', '>', '<', '>=', '<='); // Acceptable operators in the operation can be expanded as per requirnments

			$field 	  = $where[0];
			$operator = $where[1];
			$value 	  = $where[2];

			if ( in_array($operator, $operators) ) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if ( ! $this->query( $sql, array($value) )->error() ) {
					return $this;
				}
			}
		}
		return false;
	}

	/**
	 * Query Row count
	 *
	 * Returns the number of rows for the query
	 *
	 */
	public function count () {
		return $this->_count;
	}

	/**
	 * Delete Functions
	 *
	 * Removes the data from database for the provided query
	 *
	 * @param String $table Table name where the action is to be performed
	 * @param array $where The contents of action. eg : array('username', '=', 'bmx')
	 */
	public function delete ( $table, $where ) {
		return $this->actions( 'DELETE', $table, $where );
	}

	/**
	 * Error Status
	 *
	 * Returns the error status of query
	 *
	 */
	public function error () {
		return $this->_error;
	}

	/**
	 * Query's First Result
	 *
	 * Returns the first result for the query
	 *
	 */
	public function first () {
		return $this->results()[0];
	}

	/**
	 * Get Functions with query
	 *
	 * Returns the data from database for the provided query
	 *
	 * @param String $table Table name where the action is to be performed
	 * @param array $where The contents of action. eg : array('username', '=', 'bmx')
	 */
	public function get ( $table, $where ) {
		return $this->actions( 'SELECT *', $table, $where );
	}

	/**
	 * Check's if the instance has been created or not. 
	 * If instance does not exist a new one is created.
	 */
	public static function getInstance() {	
		if( !isset( self::$_instance ) ) {
			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	/**
	 * Insert Functions
	 *
	 * Creates a new entry in database.
	 *
	 * @param String $table Table name where the action is to be performed
	 * @param array $fields The contents for new entry with coloumn name as array Key. eg : array('username' => 'bmx', 'name' => 'Anush')
	 */
	public function insert ( $table, $fields = array() ) {
		if ( count( $fields ) ) {
			/* If the parameters in $fields is empty, it does not contain enough information for creating new entry */

			$key 	 = array_keys( $fields );
			$values  = '';
			$x 		 = 1;

			foreach ( $fields as $field ) {
				$values .= '?';

				if ( $x < count( $fields ) ) {
					$values .= ', ';
				}
				$x++;
			}

			$sql = "INSERT INTO {$table} (`" . implode('`, `', $key) . "`) VALUES( {$values} )";
 			if ( ! $this->query( $sql, $fields )->error() ) {
 				return true;
 			}
		}

		return false;
	}

	/**
	 * @param string $sql the MYSQL query
	 * @param array $parms parameters to be querried
	 */
	public function query ( $sql, $parms = array() ) {	
		$this->_error = false;
		if ( $this->_query = $this->_pdo->prepare( $sql ) ) {
			$x = 1;

			if ( count( $parms ) ) {
				foreach ( $parms as $param ) {
					$this->_query->bindValue( $x, escape( $param ) );
					$x++;
				}
			}
			if ( $this->_query->execute() ) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}

		return $this;
	}

	/**
	 * Query Result
	 *
	 * Returns the result for the query
	 *
	 */
	public function results () {
		return $this->_results;
	}

	/**
	 * Update
	 * 
	 * Performs update function to data in database.
	 *
	 * @param String $table Table name where the action is to be performed
	 * @param array $fields The contents for updation with coloumn name as array Key
	 * @param array $where The contents of action. eg : array('username', '=', 'bmx')
	 */
	public function update( $table, $fields = array() ,$where = array()) {
		if ( count($where) === 3 ) {
			/* If the parameters in $where is less than three, it's not a valid query */
			$set = '';
			$x   = 1;

			foreach ( $fields as $name => $value ) {
				$set .= "{$name} = ?";
				if ($x < count($fields) ){
					$set .= ', ';
					$x++;
				}
			}

			$operators = array( '=', '>', '<', '>=', '<='); // Acceptable operators in the operation can be expanded as per requirnments
			$field 	  = $where[0];
			$operator = $where[1];
			$fields[] = $where[2];

			if ( in_array($operator, $operators) ) {
				$sql = "UPDATE {$table} SET {$set} WHERE {$field} {$operator} ?";

				if ( ! $this->query( $sql, $fields)->error() ) {
					return $this;
				}
			}
		}

		return false;
	}

	/**
	 * Where Selection 
	 *
	 * Returns DB result for provided query
	 *
	 * @param string $table Table Name
	 * @param string $action Action
	 * @param string Conditon
	 **/
	public function where ( $table, $action , $condition ) {	
		
		if ( ! $table || ! $action || ! $condition ) {
			return false;
		}

		$sql = "{$action} FROM {$table} WHERE {$condition}";
		if ( ! $this->query( $sql )->error() ) {
			return $this;
		}
	}	

}
