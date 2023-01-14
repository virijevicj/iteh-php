<?php

require "../dbBroker.php";
require "../igrac.php";

$status = Igrac::getLast($conn);
if($status){
    echo $status->fetch_column();
}else{
    echo $status;
    echo "Failed";
}

?>