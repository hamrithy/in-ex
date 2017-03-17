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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Auth::routes();
Route::get('/logout','DashboardController@logout');

Route::group(['middleware'=>'auth','prefix'=>'dashboard'],function(){
	Route::get('/','DashboardController@dashboard');
	Route::get('/users','DashboardController@users');

	/*ADMIN MIDDLEWARE*/
	Route::group(['middleware'=>'admin'],function(){
		/*Currency Route Group*/
		Route::group(['prefix'=>'currencies'],function(){
			Route::get('/','DashboardController@currencies');
			Route::get('/add','CurrencyController@showAddCurrencyForm');
			Route::post('/add','CurrencyController@add_currency');
			Route::get('/edit/{id}','CurrencyController@showEditCurrencyForm');
			Route::post('/edit/{id}','CurrencyController@edit_currency');
			Route::get('/delete/{id}','CurrencyController@delete_currency');
		});

		/*Expenes Type Route Group*/
		Route::group(['prefix'=>'expenes-types'],function(){
			Route::get('/','DashboardController@expenes_types');
			Route::get('/add','ExpenesTypeController@showAddExpenesTypeForm');
			Route::post('/add','ExpenesTypeController@add_expenes_type');
			Route::get('/edit/{id}','ExpenesTypeController@showEditExpenesTypeForm');
			Route::post('/edit/{id}','ExpenesTypeController@edit_expenes_type');
			Route::get('/delete/{id}','ExpenesTypeController@delete_expenes_type');
		});

		/*Revenue Type Route Group*/
		Route::group(['prefix'=>'revenue-types'],function(){
			Route::get('/','DashboardController@revenue_types');
			Route::get('/add','RevenueTypeController@showAddRevenueTypeForm');
			Route::post('/add','RevenueTypeController@add_revenue_type');
			Route::get('/edit/{id}','RevenueTypeController@showEditRevenueTypeForm');
			Route::post('/edit/{id}','RevenueTypeController@edit_revenue_type');
			Route::get('/delete/{id}','RevenueTypeController@delete_revenue_type');
		});
	});

	/*Revenue Route Group*/
	Route::group(['prefix'=>'revenues'],function(){
		Route::get('/','DashboardController@revenues');
		Route::get('/add','RevenueController@showAddRevenueForm');
		Route::post('/add','RevenueController@add_revenue');
		Route::get('/edit/{id}','RevenueController@showEditRevenueForm');
		Route::post('/edit/{id}','RevenueController@edit_revenue');
		Route::group(['middleware'=>'admin','prefix'=>'dashboard'],function(){
			Route::get('/delete/{id}','RevenueController@delete_revenue');
		});
	});

	/*Expenes Route Group*/
	Route::group(['prefix'=>'expenes'],function(){
		Route::get('/','DashboardController@expenes');
		Route::get('/add','ExpenesController@showAddExpenesForm');
		Route::post('/add','ExpenesController@add_expenes');
		Route::get('/edit/{id}','ExpenesController@showEditExpenesForm');
		Route::post('/edit/{id}','ExpenesController@edit_expenes');
		Route::group(['middleware'=>'admin'],function(){
			Route::get('/delete/{id}','ExpenesController@delete_expenes');
		});
	});

	/*Statement Route Group*/
	Route::group(['prefix'=>'statements'],function(){
		Route::get('/','StatementController@showAddStatementForm');
		Route::get('/getStatement/{from}/{to}','StatementController@getStatement');
		Route::post('/add','StatementController@add_statement');
	});
});
