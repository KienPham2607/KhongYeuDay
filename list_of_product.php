<?php
include './config.php';
if (isset($_GET['remove'])) {
   if ($_GET['remove'] == 'action') {
      $item_id = $_GET['item_id'];
      $delete_query = "DELETE FROM food WHERE id= '$item_id'";
      $result = mysqli_query($conn, $delete_query);
      if ($result) {
         echo "<script>alert('Product id: " . $item_id . " removed')</script>";
         echo "<script>window.location='./list_of_product.php'</script>";
      } else {
         echo "<script>alert('*Opps: something went wrong while deleting product id: *')" . $item_id . "</script>";
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fuild">
         <a class="navbar-brand" href="#">Subway Truck | Staff Only | List of Product</a>
         <a href="up_home.php" class="btn btn-outline-success" role="button">Back</a>
      </div>
   </nav>
   <h1>List of Product</h1>
   <table class="table">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $select_query = "SELECT * FROM food";
         $result = mysqli_query($conn, $select_query);
         while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
               <th scope="row"><?= $row['id']; ?></th>
               <td><img width="100px" src="./uploads/<?= $row['image']; ?>" alt=""></td>
               <td><?= $row['name']; ?></td>
               <td><?= $row['category']; ?></td>
               <td><?= $row['price']; ?></td>
               <td>
                  <a href="./list_of_product.php?remove=action&item_id=<?= $row['id']; ?>" role="button" class="btn btn-outline-danger">Remove</a>
                  <form action="./edit.php?original_id=<?= $row['id']; ?>&original_name=<?= $row['name']; ?>&original_category=<?= $row['category']; ?>&original_price=<?= $row['price']; ?>" method="post">
                     <input type="submit" class="btn btn-outline-warning" value="Edit">
                  </form>
               </td>
            </tr>
         <?php
         }
         ?>
      </tbody>
   </table>
</body>
</html>