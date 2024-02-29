<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get all users
// Route::get('/users', function () {
//     // Get all users only email and is_admin fields
//     $users = App\Models\User::all('email', 'is_admin');

//     return response()->json($users);
// });

// Get user by email address
Route::get('/users/{email}', function ($email) {
    // Get user by email address
    $user = App\Models\User::where('email', $email)->first();

    return response()->json($user);
});
