<?php
$base_dir = dirname(dirname(__FILE__));

require_once ($base_dir . "/model/project_model.php");
require_once ($base_dir . "/view/view_main.php");

function setup_page() {

	start_server_session();

	load_project();

	create_page();
}
?>

