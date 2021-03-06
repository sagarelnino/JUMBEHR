<?php
require 'session_required.php';
$page = 'gallery';
?>
<!DOCTYPE html>
<html>
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
        <h3 class="text-center title">Gallery</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="gallery">
                    <a target="_blank" href="utilities/images/job-vs-career-infographic-1068x607.jpg">
                        <img src="utilities/images/job-vs-career-infographic-1068x607.jpg" alt="Cinque Terre" class="img-responsive" style="width: 100%">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery">
                    <a target="_blank" href="utilities/images/job-vs-career-infographic-1068x607.jpg">
                        <img src="utilities/images/job-vs-career-infographic-1068x607.jpg" alt="Cinque Terre" class="img-responsive" style="width: 100%">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery">
                    <a target="_blank" href="utilities/images/job-vs-career-infographic-1068x607.jpg">
                        <img src="utilities/images/job-vs-career-infographic-1068x607.jpg" alt="Cinque Terre" class="img-responsive" style="width: 100%">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery">
                    <a target="_blank" href="utilities/images/job-vs-career-infographic-1068x607.jpg">
                        <img src="utilities/images/job-vs-career-infographic-1068x607.jpg" alt="Cinque Terre" class="img-responsive" style="width: 100%">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery">
                    <a target="_blank" href="utilities/images/job-vs-career-infographic-1068x607.jpg">
                        <img src="utilities/images/job-vs-career-infographic-1068x607.jpg" alt="Cinque Terre" class="img-responsive" style="width: 100%">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery">
                    <a target="_blank" href="utilities/images/job-vs-career-infographic-1068x607.jpg">
                        <img src="utilities/images/job-vs-career-infographic-1068x607.jpg" alt="Cinque Terre" class="img-responsive" style="width: 100%">
                    </a>
                    <div class="desc">Add a description of the image here</div>
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
