<?php

require_once("controller.php");

load_project();
header('Content-type: text/html');

echo "<html>";
include("head.php");
echo "<body>";
include("header.php");
echo "<div class=\".content\">";
include("content.php");
echo "</div>";
include("footer.php");
echo "</body>";
echo "</html>";

?>

