<?php 
require_once('dbconfig.php');
define("ERROR", "Cannot be left blank");
$erroMsg = [];
    if ($_SERVER["REQUEST_METHOD"] ==="POST") {
        $username = htmlspecialchars(stripslashes($_POST['username']));
          $email = htmlspecialchars(stripslashes($_POST['email']));
            $password = htmlspecialchars(stripslashes($_POST['password']));
              $cpassword = htmlspecialchars(stripslashes($_POST['cpassword']));
              
              //validation
              if(!$username){
                  $erroMsg['username'] = ERROR;
              }
              if(!$email){
                  $erroMsg['email'] = ERROR;
              }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $erroMsg['email'] = "Enter a valid Email Address";
              }
              if(!$password){
                  $erroMsg['password'] = ERROR;
              }
              if(!$cpassword){
                  $erroMsg['cpassword'] = ERROR;
              }elseif($cpassword !== $password){
                  $erroMsg['cpassword'] = "Does not match password";
              }
              
              //inserting into database
              if (empty($erroMsg)) {
                  $stmt = $pdo->prepare("INSERT INTO registration(username,email,password,create_date) values(:username, :email, :password, :create_date)");
                  $stmt->bindValue(':username', $username);
                  $stmt->bindValue(':email', $email);
                  $stmt->bindValue(':password', $password);
                  $stmt->bindValue(':create_date', date('Y-m-d H:i:s'));
                  $stmt->execute();
              }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Registration</title>
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
    <label for="">Email address</label>
    <input type="email" class="form-control <?php echo isset($erroMsg["email"]) ? 'is-invalid' : '' ?>" placeholder="Enter email" name="email">
    <small class="invalid-feedback">
        <?php echo($erroMsg['email']) ?? "" ?>
    </small>
    </div>
    <div class="form-group">
    <label for="">Enter Password</label>
    <input type="password" class="form-control <?php echo isset($erroMsg["Password"]) ? 'is-invalid' : '' ?>" placeholder="Password" name="password">
    <small class="invalid-feedback">
        <?php echo($erroMsg['password']) ?? "" ?>
    </small>
    </div>
    <div class="form-group">
    <label for="">Confirm Password</label>
    <input type="password" class="form-control <?php echo isset($erroMsg["cpassword"]) ? 'is-invalid' : '' ?>" placeholder="Password" name="cpassword">
    <small class="invalid-feedback">
        <?php echo($erroMsg['cpassword']) ?? "" ?>
    </small>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </body>
</html>