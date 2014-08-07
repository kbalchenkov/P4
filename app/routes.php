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
			$user->gender    = Input::get('Gender');
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            
			
            # Try to add the user 
            try {
                $user->save();
            }
	
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/loggedin')->with('flash_message', 'Welcome to Hairz!');

        }
    )
);





Route::get('/loggedin',
    //array('before' => 'guest',        
		function() {
		
		$gender = Auth::user()->gender;

		
		if ($gender == 'Womens'){
		
			return Redirect::to('loggedinw');
		}
		else {
		
		
            return Redirect::to ('loggedinm');
			
			
        }
	}
	//	)	
);






Route::get('loggedinm',     

  // array('before' => 'guest',
        function() {
            return View::make('loggedinm');
        }
    //)
);
Route::post('loggedinm', array('before'=>'csrf',function(){
 
 include(app_path().'/views/listofarrays.php');
 
	$checked = Input::all();
 

	$set_items =[];
	foreach ($checked as $name => $item) {
	if (in_array($name,$listofcategories)) {
		if ($item ==1) {
	 array_push($set_items, $name); 
	 }
	} 
	
	
}

 $images=[];


	foreach($set_items as $item) 
	
	{
		
	
	
		if ($item == 'mensshorthair') {
	
		$rand = array_rand($mensshorthair, 1);
		
		array_push($images,$mensshorthair[$rand]);
	}
		if ($item == 'mensmediumlength') {
	
		$rand = array_rand($mensmediumlength, 1);
		
		
		array_push($images,$mensmediumlength[$rand]);
	}
	
	
		if ($item == 'menslonghairstyles') {
	
		$rand = array_rand($menslonghairstyles, 1);
		
		
		array_push($images,$menslonghairstyles[$rand]);
	}
	
		if ($item == 'menscurlyhairstyles') {
	
		$rand = array_rand($menscurlyhairstyles, 1);
		
		
		array_push($images,$menscurlyhairstyles[$rand]);
	}	
		if ($item == 'mensblackandafrohairstyles') {
	
		$rand = array_rand($mensblackandafrohairstyles, 1);
		
		
		array_push($images,$mensblackandafrohairstyles[$rand]);
	}	
	
		if ($item == 'menscelebrityhairstyles') {
	
		$rand = array_rand($menscelebrityhairstyles, 1);
		
		
		array_push($images,$menscelebrityhairstyles[$rand]);
	}	

	
//$cleanedup = array_unique($images);

// echo $mensshorthair[array_rand($mensshorthair)];
 //print_r($images);

	 
	//foreach($images as $image) {
	 
	//echo HTML::image($image); 

	//$history = new history();
	//$history->url_name = $images;
	//$history->user()->associate(Auth::user());
	//$history->save();
	

	
	


//return View::make('/display', array('images' => $images));


	
	 
	//}
	 
	 

 
 
}
return View::make('/display')->with('images', $images);


}));


Route::get('loggedinw',     

  // array('before' => 'guest',
        function() {
            return View::make('loggedinw');
        }
    //)
);
Route::post('loggedinw', array('before'=>'csrf',function(){
 
 
 include(app_path().'/views/listofarrays.php');
 
	$checked = Input::all();
 

	$set_items =[];
	foreach ($checked as $name => $item) {
	if (in_array($name,$listofcategories)) {
		if ($item ==1) {
	 array_push($set_items, $name); 
	 }
	} 
}

	
 
		$images=[];
	foreach($set_items as $item) 
	
	{
		
	
	
	
		if ($item == 'womensshortcurlyhairstyles') {
	
		$rand = array_rand($womensshortcurlyhairstyles, 1);
		
		
		array_push($images,$womensshortcurlyhairstyles[$rand]);
	}
		if ($item == 'womensblackbraidedhairstyles') {
	
		$rand = array_rand($womensblackbraidedhairstyles, 1);
		
		
		array_push($images,$womensblackbraidedhairstyles[$rand]);
	}	
		if ($item == 'womenssummerhairstyles') {
	
		$rand = array_rand($womenssummerhairstyles, 1);
		
		
		array_push($images,$womenssummerhairstyles[$rand]);
	}	
		if ($item == 'womensprofessionalhairstyles') {
	
		$rand = array_rand($womensprofessionalhairstyles, 1);
		
		
		array_push($images,$womensprofessionalhairstyles[$rand]);
	}	
		if ($item == 'womensweddinghairstyles') {

		$rand = array_rand($womensweddinghairstyles, 1);
		
		
		array_push($images,$womensweddinghairstyles[$rand]);
	}	
		if ($item == 'womenslonghairstyles') {
	
		$rand = array_rand($womenslonghairstyles, 1);
		
		
		array_push($images,$womenslonghairstyles[$rand]);
	}
		if ($item == 'womensshorthairstyles') {
	
		$rand = array_rand($womensshorthairstyles, 1);
		
		
		array_push($images,$womensshorthairstyles[$rand]);
	}	
	




 
 
}
return View::make('/display')->with('images', $images);

}



));






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
                return Redirect::intended('/loggedin')->with('flash_message', 'Welcome Back!');
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



Route::get('/migrate-test',function() {
	Artisan::call('migrate');
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