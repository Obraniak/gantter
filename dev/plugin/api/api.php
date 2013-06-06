<?php
$base_dir = dirname(dirname(__FILE__));
require_once ($base_dir . "/model/global_data.php");

load_server_session();

call_user_func($_REQUEST['method']);

function base_dir() {
	return dirname(dirname(__FILE__));
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

		$x = (($width + $offset) * ($i % $rowItemsCount)) + 32;

		$tmp = array('uid' => $sxe -> Tasks -> Task[$i] -> UID . "", 'id' => $sxe -> Tasks -> Task[$i] -> ID . "", 'x' => $x, 'y' => $y, 'width' => $width, 'height' => $height, 'name' => $sxe -> Tasks -> Task[$i] -> Name . " ", 'position' => $sxe -> Tasks -> Task[$i] -> Priority . " ", 'avatar' => "http://localhost/plugin/plugin/img/favicon.png", 'fill' => "#fff", 'stroke' => "gray");

		$value[$i] = $tmp;

		if ($i % $rowItemsCount == $rowItemsCount - 1) {
			$y = $y + $height + 30;
		}

	}

	echo json_encode($value);
}

function upload_changes() {

	if (isset($_POST)) {
		file_put_contents(get_session_changes_file(), 'data1');
		$data = file_get_contents('php://input');

		$data2 = json_decode($data);

		//file_put_contents(get_session_changes_file(), json_encode($data2 -> changes));

		$xml = simplexml_load_string(get_session_data() -> project_xml);

		$sxe = new SimpleXMLElement($xml -> asXml());

		$sxe -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

		$items = $data2 -> changes;

		for ($i = 0; $i <= count($items) - 1; $i++) {

			$result = $sxe -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="' . $items[$i] -> leftId . '"]]');

			$node = $result[0];

			$newNode = new SimpleXMLElement('<PredecessorLink></PredecessorLink>');
			$newNode -> addChild('PredecessorUID', $items[$i] -> rightId . "");
			$newNode -> addChild('Type', '1');
			$newNode -> addChild('CrossProject', '0');
			$newNode -> addChild('LinkLag', '0');
			$newNode -> addChild('LagFormat', '7');

			simplexml_insert_before($newNode, $node -> IsPublished);

		}

		get_session_data() -> project_xml = $sxe -> asXml();

		file_put_contents(get_session_changes_file(),  get_session_data() -> project_xml);

		save_server_session();

		echo get_session_data() -> project_xml;
	}
}

function save_project() {

	$xml = file_get_contents(get_session_changes_file());
	do_post_request('https://app.gantter.com/UpdateXML.aspx', array('projectXML' => $xml));

	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, 'https://app.gantter.com/UpdateXML.aspx');
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($ch, CURLOPT_POST, true);
	//
	// $data = array('projectXML' => $xml . '');
	//
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// $output = curl_exec($ch);
	// $info = curl_getinfo($ch);
	// var_dump($info);
	// curl_close($ch);
}

function do_post_request($url, $fields, $optional_headers = null) {
	// http_build_query is preferred but doesn't seem to work!
	// $fields_string = http_build_query($fields, '', '&', PHP_QUERY_RFC3986);

	// Create URL parameter string
	foreach ($fields as $key => $value)
		$fields_string .= $key . '=' . $value . '&';
	$fields_string = rtrim($fields_string, '&');

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

	$result = curl_exec($ch);

	curl_close($ch);
}

function info_project() {

	if (file_exists(get_session_file())) {
		print_r( get_session_data() -> project_xml);
	} else {
		exit('Failed to open ' . get_session_file());
	}
}

function save_file() {

	start_server_session();
}

function add_node() {

	$xml = simplexml_load_string(get_session_data() -> project_xml);

	$sxe = new SimpleXMLElement($xml -> asXml());

	$sxe -> registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe -> xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="24"]]');

	$node = $result[0];

	$newNode = new SimpleXMLElement('<PredecessorLink></PredecessorLink>');
	$newNode -> addChild('PredecessorUID', '7');
	$newNode -> addChild('Type', '1');
	$newNode -> addChild('CrossProject', '0');
	$newNode -> addChild('LinkLag', '0');
	$newNode -> addChild('LagFormat', '7');

	simplexml_insert_before($newNode, $node -> IsPublished);

	echo $sxe -> asXml();
}

function simplexml_insert_after(SimpleXMLElement $insert, SimpleXMLElement $target) {
	$target_dom = dom_import_simplexml($target);
	$insert_dom = $target_dom -> ownerDocument -> importNode(dom_import_simplexml($insert), true);
	return $target_dom -> parentNode -> appendChild($insert_dom);

}

function simplexml_insert_before(SimpleXMLElement $insert, SimpleXMLElement $target) {
	$target_dom = dom_import_simplexml($target);
	$insert_dom = $target_dom -> ownerDocument -> importNode(dom_import_simplexml($insert), true);
	return $target_dom -> parentNode -> insertBefore($insert_dom, $target_dom);
}

function file_path() {

	echo get_session_file();
	echo get_session_changes_file();
	echo get_session_dir();
}

function tasks() {

	$xml = simplexml_load_string(get_session_data() -> project_xml);

	$sxe = new SimpleXMLElement($xml -> asXml());

	for ($i = 1; $i <= count($sxe -> Tasks -> Task) - 1; $i++) {
		echo $sxe -> Tasks -> Task[$i] -> UID . " " . $sxe -> Tasks -> Task[$i] -> Name . " </br>";
	}

}
?>