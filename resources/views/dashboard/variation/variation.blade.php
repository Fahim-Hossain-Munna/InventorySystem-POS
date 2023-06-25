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
                            {{-- <li><a href="{{ route('home') }}">Dashboard</a></li>
                            <li><a href="{{ route('expense.view') }}">Expenses</a></li>
                            <li class="{{ route('expense.view') }}">All Expenses</li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- new category create modal start -->
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
<!-- new category create modal end-->
    <!-- new brand create modal start -->
        <div class="modal fade" id="newBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('brand.insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title pt-5">
                                <h3 class="text-center">Brand Form</h3>
                            </div>
                            <div class="card-body pb-5">
                                <div class="form-group">
                                    <label for="" class="control-label mb-2">Brand Name</label>
                                    <input id="" name="brand_name" type="text" class="form-control mb-2" placeholder="Brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-2">Brand Slug</label>
                                    <input id="" name="brand_slug" type="text" class="form-control mb-2" placeholder="Brand Slug">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-2 mt-3">Image</label>
                                    <input id="" name="brand_image" type="file" class="form-control mb-2" value="">
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Brand</button>
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
<!-- new brand create modal end-->

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
                                <button class="me-1 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModalCategory{ $category->id }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                {{-- View Modal start --}}
                                <div class="modal fade" id="viewModalCategory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <h3 class="text-center">Category Details</h3>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-center mt-3 mb-5">
                                                    <img style="height:300px;" class="user-avatar"
                                                    src="{{ asset('uploads/category_photos') }}\{{ $category->category_image }}" alt="Loading">
                                                </div>
                                                <hr>
                                                <p class="title_first">category Name : <span id="span">{{ $category->category_name }}</span></p>
                                                <p class="title_first">Category Slug : <span id="span">{{ $category->category_slug }}</span></p>

                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                {{-- View Modal end --}}
                                {{-- Delete Modal start --}}
                                <button class="me-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $category->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="{{ route('category.delete',$category->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{-- Delete Modal end --}}
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

            <div class="col-md-12 bg-white p-5 col-lg-6">
                <div class="mb-3 d-flex justify-content-end mb-5">
                    <button type="button" class="btn btn-primary btn-sm fw-bolder" data-bs-toggle="modal"
                        data-bs-target="#newBrand"><i class="fa fa-plus me-1" aria-hidden="true"></i>New Brand</button>
                </div>
                <table id="brandTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Brand name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                                <button class="me-1 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModalBrand{{ $brand->id }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                {{-- View Modal start --}}
                                <div class="modal fade" id="viewModalBrand{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <h3 class="text-center">brand Details</h3>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-center mt-3 mb-5">
                                                    <img style="height:300px;" class="user-avatar"
                                                    src="{{ asset('uploads/brand_photos') }}\{{ $brand->brand_image }}" alt="Loading">
                                                </div>
                                                <hr>
                                                <p class="title_first">brand Name : <span id="span">{{ $brand->brand_name }}</span></p>
                                                <p class="title_first">brand Slug : <span id="span">{{ $brand->brand_slug }}</span></p>

                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                {{-- View Modal end --}}
                                {{-- Delete Modal start --}}
                                <button class="me-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBrandModal{{ $brand->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <div class="modal fade" id="deleteBrandModal{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="{{ route('brand.delete',$brand->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{-- Delete Modal end --}}
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

@endsection

@section('footer_script')
<script>
    jQuery(document).ready(function ($) {
        $('#catTable').DataTable();
    });

    jQuery(document).ready(function ($) {
        $('#brandTable').DataTable();
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

@if (session('brand_insert'))
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
            title: '{{ session('brand_insert') }}'
            })
    </script>
@endif

@endsection


