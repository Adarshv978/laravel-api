<?php

namespace App\Http\Controllers;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use App\Models\Packages;

class PackageController extends Controller
{
    public function abc()
    {
        $abc = Packages::all();
        if (!$abc) {
            $res = response()->json(['statuse_code' => '201', 'message' => 'something went wrong'],404);
        } else {
            $res = response()->json(['statuse_code' => '201', 'data' => $abc], 201);
            return $res;
        }

    }
}