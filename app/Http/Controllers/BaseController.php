<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function route(Request $request, $action){
        /*
        * Check if the action exists
        */
        $class_action = 'App\\Actions\\'.ucfirst($action).'Action';
        if (!class_exists( $class_action ))
        {
            return 'Class '. ucfirst($action) .' Not Found 404.';
        }
       return (new $class_action())->render();

    }
}
