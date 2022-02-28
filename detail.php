<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail page</title>
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<?php
    include_once 'include/inc.header.php';
    ?>

    <!-- End navigation section-->


    <!-- End navigation section-->

    <?php

    require_once("php/meal_db.php");       // Importing the class
    $meals = new Meal_db();                // Creating new instance of meals class
    $id = $_GET["id"];                  // Getting the query parameter
    $meal = $meals->getMealById($id);   // Getting the meal information by id

    ?>

    <div class="details" style="padding-left:2rem; padding-right:1.5rem">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <img alt=sandwich class="rounded-corners" src="projectImages/<?php echo $meal["image"] ?>">
                </div>
                <div class="col-md-12 col-lg-6">
                    <h1><?php echo $meal["title"] ?></h1>
                    <p><?php echo sprintf("%.2f", $meal["price"]) ?> SAR</p>

                    <?php
                    $sum = 0;
                    $counter = 0;
                    $reviews = $meals->getMealReviews();


                    foreach ($reviews as $review) {
                        if ($review["meal_id"] == $meal["id"]) {
                            $sum += $review["rating"];
                            $counter++;
                        }
                    }
                    $rating = 0;
                    if ($counter != 0) {
                        $rating = $sum / $counter;
                    }
                    ?>

                    <p>⭐<?php echo sprintf("%.2f", $rating) ?> rating</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias
                        dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum
                        totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum
                        inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo
                        expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora
                        asperiores minus, hic, deleniti enim!</p>
        </div>
        <h4>Nutrition facts</h4>
        <table >

            <tr >
                <td colspan="3"><b>Supplement Facts</b></td>
            </tr>
            <tr class="table-colors">
                <td colspan="3"><b>Serving Size: </b>1 Cookie (57 g)</td>
            </tr>
            <tr>
                <td colspan="3"><b>Serving Per Container: </b>12</td>
            </tr>
            <tr class="table-colors">
                <td></td>
                <td><b>Amount Per Serving</b></td>
                <td style="width: 30%"><b>%Daily Value*</b></td>
            </tr>
            <tr>
                <td>Calories</td>
                <td>200</td>
                <td></td>
            </tr>
            <tr class="table-colors">
                <td>Calories from Fat</td>
                <td>70</td>
                <td></td>
            </tr>
            <tr>
                <td>Total Fat</td>
                <td>7 g</td>
                <td>11%</td>
            </tr>
            <tr class="table-colors">
                <td>Saturated Fat</td>
                <td>4 g</td>
                <td>20%</td>
            </tr>
            <tr>
                <td>Trans Fat</td>
                <td>0 g</td>
                <td></td>
            </tr>
            <tr class="table-colors">
                <td>Cholesterol</td>
                <td>0 mg</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>Sodium</td>
                <td>220 mg</td>
                <td>9%</td>
            </tr>
            <tr class="table-colors">
                <td>Total Carbohydrate</td>
                <td>31 g</td>
                <td>10 %</td>
            </tr>
            <tr>
                <td>Dietary Fiber</td>
                <td>5 g</td>
                <td>20%</td>
            </tr>
            <tr class="table-colors">
                <td>Sugars</td>
                <td>12 g</td>
                <td></td>
            </tr>
            <tr>
                <td>Sugar Alcohol</td>
                <td>0 g</td>
                <td></td>
            </tr>
            <tr class="table-colors">
                <td>Protein</td>
                <td>8 g</td>
                <td>8%</td>
            </tr>
            <tr>
                <td>Vitamin A</td>
                <td></td>
                <td>0%</td>
            </tr>
            <tr class="table-colors">
                <td>Vitamin C</td>
                <td></td>
                <td>0%</td>
            </tr>
            <tr>
                <td>Calcium</td>
                <td></td>
                <td>2%</td>
            </tr>
            <tr class="table-colors">
                <td>Iron</td>
                <td></td>
                <td>10%</td>
            </tr>
            <tr>
                <td colspan="3">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs
                </td>
            </tr>
        </table>

        <!-- End details section-->

        <!-- Reviews section-->
        <div id="allReviews">
            <div id="presentReviews">

                <h3>Reviews</h3>
                <div class="grid-2">
                    <div class="item-3">
                        <img class="card" alt="man eating a burger" src="projectImages/man-eating-burger.png">
                    </div>
                    <div class="item-4">
                        <h4>reviewer name</h4>
                        <h5>Dhahran - Feb 08, 2020 ⭐⭐⭐⭐⭐</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At beatae culpa earum eveniet explicabo facilis illo ipsum itaque iure omnis, quas, quasi quibusdam voluptas. At deleniti nemo praesentium quod ratione!
                        </p>
                    </div>
                </div>
                <div id="newReviews">
                </div>
                <button class="btn-add-rev"onclick=showForm()>Add Your Review</button>
            <form onload="hideForm()" name="review">
                    <div class="margin-7">
                    <label for="imagePicker">Image</label>
                  </div>
                    <input id="imagePicker" type="file">
                   <div class="margin-7">
                    <br><label for="slider">Rate the Food</label>
                </div>
                    <input id="slider" list="rateSettings" max="5" min="0" step="1" type="range" value="3">
                    <datalist id="rateSettings">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </datalist>

                <div class="margin-7">
                    <br><label for="nameInput">Name</label> 
                </div>
                <input class="name-box" id="nameInput" placeholder="First and Last name" type="text">

                <div class="margin-7">

                    <label for="textAreaInput">Review</label>
                    <div class="flag hide" >
                    <label>Please Type Your review</label>
                   </div>  
                </div>

                    <textarea class="review-box" maxlength="500" onkeyup="changeLenght(this)" id="textAreaInput" placeholder="Type your review here max 500 characters" required></textarea>
                    <br>
                    <span id="current" name="current">0</span>
                    <span id="maximum">/ 500</span>
                    <div class="margin-7">
                    <button id="white" type="submit" onclick="showFlag(); checkName();">Submit</button>
                   
                </div>
                </form>
            </div>
        </div>
        <!-- End reviews section-->
    </section>
    <?php
    include_once 'include/inc.footer.php';
    ?>
    <!-- End contact section-->
    <script src="js/app.js"></script>

</body>

</html>
