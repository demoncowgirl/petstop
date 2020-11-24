<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routes for pages
Route::get('/home', 'PagesController@getHome');
Route::get('loginSuccessful', 'PagesController@getLoginSuccessful');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::get('profile', 'PagesController@getProfile');
Route::get('petSearch', 'PagesController@getPetSearch');
Route::get('vetServices', 'PagesController@getVetServices');
Route::get('kennels', 'PagesController@getKennels');
Route::get('groomers', 'PagesController@getGroomers');
Route::get('petSupplies', 'PagesController@getPetSupplies');
Route::get('serviceSearch', 'PagesController@getPetServices');
Route::get('elliesList', 'PagesController@getList');
Route::get('loveOurPets', 'PagesController@getLove');
Route::get('messages', 'PagesController@getMessages');
Route::get('users', 'PagesController@getUsers');
Route::get('search', 'SearchController@getSearchResults');
Route::get('/blog', 'PagesController@getBlog');

// Route::get('/{id}', function ($id){
//   return view('id',{'id'=> $id});
// });
Route::get('messages/{id}', 'MessagesController@index');
Route::post('/contact', 'MessagesController@submit');
Route::post('messages/{messages}', 'RetrieveMsMsgsController@update');
Route::post('/inputMessages', 'MessagesController@inputMessages');
// Route::post('/profile', 'ProfileRequest@submit');

//Routes for posts
Route::resource('/posts', 'PostController');
Route::post('/posts/store', 'PostController@store')->name('posts.store');
Route::post('/posts/create', 'PostController@create');
Route::get('posts/{id}/show', 'PostController@show');
Route::get('posts/{id}/edit', 'PostController@edit');
Route::get('posts/{id}', 'PostController@destroy');
Route::put('posts/{id}', 'PostController@update');
//Routes for comments associated to $posts
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
Route::get('users/{id}/show', 'Auth\RegisterController@show')->name('user.show');
Route::get('blog', function(){
  $posts = DB::table('posts')
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();
  return view('blog', ['posts'=>$posts]);
});
Route::get('/single/{slug}')->name('blog.single')->uses('BlogController@getSingle');
// ->where("/^[a-zA-Z0-9-_]+$/");




Auth::routes();
Route::get('/', function(){
  return view ('home');
});
