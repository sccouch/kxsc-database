<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KXSC Music Database</title>

    <script src="http://code.jquery.com/jquery.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>



</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/dashboard">KXSC Music Database</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('search') ? 'active' : '' }}"><a href="/search">Search</a></li>
                <?php if (Auth::check()): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Album <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="/add-album/manual">Enter Manually</a></li>
                            <li><a href="/add-album/lastfm">Add from Last.fm</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('add-user') ? 'active' : '' }}"><a href="/add-user">Add User</a></li>
                <?php endif ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Auth::check()): ?>

                    <li><a href="/logout">Log Out</a></li>

                <?php else: ?>

                    <li><a href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Log In</a></li>

                <?php endif ?>

            </ul>

        </div><!--/.nav-collapse -->
    </div>
</div>

<?php if (Request::is('dashboard')): ?>

    <div class="row text-center">
        <img style="margin-top:100px; width: 20%; height: 20%" src="https://s3.amazonaws.com/static.tumblr.com/541915858095e88840c14cf716d46bb6/glt51fb/rZRmisynp/tumblr_static_553255_388502927836226_1690370777_n.jpg">
        </br><span style="font-family: Helvetica Neue, Helvetica, Arial; font-size: 20px;">Welcome to the KXSC Music Database.</span>
    </div>

<?php endif; ?>


<?php if (!Auth::check()): ?>
<!-- Modal -->
<div class="modal fade bs-modal-sm" style="padding-top:100px;" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">
                        <form class="form-horizontal" action="/login" method="post">
                            <fieldset>
                                <!-- Sign In Form -->
                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="username">Username:</label>
                                    <div class="controls">
                                        <input required="" id="username" name="username" type="text" placeholder="username" class="form-control" class="input-medium" required="">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="password">Password:</label>
                                    <div class="controls">
                                        <input required="" id="password" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button id="signin" name="signin" class="btn btn-success">Sign In</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </center>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
