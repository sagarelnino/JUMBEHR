<?php
require 'session_required.php';
require 'connection.php';
$page = 'honorarium_panel';
$committee = $controller->getFounderMembers();
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<body>
<?php
if($_SESSION['type'] == User::USER_TYPE_RECRUITER){
    include 'navbar_recruiter.php';
}else{
    include 'navbar_job_seeker.php';
}
?>
<div class="container full-contain">
    <?php foreach ($committee as $singleCommittee){?>
        <div class="col-md-4">
            <div class="short-box">
                <div class="inner-box">
                    <div class="upper-part" align="center">
                        <img style="max-width: 100%" height="300" width="300" class="img-circle" src="images/founder/<?php echo $singleCommittee->image?>">
                    </div>
                    <div align="center" class="lower-part">
                        <h4 class="name"><?php echo $singleCommittee->name?></h4>
                        <h6 class="designation"><?php echo $singleCommittee->designation?></h6>
                        <h6 class="designation"><?php echo $singleCommittee->university?></h6>
                        <h6 class="designation"><?php echo $singleCommittee->phone.', '.$singleCommittee->email?></h6>
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
