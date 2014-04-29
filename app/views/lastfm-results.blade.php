<!doctype html>
<html>
<head>
    @include('navbar')
</head>
<body>
<?php if (is_null($results)) : ?>
    <p style="margin-top: 75px;">Error, no results found.</p>
<?php else : ?>
<table class="table table-striped" style="margin-top: 50px;">
    <thead>
        <tr>
            <th>Album Title</th>
            <th>Artist</th>
        </tr>
    </thead>

    <?php foreach($results as $result): ?>
        <tr>
            <td><?php echo $result->name; ?></td>
            <td><?php echo $result->artist; ?></td>
            <td><?php echo link_to('/add-album/lastfm/' . $result->mbid, 'Add Album');?></td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
</table>
</body>
</html>
