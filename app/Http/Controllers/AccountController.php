<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Coustomer;
use App\Models\otp;

class AccountController extends Controller
{
    // Customer Login
    public function customers(Request $req)
    {
        $cust = Coustomer::where('email', $req->email)->first();
        if ($cust) {
            $res = response()->json(['statuse' => 'Fail', 'message' => 'email already exist'], 409);
            return $res;
        } else {
            $customer = new Coustomer();
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->password = Hash::make($req->password);
            $customer->phone = $req->phone;
            $result = $customer->save();
            $token = $customer->createToken('my-app-token')->plainTextToken;
            if ($result) {
                return response()->json(['statuse' => 'OK', 'message' => 'new customer is added', 'toke' => $token], 200);
            } else {
                return response()->json(['statuse' => 'fail', 'message' => 'somthing went wrong']);
            }
        }

    }
    // Get Customer Detail
    public function getallCustomers()
    {
        $cus = Coustomer::all();
        if (!$cus) {
            return response()->json(['statuse' => 'fail', 'message' => 'somthing went wrong']);
        } else {
            return response()->json(['statuse' => 'OK', 'data' => $cus]);
        }
    }

    //  Customer Log in 
    public function logInCustomer(Request $req)
    {
        $customer = Coustomer::where('email', $req->email)->first();
        // $data = ["email"=>$customer->email,"password"=>$customer->password];
        if (!$customer || !Hash::check($req->password, $customer->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        } else {
            // return $customer->email;
            $token = $customer->createToken('my-app-token')->plainTextToken;
            $response = [
                'statuse' => 'OK',
                'customer' => $customer,
                'token' => $token
            ];
            return response($response, 201);
        }
    }


    // Send OTP  Function
    public function sendOTP(Request $req)
    {
        $customer = Coustomer::where('phone', $req->phone)->first(); // Customer database 
        $otpDB = new otp(); // otp database
        $t = time();
        $otp = rand(1000, 9999);
        $isd = '+91';
        $phone = $isd . $customer->phone;
        $otpDB->otp = $otp;
        $otpDB->phone_number = $req->phone;
        $otpDB->start_date_time = $t;
        $otpDB->end_date_time = $t + 120;
        $otpDB->save();
        $api_key = 'f303c41d-f9e7-11ed-addf-0200cd936042'; // API Key
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://2factor.in/API/V1/' . $api_key . '/SMS/' . $phone . '/' . $otp,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ]);
        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        if ($err) {
            return response()->json(['statuse' => 'Fail', 'message' => 'OTP could not generate', 'error' => $err]);
        } else {
            return response()->json(['statuse' => 'OK', 'otp' => $otp, 'response' => $response]);
        }
    }

    // Verify Otp Function
    public function verifyOtp(Request $req)
    {
        $otp = otp::where('otp', $req->otp)->first(); // Customer database 
        $t = time();
        if ($otp) {
            if ($otp->otp == $req->otp && $otp->end_date_time > $t && $otp->phone_number == $req->phone_number) {
                $token = $otp->createToken('my-app-token')->plainTextToken;
                $responceToken = response()->json(['token' => $token,]);
                $responceToken->headers = $otp->phone_number;
                return response()->json(['statuse' => 'OK', 'message' => 'OTP match', 'responceToken' => $responceToken], 200);
            } else {
                return response()->json(['statuse' => 'Fail', 'message' => 'Time out  otp is valid for 120 secconds']);
            }
        } else {
            return response()->json(['statuse' => 'Fail', 'message' => 'Invalid OTP']);
        }
    }

}