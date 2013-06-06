<?php

class session_data {
	var $project_xml;
	var $title;
	var $email;
	var $current_workspace;
	var $selected_items;
	var $changes;
}

global $session_current_data;

function get_session_dir() {
	return dirname(dirname(__FILE__)) . '/session';
}

function get_session_file() {
	return get_session_dir() . '/session_global.json';
}

function get_session_changes_file() {
	return get_session_dir() . '/session_global_changes.xml';
}

function set_session_data($data) {
	$GLOBALS['session_current_data'] = $data;

}

function get_session_data() {
	if (isset($GLOBALS['session_current_data'])) {
		return $GLOBALS['session_current_data'];
	}

	echo "session_current_data nor set";

	return $null;
}

function start_server_session() {

	set_session_data(new session_data());

	if (!file_exists(get_session_dir())) {
		mkdir(get_session_dir());
	}
	
	save_server_session();
}

function save_server_session() {

	file_put_contents(get_session_file(), json_encode(get_session_data()));

}

function load_server_session() {

	$data = file_get_contents(get_session_file());

	set_session_data(json_decode($data));

}
?>