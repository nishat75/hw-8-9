<?php

session_start();
include './env.php';
$query="SELECT * FROM posts";

$response=mysqli_query($conn,$query);
$posts=mysqli_fetch_all($response,1);

//print_r($_SESSION['form_error']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./controller/addpost.php">Add post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./controller/allpost.php">All post</a>
          </li>

        </ul>

      </div>
    </div>
  </nav>



  <div class='col-lg-8 mx-auto mt-5'>
  <table class="table table-responsive">
    <tr>
        <th>#</th>
        <th>Post title</th>
        <th>post detail</th>
        <th>author</th>
        <th>actions</th>
        
    </tr>
    <?php
    foreach($posts as $num=>$post){
      ?>
      <tr>

        <td><?=++$num?></td>
        <td><?=$post['caption']?></td>
        <td><?=$post['detail']?></td>
        <td><?=!empty($post['author'])?$post['author']:'user'?></td>
        <td>
            <a href="" class="btn btn-sm btn-warning">View</a>
            <a href="./editpost.php?id=<?=$post['id']?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="./deletepost.php?id=<?=$post['id']?>" class="btn btn-sm btn-danger">Delete</a>
        </td>

    </tr>
    <?php
    }
    ?>
    
  </table>
  </div>

 
</body>

</html>

<?php

session_unset();

?>