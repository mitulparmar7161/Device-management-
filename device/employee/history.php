<?php

include 'header.php';

  $connect = mysqli_connect("localhost", "root", "", "test");

      $limit = 5;     

      if (isset($_GET["page"])) { 

        $pn  = (int) $_GET["page"]; 

      } 

      else { 

        $pn=1; 
        
      };  
    
      $start_from = ($pn-1) * $limit;  

      $_SESSION['limit']=$limit;
      
      $_SESSION['start_from']=$start_from;

include 'fetch.php';

$device=$recordobj->fetchData();

?>
 
<body>
  
        <div class="container-fluid d-flex justify-content-center">
          
            <div class="table-responsive mt-3">

                <div class="container-fluid d-flex justify-content-end mb-3">
                          
                         <form class='d-flex ms-3' action="history.php" method="GET">
<!-- 
<select id="search_name" name="search_name" class="form-select" >

 <option selected value="<?php echo $_SESSION['search_name']?>"><?php if($_SESSION['search_name']==""){ echo "All users";} else {echo $_SESSION['search_name'];}?></option>
 <option  value="">All users</option>
        <?php
        $conn = mysqli_connect("localhost", "root","", "devicesys");
        $sql= "select * from user where role ='employee'";
        $course = mysqli_query($conn, $sql);
        while($result=mysqli_fetch_assoc($course)){?>


        <option value="<?php echo $result['name'] ?>"> <?php echo $result['name']?></option>

         <?php } ?>
