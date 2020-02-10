<?php
require 'session_required.php';
require '../connection.php';
$page = 'add_event';
if(isset($_POST['submit'])){
    $title = filter($_POST['title']);
    $eventDate = filter($_POST['eventDate']);
    $description = filter($_POST['description']);
    $image = $_FILES['image'];
    if(empty($image['name'])){
        $created = date('Y-m-d H:i:s');
        $imageName = 'Events.jpg';
        $controller->addEvent($title,$eventDate,$imageName,$description,$created);
        $_SESSION['message'] = 'Successfully Added';
        header('location:events.php');
    }else{
        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );
        // Get image file extension
        $file_extension = pathinfo($image["name"], PATHINFO_EXTENSION);

        // Validate file input to check if is not empty
        if (! in_array($file_extension, $allowed_image_extension)) {
            $_SESSION['message'] = 'File type not allowed. Use png, jpg or jpeg';
        }

        // Validate image file dimension
        else {
            $ext = explode('.',$image['name']);
            $ext = $ext[1];
            $imageName = time().'.'.$ext;
            #die('died'.'<pre>'.print_r($imageName, true));
            $target = "../images/events/" . $imageName;
            if (move_uploaded_file($image["tmp_name"], $target)) {
                $created = date('Y-m-d H:i:s');
                $controller->addEvent($title,$eventDate,$imageName,$description,$created);
                $_SESSION['message'] = 'Successfully Added';
                header('location:events.php');
            } else {
                $_SESSION['message'] = 'Problem in uploading';
            }
        }
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
        <h3 class="text-center text-success">Add Event</h3>
        <?php
        if(!empty($_SESSION['message'])){?>
            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
        <?php }
        unset($_SESSION['message']);
        ?>
        <form class="form-horizontal" method="POST" onsubmit="return validate()">

            <div class="form-group">
                <label class="control-label col-sm-3" for="title"><span class="mandatory">*</span> Title: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title of the event" required>
                    <span id="titleMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="eventDate"><span class="mandatory">*</span> Event Date: </label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="eventDate" id="eventDate" placeholder="Enter date" required>
                    <span id="eventDateMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="description"><span class="mandatory">*</span> Description: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description of the event" required></textarea>
                    <span id="descriptionMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="image"><span class="mandatory">*</span> Image: </label>
                <div class="col-sm-9">
                    <input type="file" name="image" id="image">
                    <span id="imageMessage" class="warning"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit"  name="submit" value="Add Event" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
