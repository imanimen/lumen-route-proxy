<?php

namespace App\Manners;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class JwtRemoteManner
{
    public function check(Request $request)
    {
        $url = env('AUTH_URL').'/check';
        $token = $request->header('Authorization');
        
        if (Cache::get('user_token_'.$token) != null) 
        {
            $request->request->add( [ 'user' => Cache::get( 'user_token_info_'. $token ) ] ); 
            return true;
        }
        $response = Http::withHeaders(
            [
                'Authorization' => $token
            ]
        )->get($url);
        $code     = $response->status();
        if ($code == 200)
        {
            Cache::set('user_token_'. $token, $response);
            return true;
        }
        else 
        {
            return false;
        }
    }
}