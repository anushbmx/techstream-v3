	<?php
/**
 * File Manager Functions
 *
 * Manages File Moving and Removal.
 *
 * #### Use Path Relative to Dashboard ROOT  ####
 *
 * @since 1.0.0
 * @package OOP's Login
 */

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Filemanager
{
	/**
	 *
	 * Move Function. Moves file from one location to another.
   * Once Moved the original file is unlinked.
   *
   * #### DO NOT USE TO MOVE UPLOADED file ####
   *
	 * @param String $fromLocation Current Location of File MUST BE FULL LOCATION
   * @param String $toLocation Destination of File
	 */
	public static function move ( $fromLocation, $toLocation, $permissions = 0777 ) {

    // If no Location is specified return false
    if ( ! $fromLocation || ! $toLocation ) {
      return false;
    }

    // If file does not exist
    if ( ! file_exists( $fromLocation ) ){
      return false;
    }

    // if ( copy ( $fromLocation , DOMAINRESOURCE . $toLocation ) ) {
    //   return true;
    // }

		//If AWS config exist try to move to S3
		if ( Config::get('s3/key') && Config::get('s3/secret') ) {
			if ( Filemanager::MoveToS3($fromLocation,$toLocation) ) {
				return true;
			}
		}


		// Check for symlinks
		if (is_link($fromLocation)) {
				return symlink(readlink($fromLocation), DOMAINRESOURCE . $toLocation);
		}

		// Simple copy for a file
		if (is_file($fromLocation)) {
			return copy($fromLocation, DOMAINRESOURCE . $toLocation);
		}

		// Make destination directory
		if (!is_dir(DOMAINRESOURCE . $toLocation)) {
				mkdir(DOMAINRESOURCE . $toLocation, $permissions);
		}

		// Loop through the folder
		$dir = dir($fromLocation);
		while (false !== $entry = $dir->read()) {
				// Skip pointers
				if ($entry == '.' || $entry == '..') {
						continue;
				}

				// Deep copy directories
				Filemanager::move("$fromLocation/$entry", "$toLocation/$entry", $permissions);
		}

		// Clean up
		$dir->close();
		return true;
  }

	/**
	 * Raw File Grabber
	 *
	 * Grabbs the location Raw file from Storage and moves to temp location
	 * for usage.
	 *
	 * ##### Make sure to unlink file after use. #####
	 *
	 * @param string $name name of file
	 */
	public static function getFile( $file ) {

		$tempLocation = sys_get_temp_dir() . '/';
		//If AWS config exist try to move to S3
		if ( Config::get('s3/key') && Config::get('s3/secret') ) {
			$s3 = S3Client::factory([
				'key'			=> Config::get('s3/key'),
				'secret'	=> Config::get('s3/secret')
			]);

			$s3->getObject(array(
		    'Bucket' => Config::get('s3/bucket'),
		    'Key'    => 'rawfile/' . $file,
		    'SaveAs' => $tempLocation . $file
			));

			return $tempLocation . $file;
		}


		$filepath =  RAWMEDIAPATH . $file;
		// If file does not exist

		if ( ! file_exists( $filepath ) ){
			return false;
		}
		if ( copy($filepath, $tempLocation . $file) ) {
			return $tempLocation . $file;
		}

		return false;
	}

	/**
	 * S3 Bucket Transfer Function
	 *
	 * Transfers the files or folder from Server to S3 Bucket.
	 *
	 * ### require additional Configuration in settings file ###
	 * @param String $fromLocation Current Location of File MUST BE FULL LOCATION
	 * @param String $toLocation Destination of File
	 * @param Bool $permission : 0  Makes is Public Readable
	 *													 1  Private File
	 */
	public static	function MoveToS3 ( $source = null, $destination = null , $permission = 0 ) {

		if ( ! Config::get('s3/key') || ! Config::get('s3/secret') || ! Config::get('s3/bucket') ) {
			return false;
		}
		$s3 = S3Client::factory([
			'key'			=> Config::get('s3/key'),
			'secret'	=> Config::get('s3/secret')
		]);

		switch ($permission) {
			case 1:
				$aws_permission = 'private';
				break;

			default:
				$aws_permission = 'public-read';
				break;
		}

		// if moving item is file
		if (is_file($source)) {
			try{

				$s3->putObject([
						'Bucket'	=> Config::get('s3/bucket'),
						'Key'			=> $destination,
						'Body'		=> fopen($source, 'rb'),
						'ACL'     => $aws_permission
				]);

				return true;
			} catch( S3Exception $e ){
				die("There was an error transfering file to Storage");
			}
		}

		// if moving item is direcyory use directory move
		try{

			$s3->uploadDirectory($source, Config::get('s3/bucket'), $destination, array(
			    'params'      => array('ACL' => 'public-read'),
			    'concurrency' => 20,
			    'debug'       => true
			));

			return true;
		} catch( S3Exception $e ){
			die("There was an error transfering file to Storage");
		}

		return false;
	}

  /**
	 *
	 * Move Uploaded File
   *
   * It enclose functions to check if file is from a POST or GET and
   * have a few more saftey measures.
   *
	 * ALL FILES WILL BE UPLOADED TO RAW Location
	 *
	 * @param String $tempLocation Location of Uploaded file
   * @param String $name for File
	 */
  public static function upload ( $tempLocation, $name ) {
    // If no Location is specified return false
    if ( ! $tempLocation || ! $name ) {
      return false;
    }
    // If to Directory is writable
    if (!is_writable( RAWMEDIAPATH )) {
      return false;
    }

		//If AWS config exist try to move to S3
		if ( Config::get('s3/key') && Config::get('s3/secret') ) {
			$temp = sys_get_temp_dir(). '/';
			move_uploaded_file($tempLocation, $temp . $name);
			if ( Filemanager::MoveToS3($temp . $name, 'rawfile/' .$name , 1) ) {
				unlink($temp . $name);
				return true;
			}
		}

    // Move File
    if ( move_uploaded_file($tempLocation, RAWMEDIAPATH . $name) ){
      return true;
    }
  }
}
