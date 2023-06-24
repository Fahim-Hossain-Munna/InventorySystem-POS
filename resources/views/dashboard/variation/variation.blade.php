{{-- @extends('layouts.dashboard')
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
                            <li><a href="{{ route('expense.view') }}">Variations</a></li>
                            <li class="{{ route('expense.view') }}">All Expenses</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">


    <div class="col-md-12 bg-white p-5 col-lg-6">

        <table id="expense" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @forelse ($categories as $category)
                 <tr>
                     <td>{{ $loop->index +1 }}</td>
                     <td>{{ $category->category_name }}</td>
                     <td>
                        <a href="{{ route('category.details', $category->id) }}" class="btn btn-info">Details</a>
                    </td>

                 </tr>
               @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger"> No Data Found</td>
                    </tr>
               @endforelse
            </tbody>
        </table>
    </div>

        <div class="col-lg-6">
            <div class="card mt-4">
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center">Brands</h3>
                            </div>
                            <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="control-label mb-2">Category Name</label>
                                    <input id="" name="brand_name" type="text" class="form-control mb-2" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-2">Category Slug</label>
                                    <input id="" name="brand_name" type="text" class="form-control mb-2" placeholder="Category Slug">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-2 mt-3">Image</label>
                                    <input id="" name="category_image" type="file" class="form-control mb-2" value="">
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <style>
                                            .modal-body .brand{
                                                /* position: none !important; */
                                                top: 50px;
                                                left: 50%;
                                                font-size: 60px;
                                                transform: translateX(-50%);
                                                color: #FF0060;
                                            }
                                            .modal-body p{
                                                margin-top: 120px;
                                                font-size: 30px;
                                                font-weight: 800;
                                                color: #116A7B;
                                            }
                                        </style>
                                        <i class="fa fa-question-circle-o brand" aria-hidden="true"></i>
                                        <p class="text-center">Are you sure to create category?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Yess!</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection --}}

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

<div class="row">
  <div class="content">
    <!-- new expense create modal start -->
        <div class="modal fade" id="newCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title pt-5">
                                <h3 class="text-center">Category Form</h3>
                            </div>
                            <div class="card-body pb-5">
                                <div class="form-group">
                                    <label for="" class="control-label mb-2">Category Name</label>
                                    <input id="" name="category_name" type="text" class="form-control mb-2" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-2">Category Slug</label>
                                    <input id="" name="category_slug" type="text" class="form-control mb-2" placeholder="Category Slug">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-2 mt-3">Image</label>
                                    <input id="" name="category_image" type="file" class="form-control mb-2" value="">
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</button>
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
            <div class="col-md-12 bg-white p-5 col-lg-6">
                <div class="mb-3 d-flex justify-content-end mb-5">
                    <button type="button" class="btn btn-primary btn-sm fw-bolder" data-bs-toggle="modal"
                        data-bs-target="#newCategory"><i class="fa fa-plus me-1" aria-hidden="true"></i>New Category</button>
                </div>
                <table id="catTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                               <a href="{{ route('category.details', $category->id) }}" class="btn btn-info">Details</a>
                           </td>

                        </tr>
                      @empty
                           <tr>
                               <td colspan="7" class="text-center text-danger"> No Data Found</td>
                           </tr>
                      @endforelse
                    </tbody>
                </table>
                {{-- table end --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
<script>
    jQuery(document).ready(function ($) {
        $('#catTable').DataTable();
    });

</script>

@if (session('category_insert'))
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
            title: '{{ session('category_insert') }}'
            })
    </script>
@endif

@endsection


