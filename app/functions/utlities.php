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


/*
    ---------------------
    | Sanatize Function |
    ---------------------

    Sanatizes the data sent as argument
*/
function sanatize($data){
    return mysql_real_escape_string($data);
}

/**
 * Returns a sanitized string, typically for URLs.
 *
 * Parameters:
 *     $string - The string to sanitize.
 *     $force_lowercase - Force the string to lowercase?
 *     $anal - If set to *true*, will remove all non-alphanumeric characters.
 */
function sanitize_message($string, $force_lowercase = false, $anal = false) {
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


/**
*  Pagination
*
* Prints the Pagination for selected category for lists
*
* Arguments ( $selection , <category> )
* --------------------------------------
*
* $url       -> Url for
* $limit     -> Number of results to print / display
* $start     -> Index number to start
*
**/
function pagination( $numposts = 0, $limit, $start = 0, $url = NULL , $pages_to_show = 5) {
    
    $current_page = floor($start / $limit) + 1;    
    if($current_page < 2 ){
        $current_page = 1;
    }


    $posts_per_page = $limit;

    $max_page = ceil($numposts/$posts_per_page);

    $custom_range = round($pages_to_show/2);

    if($max_page > 1) {
        echo '<ul class = "pagination right"><li class="unavailable" aria-disabled="true"><a href="">Page '.$current_page.' of '.$max_page.' : </a></li>';
        if($current_page!= 1){
            echo '<li><a ';
            if($current_page!=2){
                echo 'href="'.$url.'/'.($current_page-1).'"';
            }else{
                echo 'href="'.$url.'"';
            }
            echo '><i class="fa fa-chevron-left"></i> Previous</a></li>';
        }else{
            echo '<li class="arrow unavailable" aria-disabled="true"><a href=""><i class="fa fa-chevron-left"></i> Previous</a></li>';
        }
        if ($current_page > ($pages_to_show-1)) {
            echo '<li><a href="'.$url.'">1</a></li><li class="space">...</li>';
        }
        for($i = $current_page - $custom_range; $i <= $current_page + $custom_range; $i++){
            if ($i >= 1 && $i <= $max_page){
                if($i == $current_page) {
                    echo '<li class="current"><a>'.$i.'</a></li>';
                }else{
                    echo '<li><a ';
                    if($i!=1){ echo 'href="'.$url.'/'.$i.'"'; }else {echo 'href="'.$url.'"'; }
                    echo '>'.$i.'</a></li>';
                }
            }
        }
        if (($current_page+$custom_range) < ($max_page))
            echo ' <li class="unavailable"><a href="">&hellip;</a></li><li><a href="'.$url.'/'.$max_page.'">'.$max_page.'</a></li>';

        if($current_page!= $max_page)
            echo '<li> <a href="'.$url.'/'.($current_page+1).'">Next <i class="fa fa-chevron-right"></i></a></li>';
        else
            echo '<li class="arrow unavailable"><a href="">Next <i class="fa fa-chevron-right"></i></a></li>';

        echo '</ul>';

    }
}


