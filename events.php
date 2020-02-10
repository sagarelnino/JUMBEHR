<?php
session_start();
require 'connection.php';
$page = 'events';
$time = $_GET['time'];
if($time == 'future'){
    $date = date("Y-m-d");
    $events = $controller->getFutureEvents($date);
}elseif($time == 'past'){
    $date = date("Y-m-d");
    $events = $controller->getPastEvents($date);
}
if(count($events) == 0){
    $_SESSION['message'] = 'No events';
}
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<body>
<?php include 'navbar.php'?>
<div class="container">
    <h3 class="text-center title">Events!!</h3>
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <?php foreach ($events as $singleEvent){?>
        <div class="row">
            <div class="my-box card-5" align="center">
                <h4 class="text-center text-success" style="font-family: 'fantasy'; font-size: 1.6em"><b><?php echo $singleEvent->title; ?></b></h4><br>
                <div class="col-md-5 event-image">
                    <img src="images/events/<?php echo $singleEvent->image?>" class="img-responsive"><br>
                    <p class="text-warning">Date: <?php echo $singleEvent->eventDate?></p>
                </div>
                <div class="col-md-7">
                    <p style="text-align: justify;text-justify: inter-word;"><i><?php echo $singleEvent->description; ?></i></p>
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
