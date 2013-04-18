<?php 
/*
 * Sample Gantter Extension
 * Reads post variables and displays values
 */
	$projectXML = simplexml_load_string($_POST["projectXML"]);

	$sxe = new SimpleXMLElement($projectXML->asXML());
	$sxe->registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe->xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

	$title = $result[0]->Name;

	header('Content-type: text/html');

?> 
<html>
	<head>
		<title>Zarządzanie zależnościami - Gannter.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<h1>Zarządzanie zależnościami - Gannter.com</h1>
		
		Adres email to: <b><?php echo $_POST["email"] ?></b> <br/>
		Pracujesz w przestrzeni <b><?php echo $_POST["currentWorkspace"] ?> </b> <br/>
		Nazwa projektu: <b><?php echo $title ?></b> <br/>
		Wybranie wiersze: <b><?php echo $_POST["selectedItems"] ?></b> <br/>
	
	</body>
</html>
