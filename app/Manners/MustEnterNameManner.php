<?php

namespace App\Manners;

use Illuminate\Http\Request;

class MustEnterNameManner	

{
    public function check(Request $request)
    {
        if ($request->get('name1'))
        {
            return true;
        }
    }

}