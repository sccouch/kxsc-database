<!doctype html>
<html>
<head>
    @include('navbar')
    <link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet">
    <script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

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
        {{ $errors->first('artist') }}
        {{ $errors->first('album') }}
        {{ $errors->first('date') }}
        {{ $errors->first('tracks') }}
    </div>

    <div class="col-md-6 col-md-offset-3">
    {{ Form::open(array('url' => 'add-album/manual')) }}
        <fieldset>

            <!-- Form Name -->
            <legend>New Album</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="control-label" for="artist">Artist</label>
                <div class="controls">
                    <input id="artist" name="artist" type="text" placeholder="" class="form-control" value="<?php echo $artist ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="control-label" for="album">Album</label>
                <div class="controls">
                    <input id="album" name="album" type="text" placeholder="" class="form-control" value="<?php echo $name ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="control-label" for="album">Release Date</label>
                <div class="controls">
                    <input id="date" name="date" type="date" placeholder="MM/DD/YYYY" class="form-control">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="control-label" for="genre">Genre</label>
                <div class="controls">
                    <select id="genre" name="genre" class="form-control">
                        <?php foreach($genres as $genre): ?>
                            <option value="<?php echo $genre->id ?>"><?php echo $genre->genre_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="control-label" for="tracks">Tracks (One Per Line)</label>
                <div class="controls">
                    <textarea id="tracks" name="tracks" class="form-control" style="width: 600px; height: 200px;"><?php
                    foreach($track_names as $track) :?><?php echo $track . '&#13;'?><?php endforeach; ?></textarea>
                </div>
            </div>

        </fieldset>
        <button class="btn btn-default" name="submit" type="submit">
            Add
        </button>

    {{ Form::close() }}
    </div>









</div>

</body>
</html>