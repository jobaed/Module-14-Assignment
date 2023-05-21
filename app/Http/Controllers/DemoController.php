<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function PHPSTORM_META\type;

class DemoController extends Controller
{
    // Show Normal Request Data

    function NormalInfo(Request $request)
    {
        //01
        // Normal Data Get From Post Request
        $name = $request->input('name');


        //02
        // Get Header Data From User 
        $userAgent =  $request->header('User-Agent');


        //03
        // Get Query Peramiter Data
        $page = $request->query('page', null);


        //04
        // Print Json Data With Response
        $info = [
            'name' => 'John Doe',
            'age' => 25
        ];

        $data = [
            'message' => 'Success',
            'data' => $info
        ];

        return Response::json($data);



        //05
        // File Upload Feature
        $photo = $request->file('photo');
        $orginalName = $photo->getClientOriginalName();
        $photo->move(public_path('uploads'), $orginalName);
        return true;



        // 06
        // Cookie Data Get
        $rememberToken = request()->cookie('remember_token', null);
    }

    // 07
    // Peramiter Email get And Print Message
    function showMessage(Request $request)
    {
        $email = $request->input('email');
        return response()->json([
            "success" => true,
            "message" => "Form submitted successfully."
        ]);
    }
}
