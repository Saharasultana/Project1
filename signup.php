<?php

session_start();
include('user/Model/database.php');

class resgistration extends database
{
    protected $link;
    public function resgistrationFunction()
    {
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            //$is_valid = 0;
            $password = $_POST['password'];
           // $img = time() . '_' . $_FILES['img']['name'];
          //  $target = 'user_img/' . $img;

            $pass = password_hash("$password", PASSWORD_DEFAULT);

            $sqlEmail = "Select * from user where email = '$email' ";
            $resEmail = mysqli_query($this->link, $sqlEmail);
            if (mysqli_num_rows($resEmail) > 0) {
                echo "Email is already taken";
                return false;
            } else {
                $sql = "INSERT INTO `user` (`id`, `fullname`, `email`, `username`, `password`, `image`, `created_at`, `updated_at`) VALUES (NULL, '$fullname', '$email', '$username', '$pass', NULL, NULL, NULL)";
                $res = mysqli_query($this->link, $sql);
                if($res){
                    echo "added";

                    return $res;
                } else{
                    die('<pre>'.print_r($res, true));
                } ;

                    return false;
                }
               // move_uploaded_file($_FILES['img']['tmp_name'], $target);
             
                
                }


                /*after entering values into database, registration page should redirect user to it's profile*/
                /*for redirection, we need to have $id from $res2 and $email from $sql*/
            }
        }
        # code...
    

$obj = new resgistration;
$ObjReg = $obj->resgistrationFunction();
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
                        <form id="signup-form" class="form" action=" " method="post" entype="multipart/form-data">
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
                                <input type="file" class="custom-file-input" id="customFile" name="img" required>
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