<!doctype html>
<html>
<head>
    @include('navbar')
</head>
<body>
<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="/search" method="post">
            <div class="input-group custom-search-form">

             <input name="search" id="search" type="text" class="form-control" placeholder="search by artist or album">
              <span class="input-group-btn">
              <button class="btn btn-default" name="submit" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
              </button>

             </span>
            </form>
            </div><!-- /input-group -->
        </div>
    </div>
</div>

<table class="table table-striped" style="margin-top: 50px;">
    <thead>
    <tr>
        <th>Album Title</th>
        <th>Artist</th>
    </tr>
    </thead>

    <?php if(empty($albums)): ?>
    <tr>
        <td>Sorry, no results found.</td>
    </tr>

    <?php else : ?>
    <?php foreach($albums as $album): ?>
        <tr>
            <td><?php echo $album->album_name; ?></td>
            <td><?php echo $album->artist_name; ?></td>
            <td><a href="/album/<?php echo $album->id;?>">Album Info</a> </td>
        </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>
</body>
</html>