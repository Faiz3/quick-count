<?php

use App\Livewire\Auth\Login;
use App\Livewire\Components\CetakRekapitulasi;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Home;
use App\Livewire\Menu\NamaCalonRt;
use App\Livewire\Menu\RekapitulasiDataSuara;
use App\Livewire\Nav;
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

Route::get('/', Login::class);
Route::prefix('/app')->group(function(){
    Route::middleware(['authUser'])->group(
        function(){
            Route::get('/', Dashboard::class);
            Route::get('/rekap-data', RekapitulasiDataSuara::class);
            Route::get('/cetak', CetakRekapitulasi::class);
        }
    );
});
