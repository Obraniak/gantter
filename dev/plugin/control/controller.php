<?php

require_once (dirname(dirname(__FILE__)) . "/model/global_data.php");

function init_page() {

	load_project();
	header('Content-type: text/html');

	echo "<!DOCTYPE html>\n";
	echo "<html>";
	include ("view/head.php");
	echo "<body>";
	include ("view/header.php");
	echo "<div align=\"center\" class=\".content\">";
	include ("view/content.php");
	echo "</div>";
	include ("view/footer.php");
	echo "</body>";
	echo "</html>";

}
?>

