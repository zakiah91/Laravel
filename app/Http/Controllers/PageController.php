<?php
//create by Zakiah Zulkefli, Oct 2024
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PageController extends Controller{
	
	function __construct(){
		
	}
	
	
	function setSession(){
		Session::put("isAllowAccess","OK");
	}
	
	
	function getSession(){
		return Session::get("isAllowAccess");
	}
	
	
	function deleteSession(){
		//Session::forget("isAllowAccess");
		Session::flush();
	}
	
	function isSessionExist(){
		if(Session::has("isAllowAccess")){
			return true;
		}
		else{
			return false;
		}
	}
	
	function setServer($selectedValue){
		Session::put('webSettings.runServer',$selectedValue);
	}
	
	function getServer(){
		return Session::get('webSettings.runServer');
	}
	
	function isServerSessionExist(){
		return (Session::has('webSettings.runServer')) ?  true : false;
	}
	
	function isLoginValid(Request $request){
		
		$tableName = "login";
		
		$db = DB::table($tableName)
				->where("password",$request->post("password"))
				->get();
				
		if(sizeof(json_decode(json_encode($db,true))) == 0)
			return false;
		else
			return true;
		
	}
	
	function updateLogin(Request $request){
		$tableName = "login";
		
		$db = DB::table($tableName)
			  ->where("user_id",0)
			  ->update(['password'=>$request->post('password')]);
			  
		return true;
	}
	
	function submitFormData(Request $request){
		
		$tableName = "journal";
		
		$db = DB::table($tableName)
		      -> insert(['local_date' => $request-> post("date"),
			             'content' => $request->post("content")]);
						 
		return true;
		
	}
	
	function getTableData(){
		
		$tableName = "journal";
		
		$db = DB::select("select local_date AS date, content from ".$tableName);
		
		return json_decode(json_encode($db,true));
		
		//return var_dump(json_encode($db));
	}
	
	function deleteTableData(Request $request){
		
		$tableName = "journal";
		
		$db = DB::table($tableName)
			  ->where("local_date","=",$request->post("date"))
			  ->delete();
			  
		return true;
		
	}
	
}
