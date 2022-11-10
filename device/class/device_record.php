
<?php

// CRUD For Device Record Table 

class Device_record{
  
// Fetch Data From Device Record Table

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

      if($colunm==""){
        $query="select user.name, device_record.id, device.device_name,device_record.device_id,device_record.request_time,device_record.assigned_time,device_record.return_time,device_record.reject_time,device_record.status,device_record.emp_id  from device_record  inner join device on device.id=device_record.device_id  inner join user on user.id=device_record.emp_id WHERE name LIKE '%".$search_name."%' and CONCAT(`device_name`,`name`,`request_time`,`assigned_time`,`return_time`,`reject_time`) LIKE '%".$valueToSearch."%' order by 
      request_time DESC LIMIT $start_from, $limit";
      }
      else{
      $query="select user.name, device_record.id, device.device_name,device_record.device_id,device_record.request_time,device_record.assigned_time,device_record.return_time,device_record.reject_time,device_record.status,device_record.emp_id  from device_record  inner join device on device.id=device_record.device_id  inner join user on user.id=device_record.emp_id WHERE name LIKE '%".$search_name."%' and CONCAT(`device_name`,`name`,`request_time`,`assigned_time`,`return_time`,`reject_time`) LIKE '%".$valueToSearch."%' order by 
      $colunm $sort LIMIT $start_from, $limit";
      }
    }

    else{

    $query="select user.name, device_record.id, device.device_name,device_record.device_id,device_record.request_time,device_record.assigned_time,device_record.return_time,device_record.reject_time,device_record.status,device_record.emp_id  from device_record  inner join device on device.id=device_record.device_id  inner join user on user.id=device_record.emp_id WHERE name LIKE '%".$search_name."%' and CONCAT(`device_name`,`name`,`request_time`,`assigned_time`,`return_time`,`reject_time`) LIKE '%".$valueToSearch."%' order by 
    request_time DESC LIMIT $start_from, $limit";

    }

    $filter_result = mysqli_query($connect, $query);
      
    return $filter_result; 

}

   function per($status,$id){

     $connect = mysqli_connect("localhost", "root", "", "devicesys"); 

     if($status=="accept"){

           $query1 = "update device SET status='assigned' where id= ANY (select device_id from device_record where id='$id')";  

           $query2 = "update device_record SET status='assigned',assigned_time=now() where id='$id'";

     }

   if($status=="reject"){

           $query1 = "update device SET status='available' where id= ANY (select device_id from device_record where id='$id')";  

           $query2 = "update device_record SET status='rejected',reject_time=now() where id='$id'";

   }

      if($status=="return"){

           $query1 = "update device SET status='available' where id= ANY (select device_id from device_record where id='$id')";  

           $query2 = "update device_record SET status='returned',return_time=now() where id='$id'";

   }
   
         if($status=="requested"){

           $query1 = "update device SET status='requested' where id= ANY (select device_id from device_record where id='$id')";  

           $query2 = "update device_record SET status='requested',return_time=now() where id='$id'";

   }

     $check1= mysqli_query($connect,$query1);

     $check2 = mysqli_query($connect,$query2);

     if($check1 and $check2){

        echo true;

     }

     else{

        echo false;

     }
      
    }
    
}

$recordobj = new Device_record;

if(isset($_POST['status'])){

$id=$_POST['id'];  

$status=$_POST['status'];      

$recordobj->per($status,$id);

}
