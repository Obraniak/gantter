<?php

function create_page() {

	echo "<!DOCTYPE html>\n";
	echo "<html>";
	include ("view_head.php");
	echo "<body>";
	include ("view_header.php");
	echo "<div class=\"content\">";
	include ("view_content.php");
	echo "</div>";
	include ("view_footer.php");
	echo "</body>";
	echo "</html>";
}
?>