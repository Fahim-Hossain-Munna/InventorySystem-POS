<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense(){
        $total_expenses = Expense::all()->sum('expense_amount');
        $expenses = Expense::all();
        return view('dashboard.expense.index',compact('expenses','total_expenses'));
    }
    public function expense_insert(Request $request){

        $request->validate([
            "*" => 'required',
        ]);

        Expense::insert([
            'expense_name' =>$request->expense_name,
            'expense_details' =>$request->expense_details,
            'expense_amount' =>$request->expense_amount,
            'expense_day' =>$request->expense_day,
            'expense_month' =>$request->expense_month,
            'expense_year' =>$request->expense_year,
            'time' =>$request->time,
            'date' =>$request->date,
            'created_at' => now(),
        ]);
        return redirect()->route('expense.view')->with('expense_insert' , 'Expense '.$request->expense_name.' details submit successfull');
    }
}
