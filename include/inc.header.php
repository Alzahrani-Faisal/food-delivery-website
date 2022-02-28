<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&family=Roboto&display=swap"
          rel="stylesheet">
    <link   href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
  <!-- Navigation and Welcome section-->

    <!-- Top navigation    -->
    <div class="top-nav-container">
        <nav class="navbar navbar-expand-xl navbar-dark top-nav" style="padding-left: 10rem">
            <img alt="burger" class="navbar-brand white-logo" src="projectImages/logo-White.svg" width="100">

            <button class="navbar-toggler" data-target="#collapsibleNavbar" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse " id="collapsibleNavbar">
                
                <ul class="navbar-nav  left-space">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactUs">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active-a active" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active-a active" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active-a active" data-target="#cartContent" data-toggle="modal" href="#">Cart
                           
                            <span
                                class="cart-quantity" id="cartQuantity"><?php
                            require_once("php/meal_db.php");
                            $meals = new Meal_db();
                            $mealsArray = $meals->getAllMeals();
                            if (isset($_COOKIE["cart"])) {
                                $cookieStr = $_COOKIE["cart"];
                                echo ((strlen($cookieStr) - 1) / 2) + 1;
                            } else {
                                echo "0";
                            }
                            ?></span></a>

                            </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="cartContent" role="dialog"
         tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartContentLabel">Cart Content</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <div class="container" id="cartContentTable">
                        <div class="row">
                            <div class="col-sm">
                             Item: <p class="totalItems"> </p>
                            </div>
                            <div class="col-sm">
                                Price:<p class="eachPrice"> </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                Total
                            </div>
                            <div class="col-sm">
                               <p class="totalPrice">0</p> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="close-btn btn-gal" data-dismiss="modal" type="button">Close</button>
                    <button class="button btn-gal" type="button" data-dismiss="modal" onclick="completeOrder()">Order Now</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
