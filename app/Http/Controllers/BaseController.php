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
            return '404 - action ' .$action. ' not found.';
        }

        $class = (new $class_action());

        if ($class->method() !== $request->method())
        {
            return '405 - invalid method ' .$request->method().'.';
        }

        return $class->render();

    }
}
