<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//Created by: zakiah zulkefli ,16 Oct 2024
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
    return view('welcome');
});


Route::get('/index', function(){
	return view('pages.index');
});


Route::get('/main',function(){
	$pageController = new PageController();
	
	if($pageController->isSessionExist())
		return view('pages.main');
	else
		return view('pages.login');
});


Route::get('/logout',function(){
	$pageController = new PageController();
	
	$pageController->deleteSession();
	
	return view('pages.login');
});


Route::get('/login',function(){
	return view('pages.login');
});


Route::get('/setSession',function(){
	$pageController = new PageController();
	$pageController->setSession();
	
	//echo var_dump($pageController->getSession());
	//echo var_dump($pageController->getSession());
	
	return redirect('/main');
});