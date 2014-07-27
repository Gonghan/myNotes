<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./template/style.css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="./template/script.js"></script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MyNotes</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./">Home</a></li>
                <li><a href="./mynotes.php">My Notes</a></li>
                <li><a href="#contact">Alerts</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (empty($_SESSION['name'])) {
                    ?>
                    <li><a href="#" id="welcome-name"></a></li>
                    <li><a href="#" id="log-in" data-toggle="modal" data-target="#login-modal">Log in</a></li>
                    <li><a href="#" id="sign-up" data-toggle="modal" data-target="#signup-modal">Sign Up</a></li>
                <?php
                } else {
                    ?>
                    <li><a href="#" id="welcome-name">Welcome, <?php echo $_SESSION['name']; ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!--Sign in Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Please Log in</h4>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <label for="login-email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" id="login-email" class="form-control" placeholder="Email address" required
                               autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="login-password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" id="login-password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal-log-in">Log In</button>
                <p class="bg-danger" id="login-output">...</p>
            </div>
        </div>
    </div>
</div>

<!--Sign up Modal -->
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Please sign up</h4>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <label for="signup-name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input id="signup-name" class="form-control" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" id="signup-email" class="form-control" placeholder="Email address" required
                               autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" id="signup-password" class="form-control" placeholder="Password"
                               required>
                    </div>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="signup-button">Sign Up</button>
            </div>
        </div>
    </div>
</div>
	

