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
        <div class="row">
            <div class="col-12 text-center">
                <h1>PHP with Ajax</h1>
                <div class="load-data d-flex align-items-center justify-content-center">
                    <button id="load-btn">load Data</button>
                </div>

                <table class="table" id="table-data">
                    <thead class="thead-light">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#load-btn').on('click',function(event){
                $.ajax({
                    url: "ajax-load.php",
                    type : "POST",
                    success :function(data){
                        $('#table-data').html(data);  
                    }
                });
            });
        });
    </script>
</body>
</html>