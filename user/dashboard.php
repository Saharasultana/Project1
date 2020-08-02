<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_updated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="dist/css/propeller.min.css">
    <link rel="stylesheet" href="datetimepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="datetimepicker/css/pmd-datetimepicker.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <link rel="stylesheet" href="profile.css">
    <title>Add Task</title>
</head>

<body>
<div class="container-fluid">
    <div class=" row profile">
        <div class="col-md-2 sidebar1">
            <div class="profile-userpic">
                <img src="../img/user1.jpg" class="img-responsive" alt="">
            </div>

            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    Cynthia
                </div>
                <div class="profile-usertitle-job">
                    Developer
                </div>
            </div>
            <div>
                <h4 class="profile-desc-title">About Cynthia</h4>
                <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                <div class="margin-top-20 profile-desc-link">
                    <i class="fa fa-globe"></i>
                    <a href="https://www.apollowebstudio.com">apollowebstudio.com</a>
                </div>
                <div class="margin-top-20 profile-desc-link">
                    <i class="fa fa-twitter"></i>
                    <a href="https://www.twitter.com/jasondavisfl/">@jasondavisfl</a>
                </div>
                <div class="margin-top-20 profile-desc-link">
                    <i class="fa fa-facebook"></i>
                    <a href="https://www.facebook.com/">CynthiaFL</a>
                </div>
            </div>
            <div class="website-details">
                <h5>@BujoBud</h5>
            </div>
        </div>
        <div class="col-md-10 sidebar2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="dashboard.html">Dashboard<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editprofile.html">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addtask.html">Add Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alltasks.html">All Tasks</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div id="calendar"></div>
                </div>
            </div>



        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


<!-- Propeller textfield js -->
<script type="text/javascript" src="dist/js/propeller.min.js"></script>

<!-- Datepicker moment with locales -->
<script type="text/javascript" language="javascript" src="datetimepicker/js/moment-with-locales.js"></script>

<!-- Propeller Bootstrap datetimepicker -->
<script type="text/javascript" language="javascript" src="datetimepicker/js/bootstrap-datetimepicker.js"></script>

<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable:false,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events: 'load.php',
            selectable:true,
            selectHelper:true,
            select: function(start, end, allDay)
            {
                var title = prompt("Enter Event Title");
                if(title)
                {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url:"insert.php",
                        type:"POST",
                        data:{title:title, start:start, end:end},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Added Successfully");
                        }
                    })
                }
            },
            editable:true,
            eventResize:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"update.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function(){
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Update');
                    }
                })
            },

            eventDrop:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"update.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Updated");
                    }
                });
            },

            eventClick:function(event)
            {
                if(confirm("Are you sure you want to remove it?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"delete.php",
                        type:"POST",
                        data:{id:id},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Removed");
                        }
                    })
                }
            },

        });
    });
</script>




</body>

</html>