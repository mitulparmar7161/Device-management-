
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

include '../class/device.php';


$device=$deviceobj->fetchData();

?>





<body>

    <!-- The Modal -->
    
    <div class="modal" id="myModal">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">

                    <h4 class="modal-title">Add New Device</h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    
    <form name="myform" id="myform" action="../class/device.php"  method="POST" class="px-4 py-3 d-flex align-self-center justify-content-center ">

        <div class="form-group border p-4 " style="width: 500px;">
        
                            <label for="type"> Device Type:</label>

                             <select id="type" name="type" class="form-select" required>

                             <option selected disabled>Select Device Type</option>

                             <option value="mobile">Mobile</option> 

                             <option value="desktop">Desktop</option> 

                             <option value="laptop">Laptop</option> 

                             <option value="accessories">Accessories</option>
                             
                            </select>

                              <p id="type" class="error" style="color: red;"></P>  
                              
                           <label for="name">Device Name:</label>
           
                            <input type="text" id="name" name="name" placeholder="Enter Device Name" class="form-control">

                            <p id="name" class="error" style="color: red;"></P>
                            
                              <label for="status"> Status:</label>

                             <select id="status" name="status" class="form-select" required>

                             <option selected disabled>Select Status</option>

                             <option value="available">Available</option> 

                             <option value="unavailable">Unavailable</option> 

                             <option value="requested">Requested</option> 
                             
                            </select>

                              <p id="status" class="error" style="color: red;"></P>  
                              
            <div class="d-flex justify-content-center">

                <button type="submit" id="submit" name="deviceupload" class="btn btn-primary col-6 p-2 mt-4">Add Device</button>

            </div>

        </div>

    </form>

