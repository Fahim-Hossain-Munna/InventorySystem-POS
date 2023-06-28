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
                                        <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
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
                                                        <select name="supplier_brand_name" id="select" class="form-control">
                                                            <option>Please select</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
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
                            <th>Number</th>
                            <th>Supplier type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>
                                    @if ($supplier->image == 'defult_photo.jpg')
                                        <img style="width: 80px; height:80px;" class="user-avatar rounded-circle"
                                        src="{{ asset('uploads/profile_photos') }}/defult_photo.jpg" alt="profile">
                                    @else
                                        <img style="width: 80px; height:80px;" class="user-avatar rounded-circle"
                                        src="{{ asset('uploads/supplier_photos') }}\{{ $supplier->image }}" alt="profile">
                                    @endif
                                </td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td><span class="badge bg-primary">{{ $supplier->tel }}</span></td>
                                <td>{{ $supplier->supplier_type }}</td>
                                <td>
                                    <button class="me-1 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#suppliereditModal{{ $supplier->id }}"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                                    {{-- edit/update model start --}}
                                    <div class="modal fade" id="suppliereditModal{{ $supplier->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                            <h3 class="text-center">Supplier Edit/Update Form</h3>
                                                                        </div>
                                                                        <hr>
                                                                        <form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <div class="form-group">
                                                                                <label for="cc-payment" class="control-label mb-1">Full Name</label>
                                                                                <input id="cc-payment" name="name" type="text"
                                                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                                                    value="{{ $supplier->name }}">
                                                                            </div>
                                                                            <div class="form-group has-success">
                                                                                <label for="cc-name" class="control-label mb-1">E-mail Address</label>
                                                                                <input id="cc-name" name="email" type="email"
                                                                                    class="form-control cc-name valid" value="{{ $supplier->email }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cc-number" class="control-label mb-1">Mobile No</label>
                                                                                <input id="cc-number" name="tel" type="tel"
                                                                                    class="form-control cc-number identified visa" value="{{ $supplier->tel }}"  >
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-number" class="control-label mb-1">Supplier Brand</label>
                                                                                        <select name="supplier_brand_name" id="select" class="form-control">
                                                                                            <option>Please select</option>
                                                                                                @foreach ($brands as $brand)
                                                                                                    <option value="{{ $brand->brand_name }}" {{ $supplier->supplier_brand_name ==  $brand->brand_name ? 'selected':'' }}>{{ $brand->brand_name }}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-number" class="control-label mb-1">Supplier Type</label>
                                                                                        <select name="supplier_type" id="select" class="form-control">
                                                                                            <option>Please select</option>
                                                                                            <option value="distributor" {{ $supplier->supplier_type == 'distributor' ? 'selected':'' }}>Distributor</option>
                                                                                            <option value="local_seller" {{ $supplier->supplier_type == 'local_seller' ? 'selected':'' }}>Local Seller</option>
                                                                                            <option value="hole_seller" {{ $supplier->supplier_type == 'hole_seller' ? 'selected':'' }}>Hole Seller</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <label for="cc-number" class="control-label mb-1">Mobile Bangking</label>
                                                                                    <select name="mobile_banking" id="select" class="form-control">
                                                                                        <option>Please select</option>
                                                                                        <option value="bikash" {{ $supplier->mobile_banking == 'bikash' ? 'selected':'' }}>Bikash</option>
                                                                                        <option value="nagad" {{ $supplier->mobile_banking == 'nagad' ? 'selected':'' }}>Nagad</option>
                                                                                        <option value="rocket" {{ $supplier->mobile_banking == 'rocket' ? 'selected':'' }}>Rocket</option>
                                                                                        <option value="upay" {{ $supplier->mobile_banking == 'upay' ? 'selected':'' }}>Upay</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label for="cc-number" class="control-label mb-1">Mobile Banking Number</label>
                                                                                    <input id="cc-number" name="Mobile_banking_Account_number" type="tel"
                                                                                        class="form-control cc-number identified visa" value="{{ $supplier->Mobile_banking_Account_number }}" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cc-number" class="control-label mb-1">Account holder name</label>
                                                                                <input id="cc-number" name="account_holder_name" type="text"
                                                                                    class="form-control cc-number identified visa" value="{{ $supplier->account_holder_name }}"
                                                                                    data-val="true" data-val-required="Please enter the Account holder name"
                                                                                    data-val-cc-number="Please enter a valid Account holder name">
                                                                                <span class="help-block" data-valmsg-for="cc-number"
                                                                                    data-valmsg-replace="true"></span>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cc-number" class="control-label mb-1">Bank Name</label>
                                                                                <input id="cc-number" name="bank_name" type="tel" class="form-control" value="{{ $supplier->bank_name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cc-number" class="control-label mb-1">Branch Name</label>
                                                                                <input id="cc-number" name="branch_name" type="tel" class="form-control" value="{{ $supplier->branch_name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cc-number" class="control-label mb-1">Bank Account number</label>
                                                                                <input id="cc-number" name="bank_account_number" type="tel" class="form-control" value="{{ $supplier->bank_account_number }}">
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-number"
                                                                                            class="control-label mb-1">Current Address</label>
                                                                                        <input id="cc-number" name="current_address" type="text"
                                                                                            class="form-control cc-number identified visa" value="{{ $supplier->current_address }}"
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
                                                                                            class="form-control cc-number identified visa" value="{{ $supplier->parmanent_address }}"
                                                                                            data-val="true"
                                                                                            data-val-required="Please enter the Parmanent Address"
                                                                                            data-val-cc-number="Please enter a valid Parmanent Address">
                                                                                        <span class="help-block" data-valmsg-for="cc-number"
                                                                                            data-valmsg-replace="true"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                            <div class="form-group">
                                                                                <label style="display: block" class="mb-2">Current Photo</label>
                                                                                @if ($supplier->image == 'defult_photo.jpg')
                                                                                    <img style="height: 150px; width: 150px" src="{{ asset('uploads/profile_photos') }}/defult_photo.jpg" alt="profile_photos">
                                                                                @else
                                                                                    <img style="height: 150px" src="{{ asset('uploads/supplier_photos') }}/{{ $supplier->image  }}" alt="supplier_photos">
                                                                                @endif
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cc-payment" class="control-label mb-1">Supplier Picture</label>
                                                                                <br>
                                                                                <input type="file" id="cc-payment" name="image" class="form-control-file">
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div> <!-- .card -->
                                                </div>

                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="me-1 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#supplierviewModal{{ $supplier->id }}"><i class="fa fa-eye" aria-hidden="true"></i></button>

                                    {{-- view modal part start --}}
                                    <div class="modal fade" id="supplierviewModal{{ $supplier->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <div class="card">
                                                <style>
                                                      .card-body .title_first{
                                                        font-size: 22px;
                                                        font-weight: 800;
                                                        color: #FF0060;
                                                      }
                                                      .card-body #span{
                                                        font-size: 18px;
                                                        font-weight: 400;
                                                        color: #116A7B;
                                                      }
                                                </style>
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h3 class="text-center">Supplier Details</h3>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-center mt-3 mb-5">
                                                        @if ($supplier->image == 'defult_photo.jpg')
                                                        <img style="height: 150px; width: 150px" src="{{ asset('uploads/profile_photos') }}/defult_photo.jpg" alt="profile_photos">
                                                        @else
                                                        <img style="width: 200px; height:200px;" class="user-avatar"
                                                        src="{{ asset('uploads/supplier_photos') }}\{{ $supplier->image }}" alt="profile">
                                                        @endif
                                                    </div>
                                                    <hr>
                                                    <p class="title_first">Name : <span id="span">{{ $supplier->name }}</span></p>
                                                    <p class="title_first">E-mail : <span id="span">{{ $supplier->email }}</span></p>
                                                    <p class="title_first">Contact No : <span id="span">{{ $supplier->tel }}</span></p>
                                                    <p class="title_first">supplier_brand_id : <span id="span">{{ $supplier->supplier_brand_id }}</span></p>
                                                    <p class="title_first">supplier_type : <span id="span">{{ $supplier->supplier_type }}</span></p>
                                                    <p class="title_first">mobile_banking : <span id="span">{{ $supplier->mobile_banking }}</span></p>
                                                    <p class="title_first">Mobile_banking_Account_number : <span id="span">{{ $supplier->Mobile_banking_Account_number }}</span></p>
                                                    <p class="title_first">account_holder_name : <span id="span">{{ $supplier->account_holder_name }}</span></p>
                                                    <p class="title_first">bank_name : <span id="span">{{ $supplier->bank_name }}</span></p>
                                                    <p class="title_first">branch_name : <span id="span">{{ $supplier->offbranch_namece_type }}</span></p>
                                                    <p class="title_first">bank_account_number : <span id="span">{{ $supplier->bank_account_number }}</span></p>
                                                    <p class="title_first">current_address : <span id="span">{{ $supplier->current_address }}</span></p>
                                                    <p class="title_first">parmanent_address : <span id="span">{{ $supplier->parmanent_address }}</span></p>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <button class="me-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#supplierdeleteModal{{ $supplier->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    {{-- delete modal part start --}}
                                    <div class="modal fade" id="supplierdeleteModal{{ $supplier->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('supplier.destroy',$supplier->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
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
                                <td colspan="7" class="text-center text-danger"> No Data Found</td>
                            </tr>
                        @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Salary</th>
                            <th>Action</th>
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

@if (session('supplier_insert'))
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
        title: "{{ session('supplier_insert') }}"
    })
    </script>
@endif

{{-- @if (session('employee_delete'))
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
@endif --}}


@if (session('supplier_update'))
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
        title: "{{ session('supplier_update') }}",
    })
    </script>
@endif

@endsection
