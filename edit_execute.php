<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["edit_fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check whether a file uploaded is an image
if (isset($_POST['edit_fileToUpload'])) {
   if (isset($_POST['edit_item'])) {
      $check = getimagesize($_FILES['edit_fileToUpload']['tmp_name']);
      if ($check === false) {
         // $message = "*Opps: the file is not an image*";
         // header("Location: edit_home.php?mes=$message");
         echo "<script>alert('*Opps: the file is not an image*')</script>";
         echo "<script>window.location='./edit.php'</script>";
         $uploadOk = 0;
      } else {
         $uploadOk = 1;
      }
   }

   // Check wherther th e file uploaded is exsisted
   if (file_exists($target_file)) {
   // $message = "*Opps: file already exsists*";
   // header("Location: edit_home.php?mes=$message");
   echo "<script>alert('*Opps: file already exsists*')</script>";
   echo "<script>window.location='./edit.php'</script>";
   $uploadOk = 0;
   }

   // Limit file size < 3mb
   if ($_FILES['edit_fileToUpload']['size'] > 3072000) {
   // $message = "*Opps: the file is too large, only allowed saller than 3mb*";
   // header("Location: edit_home.php?mes=$message");
   echo "<script>alert('*Opps: the file is too large, only allowed saller than 3mb*')</script>";
   echo "<script>window.location='./edit.php'</script>";
   $uploadOk = 0;
   }

   // Set rules for file format
   if ($imageFileType != "jpg" 
   && $imageFileType != "png" 
   && $imageFileType != "jpeg") {
   // $message = "*Opps: only JPG, JPEG, PNG files are allowed*";
   // header("Location: edit_home.php?mes=$message");
   echo "<script>alert('*Opps: only JPG, JPEG, PNG files are allowed*')</script>";
   echo "<script>window.location='./edit.php'</script>";
   $uploadOk = 0;
   }

   if ($uploadOk == 0) {
      // $message = "*Opps: the file cannot be uploaded*";
      // header("Location: edit_home.php?mes=$message");
      echo "<script>alert('*Opps: the file cannot be uploaded*')</script>";
      echo "<script>window.location='./edit.php'</script>";
   } else {
      $id = $_GET['id'];
      $fName = $_POST["edit_name"];
      $category = $_POST['edit_category'];
      $price = $_POST['edit_price'];
      $tem_imgName = $_FILES["edit_fileToUpload"]['name'];
      // Connect to database
      include 'config.php';
      $query = "UPDATE food SET name = '$fName', category = '$category', image = '$tem_imgName', price = '$price' WHERE id = '$id'";
      $sql = mysqli_query($conn, $query);
      // Close the connection
      mysqli_close($conn);
      if (!$sql) {
         // $message = "*Opps: something went wrong while editing the file*";
         // header("Location: edit_home.php?mes=$message");
         echo "<script>alert('*Opps: something went wrong while editing the file*')</script>";
         echo "<script>window.location='./edit.php'</script>";
      } else {
         move_uploaded_file($_FILES['edit_fileToUpload']['tmp_name'], $target_file);
         echo "<script>alert('Yey: edited successfully!')</script>";
         echo "<script>window.location='./edit.php'</script>";
      }
   }
} else {
   $id = $_GET['id'];
   $fName = $_POST["edit_name"];
   $category = $_POST['edit_category'];
   $price = $_POST['edit_price'];
   // Connect to database
   include 'config.php';
   $query = "UPDATE food SET name = '$fName', category = '$category', price = '$price' WHERE id = '$id'";
   $sql = mysqli_query($conn, $query);
   // Close the connection
   mysqli_close($conn);
   if (!$sql) {
      echo "<script>alert('*Opps: something went wrong while editing the file*')</script>";
      echo "<script>window.location='./edit.php'</script>";
   } else {
      echo "<script>alert('Yey: edited successfully!')</script>";
      echo "<script>window.location='./edit.php'</script>";
   }
}



   
