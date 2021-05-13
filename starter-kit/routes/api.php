<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Models\Member;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/members/create', [MemberController::class, 'store']);
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/members/{member}', [MemberController::class, 'show']);
    Route::put('/members/{member}', [MemberController::class, 'edit']);
    Route::delete('/members/{member}', [MemberController::class, 'destroy']);
});


Route::post('/login', function(Request $request){

    $member = Member::find($request->id);

    $token = $member->createToken('access_token');

    return [
        'member' => $member,
       'access_token' => $token->plainTextToken
    ];
});


// Route::get('/members', function(){
//     return Member::factory()->count(5)->create();
// });
