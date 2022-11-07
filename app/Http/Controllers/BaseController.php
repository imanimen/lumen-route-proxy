<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    public function route(Request $request, $action)
    {
        $class_action = 'App\\Actions\\'.ucfirst($action).'Action';
        if (!class_exists( $class_action ))
        {
            return $this->responseFacotry([], 'not found', [], 404);
        }
        $class = (new $class_action());
        if ($class->method() !== $request->method())
        {
            return $this->responseFacotry([], 'invalid method', [], 405);
        }
        $validaton = Validator::make($request->all(), $class->validation());
        if ($validaton->fails())
        {
            return $this->responseFacotry([], $validaton->errors(), $this->validationMessages($validaton->errors()), 422);
        }
        return $this->responseFacotry($class->render());
    }


    public function validationMessages( $errors )
    {
        $messages = [];

        foreach ( $errors as $error )
        {
            foreach ( $error as $message )
            {
                $messages[] = $message;
            }
        }

        return $messages;

    }

    public function success($data=[], $message=[], $errors=[], $code=200)
    {
        return $this->responseFacotry($data, $message, $errors, $code);
    }

    public function fail($data = [], $message=[], $errors=[], $code=422)
    {
        return $this->responseFacotry($data, $message, $errors, $code);
    }

    public function responseFacotry($data=[], $errors=[], $message=[],int $code = 200)
    {
        return response()->make([
            'data' => $data,
            'errors' => $errors,
            'messages' => $message,
            'code' => $code,
        ])->setStatusCode($code);
    }

    /* TODO: create main handler method and then try/catch the errors to be more accurate
    *  and beacause we can't use middlewares directly, read from the manners folder. implement it here and in actions. 
    *  May the force be with you!
    */

}
