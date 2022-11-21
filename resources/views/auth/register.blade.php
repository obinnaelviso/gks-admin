@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            {{-- <h4 class="logo-text">{{ config('app.name') }}</h4> --}}
                            <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" width="200" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3>Registration</h3>
                                        <p>
                                            Already have an account? <a href="{{ route('login') }}">Login</a>
                                        </p>
                                    </div>
                                    @livewire('auth.registration-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
