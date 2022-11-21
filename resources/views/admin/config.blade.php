@extends('layouts.main')
@section('title', 'Configuration')
@section('content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <h4>@yield('title')</h4>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                @include('partials.alert')
                <form method="POST" action="{{ route('admin.config.index') }}" enctype="multipart/form-data" id="config-form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <label for="preface">Preface</label>
                            <div id="toolbar-container"></div>
                            <div id="preface">{!! old('preface', config_preface()->value) !!}</div>
                            <textarea id="preface-text" style="display: none" name="preface"></textarea>
                            @error('preface')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/ckeditor5-build-decoupled-document/ckeditor.js') }}"></script>
    <script>
        DecoupledEditor.create(document.querySelector('#preface')).then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container');

            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        }).catch(error => {
            console.error(error)
        })

        $(() => {
            $('#config-form').on('submit', (e) => {
                $('#preface-text').val($('#preface').html())
                $(this).submit()
            })
        })
    </script>
@endpush
