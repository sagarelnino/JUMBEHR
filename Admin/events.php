<?php
session_start();
require '../connection.php';
$page = 'events';
$events = $controller->getAllEvents();
if(count($events) == 0){
    $_SESSION['message'] = 'No event is found';
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
    <h3 class="text-center text-success">EVENTS</h3>
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <table class="table table-bordered" style="margin-top: 2%">
        <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Description</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $singleEvent){?>
            <tr>
                <td><?php echo $singleEvent->title; ?></td>
                <td><?php echo $singleEvent->eventDate; ?></td>
                <td><?php echo $singleEvent->description; ?></td>
                <td><?php echo $singleEvent->created; ?></td>
                <td><a href="delete_event.php?id=<?php echo $singleEvent->id?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

</script>
</body>
</html>
