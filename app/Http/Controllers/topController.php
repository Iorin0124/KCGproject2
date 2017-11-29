<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class topController extends Controller
{
    public function search(Request $request){
		$pref = $request->input('pref',13);
		$stateSele = $request->input('stateSele',0);
		$sort = $request->input('sort',0);
		$choice = 'http://animemap.net/api/table/'.(config('prefUrl.'.$pref)).'.xml';
		$array = simplexml_load_string(file_get_contents($choice));
		$item = $array->response->item;
		
		return view('top',compact('item'));
	}
}
