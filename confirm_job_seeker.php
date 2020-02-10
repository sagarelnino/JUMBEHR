<?php
    session_start();
    require 'connection.php';
    if(!isset($_GET['email']) || !isset($_GET['token'])){
        header('location:register_as_member.php');
    }else{
        $email = $_GET['email'];
        $token = $_GET['token'];
        $userDetails = $user->getUserByEmailAndTokenAndEmailNotConfirmed($email,$token);
        if($userDetails->isEmailConfirmed != 0){
            $_SESSION['message'] = 'Email is already verified';
            header('index.php');
        }else{
            if($email == $userDetails->email && $token == $userDetails->token){
                $user->verifyEmail($userDetails->id);
                $_SESSION['message'] = 'Your request to JUMBEHRSTUDY GROUP has been successfully completed. Please wait to be approved. You will get an email when you are approved. Then you have to login to proceed';
            }else{
                $_SESSION['message'] = 'You are trying to access something wrong';
            }
        }
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
</body>
</html>
