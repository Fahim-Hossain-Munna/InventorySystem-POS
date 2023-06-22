
@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="modal-body">
            <div class="card">
              <div class="card-body">
                  <div class="card-title">
                      <h3 class="text-center">Employee Details</h3>
                  </div>
                  <hr>
                    <div class="d-flex justify-content-center mt-3 mb-5">
                      <img style="width: 300px; height:170px;" class="user-avatar"
                      src="{{ asset('uploads/category_photos') }}\{{ $categories->category_image }}" alt="profile">
                    </div>
                    <hr>
                    <p class="title_first">Name : <span id="span">{{ $categories->category_name }}</span></p>
                    <p class="title_first">Slug : <span id="span">{{ $categories->category_slug }}</span></p>
                    <p class="title_first">Image : <span id="span">{{ $categories->caetegory_image }}</span></p>

              </div>
            </div>
          </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endsection


