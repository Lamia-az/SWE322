<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_phonebook";


$conn = mysqli_connect("localhost", "root", "", "db_phonebook"); 

if(!$conn){
   echo "error no: ".mysqli_connect_errno();
    echo "Error ".mysqli_connect_error();  
    exit;
}

$query = "INSERT into phone_lists (name, phone, mobile) VALUES ('Lamia','iphone','050000001')";

//Why inserting a previously inserted value in name will generate an error? because we use a unique value 
//Why for phone we have used varchar and for mobile we have used char? because varchar is a variable length field if we want to store a string with a variable length such as phone we use varchar , but if the length is mainly the same like the mobile number we use char because it is slightly more size efficient and also slightly faster
    
if(mysqli_query($conn, $query)){
    echo "new record has been created";
}
else {
    echo mysqli_error($conn);
}

mysqli_close($conn);
?>