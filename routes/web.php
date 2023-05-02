<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ProfileController;
use App\Models\expenses;
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

Route::get('/', function () {
    return view('budget.index');
});

Route::get('/dashboard', function () {
    return view('budget.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/budget')->group(function () {
        Route::get('/create_dudget', [BudgetController::class, 'create'])->name('budget.create');
        Route::get('/create_expenses/{id}', [ExpensesController::class, 'create'])->name('expenses.create');
        Route::get('/', [BudgetController::class, 'index'])->name('budget.index');
        Route::get('/my_budget', [BudgetController::class, 'budgets'])->name('budget.budget');
        Route::get('/directing_id', [BudgetController::class, 'direct_budget_id'])->name('budget.direct_budget_id');
        Route::post('/store', [BudgetController::class, 'store'])->name('budget.store');
        Route::get('/{id}', [BudgetController::class, 'show'])->name('budget.show');
        Route::get('/edit/{id}', [BudgetController::class, 'edit'])->name('budget.edit');
        Route::patch('/update/{id}', [BudgetController::class, 'update'])->name('budget.update');
        Route::delete('/{id}', [BudgetController::class, 'destroy'])->name('budget.delete');
    
        // Route::resource('/', expenses::class);
        
        Route::get('/my/expenses', [ExpensesController::class, 'index'])->name('expenses.index');
        Route::post('/store_expenses/{id}', [ExpensesController::class, 'store'])->name('expenses.store');
        Route::get('/expenses/{id}', [ExpensesController::class, 'show'])->name('expenses.show');
        Route::get('/edit_expenses/{id}', [ExpensesController::class, 'edit'])->name('expenses.edit');
        Route::patch('/update/expenses/{id}', [ExpensesController::class, 'update'])->name('expenses.update');
        Route::delete('/{id}/expenses', [ExpensesController::class, 'destroy'])->name('expenses.delete');
        
    });
});

require __DIR__.'/auth.php';

