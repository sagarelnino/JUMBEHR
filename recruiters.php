<?php
session_start();
require 'connection.php';
$page = 'recruiters';
$recruiters = $recruiter->getConfirmedRecruiters();
if(count($recruiters) == 0){
    $_SESSION['message'] = 'No recruiters have joined yet';
}
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<body>
<?php include 'navbar.php'?>
<div class="container full-contain">
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <?php foreach ($recruiters as $singleRecruiter){
        ?>
        <div class="col-md-4">
            <div class="short-box">
                <div class="inner-box">
                    <div class="upper-part" align="center">
                        <?php
                            if($singleRecruiter->image){?>
                                <img style="max-width: 100%" height="300" width="300" class="img-circle" src="images/recruiters/<?php echo $singleRecruiter->image?>">
                            <?php }else{?>
                                <img style="max-width: 100%" height="300" width="300" class="img-circle" src="images/recruiters/refernece.jpg">
                            <?php }
                        ?>
                    </div>
                    <div align="center" class="lower-part">
                        <h4 class="name"><?php echo $singleRecruiter->name?></h4>
                        <h6 class="designation"><?php echo $singleRecruiter->designation?></h6>
                        <h6 class="designation"><?php echo $singleRecruiter->company?></h6>
                        <h6 class="designation"><?php echo $singleRecruiter->phone?></h6>
                        <h6 class="designation">Member Since: <?php echo $user->getUserById($singleRecruiter->userId)->created;?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include 'footer.php'?>
<script type="text/javascript">

</script>
</body>
</html>
