<?php
define("REQUIRED_FIELD", "This field is required");
$error = [];

//Variables for users input
$userName = '';
$firstName = '';
$lastName = '';
$email = '';
$password = '';
$cpassword = '';
$cv_url = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Getting input from the form
    $userName = formdata('userName');
    $firstName = formdata('firstName');
    $lastName = formdata('lastName');
    $email = formdata('email');
    $password = formdata('password');
    $cpassword = formdata('cpassword');
    $cv_url = formdata('cv_url');

    //form validation
    if (!$userName) {
        $error['userName'] = REQUIRED_FIELD;
    } elseif (strlen($userName) < 6 || strlen($userName) > 16) {
        $error['userName'] = "Min of 6 or Max of 16 character";
    }

    if (!$firstName) {
        $error['firstName'] = REQUIRED_FIELD;
    }
    if (!$lastName) {
        $error['lastName'] = REQUIRED_FIELD;
    }
    if (!$email) {
        $error['email'] = REQUIRED_FIELD;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Please provide a valid email";
    }
    if (!$password) {
        $error['password'] = REQUIRED_FIELD;
    }
    if (!$cpassword) {
        $error['cpassword'] = REQUIRED_FIELD;
    } elseif ($password !== $cpassword) {
        $error['cpassword'] = 'Password does not match';
    }
    if (!$cv_url) {
        $error['cv_url'] = REQUIRED_FIELD;
    } elseif (!filter_var($cv_url, FILTER_VALIDATE_URL)) {
        $error['cv_url'] = 'Please provide a proper url link';
    }
    if (empty($error)) {
        echo "form submitted successfully";
    }
}

function formdata($field)
{
    $_POST[$field]??='';
    return htmlspecialchars(stripslashes($_POST[$field]));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Simple Registration Form</title>
    <style>
        .container{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="" novalidate>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="userName" placeholder="Username" class="form-control <?php echo isset($error['userName']) ? 'is-invalid' : '' ?>" value="<?php echo $userName ?>">
                        <small class="form-tex text-muted">Not less than 6 or greater than 16 character</small>
                        <div class="invalid-feedback">
                            <?php echo $error['userName'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstName" placeholder="First Name" class="form-control <?php echo isset($error['firstName']) ? 'is-invalid' : '' ?>" value="<?php echo $firstName ?>">
                        <div class="invalid-feedback">
                            <?php echo $error['firstName'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control <?php echo isset($error['lastName']) ? 'is-invalid' : '' ?>" value="<?php echo $lastName ?>">
                        <div class="invalid-feedback">
                            <?php echo $error['lastName'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Your Email Address" class="form-control <?php echo isset($error['email']) ? 'is-invalid' : '' ?>" value="<?php echo $email ?>">
                        <div class="invalid-feedback">
                            <?php echo $error['email'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo isset($error['password']) ? 'is-invalid' : '' ?>" value="<?php echo $password ?>">
                        <div class="invalid-feedback">
                            <?php echo $error['password'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control <?php echo isset($error['cpassword']) ? 'is-invalid' : '' ?>" value="<?php echo $cpassword ?>">
                        <div class="invalid-feedback">
                            <?php echo $error['cpassword'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>CV URL</label>
                        <input type="url" name="cv_url" class="form-control <?php echo isset($error['cv_url']) ? 'is-invalid' : '' ?>" placeholder="Link to your cv" value="<?php echo $cv_url ?>">
                        <div class="invalid-feedback">
                            <?php echo $error['cv_url'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
