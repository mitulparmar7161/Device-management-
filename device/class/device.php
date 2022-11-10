<?php

// CRUD For Device Table

class Device{

// Fect Data From Device Table 

public function fetchData(){

    $limit=$_SESSION['limit'];
    $start_from=$_SESSION['start_from'];

    $connect = mysqli_connect("localhost", "root","","devicesys");

    $_SESSION['search_string']='';

    $_SESSION['colunm']='';

    $_SESSION['sort']='';

  if(isset($_GET['searchdata'])){
    
    $_SESSION['search_string'] = $_GET['searchdata'];
    
  }

$valueToSearch=$_SESSION['search_string'];

    if(isset($_GET['sort'])){

    
      $colunm=$_GET['colunm'];
      
      $_SESSION['colunm']=$colunm;

      $sort=$_GET['sort'];

      $_SESSION['sort']=$sort;
if($colunm==""){
  $query="select * from device  WHERE CONCAT(`type`, `device_name`, `status`) LIKE '%".$valueToSearch."%' LIMIT $start_from, $limit";
}
else{

      $query="select * from device  WHERE CONCAT(`type`, `device_name`, `status`) LIKE '%".$valueToSearch."%'  order by $colunm $sort  LIMIT $start_from, $limit";
}
    }

    else{

    $query="select * from device  WHERE CONCAT(`type`, `device_name`, `status`) LIKE '%".$valueToSearch."%'  LIMIT $start_from, $limit";

    }

    $filter_result = mysqli_query($connect, $query);
      
    return $filter_result;

}

// Upload Data In Device Table
 
public function uploadData($table){
    
    $con = mysqli_connect('localhost','root','','devicesys');

  if($table=="device"){

      $type=$_POST['type'];

      $name=$_POST['name'];

      $status=$_POST['status'];

      $query = "insert into $table (type,device_name,status)
                 values ('$type','$name','$status')";
     
        mysqli_query($con,$query);  

        header("Location:../admin/device_data.php");

  }

}

// Update Data In Device Table

public function updateData($table){
    
    $con = mysqli_connect('localhost','root','','devicesys');

      $id=$_POST['id'];

      $type=$_POST['type'];

      $name=$_POST['name'];

      $status=$_POST['status'];

      $query = "UPDATE $table SET type='$type', device_name='$name', status='$status' WHERE id=$id";
     
      mysqli_query($con,$query);  

      header("Location:../admin/device_data.php");

}

// Delete Data From Device Table

    function delete($table,$id){

     $connect = mysqli_connect("localhost", "root", "", "devicesys"); 

      $query = "delete FROM $table WHERE id = '".$id."'";  

      mysqli_query($connect,$query);

    }

}


$deviceobj = new Device;

if(isset($_POST['deviceupload'])){
  
      $deviceobj->uploadData("device");
}

if(isset($_POST['deviceupdate'])){

      $deviceobj->updateData("device");
}

if(isset($_POST['deleteDevice'])){

$id=$_POST['deleteDevice'];  

$deviceobj->delete("device",$id);

}

?>