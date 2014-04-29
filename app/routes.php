<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('dashboard');
});

Route::get('/dashboard', function() {
    return View::make('dashboard');
});


Route::get('echonest', function() {

    $response = Cache::get('echonest-kxsc');

    if (!$response) {
        $echonestApi = new \Echonest\Service\Echonest();
        $apikey = 'YFKX90NYYVEOGQQOU';

        $echonestApi::configure($apikey);

        $response = $echonestApi->query('artist', 'biographies', array(
            'id' => 'ARH6W4X1187B99274F',
            'results' => '1',
            'start' => '0',
            'license' => 'cc-by-sa'
        ));

        Cache::put('echonest-kxsc', $response, 10);
    }

    //header('Content-type: application/json');
    var_dump($response);
});

// route to show the login form
//Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('add-user', array('before' => 'auth', function()
{
    return View::make('add-user');
}));

Route::get('add-album', array('before' => 'auth', function()
{
    return View::make('add-album');
}));

Route::get('add-album/lastfm', array('before' => 'auth', function()
{
    return View::make('lastfm-search');
}));

Route::get('add-album/lastfm/{mbid}', array('before' => 'auth', 'uses' => 'LastfmController@doAdd'));

Route::post('add-album/lastfm', array('uses' => 'LastfmController@doSearch', 'before' => 'auth'));

Route::get('add-album/manual', array('as' => 'manual', 'before' => 'auth', function($artist=null, $album=null)
{
    $genres = DB::table('genres')->get();
    $track_names = array();

    return View::make('album-entry')
        ->with('genres', $genres)
        ->with('name', '')
        ->with('artist', '')
        ->with('track_names', $track_names);
}));

Route::post('add-album/manual', array('uses' => 'AddAlbumController@doAdd', 'before' => 'auth'));


Route::get('/search', function() {

    $albums = DB::table('artists')
        ->join('albums', 'artists.id', '=', 'albums.artistid')
        ->select('albums.album_name', 'artists.artist_name', 'albums.id')
        ->get();

    //dd($albums);
    return View::make('search')
        ->with('albums', $albums);
});

Route::get('add-user', array('before' => 'auth', function()
{
    return View::make('add-user');
}));

Route::post('/add-user', array('uses' => 'HomeController@doAddUser', 'before' => 'auth'));

Route::post('/search', array('uses' => 'SearchController@doSearch'));

Route::get('/album/{id}', function($id) {

    $album = DB::table('artists')
        ->join('albums', 'artists.id', '=', 'albums.artistid')
        ->select('albums.album_name', 'artists.artist_name', 'albums.id')
        ->where('albums.id', $id)
        ->first();


    $tracks = DB::table('tracks')
        ->where('album_id', $album->id)
        ->orderBy('track_num', 'asc')
        ->get();


    return View::make('album-view')
        ->with('album', $album)
        ->with('tracks', $tracks);
});