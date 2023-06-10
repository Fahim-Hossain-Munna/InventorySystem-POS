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
                        <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Name</label>
                                <input id="" name="name" type="text" class="form-control mb-2" value="">
                            </div>
                            <div class="form-group has-success">
                                <label for="" class="control-label mb-2">E-mail</label>
                                <input id="" name="email" type="email" class="form-control mb-2" value="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Phone number</label>
                                <input id="" name="number" type="tel" class="form-control mb-2" value="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Address</label>
                                <input id="" name="address" type="text" class="form-control mb-2" value="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label mb-2">Image</label>
                                <input id="" name="image" type="file" class="form-control mb-2" value="">
                            </div>
                            <div>
                                {{-- <button id="" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button> --}}
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