</div>

                <!-- Modal footer -->

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
                
            </div>

        </div>

    </div>
    
  <!-- The Modal -->

    <div class="modal" id="myModal1">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">

                    <h4 class="modal-title">Edit Device</h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    
    <form name="myform1" id="myform1" action="../class/device.php"  method="POST" class="px-4 py-3 d-flex align-self-center justify-content-center ">
      
    <div class="form-group border p-4 " style="width: 500px;">

            <input type="hidden" id="id1" name="id">
            
             <label for="type1"> Device Type:</label>

                             <select id="type1" name="type" class="form-select" required>

                             <option selected disabled>Select Status</option>

                             <option value="mobile">Mobile</option> 

                             <option value="desktop">Desktop</option> 

                             <option value="laptop">Laptop</option> 

                             <option value="accessories">Accessories</option> 
                             
                            </select>

                              <p id="type1" class="error" style="color: red;"></P>  
                              
                         <label for="name1">Device Name:</label>
           
                        <input type="text" id="name1" name="name" placeholder="Enter Device Name" class="form-control">

                         <p id="name1" class="error" style="color: red;"></P>
                         
                            <label for="status1"> Status:</label>

                             <select id="status1" name="status" class="form-select" required>

                             <option selected disabled>Select Status</option>

                             <option value="available">Available</option> 

                             <option value="unavailable">Unavailable</option> 

                             <option value="requested">Requested</option> 
                             
                            </select>

                              <p id="status1" class="error" style="color: red;"></P>  
                              
            <div class="d-flex justify-content-center">

                <button type="submit" id="submit1" name="deviceupdate" class="btn btn-primary col-6 p-2 mt-4">Edit Device</button>

            </div>

        </div>

    </form>
    
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>

            </div>

        </div>

    </div>
    
        <div class="container-fluid d-flex justify-content-center">
            
            <div class="table-responsive mt-3">

                <div class="container-fluid d-flex justify-content-end mb-3">
                    

 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">

            Add Device

        </button>

         <form class='d-flex ms-3' action="device_data.php" method="GET">

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

    </div>

            <table class="table">

                <thead class="bg-primary">

                    <tr class="text-white">

                                <th scope="col">ID             </th>

                                <th scope="col">Device Type    <?php echo "<a class='text-white' href='device_data.php?sort=ASC&colunm=type&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_data.php?sort=DESC&colunm=type&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?></th>

                                <th scope="col">Device Name    <?php echo "<a class='text-white' href='device_data.php?sort=ASC&colunm=name&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_data.php?sort=DESC&colunm=name&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?></th>

                                <th scope="col">Status         <?php echo "<a class='text-white' href='device_data.php?sort=ASC&colunm=status&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▲</a> <a class='text-white' href='device_data.php?sort=DESC&colunm=status&searchdata=".$_SESSION['search_string']."&page=".$pn."'>▼</a>";  ?></th>

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
                                            
                                            <td class="p-3 pe-5"> <?php echo $i; ?></td>

                                            <td class="p-3 pe-5"><?php echo $row['type']?>  </td>

                                            <td class="p-3 pe-5"><?php echo $row['name']?>    </td>

                                            <td class="p-3 pe-5">   <?php echo $row['status']?>  </td>

                                            <td class="p-3 pe-5">    </td>

                                            <td class="p-3 pe-5"><button class='edit btn btn-success' id="<?php echo $row['id']?>">Edit</button></td>

                                            <td class="p-3 pe-5"><button class='delete btn btn-danger' data-id='<?= $row['id']; ?>'>Delete</button></td>
    
                                        </tr>

                                        <?php $i++; } ?> 
                </tbody>

            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                   
                <?php  
                      $colunm=$_SESSION['colunm'];
            $sort=$_SESSION['sort'];
            $valueToSearch=$_SESSION['search_string'];
      $connect = mysqli_connect("localhost", "root", "", "devicesys");



        
        if(isset($_SESSION['search_string']))
        {
            $valueToSearch = $_SESSION['search_string'];
            $sql = "SELECT COUNT(*) FROM device  WHERE CONCAT(`type`, `name`, `status`) LIKE '%".$valueToSearch."%'";
        }
        else{
        $sql = "SELECT COUNT(*) device login";  
        }
        $rs_result = mysqli_query($connect,$sql);  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $row[0];  
          
        
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "";     
        
        for ($i=1; $i<=$total_pages; $i++) {
          if ($i==$pn) {
              $pagLink .= "<li class='page-item bg-dark'><a class='page-link bg-primary' style='color:white;' href='device_data.php?page="
                                                .$i."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>".$i."</a></li>";
                                                $_SESSION['pagevalue']=$i;
          }            
          else  {
              $pagLink .= "<li class='page-item'><a class='page-link' href='device_data.php?page=".$i."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>
                                                ".$i."</a></li>";  
                                                
          }
        }  
       
        if(isset($_SESSION['pagevalue'])){
        $x=$_SESSION['pagevalue'];
        
       if($x > 1){
        echo "<li class='page-item'><a class='page-link' href='device_data.php?page=".($x-1)."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'><<</a></li>";
       }
        echo $pagLink;  
        if($x < $total_pages){

            echo "<li class='page-item'><a class='page-link' href='device_data.php?page=".($x+1)."&colunm=".$colunm."&sort=".$sort."&searchdata=".$valueToSearch."'>>></a></li>";
            
        }

    }

      ?>
                    
                </ul>
                
            </nav>


            
<script type="text/javascript">

    </script>

<script type="text/javascript">

        $(document).ready(function(){


            $('.delete').click(function(){

                var el = this;

                var deleteDevice = $(this).data('id');

                var confirmalert = confirm("Are you sure?");

                if (confirmalert == true) {

                  $.ajax({

                    url: '../class/device.php',

                    type: 'POST',

                    data: { deleteDevice:deleteDevice },

                    success: function(response){

                        window.location.href='device_data.php'

            }

            });

              }

          });


        });

    </script>
    
<script>
    
    jQuery('#myform').validate({
    
        rules: {

            name: "required",

            type: "required",

            status : "required",
        },

    });
    
     jQuery('#myform1').validate({
    
        rules: {

            name: "required",

            type: "required",

            status : "required",

        },
        
    });

 $(document).on('click', '.edit', function(){  

           var device = $(this).attr("id");  

           console.log(device);

           $.ajax({  
            
                url:"form_fetch.php",  

                method:"POST",  

                data:{device:device},  

                dataType:"json",  

                success:function(data){  

                    $('#id1').val(data.id); 

                     $('#name1').val(data.name);  

                     $('#type1').val(data.type);

                      $('#status1').val(data.status);

                     $('#submit1').val("Update");  

                     $('#myModal1').modal('show');  

                }  

           });  

      });  
      
</script>

</body>