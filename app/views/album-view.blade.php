<!doctype html>
<html>
<head>
    @include('navbar')
</head>
<body>
<h1 style="margin-top: 75px; margin-left: 10px;"><?php echo $album->album_name?></h1>
<h3 style="margin-top: 20px; margin-left: 10px;">by <?php echo $album->artist_name?></h3>

<table class="table table-striped" style="margin-top: 50px;">
    <thead>
    <tr>
        <th>Track</th>
        <th>Title</th>
    </tr>
    </thead>

    <?php foreach($tracks as $track): ?>
        <tr>
            <td><?php echo $track->track_num; ?></td>
            <td><?php echo $track->track_name; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
