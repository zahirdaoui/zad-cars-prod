<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\sdashboard\CarsController;



Route::get('/','CarsShowController@index');

    Route::get('index','CarsShowController@index')->name('index');
    Route::get('all-cars','CarsShowController@allcars')->name('all-cars');
    Route::get('show/{id}','CarsShowController@show')->name('show');
    Route::get('about-us','CarsShowController@AboutUs')->name('about-us');
     Route::get('contact','CarsShowController@contact')->name('contact');
      Route::post('contact','CarsShowController@contact')->name('contact');
     Route::post('sendemail','CarsShowController@sendEmail')->name('sendemail');
     
     Route::get('conditions','CarsShowController@conditions')->name('conditions');

     


/* admin panels */


Route::group(['prefix' => 'admin','middleware' => ['auth','role:admin']], function() {
        /* Route::get('/', function () {
            return view('dashboard.index');
        })->name('admin.index'); */
        Route::get('/', 'dashboard\AdminController@index')->name('admin.index');
        Route::get('index', 'dashboard\AdminController@index')->name('index');
        Route::get('add', 'dashboard\AdminController@create')->name('admin.add');
        Route::get('edit/{id}', 'dashboard\AdminController@edit')->name('admin.edit');
        Route::post('update/{id}', 'dashboard\AdminController@update')->name('admin.update');

        Route::post('add', 'dashboard\AdminController@store');
        Route::get('cars', 'dashboard\AdminController@show')->name('admin.cars');
        Route::put('softDelete/{id}', 'dashboard\AdminController@softDelete')->name('admin.softDelete');
        Route::put('destroy/{id}', 'dashboard\AdminController@destroy')->name('admin.destroy-cars');
        Route::put('BackFromsoftDelete/{id}', 'dashboard\AdminController@BackFromsoftDelete')->name('admin.restore');
        Route::get('deleted-cars', 'dashboard\AdminController@deletedCars')->name('admin.deletedcars');

        /* delete images */
        Route::put('destroyimagescars/{id}', 'dashboard\AdminController@destroyimagescars')->name('admin.cars_img.delete');
        Route::put('destroyimagecover/{id}', 'dashboard\AdminController@destroyimagecover')->name('admin.cars_cover.delete');

        Route::get('account-admin/{id}', 'dashboard\UsersController@edit')->name('admin.acount.admin');
        Route::get('myaccount', 'dashboard\UsersController@myaccount')->name('admin.acount.myaccount');
        Route::get('users-admins', 'dashboard\UsersController@index')->name('admin.acount.users.admins');

        Route::put('update-user/{id}', 'dashboard\UsersController@update')->name('admin.update-admins');

        Route::put('updatemyaccount', 'dashboard\UsersController@updatemyaccount')->name('admin.updatemyaccount');

       Route::put('editRols/{id}', 'dashboard\UsersController@editRole')->name('admin.rols.user');
       Route::put('deleteUser/{id}', 'dashboard\UsersController@deleteUser')->name('admin.delete.user');
       Route::put('deleteAdmins/{id}', 'dashboard\UsersController@deleteAdmins')->name('admin.delete.admin');

});

Route::group(['prefix' => 'admin','middleware' => ['auth','role:user']], function() {
    Route::get('notadmin', function () {
        return view('notadmin');
    });
});



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('dashboard.index');
});*/
/* Route::get('/', function () {
    return view('user.index');
});
Route::get('/contactus', function () {
    return view('user.contactus');
});

Route::get('/index', function () {
    return view('user.index');
});

Route::get('/menucars', function () {
    return view('user.menucars');
});
Route::get('/dash', function () {
    return view('layouts.dashboard');
}); */

/*
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
}); */



/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

/* Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'CarsController@welcome');

}); */
/* user front */






/* Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::group(['middleware' => ['role:admin']], function() {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('admin.index');
        Route::get('index', 'dashboard\AdminController@index')->name('index');
        Route::get('add', 'dashboard\AdminController@create')->name('admin.add');
        Route::get('edit/{id}', 'dashboard\AdminController@edit')->name('admin.edit');
        Route::get('cars', 'dashboard\AdminController@show')->name('admin.cars');
        Route::get('deleted-cars', 'dashboard\AdminController@deletedCars')->name('admin.deletedcars');

        Route::get('account-admin', 'dashboard\UsersController@edit')->name('admin.acount.admin');
        Route::get('myaccount', 'dashboard\UsersController@myaccount')->name('admin.acount.myaccount');
        Route::get('users-admins', 'dashboard\UsersController@index')->name('admin.acount.users.admins');

    });


}); */

/* Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('admin.index');
    Route::get('index', 'dashboard\AdminController@index')->name('index');
    Route::get('add', 'dashboard\AdminController@create')->name('admin.add');
    Route::get('edit/{id}', 'dashboard\AdminController@edit')->name('admin.edit');
    Route::get('cars', 'dashboard\AdminController@show')->name('admin.cars');
    Route::get('deleted-cars', 'dashboard\AdminController@deletedCars')->name('admin.deletedcars');

    Route::get('account-admin', 'dashboard\UsersController@edit')->name('admin.acount.admin');
    Route::get('myaccount', 'dashboard\UsersController@myaccount')->name('admin.acount.myaccount');
    Route::get('users-admins', 'dashboard\UsersController@index')->name('admin.acount.users.admins');

}); */








/*   Route::group(['prefix' => 'admin','middleware' => 'auth', 'middleware' => ['role:admin']], function() {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('admin.index');
    Route::get('index', 'dashboard\AdminController@index')->name('index');
    Route::get('add', 'dashboard\AdminController@create')->name('admin.add');
    Route::get('edit/{id}', 'dashboard\AdminController@edit')->name('admin.edit');
    Route::get('cars', 'dashboard\AdminController@show')->name('admin.cars');
    Route::get('deleted-cars', 'dashboard\AdminController@deletedCars')->name('admin.deletedcars');

    Route::get('account-admin', 'dashboard\UsersController@edit')->name('admin.acount.admin');
    Route::get('myaccount', 'dashboard\UsersController@myaccount')->name('admin.acount.myaccount');
    Route::get('users-admins', 'dashboard\UsersController@index')->name('admin.acount.users.admins');

}); */
/* Route::group(['prefix' => 'admin'], function() {
    Route::get('/admin', function () {
        return view('notadmin');
    });
}); */

/* Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'AdminController@welcome');
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});
 */

/* Route::middleware(['auth'])}; */



require __DIR__.'/auth.php';
