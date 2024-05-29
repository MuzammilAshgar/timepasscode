<?php
$conn = mysqli_connect("localhost","root","","datapass");
$run = "SELECT * FROM datatable";
$try = mysqli_query($conn, $run);
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-form</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<center>
<div id="tabeldiv">
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php  
        if($try == true){
        $counter = mysqli_num_rows($try);
        if($counter > 0){
        while($rows =$try->fetch_assoc())
        {       
            $id = $rows['id'];
            $name =    $rows['name'];
            $email= $rows['email']; 
            $pwd = $rows['password'];
             ?>
        <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php 
                if(md5($rows['password']) == md5($pwd)){
                    echo $pwd;
                }
                else{
                    echo "Your code not work";
                }
                ?>
            </td>
        </tr>
        <?php }}
        else {
            echo "no data find.";
        }
    }?>
    </table>
</div>
</center>



</body>
</html>