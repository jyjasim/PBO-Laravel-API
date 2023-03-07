<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Log;


class ApiUser_C extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        Log::info("User melihat data user");
        return new UserResource(true, 'List Data User', $user);
    }

    /**
     * Display the total user
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::count();
        Log::info("User sedang menghitung total data user");
        return response()->json([
            'status' => true,
            'message' => 'Total data user',
            'data' => $user
        ]);
    }
}
