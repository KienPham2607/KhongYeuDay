<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Subway Staff | Staff</title>

   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fuild">
         <a class="navbar-brand" href="#">Subway Truck | Staff Only | Upload Menu</a>
         <a href="sign_up_staff.php" class="btn btn-outline-success" role="button">Sign up for new staff</a>
         <a href="list_of_product.php" class="btn btn-outline-success" role="button">List of Product</a>
         <a href="./index.php" class="btn btn-outline-danger" role="button">Sign out</a>
      </div>
   </nav>
   <div class="container">
      <img src="./image/logo/subway_truck.png" alt="logo" class="mb-3">
      <form class="uploadForm" action="uploads.php" method="POST" enctype="multipart/form-data">
         <input class="uploadField mb-2" type="text" name="name" placeholder="Food name" required><br>

         <input class="uploadField mb-2" type="text" name="category" placeholder="Category" required><br>

         <input class="uploadField form-control" type="file" name="fileToUpload" required><br>

         <input class="uploadField mb-2" type="text" name="price" placeholder="Price" required><br>

         <input class="uploadField btn btn-outline-success" type="submit" name="upload" value="Upload">
      </form>
   </div>
</body>
</html>