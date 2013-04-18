<?php 
/*
 * Gantter Extension for dependency management
 * Reads post variables and displays values
 */
	$projectXML = simplexml_load_string($_POST["projectXML"]);

	$sxe = new SimpleXMLElement($projectXML->asXML());
	$sxe->registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe->xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

	$title = $result[0]->Name;

	header('Content-type: text/html');
	
	// Popup Extensions can send data back to Gantter.com by creating a HTML form and setting the action to: https://app.gantter.com/UpdateXML.aspx. 
	// In the form, have one form variable named "projectXML" and set the value of this variable to the newly updated XML. 
	// Upon submit, the form popup browser window (or tab depending on browser) will close and Gantter.com will update.

?> 
<html>
	<head>
		<title>Zarządzanie zależnościami - Gannter.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<h1>Zarządzanie zależnościami - Gannter.com</h1>
		
		Nazwa projektu: <b><?php echo $title ?></b> <br/>
        Adres email to: <b><?php echo $_POST["email"] ?></b> <br/>
		Pracujesz w przestrzeni <b><?php echo $_POST["currentWorkspace"] ?> </b> <br/>
		Wybranie wiersze: <b><?php echo $_POST["selectedItems"] ?></b> <br/>
	
	</body>
</html>
