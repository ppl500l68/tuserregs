<?php
$fname=$_POST['lastname'];
$lname=$_POST['firstname'];
$accesslevel=$_POST['accesslevel'];
$address=$_POST['address'];
$password=$_POST['password'];
$button=$_POST['save'];

if($button=='Save!'){
   $url = parse_url(getenv("CLEARDB_DATABASE_URL")); 
   $server = $url["host"];
   $username= $url["user"];
   $password= $url["pass"];
   $db = substr($url["path"],1);
        $conn = new mysqli($server, $username, $password, $db) 
            or die('MySql Connection Failed...'.mysqli_error());
        if(!$conn){    
            die("Connection Failed:".mysqli_error());
        }
            $sql="INSERT INTO users(lname, fname, accesslevel, 
            address, password) VALUES('$lname', '$fname', 
            '$accesslevel', '$address', '$password')";
            mysqli_query($conn, $sql);
    
        }
?>

