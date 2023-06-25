<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense(){
        $total_expenses = Expense::all()->sum('expense_amount');
        $expenses = Expense::latest()->get();
        return view('dashboard.expense.index',compact('expenses','total_expenses'));
    }
    public function expense_today(){
        $total_expenses = Expense::where('date', now()->format('d/m/Y'))->get()->sum('expense_amount');
        $expenses = Expense::where('date', now()->format('d/m/Y'))->get();
        return view('dashboard.expense.todayexpense',compact('expenses','total_expenses'));
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

    public function expense_edit(Request $request,$id){
        $request->validate([
            "*" => 'required'
        ]);

        Expense::findOrFail($id)->update([
            'expense_name' =>$request->expense_name,
            'expense_details' =>$request->expense_details,
            'expense_amount' =>$request->expense_amount,
            'updated_at' => now(),

        ]);

        return redirect()->route('expense.view')->with('expense_edit','Expense Details Update Successfully');
    }
    public function delete($id){

        Expense::findOrFail($id)->delete();

        return redirect()->route('expense.view')->with('expense_delete','Expense Details Delete Successfully');

    }
}
