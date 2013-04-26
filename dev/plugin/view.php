<?php

require_once ("controller.php");

load_project();
header('Content-type: text/html');

echo "<!DOCTYPE html>\n";
echo "<html>";
include ("head.php");
echo "<body>";
include ("header.php");
echo "<div align=\"center\" class=\".content\">";
include ("content.php");
echo "</div>";
include ("footer.php");
echo "</body>";
echo "</html>";
?>

