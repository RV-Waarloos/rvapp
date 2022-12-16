<?php

use App\Http\Controllers\ClubMemberController;
use App\Http\Controllers\ClubMemberOnboardingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\DepartmentPageComponent;
use App\Http\Livewire\OnboardClubMember;
use Illuminate\Contracts\View\View;
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

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/test2', function () {
    return view('test');
})->name('test2');

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

// Route::prefix('onboard')->name('onboard.')->middleware('auth')->group(function () {
//     Route::get('/clubmember', OnboardClubMember::class)->name('clubmember');
//     Route::get('/list', [ClubMemberOnboardingController::class, 'index'])->name('list');
//     Route::get('/invitation/{onboarding}',  [ClubMemberOnboardingController::class, 'invitation'])->name('invitation')->middleware('signed');
// });

Route::group(['prefix' => 'onboard', 'as' => 'onboard.'], function() {
    Route::middleware('auth')-> group(function () {
        Route::get('/clubmember', OnboardClubMember::class)->name('clubmember');
        Route::get('/list', [ClubMemberOnboardingController::class, 'index'])->name('list');
        Route::get('/bulk', fn(): View => view('clubmemberonboarding.bulk') )->name('bulk');
    });
    Route::get('/invitation/{onboarding}',  [ClubMemberOnboardingController::class, 'invitation'])->name('invitation')->middleware('signed');
});


// Departments
Route::group(['prefix' => 'departments', 'as' => 'departments.'], function() {

    Route::middleware('auth')-> group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('list');
    });



});




// Route::get('/departments/{department}/pages/{departmentpage}', DepartmentPageComponent::class);
Route::get('/departments/{department}/pages/{departmentpage}/{action?}', DepartmentPageComponent::class)->name('departmentpage');
Route::post('/departments/{department}/pages/{departmentpage}', DepartmentPageComponent::class)->name('departmentpage.save');

// Route::group(['prefix' => 'departmantpages', 'as' => 'departmentpages.'], function()  {
//     Route::middleware('auth')->group(function() {
//         Route::get('/', DepartmentPage::class)->name('show');
//     });
// });

Route::get('/departmentpages/{department}', [DepartmentPageController::class, 'showActivePageForDepartment'])->name('departmentpage.active');


require __DIR__.'/auth.php';
