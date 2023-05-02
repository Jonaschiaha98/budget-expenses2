<?php

namespace App\Http\Controllers;

use App\Models\budget;
use App\Http\Requests\StorebudgetRequest;
use App\Http\Requests\StoreexpensesRequest;
use App\Http\Requests\UpdatebudgetRequest;
use App\Models\expenses;
use Cron\MonthField;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public $budget_id;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('budget.index');
    }
    public function budgets()
    {
        return view('budget.my_budget', [
            "budgets"=> budget::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budget.create_budget');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebudgetRequest $request)
    {
        $user_id = Auth::user()['id'];
        budget::create([
            "user_id" => $user_id,
            "duration" => $request->duration,
            "description" => $request->description,
            "amount" => $request->amount
        ]);
        return redirect()->route('budget.budget');
    }
    /**
     * Display the specified resource.
     */
    
    public function show(budget $id)
    {
        
        $this->budget_id = $id->id;
        return view('budget.budget_expenses', [
            "budget" => budget::findOrFail($id->id),
            "expenses" => expenses::query()->where('budget_id', $id->id)->get(),
            "budget_id" => $id->id,
        ]);
    }
    public function store_expenses(StoreexpensesRequest $request)
    {
        expenses::create([
            "description" => $request->description, 
            "amount" =>$request->amount, 
            "budget_id" => Auth::budget(),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(budget $id)
    {
        return view('budget.edit_budget', [
            "budget" => budget::findOrFail($id->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebudgetRequest $request, budget $id)
    {
        budget::where('id', $id->id)->update($request->except(["_token", "_method"]));
        return redirect()->route('budget.budget');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(budget $id)
    {
        budget::findOrFail($id->id)->forceDelete();
        return redirect()->route('budget.budget');
    }
}
