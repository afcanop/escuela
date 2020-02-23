@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titlePanel">
                        Agregar curso
                        <a href="{{ route('courses.index') }}" data-toggle="tooltip" data-placement="top" title="Lista cursos">
                            <button class="btn btn-link btn-sm text-secondary">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
                            </button>
                        </a>
                    </div>
                    <div class="card-body">


                        {!! Form::open(['route' => 'courses.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('academic.courses.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var slugGenerator = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        };

        const txtName = document.querySelector('#name');

        txtName.addEventListener('keyup', function (event) {
            text = event.target.value;
            slug = slugGenerator(text);
            document.getElementById('slug').value = slug
        })

    </script>
@endsection
