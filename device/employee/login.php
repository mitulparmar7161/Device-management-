<?php
session_start();
if(isset($_SESSION['email'])){
  header("Location: home.php");
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

        
            <form name="myform" id="myform" action="login_data.php" method="POST" class="px-4 py-3 d-flex align-self-center justify-content-center "  style="margin-top: 220px;">
                <div class="form-group border p-4 " style="width: 500px;">
                <div class="h1 d-flex justify-content-center">Login</div>
    
    
                
                
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Your Email">
                 <p id="uemail" class="error" style="color: red;"></p>
    
                
                
                <label for="password" class="mt-4">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" maxlength="8"><br>
                
                <p id="upassword" class="error" style="color: red;"></p>

                <div class="d-flex justify-content-end  ">
                    <a href="forgotpassword.php" style="text-decoration:none;">Forgotpassword</a>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" id="logout" name="submit" class="btn btn-primary col-6 p-2 ">Submit</button>
                </div>

                </div>
            </form>
          


<script>


    jQuery('#myform').validate({

        rules: {
            email: {
                email: true,
                required: true,
                remote: {
                    url: "login_data.php",
                    type: "post",
                    async: false,
                    data: {
                        email: function () {
                            return $('#email').val();
                        }
                    }

                },
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 8,
                remote: {
                    url: "login_data.php",
                    type: "post",
                    async: false,
                    data: {
                        pemail: function () {
                            return $('#email').val();
                        },
                        password: function () {
                            return $('#password').val();
                        }
                    }

                },

            },

        },
        messages: {
            email: {
                remote: "Email is not Registered as an Employee..!"
            },
            password: {
                remote: "Password is Wrong..!"
            },

        }

    });

</script>



</body>
</html>