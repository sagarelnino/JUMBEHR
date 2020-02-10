<?php
require 'session_required.php';
require '../connection.php';
$page = 'messages';
$messages = $controller->getAllMessages();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'?>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container full-contain">
    <h3 class="text-center text-success">Messages from users</h3>
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
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $singleMessage){?>
                <tr>
                    <td><?php echo $singleMessage->name; ?></td>
                    <td><?php echo $singleMessage->email; ?></td>
                    <td><?php echo $singleMessage->phone; ?></td>
                    <td><?php echo $singleMessage->message; ?></td>
                    <td><?php echo $singleMessage->created; ?></td>
                    <td><a href="delete_message.php?id=<?php echo $singleMessage->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
