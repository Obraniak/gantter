<?php

/*
 * Gantter Extension for dependency management
* Reads post variables and displays values
*/
$projectXML = simplexml_load_string($_POST["projectXML"]);

$sxe = new SimpleXMLElement($projectXML -> asXML());
$sxe -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

$result = $sxe -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

$title = $result[0] -> Name;

$file = 'projekt.xml';

file_put_contents($file, $projectXML -> asXML());

header('Content-type: text/html');

// Popup Extensions can send data back to Gantter.com by creating a HTML form and setting the action to: h.
// In the form, have one form variable named "projectXML" and set the value of this variable to the newly updated XML.
// Upon submit, the form popup browser window (or tab depending on browser) will close and Gantter.com will update.
?>
<html>
<head>
<title>Zarzπdzanie zaleønoúciami - Gannter.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript" src="lib/jquery-1.9.1.min.js">
			$(document).ready(function() {

			});

		</script>
<script type="text/javascript"></script>
</head>
<body>

	<header>
		<h1>ZarzƒÖdzanie zale≈ºno≈õciami - Gannter.com</h1>
	</header>


	Nazwa projektu:
	<b><?php echo $title ?> </b>
	<br /> Adres email to:
	<b><?php echo $_POST["email"] ?> </b>
	<br /> Pracujesz w przestrzeni
	<b><?php echo $_POST["currentWorkspace"] ?> </b>
	<br /> Wybranie wiersze:
	<b><?php echo $_POST["selectedItems"]  ?> </b>
	<br />

	<div></div>


	<footer>
		<button onclick="window.location.href='../index.html';">Plugin
			HomePage</button>
		<button onclick="window.close();">Gantter HomePage</button>
	</footer>
</body>
</html>
