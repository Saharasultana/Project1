<?php
session_start();
include('Model/User.php');
//create an object of user class
$user = new User();

if (isset($_POST['submit'])) {

    $fullname = $user->filter($_POST['fullname']);
    $email = $user->filter($_POST['email']);
    $password = $user->filter($_POST['password']);
    $password_confirm = $user->filter($_POST['password_confirm']);
    if($password == $password_confirm){
        $pass = password_hash("$password", PASSWORD_DEFAULT);
        if($user->isExistUserWithEmail($email)){
            $_SESSION['message'] = 'Already user exists with this email';
        }else{
            if($_FILES['image']){ //check if file contains
                $image_data = $user->imageUpload('uploads',$_FILES['image']); //imageUpload function in Database.php
                #die('died'.'<pre>'.print_r($image_data, true));
                if($image_data['result'] == true){
                    $created_at = date('Y-m-d H:i:s');
                    $user_id = $user->addUser($fullname,$email,$username,$pass,$image_data['data'],$created_at);
                    $_SESSION['message'] = 'Successfully registered';
                    $_SESSION['id'] = $user_id;
                    header('location:user/dashboard.php');
                }else{
                    $_SESSION['message'] = $image_data['data'];
                }
            }else{
                $_SESSION['message'] = 'No image is selected';
            }
        }
    }else{
        $_SESSION['message'] = 'The two passwords did not match';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up</title>
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
<?php include "navbar.php"; ?>

<div id="signup">
    <h2 class="text-center text-white pt-5">Create An Account</h2>
    <div class="container">
        <?php
        if(!empty($_SESSION['message'])){?>
            <h3 style="color: red" class="text-center warning"><?php echo $_SESSION['message']?></h3>
        <?php }
        unset($_SESSION['message']);
        ?>
        <div id="signup-row" class="row justify-content-center align-items-center">
            <div id="signup-column" class="col-md-6">
                <div id="signup-box" class="col-md-12">
                    <form id="signup-form" class="form" onsubmit="return validateForm()"  action=" " method="post" enctype="multipart/form-data">
                        <h3 class="text-center title">Sign Up</h3>
                        <div class="form-group">
                            <label for="username" class="title">Full Name:</label><br>
                            <input type="text" name="fullname" id="name" class="form-control" placeholder=" Enter your fullname">
                            <span id="fullnameError" class="text-danger font-wight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="username" class="title">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                            <span id="emailError" class="text-danger font-wight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="title">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                            <span id="passwordError" class="text-danger font-wight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="title">Confirm Password:</label><br>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="confirm password">
                            <span id="password_confirmError" class="text-danger font-wight-bold"></span>
                        </div>

                        <p class="title">Image:</p>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>



                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info" value="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="footer">
    <?php include "footer.php"; ?>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
<script type="text/javascript">
    function validation() {
        /*receiving input value from user*/
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var password_confirm = document.getElementById('password_confirm').value;
        /*receiving user innputs*/


        /*assigning regular expressions*/

        var fullnameCheck = /^[A-Za-z. ]{3,30}$/;
        var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
        var emailCheck = /^[A-Za-z_0-9]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;

       


 


        /*validation starts*/

        if (fullnameCheck.test(fullname)) //checking name
        {
            document.getElementById('fullnameError').innerHTML = " ";
        } else {
            document.getElementById('fullnameError').innerHTML = "** Invalid name!";
            return false;
        }

        if (emailCheck.test(email)) //checking email
        {
            document.getElementById('emailError').innerHTML = " ";
        } else {
            document.getElementById('emailError').innerHTML = "** Use standard email format!";
            return false;
        }


       


        if (passwordCheck.test(password)) //cheking password
        {
            document.getElementById('passwordError').innerHTML = " ";
        } else {
            document.getElementById('passwordError').innerHTML = "** Invalid password!";
            return false;
        }

        if (password_confirm.match(password)) //matching actu
        {
            document.getElementById('password_confirmError').innerHTML = " ";
        } else {
            document.getElementById('password_confirmError').innerHTML = "** Password not matching! ";
            return false;
        }
        /*validation ends*/
    }
    </script>


</body>
</html>