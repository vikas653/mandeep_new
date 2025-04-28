<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


\Log::info('API routes file loaded');

Route::get('/test', function () {
  
    return response()->json(['message' => 'API test route works']);
});
Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);
