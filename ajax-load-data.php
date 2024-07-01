<?php
    $u_name = $_POST['u_name'];
    $u_age = $_POST['u_age'];

    $conn = mysqli_connect("localhost","root","","ajax") or die("Connection Failed");

    $sql = "Insert into student(name , age) values('{$u_name}','{$u_age}') ";

    
    if(mysqli_query($conn,$sql)){
        echo 1;
    }
    else{
        echo 0;
    }
?>