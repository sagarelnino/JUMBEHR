<?php
session_start();
$page = 'index';
require 'connection.php';
if(isset($_POST['submit'])){
    $email = filter($_POST['subscriberEmail']);
    if($email){
        $created = date('Y-m-d H:i:s');
        if($user->isExistSubscriber($email)){
            $_SESSION['message'] = 'You are already a subscriber of us.';
        }else{
            $user->addSubscriber($email,$created);
            $_SESSION['message'] = 'You have been successfully registered as subscriber of our site. Thank you.';
        }
    }
}
function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<body>
<?php
if(!empty($_SESSION['message'])){?>
    <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
<?php }
unset($_SESSION['message']);
?>
    <?php include 'navbar.php' ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="Slide/Slide%2001.jpg" alt="Slide 1">
            </div>

            <div class="item">
                <img src="Slide/Slide%2002.jpg" alt="Slide 2">
            </div>

            <div class="item">
                <img src="Slide/Slide%2003.jpg" alt="Slide 3">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="box">
                    <div class="box-icon">
                        <span class="fa fa-4x fa-university"></span>
                    </div>
                    <div class="info">
                        <h4 class="text-center">Welcome to JUMBEHR</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="box">
                    <div class="box-icon">
                        <span class="fas fa-comment fa-4x"></span>
                    </div>
                    <div class="info">
                        <h4 class="text-center">Message from The Founder</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="box">
                    <div class="info">
                        <h4 class="text-center">JUMBEHR News</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="box">
                    <div class="info">
                        <h4 class="text-center">Notice Board</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="box">
                    <div class="info">
                        <h4 class="text-center">Upcoming Events</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row profile">
            <h4 class="text-center">Students</h4>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="pro-image" style="position:static; width:100%; height:100%">
                    <img class="img img-circle" style="height:150px;width: 150px; max-width: 100%"  src="images/1.jpg">
                </div>
                <div class="details text-center">
                    <span class="name">Shuvashish Paul Sagar</span><br>
                    <span class="designation"><small>Software Engineer, Wempro</small></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="pro-image" style="position:static; width:100%; height:100%">
                    <img class="img img-circle" style="height:150px;width: 150px; max-width: 100%"  src="images/2.jpg">
                </div>
                <div class="details text-center">
                    <span class="name">Shuvashish Paul Sagar</span><br>
                    <span class="designation"><small>Software Engineer, Wempro</small></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="pro-image" style="position:static; width:100%; height:100%">
                    <img class="img img-circle" style="height:150px;width: 150px; max-width: 100%"  src="images/3.jpg">
                </div>
                <div class="details text-center">
                    <span class="name">Shuvashish Paul Sagar</span><br>
                    <span class="designation"><small>Software Engineer, Wempro</small></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="pro-image" style="position:static; width:100%; height:100%">
                    <img class="img img-circle" style="height:150px;width: 150px; max-width: 100%"  src="images/1.jpg">
                </div>
                <div class="details text-center">
                    <span class="name">Shuvashish Paul Sagar</span><br>
                    <span class="designation"><small>Software Engineer, Wempro</small></span>
                </div>
            </div>
        </div>

        <div class="row subscribe">
            <h4 class="text-center">Subscribe Us</h4>
            <div class="col-md-offset-3 col-sm-offset-3 col-lg-offset-3 col-xs-12 col-md-6 col-sm-6 col-lg-6">
                <form class="form-group" style="color: #757575;" method="post">

                    <!-- Email -->
                    <div class="form-group">
                        <label for="materialLoginFormEmail">E-mail</label>
                        <input type="email" id="materialLoginFormEmail" class="form-control" name="subscriberEmail" placeholder="Enter your email address here" required>
                    </div>
                    <!-- Sign in button -->
                    <button class="btn btn-success" type="submit" name="submit">Subscribe Us</button>

            </div>
        </div>
    </div>
<!--footer-->
    <?php include "footer.php"; ?>

<!--footer-->



</body>
</html>