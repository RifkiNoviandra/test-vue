<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/user/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::get('nft/', [\App\Http\Controllers\nftController::class, 'getNewestNft']);
Route::get('nft/bidhist/{id}', [\App\Http\Controllers\UserController::class, 'bidHistory']);
Route::get('nft/buy', [\App\Http\Controllers\nftController::class, 'getNftByBuy']);
Route::get('nft/all', [\App\Http\Controllers\nftController::class, 'getAllNft']);
Route::get('nft/{id}', [\App\Http\Controllers\nftController::class, 'getNftById']);
Route::post('/search', [\App\Http\Controllers\nftController::class, 'getNftByName']);
Route::middleware('user')->post('nft/upload', [\App\Http\Controllers\nftController::class, 'UserNftUpload']);
Route::middleware('user')->post('nft/trade/{id}', [\App\Http\Controllers\nftController::class, 'trade']);

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('user', [\App\Http\Controllers\AdminUserController::class, 'getMember']);
    Route::post('searchMember', [\App\Http\Controllers\AdminUserController::class, 'getMemberBySearch']);
    Route::post('statusMember', [\App\Http\Controllers\AdminUserController::class, 'getMemberByStatus']);
    Route::post('blockMember', [\App\Http\Controllers\AdminUserController::class, 'blockMember']);
    Route::post('UnblockMember', [\App\Http\Controllers\AdminUserController::class, 'UnblockMember']);

    Route::get('nft', [\App\Http\Controllers\AdminNftController::class, 'getNft']);
    Route::post('CategoryNft', [\App\Http\Controllers\AdminNftController::class, 'getNftByCategory']);
    Route::post('NameNft', [\App\Http\Controllers\AdminNftController::class, 'getNftByName']);
    Route::post('StatusNft', [\App\Http\Controllers\AdminNftController::class, 'getNftByStatus']);
    Route::post('approval', [\App\Http\Controllers\AdminNftController::class, 'approval']);
    Route::post('blockNft', [\App\Http\Controllers\AdminNftController::class, 'blockNft']);

    Route::get('transaction', [\App\Http\Controllers\AdminTransactionController::class, 'listTransaction']);
    Route::post('transactionDate', [\App\Http\Controllers\AdminTransactionController::class, 'listTransactionByDate']);
});


