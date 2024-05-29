<?php $conn = mysqli_connect("localhost","root","","datapass");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-form</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div id="form_div">
        <h1>login-form</h1>
    <form action="" method="post">
        Name:
        <input type="text" placeholder="Enter Your Name" name="Name"><BR/>
        Email:
        <input type="text" placeholder="Enter Your Email" name="Email"><BR/>
        Name:
        <input type="Password" placeholder="Enter Your Password" name="Password"><BR/>
        <input type="submit" value="Enter  " name="submit" id="btn">
    
    </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit']) && $conn) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $passowrd = md5($_POST['Password']);
    if (!$name == null && !$email== null && !$_POST['Password'] == null) {
        $sql = "INSERT INTO datatable SET
        name='$name',
        email='$email',
        password = '$passowrd'
        ";
        $res = mysqli_query($conn, $sql);
        if($res){
            $_SESSION['code'] = $password;
            header("location:display_date.php");
        }}
    else{
        $_SESSION['Ans'] = 0;
        header("refresh: 0");
        echo "Error";
    }};
?>


