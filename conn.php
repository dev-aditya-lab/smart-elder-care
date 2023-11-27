<?php
$Server='localhost';
$Username='root';
$password='';
$db='care';

$connection= mysqli_connect($Server,$Username,$password,$db);

if($connection===FALSE){

echo 'connection failed';
}
?>