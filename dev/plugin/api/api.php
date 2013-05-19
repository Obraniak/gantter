<?php
$base_dir = dirname(dirname(__FILE__));
require_once ($base_dir . "/model/global_data.php");

load_server_session();

call_user_func($_REQUEST['method' ]);

	function base_dir() {
	return dirname(dirname(__FILE__));
	;
	}

	function load_project() {

	header('Content-Type: application/json');

	$xml = simplexml_load_string(get_session_data() -> project_xml);

	$sxe = new SimpleXMLElement($xml -> asXml());

	$x = 32;
	$y = 32;
	$offset = 40;

	$width = 150;
	$height = 60;

	$rowItemsCount = 5;

	for ($i = 0; $i <= count($sxe -> Tasks -> Task) - 1; $i++) {
		
		$x =  (($width +$offset)*($i%$rowItemsCount))+ 32;
		
		$tmp = array('id' => $i,
						  'x' => $x, 
						  'y' => $y, 
						  'width' => $width, 
						  'height' => $height, 
						  'name' => $sxe -> Tasks -> Task[$i] -> Name." " , 
						  'position' => $sxe -> Tasks -> Task[$i] -> Priority." ", 
						  'avatar' => (base_dir(). "/img/favicon.png"),
						  'fill' => "#e4d8a4", 
						  'stroke' => "gray");
										  
				
		$value[$i]  = $tmp;
										  
		if($i%$rowItemsCount==$rowItemsCount-1)
		{
			$y = $y + $height + 30;
		}

	}


	echo json_encode($value);
}

function save_project() {

	$xml =           get_session_data() -> project_xml;

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

	if (file_exists(get_session_file())) {
		print_r( get_session_data() -> project_xml);
	} else {
		exit('Failed to open ' . get_session_file());
	}
}

function tasks() {

	$xml = simplexml_load_string(get_session_data() -> project_xml);

	$sxe = new SimpleXMLElement($xml -> asXml());

	for ($i = 1; $i <= count($sxe -> Tasks -> Task) - 1; $i++) {
		echo $sxe -> Tasks -> Task[$i] -> UID . " " . $sxe -> Tasks -> Task[$i] -> Name . " </br>";
	}

}
?>