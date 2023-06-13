@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@section('footer_script')
{{-- login success msg once in per session --}}

<script>
    jQuery(window).load(function () {
        if (sessionStorage.getItem('dontLoad') == null) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ auth()->user()->name }} successfully login",
                showConfirmButton: false,
                timer: 5500
            });
            sessionStorage.setItem('dontLoad', 'true');
        }
    });
</script>

@endsection
