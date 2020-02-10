<?php
require 'session_required.php';
$page = 'constitution';
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
<div class="container">
    <div class="my-box card-5" align="center">
        <h3 class="text-center title">Constitution</h3>
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio Dapibus ac facilisis in Morbi leo risus Porta ac consectetur ac</li>
            <li class="list-group-item">Cras justo odio Dapibus ac facilisis in Morbi leo risus Porta ac consectetur ac</li>
            <li class="list-group-item">Cras justo odio Dapibus ac facilisis in Morbi leo risus Porta ac consectetur ac</li>
            <li class="list-group-item">Cras justo odio Dapibus ac facilisis in Morbi leo risus Porta ac consectetur ac</li>
            <li class="list-group-item">Cras justo odio Dapibus ac facilisis in Morbi leo risus Porta ac consectetur ac</li>
            <li class="list-group-item">Cras justo odio Dapibus ac facilisis in Morbi leo risus Porta ac consectetur ac</li>
        </ul>
    </div>
</div>
<?php include 'footer.php'?>
<script type="text/javascript">

</script>
</body>
</html>
