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
	return View::make('hello');
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