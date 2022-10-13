  <?php  

 
class formfetch{

public function formdata($table,$id){
      $connect = mysqli_connect("localhost", "root", "", "devicesys"); 

      $query = "SELECT * FROM $table WHERE id = '".$id."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  

}


}

$formobj = new formfetch;


 if(isset($_POST["device"]))  
 {  

    $device = $_POST["device"];
    $formobj->formdata("device",$device);
 }  

 if(isset($_POST["employee"]))  
 {  

    $employee = $_POST["employee"];
    $formobj->formdata("user",$employee);
 }  


 ?>