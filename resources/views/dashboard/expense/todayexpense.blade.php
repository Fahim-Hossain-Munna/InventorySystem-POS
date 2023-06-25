@extends('layouts.dashboard')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                            <li><a href="{{ route('expense.view') }}">Expenses</a></li>
                            <li class="{{ route('expense.today') }}">Today Expenses</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="text-center text-danger mt-2 mb-5">
                    @if ($total_expenses)
                        <h1 class="fw-bold">Today Expense Amount= ৳ {{ $total_expenses }}tk</h1>
                    @else
                        <h1 class="fw-bold">Today Expense Amount= ৳ 0tk</h1>
                    @endif
                </div>
                {{-- data table start --}}
                <div class="col-12 bg-white p-5">
                    <div class="mb-5">
                        <h3 class="text-center">Today Expense Form</h3>
                    </div>
                    <hr>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Expense Title</th>
                                <th>Expense Description</th>
                                <th>Expense Amount</th>
                                <th>Expense Submit Time</th>
                                <th>Expense Submit Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expenses as $expense)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $expense->expense_name }}</td>
                                    <td>{{ $expense->expense_details }}</td>
                                    <td>{{ $expense->expense_amount }}</td>
                                    <td>{{ $expense->time }}</td>
                                    <td>{{ $expense->date }}</td>
                                </tr>

                            @empty
                            <tr>
                                <td class="text-center text-danger" colspan="7">No Data Found</td>
                            </tr>

                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Expense Title</th>
                                <th>Expense Description</th>
                                <th>Expense Amount</th>
                                <th>Expense Submit Time</th>
                                <th>Expense Submit Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection
