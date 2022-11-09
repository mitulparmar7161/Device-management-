

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
                          
                <input type="text"  id="search" placeholder="Search Here">

                <span class="waitmsg text-danger">Please wait while we are processing your request...</span>

                
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
                                    $requested=$requestobj->requestData();
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($requested)){?>
                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $i; ?>  </td>
                                            <td class="p-3 pe-5"><?php echo $row['type']?>    </td>
                                            <td class="p-3 pe-5"><?php echo $row['device_name']?>    </td>
                                            <td class="p-3 pe-5">   <?php echo $row['status']?>  </td>
                                            <td class="p-3 pe-5">    </td>
                                            <td class="p-3 pe-5"><button class='notify btn btn-primary'>Notify</button></td>
                                           
    
                                        </tr>
                                        <?php $i++; } ?> 
                </tbody>
            </table>



<script type="text/javascript">
        $(document).ready(function(){
          $('.waitmsg').hide(); 

            $('.notify').click(function(){
              $('.waitmsg').show();
                var el = this;

                 $('.notify').attr('disabled','disabled');

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                  $.ajax({
                    url: 'notify.php',
                    type: 'POST',
                    data: { notify:"notify" },
                    success: function(response){
                       $('.notify').removeAttr('disabled');
                       $('.waitmsg').hide();
                         window.location.href='requested_device.php'
            }
            });
              }
          });
        });
    </script>


</body>




