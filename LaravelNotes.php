<?php

first install composer

// HOW TO CREATE LARAVEL PROJECT // 
# type this in the terminal
composer create-project laravel/laravel example-app 
# example-app is the name of your applicaiton
cd example-app 
# change directory to your application
php artisan serve
# serve the project in localhost and now you can view it in the browser


// FIRST CONFIGURE .ENV FILE FOR DATABASE CONNECTION //
run xampp and create a database for .env file


// HOW TO CREATE AN API ROUTE //
go to routes and api.php file
sample of route 
Route::post('register', [AuthController::class, 'register']);
# this a post request route and inside register is the name of the route or url
# remember that the url will be api/register when you access it
# AuthController is the name of the controller and the second register is the function or method to call
# inside AuthController and also don't forget to import the controller
# use App\Http\Controllers\AuthController;
Route::apiResource('users', UserController::class);
# combine the Routes request(get,post,put,delete)
# to get,post,put and delete you must specifiy what request you want to make in the route or API
Route::get('products/search/{name}', [ProductController::class, 'search']);
# to search something in the database

// HOW TO CREATE A CONTROLLER //
php artisan make:controller AuthController
# run this in the command line
# AuthController is the name of your controller
# location in app/Http/Controllers
php artisan make:controller UserController --api
# command to create a controller with index, store, show, update, destroy
# index is for getting all the users uses the Route::get
# store is for creating a user uses the Route::post
# show is for showing a single user uses the Route::get
# update is for updating the user uses the Route::put
# destory is for deleting the user uses the Route::delete

// HOW TO CREATE A FUNCTION OR METHOD INSIDE THE CONTROLLER //
public function register(RegisterRequest $request) 
    {
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 1
        ]);
        return response(new UserResource($user), Response::HTTP_CREATED);
    }
# parameter ReqisterRequest is a custom request to check the data we get
# parameter $request is the data we get when we call the the method register
# User::create is the name of the model and create is the function to call located in app/Models
# first_name = $request is the data we get from first_name input field
# Hash::make to encrypt the password
# return response is a built in function to return a response or data
# return the $user and a response of HTTP CREATED which is 201
# we also need to import
# use App\Models\User; 
# use Illuminate\Support\Facades\Hash;
# use Symfony\Component\HttpFoundation\Response;
# use App\Http\Requests\RegisterRequest;


// HOW TO TEST THE API ROUTE IN POSTMAN //
go to the app url for example
localhost:8000/api/register
and add the data we need to pass in the Body and form-data in postman


// HOW TO MAKE A CUSTOM REQUEST //
why do we need a custom request
so we can validate the data that has been passed or check if it has value
php artisan make:request RegisterRequest
# type in the command line and Register Request is the name
# location in app/Http/Requests
class RegisterRequest extends FormRequest
{   public function authorize()
    { return true; }
    public function rules()
    {   return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]; } }
# change authorize to true so the user is authorize to make the request
# type the input fields in the rules and validate the data


// POSTMAN REPLIED WITH A PAGE AND NO ERROR //
in the Headers add X-Requested-With and value XMLHttpRequest


// LARAVEL SANCTUM //
# manage the api tokens and authentication
https://laravel.com/docs/8.x/sanctum
# website link
composer require laravel/sanctum
# run 
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
# creates a migration file, create_personal_tokens_table
php artisan migrate
# create the table on the database
app/Http/Kernel.php
# go to this file 
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
# and in the protected $middlewareGroups replace 'api' with
Laravel\Sanctum\HasApiTokens
# add this in the Models/User.
import use Laravel\Sanctum\HasApiTokens;
# add this in the namespace
use HasApiTokens, HasFactory, Notifiable;
# add this in class User extends Authenticatable 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
});
# and add this in the routes/api.php


// LARAVEL IDE HELPER //
composer require --dev barryvdh/laravel-ide-helper
php artisan ide-helper:generate
php artisan ide-helper:models


