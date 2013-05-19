<?php
$base_dir = dirname(dirname(__FILE__));
require_once ($base_dir . "/model/global_data.php");

call_user_func($_REQUEST['method']);

function base_dir() {
	return dirname(dirname(__FILE__)); ;
}

function load_project() {

	header('Content-Type: application/json');

	for ($i = 0; $i < 5; $i++) {
		$value[$i] = array('id' => $i, 'rect' => array('x' => 32 + ($i * 170), 'y' => 32, 'width' => 150, 'height' => 60), 'name' => "Name " . $i, 'position' => "position " . $i, 'attrs' => array('fill' => "#e4d8a4", 'stroke' => "gray"));
	}

	for ($i = 5; $i < 10; $i++) {
		$value[$i] = array('id' => $i, 'rect' => array('x' => 32 + ($i * 170) - 830, 'y' => 172, 'width' => 150, 'height' => 60), 'name' => "Name " . $i, 'position' => "position " . $i, 'attrs' => array('fill' => "#e4d8a4", 'stroke' => "gray"));
	}

	echo json_encode($value);
}

function save_project() {

	$file = base_dir() . '\projekt.xml';
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

function info_project() {

	$file = base_dir() . '\projekt.xml';

	if (file_exists($file)) {
		$xml = simplexml_load_file($file);

		print_r($xml);
	} else {
		exit('Failed to open ' . $file);
	}
}
?>