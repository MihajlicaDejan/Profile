<?php



Route::get('/test', function(){
    return App\User::find(1)->profile;
});





Route::post('/subscribe', function(){
   $email = request('email');
    Newsletter::subscribe($email);

    Session::flash('subscribed', 'Successfully subscribed');

    return redirect()->back();
});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'   => 'index'
]);

Route::get('/results', function(){
   $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();

    return view('results')->with('posts', $posts)
        ->with('title', 'Search results: '. request('query'))
        ->with('settings', \App\Setting::first())
        ->with('categories', \App\Category::take(5)->get())
        ->with('query', request('query'));

});


Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' =>'single.post'
]);

Route::get('/category/{id}', [
   'uses'=> 'FrontEndController@category',
    'as' => 'single.category'
]);

Route::get('/tag/{id}', [
   'uses' =>'FrontEndController@tag',
    'as' => 'single.tag'
]);

Auth::routes();



Route::group(['prefix'=> 'admin', 'middleware' => 'auth'], function(){

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as'=>'dashboard'
    ]);

            //POST//
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as'   => 'posts'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as'   => 'posts.trashed'
    ]);

    Route::get('/kill/post/{id}', [
        'uses' => 'PostsController@kill',
        'as'   => 'kill.post'
    ]);

    Route::get('/restore/post/{id}', [
        'uses' => 'PostsController@restore',
        'as'   => 'restore.post'
    ]);

    Route::get('/edit/post/{id}', [
        'uses' => 'PostsController@edit',
        'as'   => 'edit.post'
    ]);

    Route::post('/update/post/{id}', [
        'uses' => 'PostsController@update',
        'as'   => 'update.post'
    ]);

    Route::get('/delete/post/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'delete.post'
    ]);




                //CATEGORY//
    Route::get('/category', [
        'uses' => 'CategoriesController@index',
        'as' => 'category'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/edit/category/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'edit.category'
    ]);

    Route::get('/delete/category/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'delete.category'
    ]);

    Route::post('/update/category/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'update.category'
    ]);

                //TAGS//
    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/create/tag', [
        'uses' => 'TagsController@create',
        'as' => 'create.tag'
    ]);

    Route::post('/store/tag', [
        'uses' => 'TagsController@store',
        'as' => 'store.tag'
    ]);

    Route::get('/edit/tag/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'edit.tag'
    ]);

    Route::get('/delete/tag/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'delete.tag'
    ]);

    Route::post('/update/tag/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'update.tag'
    ]);
                //USERS//
    Route::get('/user', [
       'uses' => 'UsersController@index',
        'as' =>'users'
    ]);
    Route::get('/create/user', [
        'uses' => 'UsersController@create',
        'as' =>'create.user'
    ]);
    Route::post('/store/user', [
        'uses' => 'UsersController@store',
        'as' =>'store.user'
    ]);

    Route::get('/admin/user/{id}', [
        'uses' => 'UsersController@admin',
        'as' =>'admin.user'
    ]);

    Route::get('/author/user/{id}', [
        'uses' => 'UsersController@author',
        'as' =>'author.user'
    ]);
    Route::get('/delete/user/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'delete.user'
    ]);

                //PROFILE//
    Route::get('/profile/user', [
        'uses' => 'ProfilesController@index',
        'as' =>'profile.user'
    ]);
    Route::post('/profile/user/update', [
        'uses' => 'ProfilesController@update',
        'as' =>'profile.user.update'
    ]);

            //SITE SETTINGS//
    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' =>'settings'
    ]);

    Route::post('/update/settings', [
        'uses' => 'SettingsController@update',
        'as' =>'update.settings'
    ]);

});


