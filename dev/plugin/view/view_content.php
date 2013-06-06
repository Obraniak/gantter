<?php

$base_dir = dirname(dirname(__FILE__));
require_once $base_dir . '/model/global_data.php';
?>
<table border="0" cellspacing="0" cellpadding="0" id="metric">
  <tr>
    <th>Nazwa projektu:</th>
    <td><?php echo get_session_data() -> title ?></td>
  </tr>
  <tr>
    <th>Adres email to:</th>
    <td><?php echo get_session_data() -> email ?></td>
  </tr>
  <tr>
    <th>Pracujesz w przestrzeni:</th>
    <td><?php echo get_session_data() -> current_workspace ?></td>
  </tr>
  <tr>
    <th>Wybranie wiersze:</th>
    <td><?php echo get_session_data() -> selected_items ?></td>
  </tr>
</table>

<div id="items"   style="width: 1200px;height: 700px; background-color:white; margin-left:auto; margin-right:auto; " ></div>


