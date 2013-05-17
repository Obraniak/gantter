<?php
global $projectXML;
global $sxe;
global $result;
global $title;
global $file;
global $email;
global $currentWorkspace;
global $selectedItems;

function load_project() {

	if (isset($_POST["projectXML"])) {
		$projectXML = simplexml_load_string($_POST["projectXML"]);

		$GLOBALS['projectXML'] = $projectXML;

		$GLOBALS['sxe'] = new SimpleXMLElement($projectXML -> asXML());
		$GLOBALS['sxe'] -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

		$GLOBALS['result'] = $GLOBALS['sxe'] -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

		$GLOBALS['title'] = $GLOBALS['result'][0] -> Name;

		$GLOBALS['file'] = 'projekt.xml';

		file_put_contents($GLOBALS['file'], $GLOBALS['projectXML']);

	} else {
		$projectXML = null;
		//simplexml_load_string(file_get_contents(dirname(__FILE__) . '/project_test.xml'));

		$GLOBALS['email'] = 'test@test';
		$GLOBALS['currentWorkspace'] = 'test';
		$GLOBALS['selectedItems'] = null;
	}

}
?>