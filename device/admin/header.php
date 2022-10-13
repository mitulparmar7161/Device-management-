<?php
session_start();
if(!isset($_SESSION['admin'])){
     header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>

    .navbar{

        background: rgb(0,138,255);
            
        background: linear-gradient(167deg, rgba(0,138,255,1) 0%, rgba(255,0,228,1) 73%);

    }


    </style>



    <title>Admin Panel</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark ps-5 pe-5 ">
        <div class="container-fluid">
            <a class="navbar-brand text-white h1 " style="font-size: 30px;" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse m-12" id="navbarTogglerDemo02">
               
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pe-3">
                        <a class="nav-link text-white" style="font-size: 23px;" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item pe-3">
                        <a class="nav-link text-white " style="font-size: 23px;" aria-current="page" href="device_data.php">Device</a>
                    </li>
                    <li class="nav-item pe-3">
                        <a class="nav-link text-white " style="font-size: 23px;" aria-current="page" href="employee_data.php">Employee Data</a>
                    </li>
                   
                </ul>
                <form action="logout.php">
                    
                    <button class="btn btn-danger" type="submit" ><span class="h6">Logout</span></button>
                </form>
             
            </div>
        </div>
    </nav>
</body>
</html>