<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
abstract class Controller
{
  
     function callback(Request $request){
        
        dd($request->all());


    }
}