// HOW TO GET ALL THE USERS //
public function index() { return User::all() }
public function index() { return User::paginate(50) }
# for paginating the result
# the first argument is how many data should be return
public function index() { return UserResource::collection(User::with('role')->paginate()); }
# using the UserResource to control what would be return


// HOW TO CREATE A USER //
public function store(Request $request) { $user = User::create($request->only('first_name', 'last_name', 'email')); return response($user, Response::HTTP_CREATED); }
public function store(UserCreateRequest $request) { $user = User::create($request->only('first_name', 'last_name', 'email')); return response(new UserResource($user), Response::HTTP_CREATED); }
# using the UserResource to control what would be return


// HOW TO SHOW A USER //
public function show($id) { return User::find($id); }
# show only the data from users table
public function show($id) { return User::with('role')->find($id); }
# to also show the data from roles table
public function show($id) { return new UserResource(User::find($id)) }
# using the UserResource to control what would be return


// HOW TO UPDATE A USER // 
public function update(Request $request, $id) { $user = User::find($id); $user->update($request->only('first_name')); 
    return \response($user, Response::HTTP_ACCEPTED); }
# only update the first_name
public function update(Request $request, $id) { $user = User::find($id); $user->update($request->all()); 
    return \response($user, Response::HTTP_ACCEPTED); 
# update all 


// HOW TO DELETE A USER //
public function destroy($id) { User::destroy($id); return response(null, Response::HTTP_NO_CONTENT); }


// HOW TO LOGOUT A USER //
public function logout(Request $request) { auth()->user()->tokens()->delete(); return response(['message' => 'success']); }


// HOW TO SEARCH A USER //
public function search($name) { return Product::where('name', 'like', '%'.$name.'%')->get(); }



// HOW TO ADD MIGRATION OR ADD A DATABASE TABLE //
php artisan make:migration create_roles_table
# run on the command line and the last string is the name of the migration
public function up() { Schema::create('roles', function (Blueprint $table) { 
    $table->id(); 
    $table->string('name'); }); 
}
# file path is database/migrations
# roles will be the name of the table in the database
# the $table is the column to create on the database and id is the name of the column
php artisan migrate
# run on the command line and create the tables in the database


// HOW TO CREATE A MODEL //
php artisan make:model Role
# run on the command line and the last string is the name of the model
php artisan make:model Role -m
# flag -m to auto create a migration table for database
php artisan ide:models
# recommended to use

// ANATOMY OF MODEL //
use HasFactory;
# pre defined
protected $table = 'tx_shop_domain_model_order_payment';
# add the name of the table where you want to insert the data
protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'password'
];
# add the name of the rows of the table to be fillable or so that you can insert data on to it


// HOW TO ADD FOREIGN KEYS //
# why do we add foreign keys? it is to connect a table with other table
# ei. a user has a role, to connect the user table to role table we need a foreign key or an identifier
# foreign key is the id or data that helps identify the data in the role table belongs to the user 
php artisan make:migration add_role_id_to_users_table
# naming in laravel is important
public function up() { Schema::table('users', function (Blueprint $table) { 
    $table->unsignedBigInteger('role_id'); 
    $table->foreign('role_id')->references('id')->on('roles'); });
}


// HOW TO CONNECT THE FOREIGN KEYS // 
public function role() { return $this->belongsTo(Role::class); }
# filepath models/User.php
public function users() { return $this->hasMany(User::class); }
# filepath models/Role.php


// HOW TO MAKE RESOURCE //
# why use resource? resource is for controlling the data to be return 
# or what you just want the data to be return
# ei. you just like to return the first_name
php artisan make:resource UserResource
# filepath app/Http/Resources
public function toArray($request) {
    return [
        'id' => $this->id,
        'first_name' => $this->first_name,
        'last_name' => $this->last_name,
        'email' => $this->email,
        'role' => new RoleResource($this->whenLoaded('role')),
]; }


// HOW TO REMOVE THE WORD DATA IN RESPONSE WHEN MAKING API REQUEST //
public function boot() { JsonResource::withoutWrapping(); }
# filepath Providers/AppServiceProvider.php


// HOW TO MAKE SEEDERS //

# run in the command line 





















