<?php

class Device_record{

  public function fetchData(){

      $limit=$_SESSION['limit'];
  
      $start_from=$_SESSION['start_from'];
  
      $connect = mysqli_connect("localhost", "root","","devicesys");
  
      $_SESSION['search_string']='';
  
      $_SESSION['search_name']='';

      $_SESSION['colunm_device']='';

      $_SESSION['sort_device']='';

      if(isset($_GET['searchdata'])){
  
      $_SESSION['search_string'] = $_GET['searchdata'];
    
    }
    if(isset($_GET['search_name'])){
  
      $_SESSION['search_name'] = $_GET['search_name'];
    
    }
  
      $valueToSearch=$_SESSION['search_string'];
  
      $search_name=$_SESSION['search_name'];
  
      if(isset($_GET['sort'])){
  
        $colunm=$_GET['colunm'];
  
        $_SESSION['colunm_device']=$colunm;
        
        $sort=$_GET['sort'];
  
        $_SESSION['sort_device']=$sort;
  
        $query="select user.email,user.name,user.id ,device.id,device.type,device.device_name,device_record.device_id,device_record.request_time,device_record.assigned_time,device_record.return_time,device_record.reject_time,device_record.status,device_record.emp_id  from device_record  inner join device on device.id=device_record.device_id  inner join user on user.id=device_record.emp_id WHERE email='".$_SESSION['email']."' and  CONCAT(`type`,`device_name`,`name`,`request_time`,`assigned_time`,`return_time`,`reject_time`) LIKE '%".$valueToSearch."%' order by 
        $colunm $sort LIMIT $start_from, $limit";
  
      }
  
      else{
  
      $query="select user.email,user.name,user.id, device.id,device.type,device.device_name,device_record.device_id,device_record.request_time,device_record.assigned_time,device_record.return_time,device_record.reject_time,device_record.status,device_record.emp_id  from device_record  inner join device on device.id=device_record.device_id  inner join user on user.id=device_record.emp_id WHERE email='".$_SESSION['email']."' and CONCAT(`type`,`device_name`,`name`,`request_time`,`assigned_time`,`return_time`,`reject_time`) LIKE '%".$valueToSearch."%' order by 
      request_time DESC LIMIT $start_from, $limit";
  
      }
  
      $filter_result = mysqli_query($connect, $query);
        
      return $filter_result; 
  
  }

}

$recordobj = new Device_record;





class fetch{

public function fetchData($table){

    $connect = mysqli_connect("localhost", "root","", "devicesys");
  
    if($table=="device"){

    $limit=$_SESSION['limit'];

    $start_from=$_SESSION['start_from'];

    $connect = mysqli_connect("localhost", "root","","devicesys");

    $_SESSION['search_string']='';

    $_SESSION['colunm_device_emp']='';

    $_SESSION['sort_device_emp']='';

    if(isset($_GET['searchdata'])){
    
    $_SESSION['search_string'] = $_GET['searchdata'];
    
  }

$valueToSearch=$_SESSION['search_string'];

    if(isset($_GET['sort'])){
        
      $colunm=$_GET['colunm'];

      $_SESSION['colunm_device_emp']=$colunm;

      $sort=$_GET['sort'];
        
      $_SESSION['sort_device_emp']=$sort;
        
      $query="select * from device  WHERE CONCAT(`type`, `device_name`, `status`) LIKE '%".$valueToSearch."%'  order by $colunm $sort  LIMIT $start_from, $limit";

    }

    else{

    $query="select * from device  WHERE CONCAT(`type`, `device_name`, `status`) LIKE '%".$valueToSearch."%'  LIMIT $start_from, $limit";

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

        $query ="SELECT * FROM device WHERE status='requested' and id = ANY (SELECT device_id FROM device_record WHERE emp_id = ANY(SELECT id FROM user WHERE email='$email'));";

            $filter_result = mysqli_query($connect, $query);

            return $filter_result;
             
    }

}

$requestobj = new request; 

class assigned{

    public function assignedData(){

        $connect = mysqli_connect("localhost", "root","", "devicesys");

        $email=$_SESSION['email'];

        $query ="SELECT * FROM device WHERE status='assigned' and id = ANY (SELECT device_id FROM device_record WHERE emp_id = ANY(SELECT id FROM user WHERE email='$email'));";

        $filter_result = mysqli_query($connect, $query);

        return $filter_result;
            
    }

}

$assignedobj = new assigned; 

?>