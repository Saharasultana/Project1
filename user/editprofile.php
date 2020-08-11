<?php
require_once 'session_required.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_updated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="profile.css">
    <title>Edit Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class=" row profile">
            <div class="col-md-2 sidebar1">
                <?php include 'profile.php' ;?>
            </div>
            <div class="col-md-10 sidebar2">
                <?php include 'navbar.php';?>

                <section id="profile-info">
                    <div class="col-md-8 offset-2">
                        <h3> Update Your Personal Information </h3>
                        <form class="info-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Update Name">
                            </div>
                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" class="form-control" id="profession" aria-describedby="professionHelp" placeholder="Update Profession">
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" id="bio" aria-describedby="bioHelp" placeholder="Update your bio"></textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </section>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js">
                </script>
                <script src="../js/custom.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
</body>

</html>