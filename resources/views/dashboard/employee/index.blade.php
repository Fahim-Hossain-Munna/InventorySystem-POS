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
                                            <h3 class="text-center">Employee Addmission Form</h3>
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
                                                            <option value="Human Resources">Human Resources</option>
                                                            <option value="Cashier">Cashier</option>
                                                            <option value="Sales Associate">Sales Associate</option>
                                                            <option value="Store Manager">Store Manager</option>
                                                            <option value="Advertising & Marketing Manager">Advertising &
                                                                Marketing Manager</option>
                                                            <option value="Inventory Manager">Inventory Manager</option>
                                                            <option value="Executive">Executive</option>
                                                            <option value="Security Guard">Security Guard</option>
                                                            <option value="Clean Worker">Clean Worker</option>
                                                            <option value="Logistics">Logistics</option>
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
                        <th>SL No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td><img style="width: 80px; height:80px;" class="user-avatar rounded-circle"
                                src="{{ asset('uploads/employe_photos') }}\{{ $employee->picture }}" alt="profile"></td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td><span class="badge bg-primary">{{ $employee->position }}</span></td>
                            <td>{{ $employee->salery }}</td>
                            <td>
                                <button class="me-1 btn btn-success btn-sm"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                                <button class="me-1 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $employee->id }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                {{-- view modal part start --}}
                                <div class="modal fade" id="viewModal{{ $employee->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h3 class="text-center">Employee Details</h3>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-center mt-3 mb-5">
                                                    <img style="width: 120px; height:120px;" class="user-avatar rounded-circle"
                                                    src="{{ asset('uploads/employe_photos') }}\{{ $employee->picture }}" alt="profile">
                                                </div>
                                                <hr>
                                                <p class="fw-bold">Name : <span class="text-info">{{ $employee->name }}</span></p>
                                                <p class="fw-bold">E-mail : <span class="text-info">{{ $employee->email }}</span></p>
                                                <p class="fw-bold">Contact No : <span class="text-info">{{ $employee->tel }}</span></p>
                                                <p class="fw-bold">Home Address : <span class="text-info">{{ $employee->address }}</span></p>
                                                <p class="fw-bold">City : <span class="text-info">{{ $employee->city }}</span></p>
                                                <p class="fw-bold">Sex : <span class="text-info">{{ $employee->sex }}</span></p>
                                                <p class="fw-bold">Religion : <span class="text-info">{{ $employee->religion }}</span></p>
                                                <p class="fw-bold">NID No : <span class="text-info">{{ $employee->nid_no }}</span></p>
                                                <p class="fw-bold">Position : <span class="text-info">{{ $employee->position }}</span></p>
                                                <p class="fw-bold">Work Type : <span class="text-info">{{ $employee->office_type }}</span></p>
                                                <p class="fw-bold">Join Date : <span class="text-info">{{ $employee->job_start_date }}</span></p>
                                                <p class="fw-bold">Salery : <span class="text-info">{{ $employee->salery }}</span></p>

                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <button class="me-1 btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>

                            </td>

                        </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center text-danger"> No Data Found</td>
                    </tr>

                    @endforelse

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
