<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 4/27/14
 * Time: 4:56 PM
 */

class SearchController extends BaseController {



    public function doSearch($search=null) {

        $search = Input::get('search');

        $searchTerms = explode(' ', $search);

        $query = DB::table('artists')
            ->join('albums', 'artists.id', '=', 'albums.artistid')
            ->select('albums.album_name', 'artists.artist_name', 'albums.id');

        foreach($searchTerms as $term){
            $query->where('albums.album_name', 'LIKE', '%' . $term . '%')
                  ->orWhere('artists.artist_name', 'LIKE', '%' . $term . '%');
        }

        $albums = $query->get();

        //dd($albums);

        return View::make('search')
            ->with('albums', $albums);


    }
}