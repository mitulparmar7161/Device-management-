<?php

class fetch{

public function fetchData($table){
    $connect = mysqli_connect("localhost", "root","", "devicesys");

    $query = "select * from device where status='available'";
    $filter_result = mysqli_query($connect, $query);
    return $filter_result;
}

}
$fetchobj = new fetch;


?>