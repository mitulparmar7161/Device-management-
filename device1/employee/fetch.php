<?php

class fetch{

public function fetchData($table){

    $connect = mysqli_connect("localhost", "root","", "devicesys");

    if($table=="device"){

    $limit=$_SESSION['limit'];

    $start_from=$_SESSION['start_from'];

    $connect = mysqli_connect("localhost", "root","","devicesys");

    $_SESSION['search_string']='';

    if(isset($_GET['searchdata'])){
    
    $_SESSION['search_string'] = $_GET['searchdata'];
    
  }

$valueToSearch=$_SESSION['search_string'];

    if(isset($_GET['sort'])){
        
      $colunm=$_GET['colunm'];

      $_SESSION['colunm_device_emp']=$colunm;

      $sort=$_GET['sort'];
        
      $_SESSION['sort_device_emp']=$sort;
        
      $query="select * from device  WHERE CONCAT(`type`, `name`, `status`) LIKE '%".$valueToSearch."%'  order by $colunm $sort  LIMIT $start_from, $limit";

    }

    else{

    $query="select * from device  WHERE CONCAT(`type`, `name`, `status`) LIKE '%".$valueToSearch."%'  LIMIT $start_from, $limit";

    }

    }

    if($table=="history"){

        $email=$_SESSION['email'];

        $query = "select * from device_record where emp_id = ANY (select id from user where email='$email' and role='employee')";

    }
    
         $filter_result = mysqli_query($connect, $query);

         return $filter_result;

}

}

$fetchobj = new fetch;

class request{

    public function requestData(){

        $connect = mysqli_connect("localhost", "root","", "devicesys");

        $email=$_SESSION['email'];

        $query ="SELECT * FROM device WHERE status='requested' and id = ANY (SELECT device_id FROM device_record WHERE emp_id= ANY(SELECT id FROM user WHERE email='$email'));";

            $filter_result = mysqli_query($connect, $query);

            return $filter_result;
             
    }

}

$requestobj = new request; 

class assigned{

    public function assignedData(){

        $connect = mysqli_connect("localhost", "root","", "devicesys");

        $email=$_SESSION['email'];

        $query ="SELECT * FROM device WHERE status='assigned' and id = ANY (SELECT device_id FROM device_record WHERE emp_id= ANY(SELECT id FROM user WHERE email='$email'));";

        $filter_result = mysqli_query($connect, $query);

        return $filter_result;
            
    }

}

$assignedobj = new assigned; 

?>