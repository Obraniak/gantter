<?php

function load_project() {

	$projectXML = simplexml_load_string($_POST["projectXML"]);
	
	$sxe = new SimpleXMLElement($projectXML -> asXML());
	$sxe -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');
	
	$result = $sxe -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');
	
	$title = $result[0] -> Name;
	
	$file = 'projekt.xml';
	
	file_put_contents($file, $projectXML -> asXML());
	
}

?>