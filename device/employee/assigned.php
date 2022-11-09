

<?php
include 'header.php';

include 'fetch.php';

?>

<body>
  
        <div class="container-fluid d-flex justify-content-center">
          
            <div class="table-responsive mt-3">

                <div class="container-fluid d-flex flex-column align-items-end mb-3">
                  
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
                          
                <input type="text"  id="search" placeholder="Search Here" >
                
    </div>

            <table class="table">

                <thead class="bg-primary">

                    <tr class="text-white">

                                <th scope="col">ID             </th>

                                <th scope="col">Device Type    </th>

                                <th scope="col">Device Name    </th>

                                <th scope="col">Status         </th>

                                <th scope="col">               </th>

                                <th scope="col">               </th>

                                <th scope="col">               </th>

                    </tr>

                </thead>

                <tbody  id="mytable">

                    <?php

                                    $assigned=$assignedobj->assignedData();

                                    $i=1;

                                    while($row=mysqli_fetch_assoc($assigned)){?>

                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $i; ?>   </td>

                                            <td class="p-3 pe-5"><?php echo $row['type']?>    </td>

                                            <td class="p-3 pe-5"><?php echo $row['name']?>    </td>

                                            <td class="p-3 pe-5">   <?php echo $row['status']?>  </td>

                                            <td class="p-3 pe-5">    </td>

                                            <td class="p-3 pe-5"></td>
                                            
                                        </tr>

                                        <?php $i++; } ?> 

                </tbody>

            </table>
            
</body>
