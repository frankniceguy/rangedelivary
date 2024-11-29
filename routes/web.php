<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsletterController;
use PhpParser\Node\Scalar\MagicConst\Function_;
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

Route::get('/test',function (){
    $data = [
        "subject" => "subject",
        "content" => "content",

    ];
    return view('mail.admin-email',$data);
});


Route::domain('payment.'.config('app.app_domain'))->group(function(){
    Route::get('/',function(){
        return view('payment');
    });
});

Route::get('/', function () {
    return view('home');
});

Route::get('/index', function () {
    return view('home');
});


Route::get('/link-storage',function(){
    \Artisan::call('storage:link');
    return "linked storage successfully";
});

Route::get('/cache-clear-0',function(){
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    return "cleared all config successfully";
});

Route::get('/cache-0',function(){
    \Artisan::call('config:cache');
    \Artisan::call('view:cache');
    \Artisan::call('route:cache');
    return "clached all config successfully";
});


Route::get('/run-migrations-0',function(){
    \Artisan::call('migrate:fresh --seed');
    return "run migrations for site successfully";
});




Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/service',function (){
    return view('service');
});

Route::post('/subscribe',[NewsletterController::class,'subscribe'])->name('subscribe');

Route::post('/contact-mail',[MailController::class,'sendContactMail'])->name('send-contact-mail');


Route::post('/tracking', [CourierController::class,'show'])->name('tracking-info');
Route::get('/tracker', [CourierController::class,'index'])->name('tracker-page');

Route::get('/price',function(){
    return view('price');
});

Route::get('/single',function(){
    return view('single');
});

Route::get('/blog',function(){
    return view('blog');
});