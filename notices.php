<?php
session_start();
require 'connection.php';
$page = 'notices';
$notices = $controller->getAllNotices();
if(count($notices) == 0){
    $_SESSION['message'] = 'No notice';
}
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<body>
<?php include 'navbar.php'?>
<div class="container">
    <div class="my-box card-5" align="center">
        <h3 class="text-center title">Notices</h3>
        <?php
        if(!empty($_SESSION['message'])){?>
            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
        <?php }
        unset($_SESSION['message']);
        ?>
        <ul class="list-group">
            <?php foreach ($notices as $singleNotice){?>
                <li class="list-group-item"><?php echo $singleNotice->notice?></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php include 'footer.php'?>
<script type="text/javascript">

</script>
</body>
</html>
