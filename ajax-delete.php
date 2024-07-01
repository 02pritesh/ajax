<?php
    $id = $_POST['id'];

    $conn = mysqli_connect('localhost',"root","","ajax");

    $sql = "Delete from student where id = {$id}";

    if(mysqli_query($conn,$sql)){
        echo 1;
    }
    else{
        echo 0;
    }
?>