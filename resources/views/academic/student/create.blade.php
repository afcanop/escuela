@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titlePanel">
                        Agregar estudiante
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Regresar
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ route('student.index') }}" data-toggle="tooltip" data-placement="top" title="Lista estudiante" >
                                        <button class="btn btn-link btn-sm text-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Estudiante</button>
                                    </a>
                                    <a href="{{ route('courses.show', $curso) }}" data-toggle="tooltip" data-placement="top" title="Información curso" >
                                        <button class="btn btn-link btn-sm text-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Curso</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['route' => ['student.store', $curso] , 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('academic.student.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
