<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\portfolioController;

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

Route::middleware(['auth'])
->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
->group(function () {

    //Siamo nel gruppo quindi:
    // - il percorso "/" diventa "admin/"
    // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
    // - il controller DashboardController appartiene al namespace Admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('portfolio', portfolioController::class);

});

require __DIR__.'/auth.php';
