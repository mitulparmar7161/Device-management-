      <?php



class update{

 
public function updateData($table){
    
echo $table;

    $con = mysqli_connect('localhost','root','','devicesys');


if($table=="device"){

      $id=$_POST['id'];

      $type=$_POST['type'];

      $name=$_POST['name'];

      $status=$_POST['status'];

      $query = "UPDATE $table SET type='$type', name='$name', status='$status' WHERE id=$id";
     
        mysqli_query($con,$query);  

        header("Location:device_data.php");

  }





  
  if($table=="user"){
    $id=$_POST['id'];
    $name=$_POST["name"];
    $email=$_POST['email'];
    $phone=$_POST["phone"];
    $doj=$_POST['doj'];
    $role=$_POST['role'];
    $query = "UPDATE $table SET name='$name',email='$email', phone='$phone',doj='$doj',role='$role' WHERE id=$id";
     
        mysqli_query($con,$query);  
        header("Location:employee_data.php");

  }


}

}
$updateobj = new update;

if(isset($_POST['devicesubmit'])){
      $updateobj->updateData("device");
}


if(isset($_POST['employeesubmit'])){
      $updateobj->updateData("user");
}






?>   