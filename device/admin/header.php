<?php

session_start();

if(isset($_SESSION['employee'])){

       header("Location: ../employee/login.php");
}

if(!isset($_SESSION['email'])){

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
    
    <title>Admin Panel</title>

</head>

<body>
    
<div class="offcanvas offcanvas-start bg-primary" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" style="width:250px;">
 
<div class="offcanvas-header">
   
<h3 id="offcanvasTopLabel" class="text-white">Menu </h3>
   
<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  
</div>

  <div class="offcanvas-body">

                    <ul class="navbar-nav ms-auto">

                    <li class="nav-item pe-3">

                        <a class="nav-link text-white" style="font-size: 23px;" aria-current="page" href="home.php">Home</a>

                    </li>

                    <li class="nav-item pe-3">

                        <a class="nav-link text-white" style="font-size: 23px;" aria-current="page" href="device_data.php">Device</a>

                    </li>

                    <li class="nav-item pe-3">
                       
                    <a class="nav-link text-white" style="font-size: 23px;" aria-current="page" href="employee_data.php">Employee Data</a>
                    
                </li>
                    
            </li>
                    <li class="nav-item pe-3">

                        <a class="nav-link text-white" style="font-size: 23px;" aria-current="page" href="device_record.php">Device Request</a>
                    
                    </li>

                    <li class="nav-item pe-3">

                        <a class="nav-link text-white" style="font-size: 23px;" aria-current="page" href="history.php">History</a>
                    
                    </li>

                    <li class="nav-item pe-3 mt-2">

                        <form action="logout.php">
                    
                    <button class="btn btn-danger" type="submit" ><span class="h6">Logout</span></button>

                </form>

                    </li>
                   
                </ul>
               
  </div>

</div>

    <nav class="navbar navbar-expand-md navbar-dark bg-primary">

        <div class="container-fluid d-flex justify-content-spacebetween">

            <button class="btn text-white" id="toggle-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><h4>Menu</h4></button>
           
            <a class="navbar-brand text-white h1" style="font-size: 30px;"><?php echo $_SESSION['email']?></a>
            
        </div>

    </nav>

</body>


<script type="text/javascript">

$(document).ready(function(){
  $('#toggle-button').trigger('click');
});
        
    </script>

</html>

