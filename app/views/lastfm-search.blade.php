<!doctype html>
<html>
<head>
    @include('navbar')
</head>
<body style="padding-left: 10px;">

</br>


<p>
    <div class="container" style="margin-top: 100px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 style="padding-top: 100px;">Search on Last.fm</h1>
                <form action="/add-album/lastfm" method="post">
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
</p>

</div>
</body>
</html>