<?php
ini_set('display_errors', 1);
error_reporting(~0);

$errormsg = '';

if (isset($_FILES['file'])) {
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";
    //file validation
    $file = $_FILES['file'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $ext = strtolower($ext);

    if ($file['size'] > 5 * 1024 * 1024) {
        $errormsg = "File size should not be greater than 5MB";
    } elseif (!in_array($ext, ['png', 'jpg', 'jpeg', 'gif'])) {
        $errormsg = 'You can only upload images';
    } else {
// To save the uploaded file
        move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file"><br> <br>
        <input type="submit" value="submit">
    </form>
    <p><?php echo $errormsg ?></p>
</body>
</html>
