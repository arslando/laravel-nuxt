<?php

namespace App\Http\Controllers;

use App;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function autoSearch(Request $request, $keyword)
    {
        $result = [];
        $item['is_region'] = 0;
        $item['city'] = 'Aalborg';
        $item['zipcode'] = '9999';
        $result[] = $item;

        $item['is_region'] = 0;
        $item['city'] = 'Aarhus';
        $item['zipcode'] = '3400';
        $result[] = $item;

        return response()->json($result);

    }
}