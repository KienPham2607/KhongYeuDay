<?php
//Create a session
include './config.php';
session_start();
// session_destroy();
// die();
// Check whether a session is created, if not , create one
if (isset($_POST['add_to_cart'])) {
   if (isset($_SESSION['cart'])) {
      $product_id = array_column($_SESSION['cart'], 'product_id');

      if (!in_array($_GET['id'], $product_id)) {
         $count = count($_SESSION['cart']);
         $product_detail = array(
            'product_id' => $_GET['id'],
            'product_name' => $_POST['food_name'],
            'product_image' => $_POST['img_source'],
            'product_price' => $_POST['price_per_each'],
            'product_quantity' => $_POST['quantity']
         );
         $_SESSION['cart'][$count] = $product_detail;
         echo "<script>alert('Item Added')</script>";
         echo "<script>window.location='user_home.php'</script>";
      } else {
         echo "<script>alert('Item Already Added')</script>";
         echo "<script>window.location='user_home.php'</script>";
      }
   } else {
      $product_detail = array(
         'product_id' => $_GET['id'],
         'product_name' => $_POST['food_name'],
         'product_image' => $_POST['img_source'],
         'product_price' => $_POST['price_per_each'],
         'product_quantity' => $_POST['quantity']
      );
      $_SESSION['cart'][0] = $product_detail;
   }
}

if (isset($_GET['delete'])) {
   if ($_GET['delete'] == "action") {
      foreach ($_SESSION['cart'] as $key => $value) {
         if ($value['product_id'] == $_GET['id_removed']) {
            unset($_SESSION['cart'][$key]);
            echo "<script>alert('Item Removed')</script>";
            echo "<script>window.location='cart.php'</script>";
         }
      }
   }
}

if (isset($_GET['purchase'])) {
   if ($_GET['purchase'] == "action") {
      foreach ($_SESSION['cart'] as $key => $value) {
         unset($_SESSION['cart'][$key]);
      }
      echo "<script>alert('Thanks you for the service usage!')</script>";
      echo "<script>window.location='cart.php'</script>";
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="./style.css">
   <!-- jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
         <a class="navbar-brand" href="#"><img src="./image/logo/subway_truck.png" width="60px" alt="logo"></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./user_home.php">Home</a>
               </li>
            </ul>
            <form class="d-flex">
               <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
         </div>
      </div>
   </nav>
   <table class="table table-bordered table-hover">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         if (!empty($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $values) {
         ?>
               <tr>
                  <th scope="row"><?php echo $values["product_id"]; ?></th>
                  <td><?php echo $values["product_name"]; ?></td>
                  <td><img width="100px" src="./uploads/<?php echo $values['product_image']; ?>" alt=""></td>
                  <td><?php echo $values["product_price"]; ?> $</td>
                  <td><?php echo $values["product_quantity"]; ?></td>
                  <td><?php echo number_format($values["product_price"] * $values["product_quantity"], 2); ?> $</td>
                  <td><a class="btn btn-outline-warning" role="button" href="cart.php?delete=action&id_removed=<?php echo $values["product_id"]; ?>">Remove</a></td>
               </tr>
            <?php
               $total = $total + ($values["product_price"] * $values["product_quantity"]);
            }
            ?>
            <tr>
               <td colspan="5" align="right">Total</td>
               <td colspan="1" align="left"><?php echo number_format($total, 2); ?> $</td>
               <td><a class="btn btn-outline-success" role="button" href="cart.php?purchase=action">Purchase</a></td>
            </tr>
         <?php
         }
         ?>
      </tbody>
   </table>
</body>
</html>