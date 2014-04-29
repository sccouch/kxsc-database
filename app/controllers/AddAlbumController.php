<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 4/27/14
 * Time: 9:09 PM
 */

class AddAlbumController extends BaseController {




    public function doAdd() {
        //validate data

        $rules = array(
            'artist'    => 'required',
            'album' => 'required',
            'date' => 'required',
            'tracks' => 'required'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('add-album/manual')
                ->withErrors($validator)
                ->withInput();
        }

        else {

            // create our album data
            $input = array(
                'artist'        => Input::get('artist'),
                'album'         => Input::get('album'),
                'release_date'  => Input::get('date'),
                'genre'         => Input::get('genre'),
                'tracks'        => explode("\n", Input::get('tracks'))
            );

            //var_dump($album);

            //add artist to artists table if doesn't exist, get artist ID
            $artist = DB::table('artists')->where('artist_name', $input['artist'])->first();


            if (!is_null($artist)) {
                $artist_id = $artist->id;
            }

            else {
                $artist_id = DB::table('artists')->insertGetId(
                    array('artist_name' => $input['artist'])
                );
            }

            //add album to albums table if doesn't already exist
            $album = DB::table('albums')
                ->where('album_name', $input['album'])
                ->where('artistid', $artist_id)
                ->first();

            if (!is_null($album)) {
                return Redirect::to('add-album/manual')
                    ->with('error', 'Error, this album already exists.')
                    ->withInput();
            }

            else {
                $album_id = DB::table('albums')->insertGetId(
                    array(
                        'artistid' => $artist_id,
                        'album_name' => $input['album'],
                        'release_date' => $input['release_date'],
                        'genreid' => $input['genre']
                    )
                );

                foreach ($input['tracks'] as $num => $track) {
                    //add each track to tracks table (increment num by 1)
                    if ($track !== ''){
                    DB::table('tracks')->insert(
                        array(
                            'album_id' => $album_id,
                            'track_name' => $track,
                            'track_num' => $num+1,
                        )
                    );
                    }
                }

                return Redirect::to('add-album/manual')
                    ->with('success', 'Success, album added!');

            }



        }

    }
}