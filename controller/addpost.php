<?php

session_start();
include '../env.php';

$caption=$_REQUEST['caption'];
$detail=$_REQUEST['detail'];
$author=$_REQUEST['author'];

$results=[];

if (empty($caption)) {
    $results['caption_error']="Missing caption";
} else if (strlen($caption)>=50) {
    $results['caption_error']="character limit exceeded";
}

if (empty($detail)) {
    $results['detail_error']="Missing detail";
}else{
    $query="INSERT INTO posts(caption, detail, author) VALUES ('$caption','$detail','$author')";
    $response = mysqli_query($conn,$query);
  

    if($response){

        $_SESSION['msg']='your post has been submitted!';
        
        header("location:../postsystem.php");
    }

}


if (count($results)>0) {
    $_SESSION['form_error']=$results;
    header("Location:../postsystem.php");
}