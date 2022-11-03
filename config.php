<?php
$conn = mysqli_connect("localhost", "root", "mysql", "sfood");
if (!$conn) {
   echo "Connection failed!";
   exit();
}

function clean_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>