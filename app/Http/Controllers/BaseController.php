<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function route(Request $request, $action){
        // call the action
        $class_action = base_path() . '../../../Actions/' . ucfirst($action) .'Action.php';
        if (!$class_action)
        {
            return null;
        }
        return $action;
    }
}
