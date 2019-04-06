<?php
// check if input php::stream
if(!empty(file_get_contents('php://input'))){
	$post = file_get_contents('php://input');
	$post = json_decode($post);

	if(is_array($post)){
		$_POST = $post;
	}
}
?>