<?php
require "../dbBroker.php";
require "../igrac.php";

Igrac::delete_player($_POST['igrac_id'], $conn);

?>