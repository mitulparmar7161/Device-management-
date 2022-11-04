

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

$device=$fetchobj->fetchData("device");
?>

<body>
    
        <div class="container-fluid d-flex justify-content-center">
            
            <div class="table-responsive mt-3">

                <div class="container-fluid d-flex flex-column align-items-end mb-3">

           <form class='d-flex ms-3' action="home.php" method="GET">

     <?php  
    
        if(isset($_SESSION['search_string'])){

            echo "<input class='form-control  me-2' type='text' id='search' name='searchdata' value='".$_SESSION['search_string']."' placeholder='Search Here.' >"; 
       
          }

        else{

            echo "<input  class='form-control  me-2' type='text' id='search' name='searchdata' value='' placeholder='Search Here.' >"; 
        
          }
    
    ?>
    
    <button class='btn btn-success' type="submit" name="search" id="searchbtn">Search</button>

    </form>
                <span class="waitmsg text-danger">Please wait while we are processing your request...</span>
                
    </div>

            <table class="table">

                <thead class="bg-primary">

                    <tr class="text-white">

                                <th scope="col">ID             </th>

                                <th scope="col">Device Type    <?php echo "<a class='text-white' href='home.php?sort=ASC&colunm=type&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='home.php?sort=DESC&colunm=type&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?></th>

                                <th scope="col">Device Name    <?php echo "<a class='text-white' href='home.php?sort=ASC&colunm=name&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='home.php?sort=DESC&colunm=name&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?> </th>

                                <th scope="col">Status      <?php echo "<a class='text-white' href='home.php?sort=ASC&colunm=status&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='home.php?sort=DESC&colunm=status&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?>    </th>

                                <th scope="col">               </th>

                                <th scope="col">               </th>

                                <th scope="col">               </th>

                    </tr>

                </thead>

                <tbody  id="mytable">

                    <?php
                                    
                                    $i=1;

                                    while($row=mysqli_fetch_assoc($device)){?>

                                        <tr>

                                            <td class="p-3 pe-5"><?php echo $i; ?> </td>

                                            <td class="p-3 pe-5"><?php echo $row['type']?>    </td>

                                            <td class="p-3 pe-5"><?php echo $row['name']?>    </td>

                                            <td class="p-3 pe-5"><?php echo $row['status']?>  </td>

                                            <td class="p-3 pe-5">    </td>

                                            <td class="p-3 pe-5">    </td>
                                            
                                            <td class="p-3 pe-5">

                                            <?php
                                            
                                            if($row['status']=="available"){

                                              echo "<button class='request btn btn-success' data-id='".$row['id']."'>Request</button>";

                                            }
                                            
                                            ?>

                                            </td>
                                            
    
                                        </tr>

                                        <?php $i++; } ?> 

                </tbody>

            </table>
            
            <nav aria-label="Page navigation example">

                <ul class="pagination justify-content-end">
                   
                <?php  
                      $colunm=$_SESSION['colunm_device_emp'];

                      $sort=$_SESSION['sort_device_emp'];

                      $valueToSearch=$_SESSION['search_string'];

                      $connect = mysqli_connect("localhost", "root", "", "devicesys");
                      
        if(isset($_SESSION['search_string']))

        {

            $valueToSearch = $_SESSION['search_string'];

            $sql = "SELECT COUNT(*) FROM device WHERE status='available' and CONCAT(`type`,`name`,`status`) LIKE '%".$valueToSearch."%'";

        }

        else
        
        {

        $sql = "SELECT COUNT(*) device device";  

        }

        $rs_result = mysqli_query($connect,$sql);  

        $row = mysqli_fetch_row($rs_result);  

        $total_records = $row[0];  
        
        $total_pages = ceil($total_records / $limit);  

        $pagLink = "";     
        
        for ($i=1; $i<=$total_pages; $i++) {

          if ($i==$pn) {

              $pagLink .= "<li class='page-item bg-dark'><a class='page-link bg-primary' style='color:white;' href='home.php?page=" .$i."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>".$i."</a></li>";

              $_SESSION['pagevalue']=$i;

          }       

          else  {

              $pagLink .= "<li class='page-item'><a class='page-link' href='home.php?page=".$i."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'> ".$i."</a></li>";  
                                                
          }

        }  
       
        if(isset($_SESSION['pagevalue'])){

        $x=$_SESSION['pagevalue'];
        
       if($x > 1){

        echo "<li class='page-item'><a class='page-link' href='home.php?page=".($x-1)."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'><<</a></li>";

       }

        echo $pagLink;  

        if($x < $total_pages){

            echo "<li class='page-item'><a class='page-link' href='home.php?page=".($x+1)."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>>></a></li>";
            
        }

    }

      ?>
                    
                </ul>
                
            </nav>
            
            <?php 
              
              $con = mysqli_connect("localhost", "root","", "devicesys");

              $email= $_SESSION['email'];

              $query="select id from user where email='$email' and role='employee'";

              $result = mysqli_query($con, $query);
                                      
               $row=mysqli_fetch_assoc($result);

               $employee_id=$row['id'];

            ?>


<script type="text/javascript">

        $(document).ready(function(){

          $('.waitmsg').hide();

            $('.request').click(function(){

              $('.waitmsg').show();

                var el = this;

                var employee =<?php echo $employee_id; ?>;

                var Device = $(this).data('id');

                 $('.request').attr('disabled','disabled');

                var confirmalert = confirm("Are you sure?");

                if (confirmalert == true) {

                  $.ajax({

                    url: 'request.php',

                    type: 'POST',

                    data: { 

                      Device:Device,

                      employee:employee

                    },

                    success: function(response){

                       $('.request').removeAttr('disabled');

                       $('.waitmsg').hide();

                         window.location.href='home.php'

            }

            });

              }

          });

        });
        
    </script>

</body>




