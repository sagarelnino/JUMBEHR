<?php
session_start();
require '../connection.php';
$page = 'recruiter_approval';
$recruiters = $recruiter->getAppliedRecruiters();
if(count($recruiters) == 0){
    $_SESSION['message'] = 'No recruiters have joined yet';
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'?>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container-fluid full-contain">
    <h3 class="text-center text-success">Approval Request of recruiters</h3>
    <p class="text-center"><span style="color: #4cae4c">Email background green: Email verified</span>, <span style="color: #d58512">Email Background Red: Email not verified</span>  </p>
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <table class="table table-bordered" style="margin-top: 2%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Designation</th>
            <th>Email</th>
            <th>University</th>
            <th>Payment Method</th>
            <th>Payment No</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recruiters as $singleRecruiter){?>
            <tr>
                <td><?php echo $singleRecruiter->name; ?></td>
                <td><?php echo $singleRecruiter->phone; ?></td>
                <td><?php echo $singleRecruiter->company; ?></td>
                <td><?php echo $singleRecruiter->designation; ?></td>
                <td class="<?php if($singleRecruiter->isEmailConfirmed == 1){
                    echo 'alert alert-success';
                }else{
                    echo 'alert alert-warning';
                    } ?>">
                    <?php echo $singleRecruiter->email; ?>
                </td>
                <td><?php echo $singleRecruiter->university; ?></td>
                <td><?php echo $singleRecruiter->paymentMethod; ?></td>
                <td><?php echo $singleRecruiter->paymentNo; ?></td>
                <td><a href="delete_recruiter.php?id=<?php echo $singleRecruiter->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> <a href="approve_recruiter.php?id=<?php echo $singleRecruiter->userId?>" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
