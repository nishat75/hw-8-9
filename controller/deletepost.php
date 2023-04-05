<?php
include './env.php';

$id=$_REQUEST['id'];

$query="DELETE FROM posts where id='$id'";
$response=mysqli_query($conn,$query);

if($response){
    header("location:./allpost.php");
}

