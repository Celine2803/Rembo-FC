<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\AnnouncementController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/main', function () {
//     return view('dashboard');
// })->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:director'])->group(function () {

    Route::get('/director/dashboard', [DirectorController::class, 'DirectorDashboard'])
    ->name('director.dashboard');


    Route::get('/director/profile', [DirectorController::class, 'DirectorProfile'])
    ->name('director.profile');

    Route::post('/director/profile/store', [DirectorController::class, 'DirectorProfilestore'])
    ->name('director.profile.store');

    Route::get('/director/change/password', [DirectorController::class, 'DirectorChangePassword'])
    ->name('director.change.password');

    Route::post('/director/update/password', [DirectorController::class, 'DirectorUpdatePassword'])
    ->name('director.update.password');

    Route::get('/director/logout', [DirectorController::class, 'DirectorLogout'])
    ->name('director.logout');



    Route::controller(DirectorController::class)->group(function(){
        Route::get('/all/players', 'AllPlayers')->name('all.players');
        Route::get('/add/player', 'AddPlayer')->name('add.player');
        Route::post('/store/player', 'StorePlayer')->name('store.player');
        Route::get('/edit/player/{id}', 'EditPlayer')->name('edit.player');
        Route::post('/update/player', 'UpdatePlayer')->name('update.player');
        Route::get('/softdelete/player/{id}', 'SoftDeletePlayer')->name('softdelete.player');
        Route::get('player/trashed', 'PlayerTrashed')->name('player.trashed');
        Route::get('player/restoreall', 'PlayerRestoreAll')->name('player.restoreall');
        Route::get('/restore/player/{id}', 'PlayerRestore')->name('restore.player');
        Route::get('/forcedelete/player/{id}', 'ForceDeletePlayer')->name('forcedelete.player');

        Route::get('/pay/player/{id}', 'PayPlayer')->name('pay.player');
        Route::post('/update/pay', 'UpdatePay')->name('update.pay');
        Route::post('/confirm/pay/{id}', 'ConfirmPay')->name('confirm.pay');
   

        Route::post('/player/{id}/information', 'processPlayerInformation')->name('player.process');

        Route::get('/player/{id}', 'PlayerInformation')->name('player.information');
        Route::get('/player/{id}/payment', 'Payment')->name('payment');
        Route::get('/player/{id}/payment/success', 'PaymentSuccess')->name('payment.success');

        Route::get('/payment/receipt/{id}', 'generateReceipt')->name('payment.receipt');

        
   
    });
    
    
   

});

Route::get('/director/login', [DirectorController::class, 'DirectorLogin'])
->name('director.login');

// email routes

Route::get('/email', [AnnouncementController::class, 'EmailPlayer'])
    ->name('email.player');
// Route::post('/send/email', [EmailController::class, 'SendEmail'])
//     ->name('send.email');
Route::post('announcements',[AnnouncementController::class,'Store'])->name('send.email');

Route::middleware(['auth','role:coach'])->group(function () {
Route::get('/coach/dashboard', [CoachController::class, 'CoachDashboard'])
->name('coach.dashboard');


    Route::get('/coach/profile', [CoachController::class, 'CoachProfile'])
    ->name('coach.profile');

    Route::post('/coach/profile/store', [CoachController::class, 'CoachProfilestore'])
    ->name('coach.profile.store');

    Route::get('/coach/change/password', [CoachController::class, 'CoachChangePassword'])
    ->name('coach.change.password');

    Route::post('/coach/update/password', [CoachController::class, 'CoachUpdatePassword'])
    ->name('coach.update.password');

    Route::get('/coach/logout', [CoachController::class, 'CoachLogout'])
    ->name('coach.logout');
});

Route::middleware(['auth','role:player'])->group(function () {
    Route::get('/player/dashboard', [PlayerController::class, 'PlayerDashboard'])
    ->name('player.dashboard');
    
    
        Route::get('/player/profile', [PlayerController::class, 'PlayerProfile'])
        ->name('player.profile');
    
        Route::post('/player/profile/store', [PlayerController::class, 'PlayerProfilestore'])
        ->name('player.profile.store');
    
        Route::get('/player/change/password', [PlayerController::class, 'PlayerChangePassword'])
        ->name('player.change.password');
    
        Route::post('/player/update/password', [PlayerController::class, 'PlayerUpdatePassword'])
        ->name('player.update.password');
    
        Route::get('/player/logout', [PlayerController::class, 'PlayerLogout'])
        ->name('player.logout');
    });

Route::get('/linechart', [ChartController::class, 'LineChart'])
->name('line.chart');

// calendar routes
Route::get('/calendar/index', [CalendarController::class, 'CalendarIndex'])
->name('calendar.index');
Route::post('/calendar', [CalendarController::class, 'CalendarStore'])
->name('calendar.store');
Route::patch('/calendar/update/{id}', [CalendarController::class, 'CalendarUpdate'])
->name('calendar.update');
Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'CalendarDestroy'])
->name('calendar.destroy');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');