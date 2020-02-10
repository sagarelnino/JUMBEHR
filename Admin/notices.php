<?php
session_start();
require '../connection.php';
$page = 'notices';
$notices = $controller->getAllNotices();
if(count($notices) == 0){
    $_SESSION['message'] = 'No notice is found';
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
    <h3 class="text-center text-success">Notices</h3>
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
            <th>Notice</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($notices as $singleNotice){?>
            <tr>
                <td><?php echo $singleNotice->id; ?></td>
                <td><?php echo $singleNotice->notice; ?></td>
                <td><?php echo $singleNotice->created; ?></td>
                <td><a href="delete_notice.php?id=<?php echo $singleNotice->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
