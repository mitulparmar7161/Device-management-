



<?php
include 'header.php';
include 'fetch.php';
?>







<body>
    



    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Employee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    



    <form name="myform" id="myform" action="upload.php"  method="POST"
        class="px-4 py-3 d-flex align-self-center justify-content-center ">
        <div class="form-group border p-4 " style="width: 500px;">

            

                            <label for="role"> Role:</label>

                             <select id="role" name="role" class="form-select" required>
                             <option value="employee">Employee</option> 
                             <option value="admin">Admin</option> 
           


                            </select>
                              <p id="role" class="error" style="color: red;"></P>  



            <label for="name">Name:</label>
           
            <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control">
            <p id="name" class="error" style="color: red;"></P>


            <label for="email" >Email:</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email">
            <p id="uemail" class="error" style="color: red;"></p>


           <label for="email" >Phone No.:</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone No."  maxlength="10">
            <p id="uphone" class="error" style="color: red;"></p>


             <label for="date" >Date of joining:</label>
            <input type="date" id="date" name="doj" class="form-control" >
            <p id="udate" class="error" style="color: red;"></p>




            <label for="password" >Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" maxlength="8">
            <p id="upass" class="error" style="color: red;"></p> 
            

            <div class="d-flex justify-content-center">
                <button type="submit" id="submit" name="usersubmit" class="btn btn-primary col-6 p-2 mt-4">Add Employee</button>
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
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    



    <form name="myform1" id="myform1" action="update.php"  method="POST"
        class="px-4 py-3 d-flex align-self-center justify-content-center ">
        <div class="form-group border p-4 " style="width: 500px;">
            <input type="hidden" id="id1" name="id">
            
            
                            <label for="role1"> Role:</label>

                             <select id="role1" name="role" class="form-select" required>
                             <option selected value="employee">Employee</option> 
                             <option value="admin">Admin</option> 
           


                            </select>
                              <p id="role1" class="error" style="color: red;"></P>  

        <label for="name1">Name:</label>
           
            <input type="text" id="name1" name="name" placeholder="Enter Name" class="form-control">
            <p id="name1" class="error" style="color: red;"></P>


            <label for="email" >Email:</label>
            <input type="text" id="email1" name="email" class="form-control" placeholder="Enter Email">
            <p id="uemail1" class="error" style="color: red;"></p>

            
           <label for="email" >Phone No.:</label>
            <input type="text" id="phone1" name="phone" class="form-control" placeholder="Enter Phone No."  maxlength="10">
            <p id="uphone" class="error" style="color: red;"></p>


             <label for="date" >Date of joining:</label>
            <input type="date" id="date1" name="doj" class="form-control" >
            <p id="udate" class="error" style="color: red;"></p>
            

            <div class="d-flex justify-content-center">
                <button type="submit" id="submit1" name="employeesubmit" class="btn btn-primary col-6 p-2 mt-4">Edit Employee</button>
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
            Add Employee
        </button>
    </div>
            <table class="table">
                <thead class="bg-primary">
                    <tr class="text-white">
                                <th scope="col">ID             </th>
                                <th scope="col">Name           </th>
                                <th scope="col">Email          </th>
                                <th scope="col">Phone           </th>
                                <th scope="col">DOJ           </th>
                                <th scope="col">Role           </th>
                                <th scope="col">               </th>
                                <th scope="col">               </th>
                                <th scope="col">               </th>
                                <th scope="col">               </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                     $employee=$fetchobj->fetchData("user");
                                    while($row=mysqli_fetch_assoc($employee)){?>
                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $row['id']?>       </td>
                                            <td class="p-3 pe-5"><?php echo $row['name']?>    </td>
                                            <td class="p-3 pe-5"><?php echo $row['email']?>    </td>
                                            <td class="p-3 pe-5"><?php echo $row['phone']?>    </td>
                                            <td class="p-3 pe-5"><?php echo $row['doj']?>    </td>
                                            <td class="p-3 pe-5"><?php echo $row['role']?>    </td>
                                            <td class="p-3 pe-5">    </td>
                                            <td class="p-3 pe-5">    </td>
                                            <td class="p-3 pe-5"><button class='edit btn btn-success' id="<?php echo $row['id']?>">Edit</button></td>
                                            <td class="p-3 pe-5"><button class='delete btn btn-danger' data-id='<?= $row['id']; ?>'>Delete</button></td>
    
                                        </tr>
                                        <?php } ?> 
                </tbody>
            </table>
<script type="text/javascript">
        $(document).ready(function(){

            $('.delete').click(function(){
                var el = this;

                var deleteEmp = $(this).data('id');

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                  $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { deleteEmp:deleteEmp},
                    success: function(response){
                      window.location.href='employee_data.php'
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
            doj:"required",
            phone: {
                number: true,
                required:true,
            },
            email: {
                email: true,
                required: true,
                remote: {
                    url: "validate.php",
                    type: "post",
                    async: false,
                    data: {

                        email: function () {
                            return $('#email').val();
                        }
                    }

                },
            },
             password: {
                password: true,
                required: true,
                minlength: 8,
		        maxlength: 8,
            },
        },
        messages: {
            email: {
                remote: "Email is already Teken..!"
            },

        }

    });


     jQuery('#myform1').validate({
    
        rules: {
            name: "required",
            doj:  "required",
            phone: {
                number: true,
                required:true,
            },
            email: {
                email: true,
                required: true,
            },
        },

    });

 $(document).on('click', '.edit', function(){  
           var employee = $(this).attr("id");  
           console.log(employee);
           $.ajax({  
                url:"form_fetch.php",  
                method:"POST",  
                data:{employee:employee},  
                dataType:"json",  
                success:function(data){  
                    $('#id1').val(data.id); 
                     $('#name1').val(data.name);  
                     $('#email1').val(data.email);
                     $('#phone1').val(data.phone);
                     $('#date1').val(data.doj);
                     $('#role1').val(data.role);
                     $('#submit1').val("Update");  
                     $('#myModal1').modal('show');  
                }  
           });  
      });  

    
</script>



</body>




