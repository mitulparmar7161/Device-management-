<?php




class upload{

 
public function uploadData($table){
    
echo $table;

    $con = mysqli_connect('localhost','root','','devicesys');


  if($table=="device"){
      $type=$_POST['type'];

      $name=$_POST['name'];

      $status=$_POST['status'];

      $query = "insert into $table (type,name,status)
                 values ('$type','$name','$status')";
     
        mysqli_query($con,$query);  

        header("Location:device_data.php");

  }



  if($table =="user"){

      $name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $doj=$_POST['doj'];

      $password= password_hash($_POST["password"], PASSWORD_DEFAULT);
      $role=$_POST['role'];



       $query = "insert into $table (name,email,phone,doj,password,role)
                 values ('$name','$email','$phone','$doj','$password','$role')";
     
        mysqli_query($con,$query); 

        header("Location:employee_data.php");

  }


}

}
$uploadobj = new upload;

if(isset($_POST['devicesubmit'])){
      $uploadobj->uploadData("device");
}


if(isset($_POST['usersubmit'])){
      $uploadobj->uploadData("user");
}





?>   