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


Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
     return Paste\Pre::render($results);

	


});



// home page
Route::get('/', function() {

return View::make('index');


}
);




// Sign up Route 

Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
			$user->gender    = Input::get('gender');
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            

            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/logedin')->with('flash_message', 'Welcome to Hairz!');

        }
    )
);



Route::get('/logedin',
    array(
        'before' => 'guest',
	
        function() {
		
		$gender = Input::get('gender');
		
		if ($gender = 'Womens'){
		
		return view::make('logedinm');
		}
		else {
		
		
            return View::make('logediw');
			
			
        }
	}
	)	
);




Route::get('logedinm',     

  // array('before' => 'guest',
        function() {
            return View::make('logedinm');
        }
    //)
);
Route::post('logedinm', array('before'=>'csrf',function(){
 
 
 $checked = Input::all();
 
 
 
  print_r($checked);
 
 
 
}));


Route::get('logedinw',     

  // array('before' => 'guest',
        function() {
            return View::make('logedinw');
        }
    //)
);
Route::post('logedinw', array('before'=>'csrf',function(){
 
 
 $checked = Input::all();
 
 
 
  print_r($checked);
 
 
 
}));






// Log in Page

Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);

Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/logedin')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);


// log out page


Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});





# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});