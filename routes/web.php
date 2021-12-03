<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ComicsApiController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Auth;
use App\Console\Commands\ComicsLastWeekCommand;


Auth::routes(['verify' => true]);

//Rota principal com o Command para importar as HQs da última semana e renderizar direto.
Route::get('/',[ComicsLastWeekCommand::class,'handle'])->name('home');

//Rotas de login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LogoutController::class,'logout'])->name('logout');
//Rota exclusiva para ADMs
Route::get('/admin',[LoginController::class,'accessAdmin'])->name('admin');

//Rota do registro
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register');


//Rotas da verificação do cadastro
Route::get('/verify/email',[VerificationController::class,'index'])->name('verify');
Route::get('/verify/email/{id}/{verified_token}',[VerificationController::class,'verifyEmail']);
Route::get('/verify/email/success',function(){ return view('auth/verifiedaccount'); })->name('verified');

//Rota para resetar password
Route::get('/forgot-password',[ResetPasswordController::class,'index'])->middleware('guest')->name('password.request');
Route::post('/forgot-passowrd',[ResetPasswordController::class,'sendLink'])->middleware('guest')->name('password.email');   
Route::get('/reset-password/{token}',[ResetPasswordController::class,'resetIndex'])->middleware('guest')->name('password.reset');
Route::post('/reset-password',[ResetPasswordController::class,'reset'])->middleware('guest')->name('password.update');

//Rota das Comics
Route::get('/comics',[ComicsApiController::class,'managerRequest'])->name('comics');
Route::get('/comic',[ComicController::class,'displayComic'])->name('comic');
Route::post('/comic',[ComicController::class, 'storepost'])->name('comic');
Route::delete('/comic/{post}', [ComicController::class, 'destroypost'])->name('post.destroy');
Route::post('/comic/{post}/likes', [PostLikeController::class, 'store'])->name('post.likes');
Route::delete('/comic/{post}/likes', [PostLikeController::class, 'destroy'])->name('post.likes');

//Rota não encontrada
Route::fallback(function(){
    return abort(404);
});











































