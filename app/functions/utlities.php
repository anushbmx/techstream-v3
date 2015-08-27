<?php

/**
 * Path Function
 *
 * Returns the path of file removing the filename and extension
 *
 * @param string $path Path of file
 */
function DirectoryOfFile($path) {
   $the_arr = explode('/', $path);
   array_pop($the_arr);
   return( implode('/', $the_arr) );
}
/**
 * Sanatizing functions
 *
 * This file has the sanatizing functions that is used for to sanatize
 * data coming in and out of the sytem for added protection
 *
 * @param String $string the string to be sanatized.
 * @since 1.0.0 (if available)
 * @package OOP's Login
 */
function escape($string)
{
    return htmlentities($string, ENT_QUOTES, DB_CHARSET);
}

/**
 * Trims Paragraphs
 *
 * Returns paragraphs after trimming to prescribed length
 *
 * @param string $s.
 * @param integer $n.
 */
function elliStr($s,$n) {
    for ( $x = 0; $x < strlen($s); $x++ ) {
        $o = ($n+$x >= strlen($s)? $s : ($s{$n+$x} == " "?
        substr($s,0,$n+$x) . "" : ""));
        if ( $o!= "" ) { return $o; }
    }
}

function objectToArray($d)
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}


function sanatize($data){

/*
    ---------------------
    | Sanatize Function |
    ---------------------

    Sanatizes the data sent as argument
*/

    return mysql_real_escape_string($data);
}

function sanitize_message($string, $force_lowercase = false, $anal = false) {
/**
 * Returns a sanitized string, typically for URLs.
 *
 * Parameters:
 *     $string - The string to sanitize.
 *     $force_lowercase - Force the string to lowercase?
 *     $anal - If set to *true*, will remove all non-alphanumeric characters.
 */
    $strip = array("~", "`", "!", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "Ã¢â‚¬â€", "Ã¢â‚¬â€œ", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

