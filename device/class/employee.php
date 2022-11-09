<?php

// CRUD For User Table

class Employee{

// Fetch Data From User Table


public function fetchData(){
      $limit=$_SESSION['limit'];
    $start_from=$_SESSION['start_from'];

    $connect = mysqli_connect("localhost", "root","","devicesys");

    $_SESSION['search_string']='';

    $_SESSION['colunm_employee']='';

    $_SESSION['sort_employee']='';

  if(isset($_GET['searchdata'])){

    $_SESSION['search_string'] = $_GET['searchdata'];
    
  }

$valueToSearch=$_SESSION['search_string'];

    if(isset($_GET['sort'])){

      
      $colunm=$_GET['colunm'];

      $_SESSION['colunm_employee']=$colunm;

      $sort=$_GET['sort'];
      
      $_SESSION['sort_employee']=$sort;

      $query="select * from user  WHERE CONCAT(`name`, `email`, `phone`,`doj`,`role`) LIKE '%".$valueToSearch."%'  order by $colunm $sort  LIMIT $start_from, $limit";

    }

    else{

    $query="select * from user  WHERE CONCAT(`name`, `email`, `phone`,`doj`,`role`) LIKE '%".$valueToSearch."%'  LIMIT $start_from, $limit";

    }

    $filter_result = mysqli_query($connect, $query);
      
    return $filter_result;


}


// Upload Data In User Table 
 
public function uploadData($table){
    

    $con = mysqli_connect('localhost','root','','devicesys');

      $name=$_POST['name'];

      $email=$_POST['email'];

      $phone=$_POST['phone'];

      $doj=$_POST['doj'];

      $password= password_hash($_POST["password"], PASSWORD_DEFAULT);

      $role=$_POST['role'];

      $query = "insert into $table (name,email,phone,doj,password,role)
                 values ('$name','$email','$phone','$doj','$password','$role')";
     
        mysqli_query($con,$query); 

        header("Location:../admin/employee_data.php");

}

// Update Data In User Table 

public function updateData($table){
    
    $con = mysqli_connect('localhost','root','','devicesys');

    $id=$_POST['id'];

    $name=$_POST["name"];

    $email=$_POST['email'];

    $phone=$_POST["phone"];

    $doj=$_POST['doj'];

    $role=$_POST['role'];

    $query = "UPDATE $table SET name='$name',email='$email', phone='$phone',doj='$doj',role='$role' WHERE id=$id";
     
        mysqli_query($con,$query);  

        header("Location:../admin/employee_data.php");

}

// Delete Data From User Table 

    function delete($table,$id){

     $connect = mysqli_connect("localhost", "root", "", "devicesys"); 

      $query = "delete FROM $table WHERE id = '".$id."'";  

      mysqli_query($connect,$query);


    }

}

$employeeobj = new Employee;

if(isset($_POST['employeeupload'])){

      $employeeobj->uploadData("user");

}

if(isset($_POST['employeeupdate'])){

      $employeeobj->updateData("user");

}

if(isset($_POST['deleteEmployee'])){

$id=$_POST['deleteEmployee'];  

$employeeobj->delete("user",$id);

}

?>