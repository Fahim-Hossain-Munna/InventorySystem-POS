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
                            <li><a href="{{ route('supplier.index') }}">Supplier</a></li>
                            <li class="{{ route('supplier.index') }}">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  content start --}}

<div class="content">
    <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-primary btn-sm fw-bolder" data-bs-toggle="modal"
            data-bs-target="#exampleModal"><i class="fa fa-plus me-1" aria-hidden="true"></i>New Supplier</button>
    </div>
    {{-- modal start --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header d-flex ">
                    <h5 class="modal-title p-2 w-100" id="exampleModalLabel">Insert New Employee Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Supplier Addmission Form</h3>
                                        </div>
                                        <hr>
                                        <form action="{{ route('supplier.create') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Full Name</label>
                                                <input id="cc-payment" name="name" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">E-mail Address</label>
                                                <input id="cc-name" name="email" type="email"
                                                    class="form-control cc-name valid" data-val="true"
                                                    data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name">
                                                <span class="help-block field-validation-valid"
                                                    data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Mobile Number</label>
                                                <input id="cc-number" name="tel" type="tel"
                                                    class="form-control cc-number identified visa" value=""
                                                    data-val="true" data-val-required="Please enter the Mobile Number"
                                                    data-val-cc-number="Please enter a valid card Mobile Number">
                                                <span class="help-block" data-valmsg-for="cc-number"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Supplier Brand</label>
                                                        <select name="supplier_brand" id="select" class="form-control">
                                                            <option>Please select</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Supplier Type</label>
                                                        <select name="supplier_type" id="select" class="form-control">
                                                            <option>Please select</option>
                                                            <option value="distributor">Distributor</option>
                                                            <option value="local_seller">Local Seller</option>
                                                            <option value="hole_seller">Hole Seller</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="cc-number" class="control-label mb-1">Mobile Bangking</label>
                                                    <select name="mobile_banking" id="select" class="form-control">
                                                        <option>Please select</option>
                                                        <option value="bikash">Bikash</option>
                                                        <option value="nagad">Nagad</option>
                                                        <option value="rocket">Rocket</option>
                                                        <option value="upay">Upay</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-number" class="control-label mb-1">Mobile Banking Number</label>
                                                    <input id="cc-number" name="Mobile_banking_Account_number" type="tel"
                                                        class="form-control cc-number identified visa" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Account holder name</label>
                                                <input id="cc-number" name="account_holder_name" type="text"
                                                    class="form-control cc-number identified visa" value=""
                                                    data-val="true" data-val-required="Please enter the Account holder name"
                                                    data-val-cc-number="Please enter a valid Account holder name">
                                                <span class="help-block" data-valmsg-for="cc-number"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Bank Name</label>
                                                <input id="cc-number" name="bank_name" type="tel" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Branch Name</label>
                                                <input id="cc-number" name="branch_name" type="tel" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Bank Account number</label>
                                                <input id="cc-number" name="bank_account_number" type="tel" class="form-control">
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-number"
                                                            class="control-label mb-1">Current Address</label>
                                                        <input id="cc-number" name="current_address" type="text"
                                                            class="form-control cc-number identified visa" value=""
                                                            data-val="true"
                                                            data-val-required="Please enter the Current Address"
                                                            data-val-cc-number="Please enter a Current Address">
                                                        <span class="help-block" data-valmsg-for="cc-number"
                                                            data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-number"
                                                            class="control-label mb-1">Parmanent Address</label>
                                                        <input id="cc-number" name="parmanent_address" type="text"
                                                            class="form-control cc-number identified visa" value=""
                                                            data-val="true"
                                                            data-val-required="Please enter the Parmanent Address"
                                                            data-val-cc-number="Please enter a valid Parmanent Address">
                                                        <span class="help-block" data-valmsg-for="cc-number"
                                                            data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="cc-payment" class="control-label mb-1">Supplier Picture</label>
                                                    <br>
                                                    <input type="file" id="cc-payment" name="image" class="form-control-file">
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    {{-- modal end --}}

</div>

@endsection

@section('footer_script')
<script>
    jQuery(document).ready(function ($) {
        $('#myTable').DataTable();
    });

</script>


@if (session('employee_add'))

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
  title: "{{ session('employee_add') }}"
})
</script>

@endif

@if (session('employee_delete'))

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
  title: "{{ session('employee_delete') }}",
})
</script>

@endif


@if (session('employee_update'))

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
  title: "{{ session('employee_update') }}",
})
</script>

@endif

@endsection
