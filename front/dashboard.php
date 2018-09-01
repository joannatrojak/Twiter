<?php
session_start();
require_once '../rest/config/database.php'; 
require_once '../rest/class/User.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Twitter App</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Main</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <h1>Witaj, <?php echo $_SESSION['username'];?> !</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Utwórz nowy post
</button>
        <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Utwórz nowy post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form action="" method="post">
  <div class="form-group" data-id="<?php echo $_SESSION['userId']?>">
    <label for="email">Tekst tweeta:</label>
    <textarea class="form-control" rows="5" id="tweet"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <h2>Zobacz dzisiejsze aktualności:</h2>
    </div>
    <div class="row">
        <table id="tweetList" class="table">
            
        </table>
    </div>
</div>
    <script src="Tweet.js"></script>
</body>
</html>