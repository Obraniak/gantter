<?php
global $global_project_xml;
global $global_title;
global $global_file;
global $global_email;
global $global_current_workspace;
global $global_selected_items;

/////
function get_global_project_xml() {
	if (isset($GLOBALS['global_project_xml'])) {
		return $GLOBALS['global_project_xml'];
	}

	echo "global_project_xml nor set";

	return $null;
}

function set_global_project_xml($data) {
	$GLOBALS['global_project_xml'] = simplexml_load_string($data);
}

////

function get_global_email() {
	if (isset($GLOBALS['global_email'])) {
		return $GLOBALS['global_email'];
	}

	echo "global_email nor set";

	return $null;
}

function set_global_emial($data) {
	$GLOBALS['global_email'] = $data;
}

////

function get_global_current_workspace() {
	if (isset($GLOBALS['global_current_workspace'])) {
		return $GLOBALS['global_current_workspace'];
	}

	echo "global_current_workspace nor set";

	return $null;
}

function set_global_current_workspace($data) {
	$GLOBALS['global_current_workspace'] = $data;
}

///

function get_global_file() {
	if (isset($GLOBALS['global_file'])) {
		return $GLOBALS['global_file'];
	}

	echo "global_file nor set";

	return $null;
}

function set_global_file($data) {
	$GLOBALS['global_file'] = $data;
}

/////

function get_global_selected_items() {
	if (isset($GLOBALS['global_selected_items'])) {
		return $GLOBALS['global_selected_items'];
	}

	echo "global_selected_items nor set";

	return $null;
}

function set_global_selected_items($data) {
	$GLOBALS['global_selected_items'] = $data;
}

////

function get_global_title() {
	if (isset($GLOBALS['global_title'])) {
		return $GLOBALS['global_title'];
	}

	echo "global_title nor set";

	return $null;
}

function set_global_title($data) {
	$GLOBALS['global_title'] = $data;
}

?>