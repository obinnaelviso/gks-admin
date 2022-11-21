@extends('layouts.main')
@section('title', 'Hymns')
@section('content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <h4>@yield('title')</h4>
            <div class="ms-auto">
                <a id="hymnsCreateBtn" href="{{ route('admin.hymns.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Add Hymn
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                @include('partials.alert')
                @if ($hymns->count() > 0)
                    <div class="table-responsive" id="hymnsTable">
                        <input type="search" class="form-control mb-2" id="search-hymn">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Hymn No.</th>
                                    <th>Body</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($hymns as $hymn)
                                    <tr>
                                        <td class="hymn-no">{{ $hymn->hymn_no }}</td>
                                        <td class="body">{!! $hymn->brief_body !!}
                                        </td>
                                        <td>
                                            <a class='mb-1 btn btn-warning btn-sm'
                                                href="{{ route('admin.hymns.edit', $hymn) }}" title='Edit'><i
                                                    class='bx bx-edit me-0'></i></a>
                                            <button class='mb-1 btn btn-danger btn-sm'
                                                onclick='deleteHymn({{ $hymn->id }})' title='Delete'><i
                                                    class='bx bx-trash me-0'></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-light mb-0 border-0 bg-light alert-dismissible fade show">
                        <div>No Hymn found. Click the button above to add hymns</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/js/list.min.js') }}"></script>
    <script src="{{ asset('js/admin/hymns.js') }}"></script>
@endpush

@push('modals')
    <div class="modal fade" id="deleteHymnModal" tabindex="-1" aria-labelledby="deleteHymnModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletehymnsModalTitle">Delete Hymn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this hymn?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Not yet</button>
                    <button type="button" class="btn btn-danger btn-sm" id="modalDeleteBtn"
                        onclick="processDeleteHymn();">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endpush
