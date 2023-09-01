<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='cms';

$conn=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$conn){
    die(mysqli_error($conn));
}

?>