<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ActeController;
use App\Http\Controllers\AdminController;


Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('acte.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route de la Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');


// Routes pour les des citoyens
Route::prefix('citoyen')->group(function () {
    Route::get('/', [CitoyenController::class, 'create'])->name('citoyen.create');
    Route::post('/', [CitoyenController::class, 'store'])->name('citoyen.store');
    Route::get('/{citoyen}/registre', [CitoyenController::class, 'showRegistreForm'])->name('citoyen.registre');
    Route::post('/{citoyen}/verify-registre', [CitoyenController::class, 'verifyRegistre'])->name('citoyen.verifyRegistre');
});

// Route poue le Paiement
Route::prefix('paiement')->group(function () {
    Route::get('/{citoyen}', [PaiementController::class, 'create'])->name('paiement.create');
    Route::post('/{citoyen}', [PaiementController::class, 'store'])->name('paiement.store');
    Route::get('/download/{type}/{numero}', [PaiementController::class, 'download'])->name('acte.download');
});

// Routes de l'acte
Route::prefix('acte')->group(function () {
    Route::get('/download/{type}/{numero}', [PaiementController::class, 'download'])->name('acte.download');
});



Route::prefix('actes')->group(function () {
    Route::get('/', [ActeController::class, 'index'])->name('acte.index');
    
    Route::prefix('naissance')->group(function () {
        Route::get('/', [ActeController::class, 'naissanceIndex'])->name('acte.naissance.index');
        Route::get('/create', [ActeController::class, 'naissanceCreate'])->name('acte.naissance.create');
        Route::post('/', [ActeController::class, 'naissanceStore'])->name('acte.naissance.store');
        Route::get('/{acte}/edit', [ActeController::class, 'naissanceEdit'])->name('acte.naissance.edit');
        Route::put('/{acte}', [ActeController::class, 'naissanceUpdate'])->name('acte.naissance.update');
        Route::delete('/{acte}', [ActeController::class, 'naissanceDestroy'])->name('acte.naissance.destroy');
    });
    
    Route::prefix('mariage')->group(function () {
        Route::get('/', [ActeController::class, 'mariageIndex'])->name('acte.mariage.index');
        Route::get('/create', [ActeController::class, 'mariageCreate'])->name('acte.mariage.create');
        Route::post('/', [ActeController::class, 'mariageStore'])->name('acte.mariage.store');
        Route::get('/{acte}/edit', [ActeController::class, 'mariageEdit'])->name('acte.mariage.edit');
        Route::put('/{acte}', [ActeController::class, 'mariageUpdate'])->name('acte.mariage.update');
        Route::delete('/{acte}', [ActeController::class, 'mariageDestroy'])->name('acte.mariage.destroy');
    });
    
    Route::prefix('deces')->group(function () {
        Route::get('/', [ActeController::class, 'decesIndex'])->name('acte.deces.index');
        Route::get('/create', [ActeController::class, 'decesCreate'])->name('acte.deces.create');
        Route::post('/', [ActeController::class, 'decesStore'])->name('acte.deces.store');
        Route::get('/{acte}/edit', [ActeController::class, 'decesEdit'])->name('acte.deces.edit');
        Route::put('/{acte}', [ActeController::class, 'decesUpdate'])->name('acte.deces.update');
        Route::delete('/{acte}', [ActeController::class, 'decesDestroy'])->name('acte.deces.destroy');
    });
    
    Route::prefix('divorce')->group(function () {
        Route::get('/', [ActeController::class, 'divorceIndex'])->name('acte.divorce.index');
        Route::get('/create', [ActeController::class, 'divorceCreate'])->name('acte.divorce.create');
        Route::post('/', [ActeController::class, 'divorceStore'])->name('acte.divorce.store');
        Route::get('/{acte}/edit', [ActeController::class, 'divorceEdit'])->name('acte.divorce.edit');
        Route::put('/{acte}', [ActeController::class, 'divorceUpdate'])->name('acte.divorce.update');
        Route::delete('/{acte}', [ActeController::class, 'divorceDestroy'])->name('acte.divorce.destroy');
    });
});

// Espace admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::prefix('agents')->group(function () {
        Route::get('/', [AdminController::class, 'agentsIndex'])->name('admin.agents.index');
        Route::get('/create', [AdminController::class, 'agentsCreate'])->name('admin.agents.create');
        Route::post('/', [AdminController::class, 'agentsStore'])->name('admin.agents.store');
        Route::get('/{agent}/edit', [AdminController::class, 'agentsEdit'])->name('admin.agents.edit');
        Route::put('/{agent}', [AdminController::class, 'agentsUpdate'])->name('admin.agents.update');
        Route::delete('/{agent}', [AdminController::class, 'agentsDestroy'])->name('admin.agents.destroy');
    });
});

require __DIR__.'/auth.php';
