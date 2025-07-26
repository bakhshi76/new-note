<?php
function base_url(){
    global $config;
    return $config['base_url'];
}
function db_connection(){
    global $config;
    $conn=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['password'],$config['db']['name']);
    if($conn){
        return $conn;
    }
    return false;
}
function insert($table_name,$input_array=array()){
   $connection = db_connection();
   $keys_string='';
   $values_string='';
   $array_length=count($input_array);
   $i=1;
    foreach($input_array as $key=>$value){
        $keys_string.=$key;
        $values_string.= "'$value'";
        if($i<$array_length){
            $keys_string.=',';
            $values_string.=',';
        }$i++;
    }
   $sql="INSERT INTO `$table_name`($keys_string) VALUES ($values_string)";
   $result=mysqli_query($connection,$sql);
   return $result;
  
}