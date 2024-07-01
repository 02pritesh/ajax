<?php 

    $con = mysqli_connect("localhost","root","","ajax") or die("Connection Failed");

    $sql = "Select * from student";

    $result = mysqli_query($con,$sql) or die("Sql Query Failed");

    $output = '';
    if(mysqli_num_rows($result) > 0){

      $output =  " <table class='table'>
                    <thead >
                        <tr>
                            <th scope='col'>ID</th>
                            <td scope='col'>Name</td>
                            <td scope='col'>Age</td>
                            <td scope='col'>Action</td>
                        </tr>
                    </thead>";

                while($row = mysqli_fetch_assoc($result)){
                    $output .= "<tr >
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['age']}</td>
                                    <td><button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button></td>
                                </tr>";
                }

        $output .= "</table>";

        mysqli_close($con);
            
        echo $output;
    }else{
        echo "<h2 class='text-center'>No record found</h2>";
    }
?>