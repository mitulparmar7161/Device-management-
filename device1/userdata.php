
<?php

include 'header.php';

?>

    <?php

      $connect = mysqli_connect("localhost", "root", "", "test");
      $data="";
      $limit = 10;     
      if (isset($_GET["page"])) { 
        $pn  = (int) $_GET["page"]; 
      } 
      else { 
        $pn=1; 
      };  
    
      $start_from = ($pn-1) * $limit;  

    ?>

<?php


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "test");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}





if(isset($_GET['search']))
{
    // session 
    $_SESSION['search_string']=$_GET['searchdata'];

    $valueToSearch = $_SESSION['search_string']; 
    
    $query = "SELECT * FROM `login` WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$valueToSearch."%' LIMIT $start_from, $limit";
    $search_result = filterTable($query);


}




else if(isset($_SESSION['search_string'])){
    $valueToSearch = $_SESSION['search_string'];
    $query = "SELECT * FROM `login` WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$valueToSearch."%' LIMIT $start_from, $limit";
    $search_result = filterTable($query);
}
else {
    $query = "SELECT * FROM `login` LIMIT $start_from, $limit";
    $search_result = filterTable($query);
}


if (isset($_SESSION['search_string'])){

$searchsort=$_SESSION['search_string'];


    if (isset($_GET['sort'])) {

        $data = $_GET['sort'];
    
        if($data =='idup'){
           
            $connect = mysqli_connect("localhost", "root", "", "test");
            $sortquery = "SELECT * FROM login WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$searchsort."%' order by id ASC LIMIT $start_from, $limit";
            $search_result = mysqli_query($connect,$sortquery);
        }
        if ($data =='iddown') {
            $_SESSION['iddown_session'] = $data;
            $connect = mysqli_connect("localhost", "root", "", "test");
            $sortquery = "SELECT * FROM login  WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$searchsort."%'  order by id DESC LIMIT $start_from, $limit";
            $search_result = mysqli_query($connect,$sortquery);
           } 


           
     if($data =='nameup'){
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$searchsort."%' order by name ASC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
    }
    if ($data =='namedown') {
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$searchsort."%' order by name DESC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
       }



       
       if($data =='emailup'){
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$searchsort."%' order by email ASC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
    }
    if ($data =='emaildown') {
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login  WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$searchsort."%' order by email DESC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
       } 

           
        }
}


else if (isset($_GET['sort'])) {
    $data = $_GET['sort'];



    if($data =='idup'){
        $_SESSION['idup_sessoin'] = $data;
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login  order by id ASC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
    }
    if ($data =='iddown') {
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login  order by id DESC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
       } 



    if($data =='nameup'){
        $connect = mysqli_connect("localhost", "root", "", "test" );
        $sortquery = "SELECT * FROM login order by name ASC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
    }
    if ($data =='namedown') {
        $connect = mysqli_connect("localhost", "root", "","test");
        $sortquery = "SELECT * FROM login  order by name DESC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
       } 



       if($data =='emailup'){
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login  order by email ASC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
    }
    if ($data =='emaildown') {
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sortquery = "SELECT * FROM login  order by email DESC LIMIT $start_from, $limit";
        $search_result = mysqli_query($connect,$sortquery);
       } 

   } 


?>


<!-- DELETE DATA -->

<?php

if(isset($_GET['delete'])){
    $deleteid=$_GET['delete'];
    $connect = mysqli_connect("localhost", "root", "", "test");
    $query = "DELETE FROM login WHERE id=$deleteid";
    $delete = mysqli_query($connect,$query);
  
}   


?>

