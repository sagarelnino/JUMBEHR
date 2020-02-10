<?php
require 'session_required.php';
require '../connection.php';
$page = 'admins';
$admins = $user->getAdmins();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'?>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container full-contain">
    <h3 class="text-center text-success">Admins</h3>
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <table class="table table-bordered" style="margin-top: 2%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $singleAdmin){
            if($singleAdmin->id == $_SESSION['adminId']){
                continue;
            }
            ?>
            <tr>
                <td><?php echo $singleAdmin->id; ?></td>
                <td><?php echo $singleAdmin->email; ?></td>
                <td><?php echo $singleAdmin->created; ?></td>
                <td><a href="delete_admin.php?id=<?php echo $singleAdmin->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
