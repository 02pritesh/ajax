<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Crud Operation</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

    <div id="error-message" class="alert alert-danger" style="display:none"></div>
    <div id="success-message" class="alert alert-success" style="display:none"></div>

        <div class="row">
            <div class="col-12 text-center">
                <h1>Add Records with PHP & Ajax</h1>
                <div class="load-data d-flex align-items-center justify-content-around">
                    <form id="addForm">
                        User Name :
                        <input type="text" placeholder="Enter your Name" id="uname">
                    
                        User Age :
                        <input type="text" placeholder="Enter your Name" id="uage">
                    
                        <button id="save-btn" type="submit">Save</button>
                    </form>
                </div>

                <table class="table" id="table-data">
                    <!-- <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="table-primary">1</td>
                            <td class="table-primary">Pritesh Parihar</td>
                            <td class="table-primary">19</td>
                        </tr>
                    </tbody> -->
                </table>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function(){
           function loadTable(){
                $.ajax({
                    url: "ajax-load.php",
                    type : "POST",
                    success :function(data){
                        $('#table-data').html(data);  
                    }
                });
            };

            loadTable();

            $('#save-btn').on("click",function(e){
                e.preventDefault();
                var uname = $('#uname').val();
                var uage = $('#uage').val();

                if(uname == "" || uage == "")
                {
                    $('#error-message').html("All fields are required").slideDown();
                    $('#success-message').slideUp();
                }
                else{
                    $.ajax({
                    url: "ajax-load-data.php",
                    type: "POST",
                    data : {u_name : uname, u_age : uage},
                        success :function(data)
                        {
                            if(data == 1)
                            {
                                loadTable();

                                $('#addForm').trigger("reset");
                                $('#success-message').html("Data Insert successfully").slideDown();
                                $('#error-message').slideUp();
                            }
                            else{
                                $('#error-message').html("Data Insert failed").slideDown();
                                $('#success-message').slideUp();
                            }
                        }
                    });
                }
            });
        });

        $(document).on("click",".delete-btn",function(){

            if(confirm("Do you really want to delete this record ?"))
            {
                var studentId = $(this).data('id');
                var element = this;

                $.ajax({
                    url : "ajax-delete.php",
                    type: "POST",
                    data : {id : studentId},
                    success : function(data){
                        if(data == 1)
                        {
                            $(element).closest("tr").fadeOut();
                            $('#success-message').html("Data Deleted successfully").slideDown();
                            $('#error-message').slideUp();
                        }
                        else{
                            $('#error-message').html("Data Deletion failed").slideDown();
                            $('#success-message').slideUp();
                        }
                    }
                });
            }
        }); 
    </script>
</body>
</html>