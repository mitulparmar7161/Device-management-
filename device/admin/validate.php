<?php


if(isset($_POST['email'])){
    $enroll = $_POST['email'];
    $dbh = mysqli_connect('localhost','root','','devicesys');

    $sql = "SELECT email FROM user WHERE email = '$email'";
    $stmt = mysqli_query($dbh,$sql);

   if(mysqli_num_rows($stmt)>0){
    echo "false";
   }  
   else{
    echo "true";
   }
} 



?>