<?php

session_start();
getData();

function getData()
{
	//error_log("Loading data from session: ".json_encode($_SESSION["newsession"]));
	if(isset($_SESSION["newsession"]))
		echo (json_encode($_SESSION["newsession"])); /*Must make mysql query instead of using SESSION.*/
}

?>