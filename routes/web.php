<?php

use App\Models\Signature;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\TestMySignatureProvidedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


 

Auth::routes([
    'verify'=>true
]);

Route::post('/test_signature',[TestMySignatureProvidedController::class,'TestMySignature']);

Route::get('/auth/{provider}/redirect', [ProviderController::class,'redirect']);
 
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);

Route::post('/upload-signature',[SignatureController::class,'upload_signature']);

Route::get('/dashboard', function () {

    return view('dashboard',['SignatureUploaded' => Signature::where('user_id', auth()->id())->exists(),'container' => 'get_image']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
