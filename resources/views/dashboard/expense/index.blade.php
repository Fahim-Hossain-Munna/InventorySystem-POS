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
                            <li class="{{ route('expense.view') }}">All Expenses</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 d-flex justify-content-center">
    <div class="text-danger mt-5">
        @if ($total_expenses)
            <h1 class="fw-bold">Total Expense Amount= ৳ {{ $total_expenses }}tk</h1>
        @else
            <h1 class="fw-bold">Total Expense Amount= ৳ 0tk</h1>
        @endif
    </div>
</div>
<style>
    .btn-group{
        left: 50%;
        transform: translateX(-50%);
    }
</style>
<div class="mt-5 mb-3 btn-group">
    <a href="{{ route('expense.today') }}" class="btn btn-success btn-sm fw-bolder"><i class="fa fa-calendar me-1" ></i>Today Expense</a>
    <button type="button" class="btn btn-warning btn-sm fw-bolder"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-calendar me-1" ></i>Month Expense</button>
</div>
    {{-- month modal  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            {{-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <div class="mb-5">
                    <h3 class="text-center fw-bolder">Select Month Expense</h3>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <button type="button" class="me-2 btn btn-primary mt-3">January</button>
                    <button type="button" class="me-2 btn btn-secondary mt-3">February</button>
                    <button type="button" class="me-2 btn btn-success mt-3">March</button>
                    <button type="button" class="me-2 btn btn-danger mt-3">April</button>
                    <button type="button" class="me-2 btn btn-warning mt-3">May</button>
                    <button type="button" class="me-2 btn btn-info mt-3">June</button>
                    <button type="button" class="me-2 btn btn-dark mt-3">July</button>
                    <button type="button" class="me-2 btn btn-primary mt-3">August</button>
                    <button type="button" class="me-2 btn btn-secondary mt-3">September</button>
                    <button type="button" class="me-2 btn btn-success mt-3">October</button>
                    <button type="button" class="me-2 btn btn-danger mt-3">November</button>
                    <button type="button" class="me-2 btn btn-warning mt-3">December</button>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    {{-- month modal end  --}}
<div class="content">
    <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-primary btn-sm fw-bolder" data-bs-toggle="modal"
        data-bs-target="#newExpense"><i class="fa fa-plus me-1" aria-hidden="true"></i>New Expense</button>
    </div>
    {{-- <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-primary btn-sm fw-bolder" data-bs-toggle="modal"
            data-bs-target="#newExpense"><i class="fa fa-plus me-1" aria-hidden="true"></i>New Expense</button>
    </div> --}}
    <!-- new expense create modal start -->
        <div class="modal fade" id="newExpense" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <form action="{{ route('expense.insert') }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title pt-5">
                                <h3 class="text-center">Daily/Regular Expense Form</h3>
                            </div>
                            <hr>
                            <div class="card-body pb-5">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Expense Title</label>
                                    <input id="cc-payment" name="expense_name" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Expense Description</label>
                                        <textarea class="form-control" rows="4" name="expense_details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Expense Amount</label>
                                    <input id="cc-payment" name="expense_amount" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <input id="cc-payment" name="expense_day" type="hidden"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="{{ now()->format('l') }}">
                                </div>
                                <div class="form-group">
                                    <input id="cc-payment" name="expense_month" type="hidden"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="{{ now()->format('F') }}">
                                </div>
                                <div class="form-group">
                                    <input id="cc-payment" name="expense_year" type="hidden"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="{{ now()->format('Y') }}">
                                </div>
                                <div class="form-group">
                                    <input id="cc-payment" name="time" type="hidden"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="{{ now()->format('g:i A') }}">
                                </div>
                                <div class="form-group">
                                    <input id="cc-payment" name="date" type="hidden"
                                        class="form-control" aria-required="true" aria-invalid="false"
                                        value="{{ now()->format('d/m/Y') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
            </div>
        </div>
<!-- new expense create modal end-->

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 bg-white p-5">
                {{-- table start --}}

                <table id="expense" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Expense Title</th>
                            <th>Expense Description</th>
                            <th>Expense Amount</th>
                            <th>Expense Submit Time</th>
                            <th>Expense Submit Date</th>
                            <th>Action</th>
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
                             <td>
                                <button class="mt-1 me-1 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $expense->id }}"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                                {{-- EDIT/UPDATE modal start --}}
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $expense->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
                                        <form action="{{ route('expense.edit',$expense->id) }}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body mb-5">
                                                    <div class="card-title">
                                                        <h3 class="text-center">Expense Edit/Update Form</h3>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Expense Title</label>
                                                        <input id="cc-payment" name="expense_name" type="text"
                                                            class="form-control" aria-required="true" aria-invalid="false"
                                                            value="{{ $expense->expense_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Expense Description</label>
                                                        {{-- <input id="cc-payment" name="name" type="text"
                                                            class="form-control" aria-required="true" aria-invalid="false"
                                                            value="{{ $expense->expense_name }}"> --}}
                                                            <textarea class="form-control" name="expense_details" rows="4">{{ $expense->expense_details }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Expense Amount</label>
                                                        <input id="cc-payment" name="expense_amount" type="text"
                                                            class="form-control" aria-required="true" aria-invalid="false"
                                                            value="{{ $expense->expense_amount }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                <!-- EDIT/UPDATE modal end -->
                                <button class="mt-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $expense->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                 {{-- delete modal part start --}}
                                 <div class="modal fade" id="deleteModal{{ $expense->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <style>
                                            .modal-body i{
                                                position: absolute;
                                                top: 50px;
                                                left: 50%;
                                                font-size: 60px;
                                                transform: translateX(-50%);
                                                color: #FF0060;
                                            }
                                            .modal-body #changeStatusp{
                                                margin-top: 120px;
                                                font-size: 30px;
                                                font-weight: 800;
                                                color: #116A7B;
                                            }
                                        </style>
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                        <p class="text-center" id="changeStatusp">Are you confirm to delete.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('expense.delete',$expense->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                             </td>

                         </tr>
                       @empty
                         <tr>
                            <td colspan="7" class="text-center text-danger">No Data Found</td>
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
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

                {{-- table end --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')

<script>
    jQuery(document).ready(function($){
        $("#expense").DataTable();
    });
</script>

@if (session('expense_insert'))
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('expense_insert') }}",
})
</script>

@endif


@if (session('expense_edit'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('expense_edit') }}",
})
</script>

@endif
@if (session('expense_delete'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('expense_delete') }}",
})
</script>

@endif

@endsection
