<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_updated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="profile.css">
    <title>Add Task</title>
</head>

<body>
    <div class="container-fluid">
        <div class=" row profile">
            <div class="col-md-2 sidebar1">
                <?php include 'profile.php'; ?>
            </div>
            <div class="col-md-10 sidebar2">
                <?php include 'navbar.php';?>
                <section class="add-task">
                    <div class="container new-task">
                        <h3>Add Your New Task</h3>
                        <form class="info-form col-md-8 offset-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Task</label>
                                <select class="custom-select">
                                    <option selected>Choose new task</option>
                                    <option value="1" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam">Take a walk</option>

                                    <option value="2" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam">Drink Water</option>

                                    <option value="3" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam">Do exercise</option>

                                    <option value="3" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam">Eat vegetables</option>

                                    <option value="3" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam">Make bed</option>

                                    <option value="3" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam">Homework</option>

                                    <option value="3" data-toggle="tooltip" data-placement="left" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam">Skincare routine
                                    </option>

                                </select>


                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1">Select Date</label>
                                <input type="date" class="form-control" id="datecheck">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1">Select Time</label>
                                <input type="time" class="form-control" id="timecheck">
                            </div>

    


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Task Details</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div> <br>






                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Task</button>
                        </form>


                    </div>

                </section>



            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="../js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>





</body>

</html>