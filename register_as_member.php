<?php
    session_start();
    require 'connection.php';
    $page = 'register_as_member';
    if(isset($_POST['submit'])){
        $name = filter($_POST['name']);
        $name = ucwords(strtolower($name));
        $email = filter($_POST['email']);
        $phone = filter($_POST['phone']);
        $university = filter($_POST['university']);
        $university = ucwords(strtolower($university));
        $department = filter($_POST['department']);
        $homeDistrict = filter($_POST['homeDistrict']);
        $proficiency = filter($_POST['proficiency']);
        $experience = filter($_POST['experience'][0]);
        $sex = filter($_POST['sex']);
        $paymentMethod = filter($_POST['paymentMethod'][0]);
        $paymentNo = filter($_POST['paymentNo']);
        $password = filter($_POST['password']);
        $confirmPassword = filter($_POST['confirmPassword']);
        $_SESSION['message'] = '';
        if($password == $confirmPassword){
            $check = 0;
            if($user->isExistUserWithEmail($email)){
                $check = 1;
                $_SESSION['message'] .= 'User already exists with this email<br>';
            }
            if(!$paymentMethod){
                $check = 1;
                $_SESSION['message'] .= 'Please select a payment method';
            }
            if(strlen($password) < 8){
                $check = 1;
                $_SESSION['message'] = 'Please make a password of at least 8 characters';
            }
            if($check == 0){
                $password = hash('ripemd160',$password);
                $status = User::USER_STATUS_APPLIED;
                $type = User::USER_TYPE_JOB_SEEKER;
                $created = date('Y-m-d H:i:s');
                $token = bin2hex(openssl_random_pseudo_bytes(8));
                while ($user->isExistUserWithToken($token)) {
                    $token = bin2hex(openssl_random_pseudo_bytes(8));
                }
                try{
                    $userId = $user->addUser($email,$password,$type,$status,$paymentMethod,$paymentNo,$token,$created);
                    if(!$jobSeeker->isExistJobSeekerWithUserId($userId)){
                        $jobSeeker->addJobSeeker($userId,$name,$university,$department,$phone,$proficiency,$homeDistrict,$sex,$experience);
                    }
                    //$to=$email;
                    $subject = 'Please verify email';
                    $message = "Please click on the link below to confirm your registration to JUMBEHRSTUDYGROUP<br><br>
                    <a href='https://www.jumbehrstudygroup.org/confirm_job_seeker.php?email=$email&token=$token'>Click here</a>
                    ";
                    $headers = '';
                    $headers .= "From: JUMBEHR <jumbehrstudygroup.org>\r\n";
                    $headers .= "Reply-To: replyto@jumbehrstudygroup.org\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $headers .= "X-Priority: 3\r\n";
                    $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                    if(mail($email,$subject,$message,$headers)){
                        $_SESSION['message'] = 'You have been registered. Please verify your email';
                    }else{
                        $_SESSION['message'] = 'Something went wrong';
                    }
                }catch (Exception $e){
                    echo $e->getMessage();
                }

            }
        }else{
            $_SESSION['message'] .= "Two passwords don't match<br>";
        }
    }
function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/**/
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12 col-lg-offset-2 col-lg-8 my-form">
            <h3 class="text-center">Register Here!! </h3>
            <p class="text-center">(<span class="mandatory">*</span>) marked fields are mandatory</p>
            <?php
            if(!empty($_SESSION['message'])){?>
                <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
            <?php }
            unset($_SESSION['message']);
            ?>
            <form class="form-horizontal" method="POST" onsubmit="return validate()">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="name"><span class="mandatory">*</span> Full Name: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required>
                        <span id="nameMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="mandatory">*</span> Email: </label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required>
                        <span id="emailMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="phone"><span class="mandatory">*</span> Phone: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no" required>
                        <span id="phoneMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="university"><span class="mandatory">*</span> University: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="university" id="university" placeholder="Enter name of your university" required>
                        <span id="universityMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="university"><span class="mandatory">*</span> Department: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="department" id="department" placeholder="Enter name of the department you have/have been studied" required>
                        <span id="departmentMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="proficiency"><span class="mandatory">*</span> Proficiency: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="proficiency" id="proficiency" placeholder="Enter name of your proficiency" required>
                        <span id="proficiencyMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="homeDistrict"><span class="mandatory">*</span> Home District: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="homeDistrict" id="homeDistrict" placeholder="Enter name of your homeDistrict" required>
                        <span id="homeDistrictMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="experience"><span class="mandatory">*</span> Experience: </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="experience[]" id="experience" required>
                            <option></option>
                            <option value="fresher">Fresher</option>
                            <option value="Experienced">Experienced</option>
                        </select>
                        <span id="experienceMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="sex"><span class="mandatory">*</span> Gender: </label>
                    <div class="col-sm-9">
                        <input type="radio" name="sex" value="male">Male
                        <input type="radio" name="sex" value="Female">Female
                        <span id="sexMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="paymentMethod"><span class="mandatory">*</span> Payment Method: </label>
                    <div class="col-sm-9">
                        <select name="paymentMethod[]" id="paymentMethod" class="form-control" required>
                            <option></option>
                            <option value="bkash">Bkash</option>
                            <option value="rocket">Rocket</option>
                            <option value="cash">Cash</option>
                        </select>
                        <span id="paymentMethodMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group" id="payment">
                    <label class="control-label col-sm-3" for="paymentNo"><span class="mandatory">*</span> Payment No: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="paymentNo" id="paymentNo" placeholder="Enter name of your paymentNo">
                        <span id="paymentNoMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="password"><span class="mandatory">*</span> Password: </label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Choose a password for new admin" required>
                        <span id="passwordMessage" class="warning"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="confirmPassword"><span class="mandatory">*</span> Confirm Password: </label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Re-type password" required>
                        <span id="confirmPasswordMessage" class="warning"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input type="submit"  name="submit" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include 'footer.php'?>
<script type="text/javascript">
    function showDiv(){
        document.getElementById('payment').style.display = 'block';
    }
    function hideDiv(){
        document.getElementById('payment').style.display = 'none';
    }
    $(document).ready(function () {
        $("#paymentMethod").change(function(){
            if($(this).val()=="cash")
            {
                $("div#payment").hide();
            }
            else
            {
                $("div#payment").show();
            }
        });
    });
    function validate(){
        return true;
    }
</script>
</body>
</html>
