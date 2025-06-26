<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInviteController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRoles;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', CheckUserRoles::class.':superadmin'])->group(function () {
    Route::get("/company", [CompanyController::class,"index"])->name("company.index");
    Route::get("/company/create", [CompanyController::class,"create"])->name("company.new");
    Route::post("/company", [CompanyController::class,"store"])->name("company.store");
    Route::get("/company/{company}", [CompanyController::class,"show"])->name("company.show");
    Route::get("/company/{company}/edit", [CompanyController::class, "edit"])->name("company.edit");
    Route::put("/company/{company}", [CompanyController::class, "update"])->name("company.update");
    Route::delete("/company/{company}", [CompanyController::class, "destroy"])->name("company.destroy");

});

//Route::resource("company", CompanyController::class);

Route::get('/invite/{token}', [UserInviteController::class, 'showAcceptForm'])->name('user.invite.show');
Route::post('/invite/{token}', [UserInviteController::class, 'acceptInvite'])->name('user.invite.accept');

Route::middleware(['auth', CheckUserRoles::class.':admin'])->group(function () {
    Route::get("/myproject", [AdminController::class, "index"] )->name("admin.myproject.index");
    Route::get("/myproject/create", [AdminController::class,"create"])->name("admin.myproject.new");
    Route::post("/myproject", [AdminController::class,"store"])->name("admin.myproject.store");
    Route::get("/myproject/{user_id}", [AdminController::class,"show"])->name("admin.myproject.show");
    Route::get("/myproject/{user}/edit", [AdminController::class, "edit"])->name("admin.myproject.edit");
    Route::put("/myproject/{user}", [AdminController::class, "update"])->name("admin.myproject.update");
    Route::delete("/myproject/{user}", [AdminController::class, "destroy"])->name("admin.myproject.destroy");
}); 

Route::middleware(['auth'])->group(function () {
    Route::get("/url", [UrlController::class, "index"] )->name("url.index");
}); 

Route::middleware(['auth', CheckUserRoles::class.':admin,member'])->group(function () {
    Route::get("/url/create", [UrlController::class,"create"])->name("url.new");
    Route::post("/url", [UrlController::class,"store"])->name("url.store");
    Route::delete("/url/{url}", [UrlController::class, "destroy"])->name("url.destroy");
}); 


Route::get('v1.1/{hash}', [UrlController::class, 'redirect'])->name('url.redirect');

require __DIR__.'/auth.php';