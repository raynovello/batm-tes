<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', function (Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $api_token = Str::random(60);

    $data = new \App\User();
    $data->name = $name;
    $data->email = $email;
    $data->password = Hash::make($password);
    $data->api_token = $api_token;

    if ($data->save()){
        return response()->json([
            'message' => 'Success!',
            'code' => 200,
        ]);
    } 

    return response()->json([
        'message' => 'Unauthenticated user',
        'code' => 401,
    ]);
});

Route::post('/login', function (Request $request) {
    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        $user = auth()->user();
        $user->api_token = str_random(60);
        $user->save();

    	return response()->json([
    		'message' => 'Success!',
	        'code' => 200,
	        'data' => $user,
	    ]);
    } 
    
    return response()->json([
        'message' => 'Unauthenticated user',
        'code' => 401,
    ]);
});

Route::middleware('auth:api')->post('/logout', function (Request $request) {
    return response()->json([
        'message' => 'Thank you for using our application',
        'code' => 200,
    ]);
});

// CRUD API Customer
Route::middleware('auth:api')->get('/customer','CustomerController@index');
Route::middleware('auth:api')->get('/customer/{id}','CustomerController@show');
Route::middleware('auth:api')->post('/customer/store','CustomerController@store');
Route::middleware('auth:api')->post('/customer/update/{id}','CustomerController@update');
Route::middleware('auth:api')->post('/customer/delete/{id}','CustomerController@destroy');

// CRUD API Final Customer
Route::middleware('auth:api')->get('/final_customer','FinalCustomerController@index');
Route::middleware('auth:api')->get('/final_customer/{id}','FinalCustomerController@show');