<?php

require "../dbBroker.php";
require "../utakmica.php";

$status = Utakmica::getLast($conn);
if($status){
    echo $status->fetch_column();
}else{
    echo $status;
    echo "Failed";
}

?>