</select> -->
 
     <?php  
    
        if(isset($_SESSION['search_string'])){

            echo "<input class='form-control ms-2  me-2' type='text' id='search' name='searchdata' value='".$_SESSION['search_string']."' placeholder='Search Here.' >"; 
       
          }

        else{

            echo "<input  class='form-control ms-2  me-2' type='text' id='search' name='searchdata' value='' placeholder='Search Here.' >"; 
        
          }
    
    ?>
    
    <button class='btn btn-success' type="submit" name="search" id="searchbtn">Search</button>

    </form>
                
    </div>
            <table class="table">

                <thead class="bg-primary">

                    <tr class="text-white">

                                <th scope="col">ID        </th>

                                <th scope="col">Device    <?php echo "<a class='text-white' href='history.php?sort=ASC&colunm=device_name&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▲</a> <a class='text-white' href='history.php?sort=DESC&colunm=device_name&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▼</a>";  ?> </th>

                                <!-- <th scope="col">Employee  <?php echo "<a class='text-white' href='history.php?sort=ASC&colunm=name&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▲</a> <a class='text-white' href='history.php?sort=DESC&colunm=name&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▼</a>";  ?> </th> -->

                                <th scope="col">Request Time  <?php echo "<a class='text-white' href='history.php?sort=ASC&colunm=request_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▲</a> <a class='text-white' href='history.php?sort=DESC&colunm=request_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▼</a>";  ?> </th>

                                <th scope="col">Assigned Time  <?php echo "<a class='text-white' href='history.php?sort=ASC&colunm=assigned_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▲</a> <a class='text-white' href='history.php?sort=DESC&colunm=assigned_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▼</a>";  ?>   </th>

                                <th scope="col">Return Time <?php echo "<a class='text-white' href='history.php?sort=ASC&colunm=return_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▲</a> <a class='text-white' href='history.php?sort=DESC&colunm=return_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▼</a>";  ?> </th>

                                <th scope="col">Reject Time  <?php echo "<a class='text-white' href='history.php?sort=ASC&colunm=reject_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▲</a> <a class='text-white' href='history.php?sort=DESC&colunm=reject_time&searchdata=".$_SESSION['search_string']."&search_name=".$_SESSION['search_name']."&page=".$pn."'>▼</a>";  ?>   </th>            
                                         
                    </tr>

                </thead>

                <tbody  id="mytable">

                    <?php

                                 
                                    $connect=mysqli_connect("localhost","root","","devicesys");

                                    $i=1;

                                    while($row=mysqli_fetch_assoc($device)){?>

                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $i; ?> </td>

                                            <td class="p-3 pe-5"><?php 

                                            $device_id=$row['device_id'];

                                            $query="select device_name from device where id='$device_id'";
                                            
                                             $result = mysqli_query($connect,$query);

                                             $device_name=mysqli_fetch_assoc($result);

                                             echo $device_name['device_name'];
                                             
                                            ?>  </td>
                                            
                                            <!-- <td class="p-3 pe-5"><?php 

                                            $emp_id=$row['emp_id'];

                                            $query="select name from user where id='$emp_id'";
                                            
                                             $result = mysqli_query($connect,$query);

                                             $emp_name=mysqli_fetch_assoc($result);

                                             echo $emp_name['name'];
  
                                            ?>    </td> -->

                                            <td class="p-3 pe-5"><?php if($row['request_time']=="0000-00-00 00:00:00"){
                                              echo "-";

                                            } else {
                                              echo $row['request_time']; 
                                              }  ?> </td>

                                            <td class="p-3 pe-5"> <?php if($row['assigned_time']=="0000-00-00 00:00:00"){
                                               echo "-";

                                            } else {
                                              echo $row['assigned_time']; 
                                              }  ?>   </td>

                                            <td class="p-3 pe-5"> <?php if($row['return_time']=="0000-00-00 00:00:00"){
                                              echo "-";

                                            } else {
                                              echo $row['return_time']; 
                                              }  ?></td>

                                            <td class="p-3 pe-5">  <?php if($row['reject_time']=="0000-00-00 00:00:00"){
                                              echo "-";

                                            } else {
                                              echo $row['reject_time']; 
                                              }  ?>  </td>

                                        </tr>
                                        
                                        <?php $i++; } ?> 

                </tbody>

            </table>
            
            <nav aria-label="Page navigation example">

                <ul class="pagination justify-content-end">
                   
                <?php  

                      $colunm=$_SESSION['colunm_device'];

                      $sort=$_SESSION['sort_device'];

                      $valueToSearch=$_SESSION['search_string'];

                      $connect = mysqli_connect("localhost", "root", "", "devicesys");
        
        if(isset($_SESSION['search_string']))

        {

            $valueToSearch = $_SESSION['search_string'];

            $search_name=$_SESSION['search_name'];

            $sql = "SELECT COUNT(*) from device_record  inner join device on device.id=device_record.device_id  inner join user on user.id=device_record.emp_id WHERE email='".$_SESSION['email']."' and CONCAT(`device_name`,`name`,`request_time`, `assigned_time`, `return_time`,`reject_time`) LIKE '%".$valueToSearch."%'";

        }

        else
        
        {

        $sql = "SELECT COUNT(*) device_record device_record";  

        }

        $rs_result = mysqli_query($connect,$sql);  

        $row = mysqli_fetch_row($rs_result);  

        $total_records = $row[0];  
        
        $total_pages = ceil($total_records / $limit);  

        $pagLink = "";     
        
        for ($i=1; $i<=$total_pages; $i++) 
        
        {

          if ($i==$pn) {

              $pagLink .= "<li class='page-item bg-dark'><a class='page-link bg-primary' style='color:white;' href='history.php?page=".$i."&colunm=".$colunm."&sort=".$sort."&search_name=".$_SESSION['search_name']."&searchdata=".$valueToSearch."'>".$i."</a></li>";

              $_SESSION['pagevalue']=$i;
          }            
          else  {

              $pagLink .= "<li class='page-item'><a class='page-link' href='history.php?page=".$i."&colunm=".$colunm."&sort=".$sort."&search_name=".$_SESSION['search_name']."&searchdata=".$valueToSearch."'> ".$i."</a></li>";  
                                                
          }
        }  
       
        if(isset($_SESSION['pagevalue'])){

        $x=$_SESSION['pagevalue'];
        
       if($x > 1){

        echo "<li class='page-item'><a class='page-link' href='history.php?page=".($x-1)."&colunm=".$colunm."&sort=".$sort."&search_name=".$_SESSION['search_name']."&searchdata=".$valueToSearch."'><<</a></li>";

       }

        echo $pagLink;  

        if($x < $total_pages){

            echo "<li class='page-item'><a class='page-link' href='history.php?page=".($x+1)."&colunm=".$colunm."&sort=".$sort."&search_name=".$_SESSION['search_name']."&searchdata=".$valueToSearch."'>>></a></li>";
            
        }

    }

      ?>
           
                </ul>
                
            </nav>
            
</body>

