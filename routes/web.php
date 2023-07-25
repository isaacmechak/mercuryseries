<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\moneyTransferController;
use Illuminate\Support\Facades\Route;

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



Route::get('/dashboard', function () {
    return view('dasendMoneyshboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [moneyTransferController::class, 'showForm'])->name('transfet.showForm');
Route::post('/transferMoney', [moneyTransferController::class, 'post'])->name('transfet.post');
Route::get('/sucessOPeration', [moneyTransferController::class, 'success'])->name('transfet.success');


require __DIR__.'/auth.php';
