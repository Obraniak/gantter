<?php

$base_dir = dirname(dirname(__FILE__));
require_once $base_dir . '/model/global_data.php';

echo "<div>";
echo "Nazwa projektu: <b>" .   get_session_data() -> title . "</b></br>";
echo "Adres email to: <b>" .   get_session_data() -> email . "</b></br>";
echo "Pracujesz w przestrzeni: <b>" .   get_session_data() -> current_workspace . "</b></br>";
echo "Wybranie wiersze: <b>" .   get_session_data() -> selected_items . "</b></br>";
echo "<br />";
echo "</div>";
echo '<div id="items"  style="width: 1200px;height: 700px; background-color:white; " >\
</div>';
?>

