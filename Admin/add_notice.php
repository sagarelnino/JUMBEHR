<?php
require 'session_required.php';
require '../connection.php';
$page = 'add_event';
if(isset($_POST['submit'])){
    $notice = filter($_POST['description']);
    $created = date('Y-m-d H:i:s');
    if($notice){
        $controller->addNotice($notice,$created);
        $_SESSION['message'] = 'Notice successfully added';
        header('location:notices.php');
    }
}
function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    <div class="col-md-offset-2 col-md-8 second-div" style="margin-top: 5%">
        <h3 class="text-center text-success">Add Notice</h3>
        <?php
        if(!empty($_SESSION['message'])){?>
            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
        <?php }
        unset($_SESSION['message']);
        ?>
        <form class="form-horizontal" method="POST" onsubmit="return validate()">

            <div class="form-group">
                <label class="control-label col-sm-3" for="description"><span class="mandatory">*</span> Description: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Notice" required></textarea>
                    <span id="noticeMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit"  name="submit" value="Add Notice" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
