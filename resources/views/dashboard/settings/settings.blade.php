@extends('layouts.dashboard')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Settings</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-7">
        <div class="card mt-4">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Profile Info</h3>
                        </div>
                        <form action="{{ route('settings.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Name</label>
                                <input id="" name="name" type="text" class="form-control mb-2" value="{{ auth()->user()->name }}" placeholder="">
                            </div>
                            <div class="form-group has-success">
                                <label for="" class="control-label mb-2">E-mail</label>
                                <input id="" name="email" type="email" class="form-control mb-2" value="{{ auth()->user()->email }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Phone number</label>
                                <input id="" name="tel" type="tel" class="form-control mb-2" value="{{ auth()->user()->tel }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Address</label>
                                <input id="" name="address" type="text" class="form-control mb-2" value="{{ auth()->user()->address }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label style="display: block" class="mb-2">Current Photo</label>
                                @if (auth()->user()->picture)
                                    <img style="height: 150px" src="{{ asset('uploads/profile_photos') }}\{{ auth()->user()->picture }}" alt="">
                                @else
                                    <img style="height: 150px; width: 150px" src="{{ asset('uploads/profile_photos') }}\defult_photo.jpg" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2 mt-3">Image</label>
                                <input id="" name="image" type="file" class="form-control mb-2" value="">
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">confirm</button>
                            </div>
                            <!-- Modal start -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <style>
                                        .modal-body i{
                                            position: none !important;
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
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    <p class="text-center">Are you confirm to change.</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
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
    <div class="col-lg-5">
        <div class="card mt-4">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Password Section</h3>
                        </div>
                        <style>
                            .form_positionone{
                                position: relative;
                            }

                            form i {
                                /* margin-left: -30px; */
                                cursor: pointer;
                                position: absolute;
                                top: 47%;
                                left: 92%;
                            }
                        </style>
                        <form action="{{ route('password.update', auth()->user()->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Current Paaaword</label>
                                @if (session('wrong_pass'))
                                    <div class="alert alert-danger">
                                        <span>{{ session('wrong_pass') }}</span>
                                    </div>
                                @endif
                                <input class="form-control mb-2 form_position" type="password" name="current_password" id="" placeholder="Current Paaaword"/>
                            </div>

                            <div class="form-group has-success">
                                <label for="" class="control-label mb-2">New Paaaword</label>
                                <input name="new_password" class="form-control mb-2 form_position" type="password" value="" placeholder="New Paaaword" id="password">
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Confirm Paaaword</label>
                                <input name="new_confirm_password" class="form-control mb-2 form_position" type="password" value="" placeholder="Confirm Paaaword">
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalpassword">confirm</button>
                            </div>
                             <!-- Modal start -->
                             <div class="modal fade" id="exampleModalpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <style>
                                        .modal-body i{
                                            position: none !important;
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
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    <p class="text-center">confirm to change password.</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
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
@if (session('sucessfully_update'))
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
            title: '{{ session('sucessfully_update') }}'
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

