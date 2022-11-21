@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <h3>@yield('title')</h3>
        </div>
        <!--end breadcrumb-->

        <div class="page-class">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12 border-bottom">
                            <h4>Quick Links</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
