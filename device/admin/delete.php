<?php 
class deleteData{

    function delete($table,$id){

     $connect = mysqli_connect("localhost", "root", "", "devicesys"); 

      $query = "delete FROM $table WHERE id = '".$id."'";  

      mysqli_query($connect,$query);


    }


}

$deleteobj = new deleteData;

if(isset($_POST['deleteEmp'])){


$id=$_POST['deleteEmp'];    
$deleteobj->delete("user",$id);

}



if(isset($_POST['deleteDevice'])){


$id=$_POST['deleteDevice'];  

$deleteobj->delete("device",$id);

}


?>