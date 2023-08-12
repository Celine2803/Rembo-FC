<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DirectorController;

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
    });


});

Route::get('/director/login', [DirectorController::class, 'DirectorLogin'])
->name('director.login');


Route::middleware(['auth','role:coach'])->group(function () {
Route::get('/coach/dashboard', [CoachController::class, 'CoachDashboard'])
->name('coach.dashboard');
});