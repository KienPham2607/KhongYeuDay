<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Subway Staff | Edit Item</title>

   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fuild">
         <a class="navbar-brand" href="#">Subway Truck | Edit</a>
         <a href="./list_of_product.php" class="btn btn-outline-success" role="button">Back</a>
      </div>
   </nav>

   <div class="container">
      <img src="./image/logo/subway_truck.png" alt="logo" class="mb-3">
      <?php
      include './config.php';
      // $select_query = "SELECT * FROM food where id = ''";
      ?>

      <form class="uploadForm" action="edit_execute.php?id=<?php echo $_GET['original_id']; ?>" method="POST">
         <input class="uploadField mb-2" type="text" name="edit_name" placeholder="Food name" value="<?php echo $_GET['original_name']; ?>" required><br>

         <input class="uploadField mb-2" type="text" name="edit_category" placeholder="Category" value="<?php echo $_GET['original_category']; ?>" required><br>

         <input class="uploadField form-control" type="file" name="edit_fileToUpload"><br>

         <input class="uploadField mb-2" type="text" name="edit_price" placeholder="Price" value="<?php echo $_GET['original_price']; ?>" required><br>

         <input class="uploadField btn btn-outline-success" type="submit" name="edit_item" value="Edit">
      </form>
   </div>
</body>

</html>