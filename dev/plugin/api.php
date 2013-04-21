<?php

if ($_REQUEST['functionName'] == 'save_project') {
	save_project();
}

function save_project() {

	$file = 'projekt.xml';
	$xml = file_get_contents($file);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://app.gantter.com/UpdateXML.aspx");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);

	$data = array('projectXML' => $xml . '');

	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$output = curl_exec($ch);
	//$info = curl_getinfo($ch);
	curl_close($ch);
}
?>