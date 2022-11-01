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
            return $this->fail([], $validaton->errors(), $validaton->errors()->first(), 422);
        }
        return $this->success([$class->render()]);
    }



    public function success($data=[], $message=[], $errors=[], $code=200)
    {
        return $this->whiteHouse($data, $message, $errors, $code);
    }

    public function fail($data = [], $message=[], $errors=[], $code=422)
    {
        return $this->whiteHouse($data, $message, $errors, $code);
    }

    public function whiteHouse($data=[], $errors=[], $message=[],int $code = 200)
    {
        return response()->make([
            'data' => $data,
            'errors' => $errors,
            'messages' => $message,
            'code' => $code,
        ])->setStatusCode($code);
    }

}
