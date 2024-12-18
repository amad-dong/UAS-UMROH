<?php

use Illuminate\Support\Facades\Route;
use App\Models\KepulanganUmroh;
use App\Http\Controllers\KepulanganUmrohController;
use App\Http\Controllers\PortfolioController;
use App\Models\Portfolio;

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

Route::get('/', [PortfolioController::class, 'index']);

Route::get('/kepulangan', function () {
    $query = KepulanganUmroh::query();

    if ($search = request('search')) {
        $query->where('nama_jemaah', 'like', "%{$search}%");
    }

    $kepulanganUmroh = $query->get();

    return view('kepulangan.index', compact('kepulanganUmrohs'));
});