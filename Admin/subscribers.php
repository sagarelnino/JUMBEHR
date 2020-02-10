<?php
require 'session_required.php';
require '../connection.php';
$page = 'subscribers';
$subscribers = $controller->getAllSubscribers();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'?>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container full-contain">
    <h3 class="text-center text-success">Subscribers of ours</h3>
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
        <?php foreach ($subscribers as $singleSubscriber){?>
            <tr>
                <td><?php echo $singleSubscriber->id; ?></td>
                <td><?php echo $singleSubscriber->email; ?></td>
                <td><?php echo $singleSubscriber->created; ?></td>
                <td><a href="delete_subscriber.php?id=<?php echo $singleSubscriber->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
