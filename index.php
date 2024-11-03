<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home Guests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/layout.css">

    <link rel="stylesheet" href="./css/search.css">
   
    <link rel="stylesheet" href="./css/menu.css">

    <link rel="stylesheet" href="./css/products.css">


</head>
<body>
<div class="search">
        <?php include("./pages_guests/search.php")?>
    </div>

    <div class="menu">
        <?php include("./pages_guests/menu.php")?>
    </div>

    <div class="products">
        <?php include("./pages_guests/products.php")?>
    </div>
    
    <div class="footer">
        <?php include("./pages_guests/footer.php")?>
    </div>
</body>
</html>