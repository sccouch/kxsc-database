<!doctype html>
<html>
<head>
    @include('navbar')
</head>
<body>



<div class="container" style="padding-top: 100px;">

    <?php if (Session::has('error')) : ?>
        <div class="alert alert-danger">
            <?php echo Session::get('error') ?>
        </div>
    <?php endif ?>

    <?php if (Session::has('success')) : ?>
        <div class="alert alert-success">
            <?php echo Session::get('success') ?>
        </div>
    <?php endif ?>


    <div <?php if(!empty($errors->messages)): echo 'class="alert alert-danger"'; endif; ?>>
        {{ $errors->first('username') }}
        {{ $errors->first('email') }}
        {{ $errors->first('password1') }}
        {{ $errors->first('password2') }}
    </div>

    <div class="col-md-6 col-md-offset-3">
        {{ Form::open(array('url' => 'add-user')) }}
        <fieldset>

            <!-- Form Name -->
            <legend>Add User</legend>

            <div class="control-group" style="margin-top: 10px;">
                <label class="control-label" for="username">Username:</label>
                <div class="controls">
                    <input required="" id="username" name="username" type="text" placeholder="username" class="form-control" class="input-medium" required="">
                </div>
            </div>

            <div class="control-group" style="margin-top: 10px;">
                <label class="control-label" for="username">Email:</label>
                <div class="controls">
                    <input required="" id="email" name="email" type="text" placeholder="email" class="form-control" class="input-medium" required="">
                </div>
            </div>

            <!-- Password input-->
            <div class="control-group" style="margin-top: 10px;">
                <label class="control-label" for="password1">Password:</label>
                <div class="controls">
                    <input required="" id="password1" name="password1" class="form-control" type="password" placeholder="********" class="input-medium">
                </div>
            </div>

            <!-- Password input-->
            <div class="control-group" style="margin-top: 10px;">
                <label class="control-label" for="password2">Re-enter Password:</label>
                <div class="controls">
                    <input required="" id="password2" name="password2" class="form-control" type="password" placeholder="********" class="input-medium">
                </div>
            </div>

        </fieldset>
        <button style="margin-top: 10px;" class="btn btn-default" name="submit" type="submit">
            Add
        </button>

        {{ Form::close() }}
    </div>









</div>

</body>
</html>