<body>
        <div class="container">
            
            <div class=" p-2 d-flex justify-content-end">
  <div class="mt-2 me-2">
    <?php
        if(isset($_GET['delete'])){
            echo "<span style='color:green'>Record Delete Successful</span>";
        header("Refresh:1; URL= userdata.php"); 
        }
        
        ?>  
    </div>
    <div class="me-3">
                    <form action="add_user.php" method="POST">
                    <input class="btn btn-primary" type="submit" value="Add User"></input>
                </form>
                </div>
                <form class="d-flex " action="userdata.php" method="GET">

    

                
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
            <div class="table-responsive">
            <table class="table">
                <thead class="bg-primary">
                    <tr class="text-white">
                                <th scope="col" >ID  
                    
                                 <?php echo "<a style='text-decoration:none; color:white;'  href='userdata.php?sort=idup&page=".$pn."' class='sort'>▲</a>&nbsp <a href='userdata.php?sort=iddown&page=".$pn."' class='sort' style='text-decoration:none; color:white;' >▼</a>"; ?>

                                 </th>
                                 <th scope="col">Name      <?php  echo "<a style='text-decoration:none; color:white;'  href='userdata.php?sort=nameup&page=".$pn."' class='sort'>▲</a>&nbsp <a href='userdata.php?sort=namedown&page=".$pn."' class='sort' style='text-decoration:none; color:white;' >▼</a>"; ?></th>
                                
                                 <th scope="col">Email    <?php echo "<a style='text-decoration:none; color:white;'  href='userdata.php?sort=emailup&page=".$pn."' class='sort'>▲</a>&nbsp <a href='userdata.php?sort=emaildown&page=".$pn."' class='sort' style='text-decoration:none; color:white;' >▼</a>"; ?></th>

                                <th scope="col"></th>

                                <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                   
                                    while($row=mysqli_fetch_assoc($search_result)){?>
                                        <tr>
                                          
                                            <td class="p-3 pe-5"><?php echo $row['id']?></td>
                                            <td class="p-3 pe-5"><?php echo $row['name']?></td>
                                    <td class="p-3 pe-5"><?php echo $row['email']?></td>

                                            <td class="p-3"><a  class='bg-success text-white p-2'  style='text-decoration:none; border-radius: 3px;' href="edit.php?edit=<?php echo $row['id']; ?>" ><span>EDIT</span></a></td>
                                            <td class="p-3"><a  class='bg-danger text-white p-2 '  style='text-decoration:none; border-radius: 3px;'  href="javascript: delete_user(<?php echo $row['id']; ?>)" ><span>DELETE</span></a></td>
                                            <script type="text/javascript">
                                                        function delete_user(uid)
                                                        {
                                                             if (confirm('Are You Sure to Delete this Record?'))
                                                         {
                                                             window.location.href = 'userdata.php?delete=' + uid;
                                                                         }
                                                        }
                                             </script>
    
                                        </tr>
                                        <?php } ?> 
                </tbody>
            </table>
                </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                   
                <?php  
      $connect = mysqli_connect("localhost", "root", "", "test");
        
        if(isset($_SESSION['search_string']))
        {
            $valueToSearch = $_SESSION['search_string'];
            $sql = "SELECT COUNT(*) FROM login  WHERE CONCAT(`id`, `name`, `email`) LIKE '%".$valueToSearch."%'";
        }
        else{
        $sql = "SELECT COUNT(*) FROM login";  
        }
        $rs_result = mysqli_query($connect,$sql);  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $row[0];  
          
        
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "";     
        
        for ($i=1; $i<=$total_pages; $i++) {
          if ($i==$pn) {
              $pagLink .= "<li class='page-item bg-dark'><a class='page-link bg-primary' style='color:white;' href='userdata.php?page="
                                                .$i."&sort=".$data."'>".$i."</a></li>";
                                                $_SESSION['pagevalue']=$i;
          }            
          else  {
              $pagLink .= "<li class='page-item'><a class='page-link' href='userdata.php?page=".$i."&sort=".$data."'>
                                                ".$i."</a></li>";  
                                                
          }
        }  
       
        if(isset($_SESSION['pagevalue'])){
        $x=$_SESSION['pagevalue'];
        
       if($x > 1){
        echo "<li class='page-item'><a class='page-link' href='userdata.php?page=".($x-1)."&sort=".$data."'><<</a></li>";
       }
        echo $pagLink;  
        if($x < $total_pages){

            echo "<li class='page-item'><a class='page-link' href='userdata.php?page=".($x+1)."&sort=".$data."'>>></a></li>";
            
        }

    }

      ?>
                    
                </ul>
                
            </nav>

        </div>

</body>