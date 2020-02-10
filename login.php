<?php
session_start();
require 'connection.php';
$page = 'login';
if(isset($_POST['submit'])){
    $email = filter($_POST['email']);
    $password = filter($_POST['password']);
    $password = hash('ripemd160',$password);
    if($user->isExistUserWithEmailAndPassword($email,$password)){
        $userDetails = $user->getUserWithEmailAndPassword($email,$password);
        if($userDetails->status == User::USER_STATUS_APPROVED && $userDetails->isEmailConfirmed==1){
            $_SESSION['id'] = $userDetails->id;
            $_SESSION['type'] = $userDetails->type;
            if($userDetails->type == User::USER_TYPE_JOB_SEEKER){
                header('location:job_seeker_profile.php');
            }else{
                header('location:recruiter_profile.php');
            }
        }else{
            $_SESSION['message'] = 'User has not been approved yet';
        }
    }else{
        $_SESSION['message'] = 'User can not be recognized';
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
    <div class="col-md-offset-2 col-md-8 second-div">
        <h3 class="text-center text-success">LOGIN...</h3>
        <form class="form-horizontal" method="POST" onsubmit="return validate()">

            <div class="form-group">
                <label class="control-label col-sm-3" for="email"><span class="mandatory">*</span> Email: </label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required>
                    <span id="emailMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="password"><span class="mandatory">*</span> Password: </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                    <span id="passwordMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit"  name="submit" value="Login" class="btn btn-success">
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
