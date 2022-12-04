<?php

use App\Http\Controllers\ClubMemberController;
use App\Http\Controllers\ClubMemberOnboardingController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\OnboardClubMember;
use Illuminate\Support\Facades\Route;

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

// Route::get('/cm', [\App\Http\Livewire\ClubMember::class,'list']);
Route::get('/cm',\App\Http\Livewire\ClubMember::class);

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

Route::middleware('auth')->group(function () {
    Route::get('/clubmembers', function ()
    {
        return view('clubmembers');
    })->name('clubmembers.list');

    Route::get('/clubmembers/create', function ()
    {
        return view('clubmembers');
    })->name('clubmembers.create');

    Route::get('clubmembers/file-import-export', [ClubMemberController::class, 'fileImportExport']);
    Route::post('clubmembers/file-import', [ClubMemberController::class, 'fileImport'])->name('file-import');
});

Route::prefix('onboard')->name('onboard.')->middleware('auth')->group(function () {
    Route::get('/clubmember', OnboardClubMember::class)->name('clubmember');
    Route::get('/list', [ClubMemberOnboardingController::class, 'index'])->name('list');
    Route::get('/invitation/{onboarding}',  [ClubMemberOnboardingController::class, 'invitation'])->name('invitation')->middleware('signed');
});




require __DIR__.'/auth.php';
