<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
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
    return view('pages.runServer');
});


Route::get('/index', function(){
	return view('pages.index');
});


Route::get('/history',function(){
	
	$pageController = new PageController();
	
	if($pageController->isSessionExist())
		return view('pages.history');
	else
		return view('pages.login');
});

Route::get('/runServer',function(){
	
	return view('pages.runServer');
	
});


Route::get('/setServer', function(Request $request){
	
	$selection = $request->get('server');
	
	$pageController = new PageController();
	
	$pageController->setServer($selection);

	return redirect("/login");
});


Route::get('/main',function(){
	$pageController = new PageController();
	
	if($pageController->isSessionExist())
		return view('pages.main');
	else
		return redirect('/login');
});


Route::get('/logout',function(){
	$pageController = new PageController();
	
	$pageController->deleteSession();
	
	return redirect('/login');
});


Route::post('/login/isValid',[PageController::class,'isLoginValid']);

Route::post('/login/update',[PageController::class,'updateLogin']);

Route::post("/journal/post",[PageController::class,'submitFormData']);

Route::get("/journal",[PageController::class,'getTableData']);

Route::post("/journal/delete",[PageController::class,"deleteTableData"]);

Route::get('/login',function(){
	
	$pageController = new PageController();
	
	if(!$pageController->isServerSessionExist() && !$pageController->isSessionExist()){
		return redirect('/runServer');
	}
	else{
		//echo "server : ".$pageController->getServer();
		
		return view('pages.login',[
								   'serverSession'=> $pageController->getServer()
								 ]);
	}						 
});


Route::get('/setSession/{accessId}',function($accessId){
	
	$pageController = new PageController();
	
	$pageController->setSession($accessId);
	
	//echo $accessId;
	
	//echo var_dump($pageController->getSession());
	//echo var_dump($pageController->getSession());
	
	return redirect('/main');
});