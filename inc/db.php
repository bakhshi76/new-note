<?php
$connection=mysqli_connect('localhost','root','','bakhshi');
if(!$connection){
    echo 'Unable to connect to the database. Please check your configuration';
}
exit;