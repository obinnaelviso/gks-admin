@extends('layouts.main')
@section('title', $hymn->id ? 'Edit: ' . $hymn->hymn_no : 'Add Hymn')
@section('content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <h4>
                <a href="{{ route('admin.hymns.index') }}"><i class="bx bx-caret-left"></i></a>
                @yield('title')
            </h4>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                @include('partials.alert')
                <form action="{{ $hymn->id ? route('admin.hymns.update', $hymn) : route('admin.hymns.store') }}"
                    method="POST" enctype="multipart/form-data" id="hymn-form">
                    @csrf
                    @if ($hymn->id)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="hymn_no">Hymn Number</label>
                            <input type="text" class="form-control @error('hymn_no') is-invalid @enderror" id="hymn_no"
                                name="hymn_no" value="{{ old('hymn_no', $hymn->hymn_no) }}">
                            @error('hymn_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="body">Hymn Body</label>
                            <div id="toolbar-container"></div>
                            <div id="body">{!! old('body', $hymn->body) !!}</div>
                            <textarea id="body-text" style="display: none" name="body" @error('body') class="is-invalid" @enderror></textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">{{ $hymn->id ? 'Update' : 'Add' }} Hymn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/ckeditor5-build-decoupled-document/ckeditor.js') }}"></script>
    <script>
        DecoupledEditor.create(document.querySelector('#body'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error)
            })

        $(() => {
            $('#hymn-form').on('submit', (e) => {
                $('#body-text').val($('#body').html())
                $(this).submit()
            })
        })
    </script>
@endpush
