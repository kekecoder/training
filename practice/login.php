<?php 
require_once('dbconfig.php');
define("ERROR", "Cannot be left blank");
$erroMsg = [];
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $username = htmlspecialchars(stripslashes($_POST['username']));
             $password = htmlspecialchars(stripslashes($_POST['password']));
              
              //validation
              if(!$username){
                  $erroMsg['username'] = ERROR;
              }
              if(!$password){
                  $erroMsg['password'] = ERROR;
              }
              //inserting into database
              if (empty($erroMsg)) {
                  $stmt = $pdo->prepare("SELECT * FROM registration WHERE username = :username AND password = :password ");
                  $stmt->bindValue(':username', $username);
                  $stmt->bindValue(':password', $password);
                  $stmt->execute();
                  if($stmt->rowCount() > 0){
                      echo('<div class="alert alert-success">Login Succesfull</div>');
                  }else{
                      echo('<div class="alert alert-danger">Invalid Registration</div>');
                  }
    }
 }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Login Page</title>
    <style>
            .container{
                margin-top: 40px;
            }
        </style>
</head>
<body>
    <div class="container">
            <form method="post" novalidate>
  <div class="form-group">
    <label for="">Username</label>
    <input type="text" class="form-control <?php echo isset($erroMsg["username"]) ? 'is-invalid' : '' ?>" placeholder="Username" name="username">
    <small class="invalid-feedback">
        <?php echo($erroMsg['username']) ?? "" ?>
    </small>
  </div>
    <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control <?php echo isset($erroMsg["password"]) ? 'is-invalid' : '' ?>" placeholder="Enter your password" name="password">
    <small class="invalid-feedback">
        <?php echo($erroMsg['password']) ?? "" ?>
    </small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>
</html>