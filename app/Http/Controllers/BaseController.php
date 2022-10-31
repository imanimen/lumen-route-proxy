<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    public function route(Request $request, $action){
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
        $validaton = Validator::make($request->all(), $class->validation());
        if ($validaton->fails())
        {
            return $validaton->errors();
        }
        return $class->render();
    }
}
