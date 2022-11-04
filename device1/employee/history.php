<?php

include 'header.php';
include 'fetch.php';

?>




<body>
    
        <div class="container-fluid d-flex justify-content-center">
            
        
            <div class="table-responsive mt-3">
                <div class="container-fluid d-flex justify-content-end mb-3">



                <script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
                          
                <input type="text"  id="search" placeholder="Search Here" class=" me-4">
                
    </div>
            <table class="table">
                <thead class="bg-primary">
                    <tr class="text-white">
                                <th scope="col">ID          </th>
                                <th scope="col">Device   </th>
                                <th scope="col">Request Time</th>
                                <th scope="col">Assigned Time</th>
                                <th scope="col">Return Time </th>
                                <th scope="col">Reject Time</th>
                                <th scope="col">Status</th>


                    </tr>
                </thead>
                <tbody  id="mytable">
                    <?php
                                    $device=$fetchobj->fetchData("history");
                                    $connect=mysqli_connect("localhost","root","","devicesys");
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($device)){?>
                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $i; ?> </td>
                                            <td class="p-3 pe-5"><?php 
                                            
                                             $device_id=$row['device_id'];
                                            $query="select name from device where id='$device_id'";
                                            
                                             $result = mysqli_query($connect,$query);
                                             $device_name=mysqli_fetch_assoc($result);
                                             echo $device_name['name'];
                                            
                                            ?>    </td>
                                            <td class="p-3 pe-5"><?php echo $row['request_time']?>  </td>
                                            <td class="p-3 pe-5"> <?php echo $row['assigned_time']?></td>
                                            <td class="p-3 pe-5"><?php echo $row['return_time']?>   </td>
                                            <td class="p-3 pe-5"><?php echo $row['reject_time']?>   </td>
                                            <td class="p-3 pe-5"><?php echo $row['status']?>        </td>
                                        
    
                                        </tr>
                                        <?php $i++; } ?> 
                </tbody>
            </table>

</body>




