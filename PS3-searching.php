<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Searching </title>
        <meta chartset="UTF-8" />
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

if (isset($_GET['submit'])) {
    
    $search_word = $_GET['search_word'];
    $search = $_GET['search'];
    $query;

    
        switch ($search){
            case "phone":
                $query = "SELECT * from book where s_phone_lists = '$search_word'";
                break;

            case "mobile":
                $query = "SELECT * from book where s_phone_lists = '$search_word%'";
                break;
            
            case "name":
                $query = "SELECT * from book where s_phone_lists = '$search_word'";
                break;
        }
    

      $result = mysqli_query($conn, $query);

        if($result){
          
            if(mysqli_num_rows($result) > 0){
                echo "<table border='1px' width='60%'>
                        <tr>
                            <th>phone</th>
                            <th>mobile</th>
                            <th>name</th>
                         </tr>";
                
                while($result_row = mysqli_fetch_row($result)){
                    echo "<tr>";
                    echo "<td>$result_row[0] </td>";
                    echo "<td>$result_row[1] </td>";
                    echo "<td> $result_row[2] </td>";
                    echo "<td>$result_row[3] </td>";
                    echo "</tr>";
                    }

                echo "</table>";
                    } 
            else {
                echo "No date found";
                }
            
            } 
        else {
            echo mysqli_error($con);
            }

        mysqli_close($con);
        }
       ?>
    </body>
</html>
