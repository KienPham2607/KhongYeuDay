<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign in</title>
   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>
<body>
   <div class="text-center container" id="sign">
      <form action="sign_in_verify.php" method="POST">
         <img src="./image/logo/subway_truck.png" alt="logo" class="mb-3">
         <input type="email" name="email" class="form-control mb-2" placeholder="Email" required autofocus>
         <input type="password" name="password" class="form-control mb-2" placeholder="Password" required autofocus>
         <div class="d-grid mb-1">
            <input class="btn btn-outline-success" type="submit" name="sign_in" value="Sign in">
         </div>
         <p>User, don't have an account? <a class="register_link" href="sign_up.php">Sign up now</a></p>
      </form>
   </div>
</body>
</html>


