<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check whether a file uploaded is an image
if (isset($_POST['upload'])) {
   $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
   if ($check === false) {
      echo "<script>alert('*Opps: the file is not an image*')</script>";
      echo "<script>window.location='up_home.php'</script>";
      $uploadOk = 0;
   } else {
      $uploadOk = 1;
   }
}

// Check wherther th e file uploaded is exsisted
if (file_exists($target_file)) {
   echo "<script>alert('*Opps: file already exsists*')</script>";
   echo "<script>window.location='up_home.php'</script>";
   $uploadOk = 0;
}

// Limit file size < 3mb
if ($_FILES['fileToUpload']['size'] > 3072000) {
   echo "<script>alert('*Opps: the file is too large, only allowed saller than 3mb*')</script>";
   echo "<script>window.location='up_home.php'</script>";
   $uploadOk = 0;
}

// Set rules for file format
if (
   $imageFileType != "jpg"
   && $imageFileType != "png"
   && $imageFileType != "jpeg"
) {
   echo "<script>alert('*Opps: only JPG, JPEG, PNG files are allowed*')</script>";
   echo "<script>window.location='up_home.php'</script>";
   $uploadOk = 0;
}

if ($uploadOk == 0) {
   echo "<script>alert('*Opps: the file cannot be uploaded*')</script>";
   echo "<script>window.location='up_home.php'</script>";
} else {
   $fName = $_POST["name"];
   $category = $_POST['category'];
   $price = $_POST['price'];
   $tem_imgName = $_FILES["fileToUpload"]['name'];
   // Connect to database
   include 'config.php';
   $query = "INSERT into food (name, category, image, price) values ('$fName', '$category', '$tem_imgName', '$price')";
   $sql = mysqli_query($conn, $query);
   // Close the connection
   mysqli_close($conn);
   if (!$sql) {
      echo "<script>alert('*Opps: something went wrong while uploading the file to database*')</script>";
      echo "<script>window.location='up_home.php'</script>";
   } else {
      move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
      echo "<script>alert('Yey: Uploaded Successfully!')</script>";
      echo "<script>window.location='up_home.php'</script>";
   }
}
