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
                            <li><a href="{{ route('employee') }}">Employess</a></li>
                            <li class="{{ route('employee') }}">Data table</li>
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
            data-bs-target="#exampleModal"><i class="fa fa-plus me-1" aria-hidden="true"></i>New Employee</button>
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
                                            <h3 class="text-center">Employee Details</h3>
                                        </div>
                                        <hr>
                                        <form action="{{ route('employee.insert') }}" method="POST" enctype="multipart/form-data">
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
                                                <label for="cc-number" class="control-label mb-1">Mobile No</label>
                                                <input id="cc-number" name="tel" type="tel"
                                                    class="form-control cc-number identified visa" value=""
                                                    data-val="true" data-val-required="Please enter the card number"
                                                    data-val-cc-number="Please enter a valid card number">
                                                <span class="help-block" data-valmsg-for="cc-number"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Sex</label>
                                                        <select name="sex" id="select" class="form-control">
                                                            <option>Please select</option>
                                                            <option value="male">male</option>
                                                            <option value="female">female</option>
                                                            <option value="other">other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-number" class="control-label mb-1">Religion</label>
                                                    <select name="religion" id="select" class="form-control">
                                                        <option>Please select</option>
                                                        <option value="islam">Muslim(islam)</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="buddhist">Buddhist</option>
                                                        <option value="christian">Christian</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number"
                                                            class="control-label mb-1">Address</label>
                                                        <input id="cc-number" name="address" type="text"
                                                            class="form-control cc-number identified visa" value=""
                                                            data-val="true"
                                                            data-val-required="Please enter the card number"
                                                            data-val-cc-number="Please enter a valid card number">
                                                        <span class="help-block" data-valmsg-for="cc-number"
                                                            data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-number" class="control-label mb-1">City</label>
                                                    <input id="cc-number" name="city" type="text"
                                                        class="form-control cc-number identified visa" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">NID No</label>
                                                <input id="cc-number" name="nid_no" type="tel" class="form-control">
                                                {{-- <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span> --}}
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number"
                                                            class="control-label mb-1">Position</label>
                                                        <select name="position" id="select" class="form-control">
                                                            <option>Please select</option>
                                                            <option value="hr">Human Resources</option>
                                                            <option value="cashier">Cashier</option>
                                                            <option value="sales_associate">Sales Associate</option>
                                                            <option value="store_manager">Store Manager</option>
                                                            <option value="advertising_marketing_manager">Advertising &
                                                                Marketing Manager</option>
                                                            <option value="inventory_manager">Inventory Manager</option>
                                                            <option value="executive">Executive</option>
                                                            <option value="security_guard">Security Guard</option>
                                                            <option value="floor_cleaner">Clean Worker</option>
                                                            <option value="logistics">Logistics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-number" class="control-label mb-1">Office
                                                        Type</label>
                                                    <select name="office_type" id="select" class="form-control">
                                                        <option>Please select</option>
                                                        <option value="office">Office</option>
                                                        <option value="online">Online</option>
                                                        <option value="marketing">Marketing(field)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Starting
                                                            Date</label>
                                                        <input id="cc-number" name="job_start_date" type="date"
                                                            class="form-control cc-number identified visa" value=""
                                                            data-val="true"
                                                            data-val-required="Please enter the card number"
                                                            data-val-cc-number="Please enter a valid card number">
                                                        <span class="help-block" data-valmsg-for="cc-number"
                                                            data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-number" class="control-label mb-1">Starting
                                                        Salery</label>
                                                    <input id="cc-number" name="salery" type="text"
                                                        class="form-control cc-number identified visa" value=""
                                                        data-val="true" data-val-required="Please enter the card number"
                                                        data-val-cc-number="Please enter a valid card number">
                                                    <span class="help-block" data-valmsg-for="cc-number"
                                                        data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Employee Picture</label>
                                                <br>
                                                <input type="file" id="cc-payment" name="picture" class="form-control-file">
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
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12 bg-white p-5">
            {{-- table start --}}
            <table id="myTable" class="table table-striped " style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011-04-25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011-07-25</td>
                        <td>$170,750</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
</div><!-- .animated -->
</div>

@endsection

@section('footer_script')
<script>
    jQuery(document).ready(function ($) {
        $('#myTable').DataTable();
    });

</script>
@endsection
