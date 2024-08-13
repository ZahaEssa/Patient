<?php

$servername="localhost";
$username="root";
$pass="roots";
$db="patient";

$con=new mysqli($servername,$username,$pass,$db);

if($con->connect_error)
{
    echo "Error: ".$con->connect_error;
}
else{
    //echo "Success";
}


?>