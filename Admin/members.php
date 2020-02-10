<?php
session_start();
require '../connection.php';
$page = 'members';
$members = $jobSeeker->getConfirmedUsers();
if(count($members) == 0){
    $_SESSION['message'] = 'No members have joined yet';
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
    <h3 class="text-center text-success">Members of ours</h3>
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
            <th>Email</th>
            <th>Expertise</th>
            <th>Experience</th>
            <th>Sex</th>
            <th>Department</th>
            <th>Home District</th>
            <th>University</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($members as $singleMember){?>
            <tr>
                <td><?php echo $singleMember->name; ?></td>
                <td><?php echo $singleMember->phone; ?></td>
                <td><?php echo $singleMember->email; ?></td>
                <td><?php echo $singleMember->proficiency; ?></td>
                <td><?php echo $singleMember->experience; ?></td>
                <td><?php echo $singleMember->sex; ?></td>
                <td><?php echo $singleMember->department; ?></td>
                <td><?php echo $singleMember->homeDistrict; ?></td>
                <td><?php echo $singleMember->university; ?></td>
                <td><a href="delete_user.php?id=<?php echo $singleMember->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
