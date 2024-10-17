<?php
//create by Zakiah Zulkefli, Oct 2024
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
		Session::forget("isAllowAccess");
	}
	
	function isSessionExist(){
		if(Session::has("isAllowAccess")){
			return true;
		}
		else{
			return false;
		}
	}
}
