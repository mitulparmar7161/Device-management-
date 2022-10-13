<?php
session_start();
if(isset($_SESSION['email'])){
  header("Location: home.php");
}



?>



<?php

if(isset($_POST['changeemail'])){
$change_email= $_POST['changeemail'];
$password= password_hash($_POST["password"], PASSWORD_DEFAULT);

    $con = mysqli_connect('localhost','root','','devicesys');
       $query = "UPDATE user SET password='$password' WHERE email='$change_email'";
     
        mysqli_query($con,$query);  

        header("Location:login.php");

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
    <title>Login</title>
</head>
<body>

        
            <form name="myform" id="myform" action="resetpass.php" method="POST" class="px-4 py-3 d-flex align-self-center justify-content-center "  style="margin-top: 220px;">
                <div class="form-group border p-4 " style="width: 500px;">
                <div class="h1 d-flex justify-content-center">Reset Password</div>

                <input type="hidden" name="changeemail" value="<?php echo $_GET['email']?>">
                
                
                <label for="password" class="mt-4">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" maxlength="8"><br>
                
                <p id="upassword" class="error" style="color: red;"></p>


                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" id="logout" name="submit" class="btn btn-primary col-6 p-2 ">Submit</button>
                </div>

                </div>
            </form>
</body>
</html>