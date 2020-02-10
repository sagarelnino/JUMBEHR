<?php
require 'session_required_job_seeker.php';
$userDetails = $jobSeeker->getJobSeekerById($_SESSION['id']);
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
    <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-6 col-lg-3">
            <div class="image" align="center">
                <?php
                    if(!isset($userDetails->image)){
                        if($userDetails->sex == 'male'){?>
                            <img src="images/job_seeker_man.png" class="img-responsive">
                        <?php }else{ ?>
                            <img src="images/job_seeker_woman.png" class="img-responsive">
                        <?php }
                    }else{?>
                        <img src="images/<?php echo $userDetails->image?>" class="img-responsive">
                    <?php }
                ?>
            </div>
            <div class="details">
                <h3 class="head">JUBMEHR INFO</h3>
                <br>
                <p><span class="title">User Type</span> : <?php echo $userDetails->type ?></p>
                <p><span class="title">Status</span> : <?php echo $userDetails->status ?></p>
                <p><span class="title">Payment method</span> : <?php echo $userDetails->paymentMethod ?></p>
                <?php if(!empty($userDetails->paymentNo)){?>
                    <p><span class="title">Payment No</span> : <?php echo $userDetails->paymentNo ?></p>
                <?php } ?>
                <p><span class="title">User Id</span> : <?php echo $userDetails->userId ?></p>
                <p><span class="title">Joined On</span> : <?php echo $userDetails->created ?></p>
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-xs-6 col-lg-9">
            <div  class="personal">
                <h2 class="my-name"><?php echo $userDetails->name?></h2>
                <h4 class="my-skill"><?php echo $userDetails->department.', '.$userDetails->university?></h4><br>
                <div class="alert alert-success" style="font-style: italic ">
                    <?php echo $userDetails->bio ?>
                </div><br>
                <div class="personal-details">
                    <h3 class="head">PERSONAL INFO [<?php echo strtoupper($userDetails->experience)?>]</h3><br>
                    <table class="table borderless">
                        <tr>
                            <td>Proficiency</td>
                            <td class="my-skill"><?php echo $userDetails->proficiency?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td class="my-skill"><?php echo $userDetails->phone?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="text-primary"><?php echo $userDetails->email?></td>
                        </tr>
                        <tr>
                            <td>Homedistrict</td>
                            <td class="my-skill"><?php echo $userDetails->homeDistrict?></td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td class="my-skill"><?php echo $userDetails->sex?></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td class="my-skill"><?php echo $userDetails->age?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td class="my-skill"><?php echo $userDetails->dob?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'?>
<script type="text/javascript">

</script>
</body>
</html>
