<?php
require_once 'global_data.php';

function load_project() {

	if (isset($_POST["projectXML"])) {
		get_session_data() -> project_xml = $_POST["projectXML"];

		get_session_data() -> email = $_POST["email"];
		get_session_data() -> current_workspace = $_POST["currentWorkspace"];
		get_session_data() -> selected_items = $_POST["selectedItems"];

	} else {
		get_session_data() -> project_xml = file_get_contents(dirname(__FILE__) . '\project_test.xml');

		get_session_data() -> email = 'test@test';
		get_session_data() -> current_workspace = 'test';
		get_session_data() -> selected_items = '';

	}

	$xml = simplexml_load_string(get_session_data() -> project_xml);

	$sxe = new SimpleXMLElement($xml -> asXML());

	$sxe -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

	get_session_data() -> title = $result[0] -> Name;

	save_server_session();

}
?>