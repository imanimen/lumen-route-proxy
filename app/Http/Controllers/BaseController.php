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
            return $this->fail([], 'not found', 404);
        }
        $class = (new $class_action());
        if ($class->method() !== $request->method())
        {
            return $this->fail([],'invalid method',$code=405);
        }
        $validaton = Validator::make($request->all(), $class->validation());
        if ($validaton->fails())
        {
            return $this->fail($message=$validaton->errors());
        }
        return $class->render();
    }

    public function success($data=[], $code=200)
    {
        return $this->render($data, $code);
    }


    public function fail($message='fail', $errors='error', $code=422)
    {
        return $this->render($message, $errors, $code);
    }

    public function render( $errors='error', $message='fail',int $code = 200)
    {
        return response()->make([
            'data' => null,
            'errors' => $errors,
            'messages' => $message,
            'code' => $code,
        ])->setStatusCode($code);

    }

}
