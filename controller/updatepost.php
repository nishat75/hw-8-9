<?php

session_start();
include './env.php';
$caption=$_REQUEST['caption'];
$detail=$_REQUEST['detail'];
$author=$_REQUEST['author'];
$id=($_REQUEST['id']);


$error=[];

if(empty($caption)){
$error['caption_error']="Fill up your title";
}

if(empty($detail)){
    $error['detail_error']="Fill up your detail";

}

if(count($error)>0){
    $_SESSION ['form_error']=$error;
    header("Location: ./editpost.php?id=$id");
}else{
    $query="UPDATE posts SET caption='$caption',detail='$detail',author='$author' where id='$id'";
$response=mysqli_query($conn,$query);

if($response){
    header("location:./allpost.php");
}
}

?>