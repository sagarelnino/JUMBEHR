<?php
session_start();
require 'connection.php';
$page = 'contact';
if(isset($_POST['submit'])){
    $name = filter($_POST['name']);
    $email = filter($_POST['email']);
    $phone = filter($_POST['phone']);
    $message = filter($_POST['message']);
    if(!empty($name) && !empty($email) && !empty($phone) && !empty($message)){
        $created = date('Y-m-d H:i:s');
        $controller->addMessage($name,$email,$phone,$message,$created);
        $_SESSION['message'] = 'Message successfully sent! Thank you!!';
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
<?php include 'navbar.php'?>
<div class="container whole">
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 first-div">
        <span class="fa fa-2x fa-address-card"> Address</span><br>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <p class="para-details">Contact: Manir Sikder, founder, jumbehr<br>
                    Social Science Building, Department of Public Administration, Jahangirnagar University</p>
            </div>
        </div>
        <br><br>
        <span class="fa fa-2x fa-phone"> Let's talk..</span><br>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <p class="para-details">01989999999</p>
            </div>
        </div>
        <br><br>
        <span class="fa fa-2x fa-envelope-open-text"> General Support</span><br>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <p class="para-details">contact@jumbehrstudygroup.org</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 second-div">
        <h3 class="text-center text-success">Message Us...</h3>
        <form class="form-horizontal" method="POST" onsubmit="return validate()">
            <div class="form-group">
                <label class="control-label col-sm-3" for="name"><span class="mandatory">*</span> Full Name: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required>
                    <span id="nameMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="email"><span class="mandatory">*</span> Email: </label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required>
                    <span id="emailMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="phone"><span class="mandatory">*</span> Phone: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no" required>
                    <span id="phoneMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="message"><span class="mandatory">*</span> Message </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="message" id="message" placeholder="Enter your message here" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit"  name="submit" value="Send Message" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'footer.php'?>
<script type="text/javascript">

</script>
</body>
</html>
