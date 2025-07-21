<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $data = Client::get();
        $responseData = [
            'message' => 'Success',
            'data' => $data,
        ];

        return response() ->json(['data' => $responseData]);
    }
}
