<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function showLogin()
    {
        // show the form
        //return View::make('dashboard');
        return Redirect::to('dashboard');
    }

    public function doAddUser()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username'    => 'required',
            'email'        => 'required|email',
            'password1' => 'required|alphaNum|min:3',
            'password2' => 'required|same:password1'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('add-user')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password1', 'password2'));
        }

        else {

            DB::table('users')->insert(
                array('username' 	=> Input::get('username'),
                    'email' 	=> Input::get('email'),
                    'password' => Hash::make(Input::get('password1')))
            );

            return Redirect::to('add-user')
                ->with('success', 'Success, new user added!');
        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('dashboard'); // redirect the user to the login screen
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username'    => 'required', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
//            return Redirect::to('login')
//                ->withErrors($validator) // send back all errors to the login form
//                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            return Redirect::to('dashboard');
        }

        else {

            // create our user data for the authentication
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return Redirect::to('dashboard');

            } else {

                // validation not successful, send back to form
                //return Redirect::to('login');

            }

        }
    }

}