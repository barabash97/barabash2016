<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::auth();
//Route::pattern("id", "[0-9]+");
/* Filtrare alcuni paramenti con Espressioni regolari */
Route::pattern("username", "^[a-z0-9_-]$");

/* Home page routes */
Route::get('/', 'HomeController@index'); 
Route::get('/home', 'HomeController@index');

/* Blog routing */

Route::get('/blogs', ['as' => 'all_blogs', 'uses' => 'Blog\ViewBlogController@viewAllBlogs']);
Route::resource('/addblog', 'Blog\AddBlogController', ['only' => ['index', 'store'], 'as' => 'addblog']); //Add new Blog
Route::get('/blog/{id}', ['as' => 'view_blog', 'uses' => 'Blog\ViewBlogController@index']); //Visualizzare blog
Route::resource('/edit_blog/{id}','Blog\EditBlogController', ['as' => 'edit_blog', 'only' => ['store', 'index']]); //Modificare blog
Route::get('/user_blogs/{id}', ['as' => 'user_blogs', 'uses' => 'Blog\ViewBlogController@getUserBlogs']); //Visualizzare tutti i blog del determinato utente
Route::get('blog/{id}/edit_image', ['as' => 'view_edit_image_blog', 'uses' => 'Blog\EditBlogController@viewEditImage']);
Route::post('blog/{id}/edit_image', ['as' => 'edit_image_blog', 'uses' => 'Blog\EditBlogController@editImage']);


/* Articles */
Route::resource('/blog/{id}/add_article', 'Article\AddArticleBlogController', ['only' => ['index', 'store'], 'as' => 'add_article']); // Pubblicare un nuovo articolo
Route::resource('/edit_article/{id}', 'Article\EditArticleBlogController', [ 'as' => 'edit_article', 'only' => ['index', 'store']]); // Modificare articolo
Route::get('/article/{id}/delete', ['as' => 'delete_article', 'uses' => 'Article\ViewArticleController@delete']);
Route::get('/article/{id}', ['as' => 'view_article', 'uses' => 'Article\ViewArticleController@index']); //Visualizzare articolo
Route::get('article/{id}/edit_image', ['as' => 'view_edit_image_article', 'uses' => 'Article\EditArticleBlogController@viewEditImage']);
Route::post('article/{id}/edit_image', ['as' => 'edit_image_article', 'uses' => 'Article\EditArticleBlogController@editImage']);

/* Chat routes */
Route::get('im/{id}', ['as' => 'chat', 'uses' => 'Chat\ChatController@index']); //Visualizza la chat di un determinato dialogo
Route::get('/im/{id}/sendMessage', ['as' => 'send_message', 'uses' => 'Chat\ChatController@sendMessage']); //Webservice per inviare i messaggi
Route::get('im/{id}/receiveMessage', ['as' => 'receive_message', 'uses' => 'Chat\ChatController@receiveMessage']); //Webservice per ricevere un'array di messaggi di una determinata chat

/* Users */

Route::get('/users', ['as' => 'view_users', 'uses' => 'User\ListUserController@index']); //Lista utenti
Route::get('/user/{id?}', ['as' => 'view_user', 'uses' => 'User\UserController@index']); //Visualizzare il profilo di un utente

/* Gravatar */

Route::get('/user/{id}/gravatar', ['as' => 'view_edit_gravatar', 'uses' => 'User\UserController@viewEditGravatar']);
Route::post('/user/{id}/gravatar', ['as' => 'edit_gravatar', 'uses' => 'User\UserController@editGravatar']);

/* Commenti */

Route::get('/article/{id}/saveComment', ['as' => 'saveComment', 'uses' => 'Article\CommentArticleController@saveComment']); //WEbservice per salvare i commenti 
Route::get('/article/{id}/getComments', ['as' => 'getComments', 'uses' => 'Article\CommentArticleController@getComments']); //Webservice che restituisce json come un'array di commenti


/* Route singoli */

Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@result']);
Route::post('subscribe', ['as' => 'subscribe', 'uses' => 'SubscribeController@save']);
Route::get('/dialogs', ['as' => 'dialogs', 'uses' => 'Chat\ChatController@viewDialogs']);

/* Routes di prova*/

Route::get('/provafile', 'ProvaFileController@index');
Route::post('/savefile', 'ProvaFileController@save');
