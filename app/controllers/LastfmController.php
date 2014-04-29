<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 4/27/14
 * Time: 4:56 PM
 */

class LastfmController extends BaseController {

    protected $lastfm_api_key = 'b2e00b29c0ddf4974b61129da8550062';
    protected $lastfm_api_secret = '6f61ac55407bcc160872b84c3ad9d48c';

    public function doAdd($mbid) {
        $lastfm = new \Dandelionmood\LastFm\LastFm( $this->lastfm_api_key, $this->lastfm_api_secret );

        $lastfm_search = $lastfm->album_getInfo(array(
            'mbid' => $mbid,
            'api_key' => $this->lastfm_api_key
        ));


        $name = $lastfm_search->album->name;
        $artist = $lastfm_search->album->artist;
        $tracks = $lastfm_search->album->tracks;
        $track_names = array();

        //$track_names[];

        //var_dump($tracks->track);

        foreach ($tracks->track as $track) {
            //var_dump($track->name);
            array_push($track_names, $track->name);
        }

        $release = $lastfm_search->album->releasedate;

        $genres = DB::table('genres')->get();

        //var_dump($name, $artist, $track_names, $release);

        return View::make('album-entry')
            ->with('genres', $genres)
            ->with('name', $name)
            ->with('artist', $artist)
            ->with('track_names', $track_names)
            ->with('release', $release);



    }

    public function doSearch() {


        $lastfm = new \Dandelionmood\LastFm\LastFm( $this->lastfm_api_key, $this->lastfm_api_secret );

        $search = Input::get('search');

        $lastfm_search = $lastfm->album_search(array(
            'album' => $search
        ));

        //dd($lastfm_search->results);

        if ($lastfm_search->results->{'opensearch:totalResults'} != 0){
            $results = $lastfm_search->results->albummatches->album;
            return View::make('lastfm-results')->with('results', $results);
        }

        else
            return View::make('lastfm-results')
                ->with('error', 'No matches found.')
                ->with('results', null);


        //dd($results);


    }
}