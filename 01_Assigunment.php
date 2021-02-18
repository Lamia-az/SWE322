
<html>
<body>
<title>PHP 0</title>
<h1>My first PHP assignment</h1>
<h3>Name: Lamia Alshuwaier ID:201912117</h3>
    <br>
    
<?php
    echo "Today is " . date("Y/m/d") . "<br>";
    
  echo $n = 1;
    echo "<br>";
echo $s = "1";
    echo "<br>";
echo $n1 = $n + $s; 
    echo "<br>";
echo  $n2 = $n1 + "10 little penguins";
    echo "<br>";
echo $n3 = "hello";
    echo "<br>";
echo $n4 = "world";
    echo "<br>";
echo $n5 = $n3+$n4;
    echo "<br>";
echo $n6 = $n3.$n4;
    echo "<br>";
    
$Majors = array("Software engineering ", "N&S ","LAW");
    echo "I love ".$Majors[0]." the most";
    echo "<br>";
    
    echo count($Majors);
    echo "<br>";
    
    foreach($Majors as $Array){
        echo $Array;}
    echo "<br>";
    
      for ($i=0; $i<4; $i++){
            if ($Majors == "Software engineering"){
                echo "THis is my Major";
                echo "<br>";
        }
          else{
              echo "Not my Major";
              echo "<br>";
          }
      }
    
?>

</body>
</html>