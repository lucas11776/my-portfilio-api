<?php

/*
 * Place code on top of index.php CodeIngiter
 */

/*
 *---------------------------------------------------------------
 * Check If Request Data is JSON/FormData
 *---------------------------------------------------------------
 *
 * check if JSON/FormData
 *  
 */
require_once 'json_to_post.php';


/*
 *---------------------------------------------------------------
 * Allow Cross-Site
 *---------------------------------------------------------------
 *
 * Allow External Post Request 
 *  
 */
header("Access-Control-Allow-Origin: *");


/*
 *---------------------------------------------------------------
 * Response To JSON
 *---------------------------------------------------------------
 *
 * Set Response Header To JSON charset=UTF-8
 * 
 */
header("Content-Type: application/json; charset=UTF-8");
