<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'placemarks' => PlacemarkController::class,
    'reviews'    => ReviewController::class,
    'tags'       => TagController::class,
    //'posts' => PostController::class,
]);

Route::group(['middleware' => 'auth:sanctum', 'Traveller' => 'API', 'prefix' => 'personal'], function () {
    Route::apiResources([
        'reviews' => TravellerReviewController::class
    ]);
});

Route::get('/login', [LoginController::class, 'login']);
Route::get('/login/{provider}', [LoginController::class, 'login']);

//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/token', [AuthController::class, 'token']);
