<?php

class fetch{

public function fetchData($table){
    $connect = mysqli_connect("localhost", "root","", "devicesys");


    if($table=="user"){
         $query = "select * from $table where role='employee'";
    }
    else{
    $query = "select * from $table";
    }
    $filter_result = mysqli_query($connect, $query);
    return $filter_result;
}

}
$fetchobj = new fetch;


?>