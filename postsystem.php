<?php

session_start();

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

  <!--FORM-->
  <div class="card col-lg-4 mx-auto mt-5">
    <div class="card-header bg-info text-dark">Add post</div>
    <div class=card-body>
      <form action="./controller/addpost.php" method="GET">
        <input name="caption" class="form-control mt-4" type="text" placeholder="Your post caption">

        <?php
        if (isset($_SESSION ['form_error'] ['caption_error'])) {
          ?>
          <span style="color:red"> <?php echo $_SESSION ['form_error'] ['caption_error'] ?> </span>

          <?php

        }
        ?>
        

        <textarea name="detail"class="form-control mt-4" placeholder="Your post detail"></textarea>

        <?php
        if (isset($_SESSION ['form_error'] ['detail_error'])) {
          ?>
          <span style="color:red"> <?php echo $_SESSION ['form_error'] ['detail_error'] ?> </span>

          <?php

        }
        ?>
        
        <input name="author"class="form-control mt-4" type="text" placeholder="Author Name">
        <button class="btn btn-dark w-100 rounded-0 mt-3 bg-info text-dark">Submit</button>
      </form>
    </div>
  </div>


  <!--FORM-->

  <div class="toast <?=isset($_SESSION['msg'])?'show':''?>" style="position:absolute;right:50px;bottom:100px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="mr-auto">Post system</strong>
    <small>1 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
  
    <?=isset($_SESSION['msg'])?$_SESSION['msg']:''?>
  </div>
</div>
</body>

</html>

<?php

session_unset();

?>