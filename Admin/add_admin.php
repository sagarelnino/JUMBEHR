<?php
require 'session_required.php';
require '../connection.php';
$page = 'add_admin';
if(isset($_POST['submit'])){
    $email = filter($_POST['email']);
    $password = filter($_POST['password']);
    if(strlen($password)< 6){
        $_SESSION['message'] = 'Password need to be at least 6 characters';
    }
    else{
        $password = hash('ripemd160',$password);
        if($email && $password){
            $created = date('Y-m-d H:i:s');
            $user->addAdmin($email,$password,$created);
            $_SESSION['message'] = 'Admin successfully added';
            header('admins.php');
        }else{
            $_SESSION['message'] = 'Add email and password please';
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
<head>
    <?php include 'header.php'?>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container full-contain">
    <div class="col-md-offset-2 col-md-8 second-div" style="margin-top: 5%">
        <h3 class="text-center text-success">Add Admin</h3>
        <?php
        if(!empty($_SESSION['message'])){?>
            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
        <?php }
        unset($_SESSION['message']);
        ?>
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
                    <input type="submit"  name="submit" value="Add Admin" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
