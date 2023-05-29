<?php

namespace App\Http\Controllers;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use App\Models\Packages;
use Validator;

class PackageController extends Controller
{
    /*
    |-------------------------------------------------------------------------------------
    |       Package Controller
    |-------------------------------------------------------------------------------------
    |       This is a package controller in this controller. I have write the CRUD 
    |       Operation function
    |
    */
    public function allPackage()
    {
        $abc = Packages::all();
        if (!$abc) {
            $res = response()->json(['statuse_code' => '201', 'message' => 'something went wrong'], 404);
        } else {
            $res = response()->json(['statuse_code' => '201', 'data' => $abc], 201);
            return $res;
        }
    }

    public function postPackage(Request $req)
    {
        $package = new Packages();
        $validate = Validator::make($req->all(), [
            "title" => "required|string|min:3",
            "description" => "string|min:3",
            "image" => "string|min:3",
            "tour_highlights_title" => "string|min:3",
            "tour_highlights_description" => "string|min:3",
            "no_of_night" => "integer|min:0",
            "address" => "required|string|min:3",
            "address_1" => "required|string|min:3",
            "address_2" => "string|min:3",
            "country" => "string|min:3",
            "state" => "required|string|min:3",
            "city" => "string|min:3",
            "location" => "string|min:3",
            "food" => "string|min:2",
            "sightseeing_title" => "string|min:3",
            "sightseeing_desc" => "string|min:3",
            "sightseeing_img" => "string|min:3",
            "other_desc" => "string|min:3",
            "theme_id" => "integer|min:0",
            "type" => "string|min:0",
            "discount" => "integer|min:0",
            "hotel_type" => "string|min:2",
            "actual_price" => "integer|min:0",
            "discounted_price" => "integer|min:0",
            "tour_journey" => "string|min:0",
            "pay_and_hold" => "string|min:0",
            "ecash" => "integer|min:0",
            "sub_discription" => "string|min:0"
        ]);

        if ($validate->fails()) {
            $error_res = response()->json(['success' => false, 'message' => $validate->errors()], 400);
            return $error_res;
        } else {
            $package->title = $req->title;
            $package->description = $req->description;
            $package->image = $req->image;
            $package->tour_highlights_title = $req->tour_highlights_title;
            $package->tour_highlights_description = $req->tour_highlights_description;
            $package->no_of_day = $req->no_of_day;
            $package->no_of_night = $req->no_of_night;
            $package->address = $req->address;
            $package->address_1 = $req->address_1;
            $package->address_2 = $req->address_2;
            $package->country = $req->country;
            $package->state = $req->state;
            $package->city = $req->city;
            $package->location = $req->location;
            $package->food = $req->food;
            $package->sightseeing_title = $req->sightseeing_title;
            $package->sightseeing_desc = $req->sightseeing_desc;
            $package->sightseeing_img = $req->sightseeing_img;
            $package->other_desc = $req->other_desc;
            $package->theme_id = $req->theme_id;
            $package->type = $req->type;
            $package->discount = $req->discount;
            $package->hotel_type = $req->hotel_type;
            $package->actual_price = $req->actual_price;
            $package->discounted_price = $req->discounted_price;
            $package->tour_journey = $req->tour_journey;
            $package->pay_and_hold = $req->pay_and_hold;
            $package->ecash = $req->ecash;
            $package->sub_discription = $req->sub_discription;
            $package->save();

            $res = response()->json(['success' => true, 'message' => 'package has been post', 'statuse_code' => 201], 200);
            return $res;
        }
    }


    public function updatePackage($id, Request $req)
    {
        $package = Packages::find($id);
        if ($package == null) {
            $res = response()->json([
                'success' => false,
                'message' => 'Id is not valid',
                'statuse_code' => 400
            ], 400);
            return $res;
        } else {
            $package->title = $req->title;
            $package->description = $req->description;
            $package->image = $req->image;
            $package->tour_highlights_title = $req->tour_highlights_title;
            $package->tour_highlights_description = $req->tour_highlights_description;
            $package->no_of_day = $req->no_of_day;
            $package->no_of_night = $req->no_of_night;
            $package->address = $req->address;
            $package->address_1 = $req->address_1;
            $package->address_2 = $req->address_2;
            $package->country = $req->country;
            $package->state = $req->state;
            $package->city = $req->city;
            $package->location = $req->location;
            $package->food = $req->food;
            $package->sightseeing_title = $req->sightseeing_title;
            $package->sightseeing_desc = $req->sightseeing_desc;
            $package->sightseeing_img = $req->sightseeing_img;
            $package->other_desc = $req->other_desc;
            $package->theme_id = $req->theme_id;
            $package->type = $req->type;
            $package->discount = $req->discount;
            $package->hotel_type = $req->hotel_type;
            $package->actual_price = $req->actual_price;
            $package->discounted_price = $req->discounted_price;
            $package->tour_journey = $req->tour_journey;
            $package->pay_and_hold = $req->pay_and_hold;
            $package->ecash = $req->ecash;
            $package->sub_discription = $req->sub_discription;
            $package->save();
            $res = response()->json(['success' => true, 'message' => 'package has been updated', 'statuse_code' => 201, 'data' => $package]);
            return $res;
        }

        // return [$id, $package];
    }

    public function deletePackage($id)
    {
        $package = Packages::find($id);
        if (!$package) {
            $res = response()->json(['success' => true, 'message' => 'package has not been deletd', 'statuse_code' => 400], 400);
            return $res;
        } else {
            $package->delete();
            $res = response()->json(['success' => true, 'message' => 'package has been deletd', 'statuse_code' => 200, 'data' => $package], 201);
            return $res;
        }

    }



}