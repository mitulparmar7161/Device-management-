
<?php


// Include Header File 

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

      $_SESSION['limit']= $limit;
      
      $_SESSION['start_from']= $start_from;

//Include Class File   

include '../class/device_record.php';

$device=$recordobj->fetchData();

?>

<body>
  
        <div class="container-fluid d-flex justify-content-center">
          
            <div class="table-responsive mt-3">

                <div class="container-fluid d-flex justify-content-end mb-3">
                  
           <form class='d-flex ms-3' action="device_record.php" method="GET">

     <?php  
    
        if(isset($_SESSION['search_string'])){

            echo "<input class='form-control  me-2' type='text' id='search' name='searchdata' value='".$_SESSION['search_string']."' placeholder='Search Here.' >"; 
       
          }

        else{

            echo "<input  class='form-control  me-2' type='text' id='search' name='searchdata' value='' placeholder='Search Here.'>"; 
        
          }
    
    ?>
    
    <button class='btn btn-success' type="submit" name="search" id="searchbtn">Search</button>

    </form>
            
    </div>

            <table class="table">

                <thead class="bg-primary">

                    <tr class="text-white">

                                <th scope="col">ID        </th>

                                <th scope="col">Device    </th>

                                <th scope="col">Employee</th>

                                <th scope="col">Request Time  <?php echo "<a class='text-white' href='device_record.php?sort=ASC&colunm=request_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_record.php?sort=DESC&colunm=request_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?> </th>

                                <th scope="col">Assigned Time  <?php echo "<a class='text-white' href='device_record.php?sort=ASC&colunm=assigned_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_record.php?sort=DESC&colunm=assigned_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?>   </th>

                                <th scope="col">Return Time <?php echo "<a class='text-white' href='device_record.php?sort=ASC&colunm=return_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_record.php?sort=DESC&colunm=return_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?> </th>

                                <th scope="col">Reject Time  <?php echo "<a class='text-white' href='device_record.php?sort=ASC&colunm=reject_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_record.php?sort=DESC&colunm=reject_time&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?>   </th>

                                <th scope="col"> </th>

                                <th scope="col">Status   <?php echo "<a class='text-white' href='device_record.php?sort=ASC&colunm=status&searchdata=".$_SESSION['search_string']."'>▲</a> <a class='text-white' href='device_record.php?sort=DESC&colunm=status&searchdata=".$_SESSION['search_string']."'>▼</a>";  ?> </th>
                                
                    </tr>

                </thead>

                <tbody  id="mytable">

                    <?php

                                    $connect=mysqli_connect("localhost","root","","devicesys");

                                    $i=1;
                                  // Fetch Data
                                    while($row=mysqli_fetch_assoc($device)){?>

                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $i; ?> </td>

                                            <td class="p-3 pe-5"><?php 

                                            $device_id=$row['device_id'];

                                            $query="select name from device where id='$device_id'";
                                            
                                             $result = mysqli_query($connect,$query);

                                             $device_name=mysqli_fetch_assoc($result);

                                             echo $device_name['name'];
                                             
                                            ?>  </td>
                                            
                                            <td class="p-3 pe-5"><?php 

                                            $emp_id=$row['emp_id'];

                                            $query="select name from user where id='$emp_id'";
                                            
                                             $result = mysqli_query($connect,$query);

                                             $emp_name=mysqli_fetch_assoc($result);

                                             echo $emp_name['name'];
  
                                            ?>    </td>

                                            <td class="p-3 pe-5"><?php if($row['request_time']=="0000-00-00 00:00:00"){

                                              echo "-";

                                            } else {

                                              echo $row['request_time']; 

                                              }  ?> 

                                              </td>

                                            <td class="p-3 pe-5"> <?php if($row['assigned_time']=="0000-00-00 00:00:00"){

                                               echo "-";

                                            } else {
                                              
                                              echo $row['assigned_time']; 

                                              }  ?>  
                                              
                                            </td>

                                            <td class="p-3 pe-5"> <?php if($row['return_time']=="0000-00-00 00:00:00"){

                                              echo "-";

                                            } else {

                                              echo $row['return_time']; 

                                              }  ?>
                                              
                                            </td>

                                            <td class="p-3 pe-5">  <?php if($row['reject_time']=="0000-00-00 00:00:00"){

                                              echo "-";

                                            } else {

                                              echo $row['reject_time']; 

                                              }  ?> 
                                              
                                            </td>

                                              <td class="p-3 pe-5"></td>

                                              <td class="p-3 pe-5">
                                              
                                              <select name="status" id="<?php echo $row['id']?>" class="status">

                                              <option selected disabled><?php echo $row['status']?></option>

                                              <option value="accept">Accept</option>

                                              <option value="reject">Reject</option>        

                                              <option value="requested">Requested</option>

                                              <option value="return">Return</option>

                                            </select>

                                             </td>

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
            
            $sql = "SELECT COUNT(*) FROM device_record  WHERE CONCAT(`request_time`, `assigned_time`, `return_time`,`reject_time`,`status`) LIKE '%".$valueToSearch."%'";
        
          }

        else{

        $sql = "SELECT COUNT(*) device_record device_record";  

        }

        $rs_result = mysqli_query($connect,$sql);  

        $row = mysqli_fetch_row($rs_result);  

        $total_records = $row[0];  
        
        $total_pages = ceil($total_records / $limit);  

        $pagLink = "";     
        
        for ($i=1; $i<=$total_pages; $i++) {

          if ($i==$pn) {

              $pagLink .= "<li class='page-item bg-dark'><a class='page-link bg-primary' style='color:white;' href='device_record.php?page=" .$i."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>".$i."</a></li>";
              
              $_SESSION['pagevalue']=$i;

          }       

          else  {

              $pagLink .= "<li class='page-item'><a class='page-link' href='device_record.php?page=".$i."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'> ".$i."</a></li>";  
                                                
          }

        }  
       
        if(isset($_SESSION['pagevalue'])){

        $x=$_SESSION['pagevalue'];
        
       if($x > 1){

        echo "<li class='page-item'><a class='page-link' href='device_record.php?page=".($x-1)."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'><<</a></li>";
       
      }

        echo $pagLink;  

        if($x < $total_pages){

            echo "<li class='page-item'><a class='page-link' href='device_record.php?page=".($x+1)."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>>></a></li>";
            
        }

    }

      ?>
                    
                </ul>
                
            </nav>



<!-- On Status Change Script -->

<script>
  
 $(document).on('change', '.status', function(){  

           var id = $(this).attr("id"); 

           var value = $(this).val(); 

           console.log(id);

           console.log(value);

           var confirmalert = confirm("Are you sure?");

                if (confirmalert == true) {
                
           $.ajax({  

                url:"../class/device_record.php",  

                method:"POST",  

                data:{

                  id:id
                  
                  ,status:value
                
                },  

                dataType:"json",  

                success:function(response=true){  

                     window.location.href='device_record.php'

                }  

           }); 

        } 

      });  

</script>

</body>