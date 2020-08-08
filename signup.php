<?php
session_start();
include('Model/User.php');
//create an object of user class
$user = new User();

if (isset($_POST['submit'])) {

    $fullname = $user->filter($_POST['fullname']);
    $email = $user->filter($_POST['email']);
    $username = $user->filter($_POST['username']);
    $password = $user->filter($_POST['password']);
    $pass = password_hash("$password", PASSWORD_DEFAULT);
    if($user->isExistUserWithEmail($email)){
        $_SESSION['message'] = 'Already user exists with this email';
    }else{
        if($_FILES['image']){ //check if file contains
            $image_data = $user->imageUpload('uploads',$_FILES['image']); //imageUpload function in Database.php
            if($image_data['result'] == true){
                $created_at = date('Y-m-d H:i:s');
                $user->addUser($fullname,$email,$username,$pass,$image_data['data'],$created_at);
                $_SESSION['message'] = 'Successfully registered';
            }else{
                $_SESSION['message'] = $image_data['data'];
            }
        }
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
        <div id="signup-row" class="row justify-content-center align-items-center">
            <div id="signup-column" class="col-md-6">
                <div id="signup-box" class="col-md-12">
                    <?php
                    if(!empty($_SESSION['message'])){?>
                        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                    <?php }
                    unset($_SESSION['message']);
                    ?>
                    <form id="signup-form" class="form" action=" " method="post" enctype="multipart/form-data">
                        <h3 class="text-center title">Sign Up</h3>
                        <div class="form-group">
                            <label for="username" class="title">Full Name:</label><br>
                            <input type="text" name="fullname" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username" class="title">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username" class="title">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="title">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
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

</body>

</html>