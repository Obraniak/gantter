<?php
require_once 'global_data.php';

function load_project() {

	if (isset($_POST["projectXML"])) {
		set_global_project_xml($_POST["projectXML"]);

		set_global_email($_POST["email"]);
		set_global_current_workspace($_POST["currentWorkspace"]);
		set_global_selected_items($_POST["selectedItems"]);

	} else {
		set_global_project_xml(file_get_contents(dirname(__FILE__) . '\project_test.xml'));

		set_global_email('test@test');
		set_global_current_workspace('test');
		set_global_selected_items($null);

	}

	$sxe = new SimpleXMLElement( get_global_project_xml() -> asXML());

	$sxe -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

	set_global_title($result[0] -> Name);

	set_global_file(dirname(dirname(__FILE__)) . '\projekt.xml');

	file_put_contents(get_global_file(), get_global_project_xml() -> asXml());

}
?>