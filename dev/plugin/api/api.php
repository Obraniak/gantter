<?php
if ($_REQUEST['method'] == 'info') {
	echo " Gantter server api class";
}
if ($_REQUEST['method'] == 'save_project') {
	save_project();
}
if ($_REQUEST['method'] == 'load_project') {
	load_project();
}

function load_project() {

	for ($i = 0; $i < 5; $i++) {
		$value[$i] = array('id' => $i, 'rect' => array('x' => 32 + ($i * 170), 'y' => 32, 'width' => 150, 'height' => 60), 'name' => "Name " . $i, 'position' => "position " . $i, 'attrs' => array('fill' => "#e4d8a4", 'stroke' => "gray"));
	}

	for ($i = 5; $i < 10; $i++) {
		$value[$i] = array('id' => $i, 'rect' => array('x' => 32 + ($i * 170) - 830, 'y' => 172, 'width' => 150, 'height' => 60), 'name' => "Name " . $i, 'position' => "position " . $i, 'attrs' => array('fill' => "#e4d8a4", 'stroke' => "gray"));
	}

	echo json_encode($value);
}

function save_project() {

	$file = 'projekt.xml';
	$xml = file_get_contents($file);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://app.gantter.com/UpdateXML.aspx');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);

	$data = array('projectXML' => $xml . '');

	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	//var_dump($info);
	curl_close($ch);
}
?>