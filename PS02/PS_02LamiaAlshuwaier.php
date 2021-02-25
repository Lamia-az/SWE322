<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <title> Data Display</title>
    </head>
    <body>
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
        
$query= "SELECT * from phone_lists";

$result = mysqli_query($conn, $query);
        if ($result) {
echo "<table>";
echo "<tr>";
echo "<th> id </th>"; 
echo "<th> name </th>"; 
echo "<th> phone </th>";
echo "<th> mobile </th>"; 
echo "</tr>";

        While($result_row = mysqli_fetch_row($result)){   
echo "<tr>";
echo "<td>$result_row[0] </td>";
echo "<td>$result_row[1] </td>";
echo "<td> $result_row[2] </td>";
echo "<td>$result_row[3] </td>";
echo "</tr>";
}
               
echo "</table>";
        }else {
echo "Error: ".$query."<br>".mysqli_error($conn);
}
            
mysqli_close($conn);
?>
</body>
</html>
