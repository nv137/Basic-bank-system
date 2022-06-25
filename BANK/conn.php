<?php
$con = mysqli_connect('localhost','id17456408_root','Rkk%r\vfs3!{2m@V');

mysqli_select_db($con,'id17456408_customers');

if(!$con){
    die("Unable to connect to the database due to the following error --> ".mysqli_connect_error());
}
?>