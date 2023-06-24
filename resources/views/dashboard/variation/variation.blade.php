@extends('layouts.dashboard')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Variations</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card mt-4">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Category</h3>
                        </div>
                        <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
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
                                <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</button>
                            </div>
                            <!-- Modal start -->
                            <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <style>
                                        .modal-body #categoryI{
                                            position: absolute !important;
                                            top: 50px;
                                            left: 50%;
                                            font-size: 60px;
                                            transform: translateX(-50%);
                                            color: #FF0060;
                                        }
                                        .modal-body #categoryP{
                                            margin-top: 120px;
                                            font-size: 30px;
                                            font-weight: 800;
                                            color: #116A7B;
                                        }
                                    </style>
                                    <i class="fa fa-question-circle-o" id="categoryI" aria-hidden="true"></i>
                                    <p class="text-center" id="categoryP">Are you sure to create category?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Yess!</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- Modal end -->
                        </form>
                        <div class="card-title">
                            <h3 class="text-center">Category List</h3>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Category name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            @forelse ($categories as $category)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->index +1 }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <a href="{{ route('category.details', $category->id) }}" class="btn btn-info">Details</a>
                                        </td>
                                        {{-- <td>
                                            <img height="100px" width="100px" src="{{ asset('uploads/category_photos') }}\{{ $category->category_image }}" alt="">
                                        </td> --}}
                                    </tr>
                                </tbody>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-danger"> No Data Found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
        <div class="col-lg-6">
            <div class="card mt-4">
                <div class="card-body">
                    <!-- Credit Card -->
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
                                    <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#addbrand">Add Brand</button>
                                </div>
                                <!-- Modal start -->
                                <div class="modal fade" id="addbrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <style>
                                            .modal-body #brandI{
                                                position: absolute !important;
                                                top: 50px;
                                                left: 50%;
                                                font-size: 60px;
                                                transform: translateX(-50%);
                                                color: #FF0060;
                                            }
                                            .modal-body #brandP{
                                                margin-top: 120px;
                                                font-size: 30px;
                                                font-weight: 800;
                                                color: #116A7B;
                                            }
                                        </style>
                                        <i class="fa fa-question-circle-o" id="brandI" aria-hidden="true"></i>
                                        <p class="text-center" id="brandP">Are you sure to create Brand?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Yess!</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection

@section('footer_script')
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

@if (session('password_update'))
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
            title: '{{ session('password_update') }}'
            })
    </script>
@endif


<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
</script>

@endsection


